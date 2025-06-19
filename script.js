window.addEventListener("scroll", function () {
  const nav = document.getElementById("navbar");
  if (window.scrollY > 10) {
    nav.style.marginTop = "0px";
  } else {
    nav.style.marginTop = "50px";
  }
});
