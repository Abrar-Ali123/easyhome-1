let sideBar = document.getElementById("sidebar");
let Toggler = document.getElementById("toggler");
let windowWidth = window.innerWidth;
let mobileCloseBtn = document.querySelector(".btn-close-sidebar");

if (windowWidth < 750) {
  sideBar.classList.add("inactive-sidebar");
} else {
  sideBar.classList.add("active-sidebar");
}

mobileCloseBtn.addEventListener("click", () => {
  sideBar.classList.remove("active-sidebar");
  sideBar.classList.add("inactive-sidebar");
});

Toggler.addEventListener("click", () => {
  if (sideBar.classList.contains("active-sidebar")) {
    sideBar.classList.remove("active-sidebar");
    sideBar.classList.add("inactive-sidebar");
  } else {
    sideBar.classList.add("active-sidebar");
    sideBar.classList.remove("inactive-sidebar");
  }
});
