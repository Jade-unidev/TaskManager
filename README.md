TaskMaster
│ 
├── config
│    └── db.php <-- connexion à la base MySQL 
│ 
├── public <-- fichiers accessibles par le navigateur 
│    ├── index.php <-- page principale, liste tâches 
│    ├── login.php <-- page connexion 
│    ├── register.php <-- page inscription 
│    ├── logout.php <-- déconnexion 
│    └── assets/ <-- CSS, JS, images si besoin
|         └── style.css 
│ 
├── includes <-- fichiers php partagés (fonctions, header/footer) 
│    ├── header.php <-- header HTML commun 
│    └── footer.php <-- footer commun 
└──