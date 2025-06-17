
document.addEventListener("DOMContentLoaded", function () {
  const menu = document.getElementById("menu-deroulant");
  const img = document.querySelector(".pdp");

  function toggleMenu() {
    menu.classList.toggle("hidden");
  }

  img.addEventListener("click", function (e) {
    e.stopPropagation(); // évite de le fermer direct
    toggleMenu();
  });

  document.addEventListener("click", function (e) {
    if (!img.contains(e.target) && !menu.contains(e.target)) {
      menu.classList.add("hidden");
    }
  });
});

document.addEventListener('DOMContentLoaded', function() {
    const buttons = [
        { id: 'account', url: 'mon-compte.php' },
        { id: 'myaccount', url: 'mon-compte.php' },
        { id: 'pseudo', url: 'modifier-le-pseudo.php' },
        { id: 'mdp', url: 'modifier-le-mot-de-passe.php' },
        { id: 'mail', url: 'modifier-email.php' },
        { id: 'log', url: 'login.php' },
        { id: 'reg', url: 'register.php' },
        { id: 'back', url: 'index.php' },
    ];

    buttons.forEach(({ id, url }) => {
        const btn = document.getElementById(id);
        if (btn) {
            btn.addEventListener('click', function() {
                window.location.href = url;
            });
        } else {
            console.warn(`L’élément #${id} est introuvable, ma pute`);
        }
    });
});

