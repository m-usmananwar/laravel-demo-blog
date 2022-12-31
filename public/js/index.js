const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".navlinks-class");
  console.log(burger);
  console.log(nav);
  burger.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
  });
};
navSlide();
