//? Toggle class active
const navbarNav = document.querySelector(".navbar-nav");

//! Ketika Menu Di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

//! Klik dimanapun untuk menghilangkan sidebar
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// ! search
document.getElementById("search").addEventListener("click", function (event) {
  event.preventDefault();
  var searchForm = document.getElementById("search-form");
  if (searchForm.classList.contains("active")) {
    searchForm.classList.remove("active");
  } else {
    searchForm.classList.add("active");
    document.addEventListener("click", outsideClickListener);
  }
});

function outsideClickListener(event) {
  var searchForm = document.getElementById("search-form");
  var searchIcon = document.getElementById("search");
  if (
    !searchForm.contains(event.target) &&
    !searchIcon.contains(event.target)
  ) {
    searchForm.classList.remove("active");
    document.removeEventListener("click", outsideClickListener);
  }
}
