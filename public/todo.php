<?php
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/user-var.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/assets/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <?php include 'includes/header-todo.php'; ?>

        <div class="separation-header"></div>
        
        <div class="body-todo">
            
            <div class="list">

            </div>

            <div class="add-task">

                <input placeholder="    Titre de la tâche" class="in-task">

                <button class="add-btn"><h1 class="pls">+</h1></button>
            
            </div>

            <div class="comp">

                <h1 class="task-nocomp">Tâches non complêtées :</h1>

                <h1 class="task-prio">Tâches prioritaires :</h1>
                
                <h1 class="task-comp">Tâches complêtées :</h1>

            </div>



        </div>




























        

        <div id="menu-deroulant" class="menu hidden">
            <div class="profil-menu">    
                <img src="includes/images/pdp.png" class="pdp">
                <h1 class="username-menu"><?= htmlspecialchars($_SESSION['username'] ?? 'Invité') ?></h1>
            </div>
            <button id="account" class="menu-btn">Mon Compte</button>
            <button id="pseudo" class="menu-btn">Modifier le pseudo</button>
            <button id="mdp" class="menu-btn">Modifier le mot de passe</button>
            <button id="mail" class="menu-btn">Modifier l'adresse mail</button>
            <button id="log" class="menu-log">Login</button>
            <button id="deco" class="menu-btn-deco">Se déconnecter</button>
        </div>


        <script src="/assets/menu.js"></script>
        <script>
            const input = document.querySelector('.in-task');
            const btn = document.querySelector('.add-btn');
            const listContainer = document.querySelector('.list');

            // Ajouter une tâche
            btn.addEventListener('click', () => {
                const task = input.value.trim();
                if (task !== '') {
                    fetch('add-task.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'task=' + encodeURIComponent(task)  // attention ici, c'est "task" pas "title"
                    })
                    .then(res => res.json())  // on attend un JSON maintenant
                    .then(data => {
                        if (data.error) {
                            alert("Erreur : " + data.error);
                        } else if (data.success) {
                            input.value = '';
                            loadTasks();
                        } else {
                            alert("Réponse inconnue du serveur");
                        }
                    })
                    .catch(err => {
                        alert("Erreur réseau ou JSON : " + err.message);
                    });
                }
            });

            // Charger les tâches triées : d'abord non complétées, puis complétées
            function loadTasks() {
                fetch('get-tasks.php')
                .then(res => res.json())
                .then(tasks => {
                    // Tri : non complétées avant complétées
                    tasks.sort((a, b) => a.is_completed - b.is_completed);

                    listContainer.innerHTML = '';

                    // Comptage des catégories
                    let countNonCompleted = 0;
                    let countCompleted = 0;
                    let countPriority = 0;

                    tasks.forEach(task => {
                        // Compte priorités
                        if (task.is_priority == 1) countPriority++;

                        // Compte tâches complétées ou non
                        if (task.is_completed == 1) countCompleted++;
                        else countNonCompleted++;

                        // Création des éléments
                        const div = document.createElement('div');
                        div.classList.add('task');
                        if (task.is_priority == 1) {
                            div.classList.add('prioritaire');
                        }
                        div.innerHTML = `
                            <input type="checkbox" ${task.is_completed ? 'checked' : ''} data-id="${task.id}" class="complete-checkbox">
                            <span>${task.title}</span>
                            <label class="prio-label-unique">
                                <input type="checkbox" ${task.is_priority == 1 ? 'checked' : ''} data-id="${task.id}" class="priority-checkbox prio-checkbox-unique">
                            </label>
                            <button class="delete-btn" data-id="${task.id}" title="Supprimer la tâche" style="background:none; border:none; cursor:pointer;">
                                🗑️
                            </button>
                        `;
                        listContainer.appendChild(div);
                    });

                    // Mise à jour des compteurs dans le DOM
                    document.querySelector('.task-nocomp').textContent = `Tâches non complétées : ${countNonCompleted}`;
                    document.querySelector('.task-comp').textContent = `Tâches complétées : ${countCompleted}`;
                    document.querySelector('.task-prio').textContent = `Tâches prioritaires : ${countPriority}`;
                })
                .catch(err => {
                    alert("Erreur chargement tâches : " + err.message);
                });
            }

            listContainer.addEventListener('change', (e) => {
                const target = e.target;
    
                if (target.classList.contains('complete-checkbox')) {
                    const taskId = target.dataset.id;
                    const isCompleted = target.checked ? 1 : 0;

                    // Si on coche la tâche comme complétée, on force la priorité à 0
                    if (isCompleted === 1) {
                        // On met à jour priorité = 0 en même temps
                        fetch('update-priority.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `task_id=${taskId}&is_priority=0`
                        })
                        .then(res => res.json())
                        .then(() => {
                            // Puis on met à jour la complétion
                            fetch('update-task.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: `task_id=${taskId}&is_completed=1`
                            })
                            .then(res => res.json())
                            .then(() => loadTasks())
                            .catch(err => alert("Erreur réseau maj : " + err.message));
                        })
                        .catch(err => alert("Erreur réseau maj priorité : " + err.message));
                    } else {
                        // Sinon on fait juste la mise à jour normale de la complétion
                        fetch('update-task.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `task_id=${taskId}&is_completed=0`
                        })
                        .then(res => res.json())
                        .then(() => loadTasks())
                        .catch(err => alert("Erreur réseau maj : " + err.message));
                    }
                }
                else if (target.classList.contains('priority-checkbox')) {
                    const taskId = target.dataset.id;
                    const isPriority = target.checked ? 1 : 0;

                    fetch('update-priority.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `task_id=${taskId}&is_priority=${isPriority}`
                    })
                    .then(res => res.json())
                    .then(() => loadTasks())
                    .catch(err => alert("Erreur réseau maj : " + err.message));
                }
            });


            listContainer.addEventListener('change', (e) => {
                const target = e.target;
    
                if (target.classList.contains('complete-checkbox')) {
                    const taskId = target.dataset.id;
                    const isCompleted = target.checked ? 1 : 0;

                    fetch('update-task.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `task_id=${taskId}&is_completed=${isCompleted}`
                    })
                    .then(res => res.json())
                    .then(() => loadTasks());
                }

                if (target.classList.contains('priority-checkbox')) {
                    const taskId = target.dataset.id;
                    const isPriority = target.checked ? 1 : 0;

                    fetch('update-priority.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `task_id=${taskId}&is_priority=${isPriority}`
                    })
                    .then(res => res.json())
                    .then(() => loadTasks());
                }
            });

            listContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('delete-btn')) {
                    const taskId = e.target.dataset.id;

                    // Suppression directe sans confirmation
                    fetch('delete-task.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        body: `task_id=${taskId}`
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            loadTasks();
                        } else {
                            alert("Erreur en supprimant la tâche : " + (data.error || "Inconnue"));
                        }
                    })
                    .catch(err => alert("Erreur réseau : " + err.message));
                }
            });





            // Appel initial
            loadTasks();
        </script>


    </body>
</html>