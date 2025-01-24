// JavaScript Parallax Effect
window.addEventListener("scroll", function () {
    const parallax = document.querySelector(".bg");
    let scrollPosition = window.scrollY;
    // Di chuyển background
    parallax.style.backgroundPositionY = `-${scrollPosition * 0.005}px`;
});
// window.addEventListener("scroll", function () {
//     const parallax = document.querySelector(".parallax");
//     let scrollPosition = window.scrollY;
  
//     // Di chuyển background
//     parallax.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
  
//     // Di chuyển nội dung text
//     const content = document.querySelector(".content");
//     content.style.transform = `translateY(${scrollPosition * 0.2}px)`;
//   });
  