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
