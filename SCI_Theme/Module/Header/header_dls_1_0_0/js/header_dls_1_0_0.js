document.getElementById("headerMenuBtn").addEventListener("click", () => {
  document.getElementById("headerSideBar").classList.add("show");
  document.getElementById("headerBg").style.display = "block";
});
document.getElementById("headerBg").addEventListener("click", () => {
  document.getElementById("headerSideBar").classList.remove("show");
  document.getElementById("headerBg").style.display = "none";
});

const menuItem = document.querySelectorAll(".header_sci_1_0_0__item");
menuItem.forEach((item) => {
  item.addEventListener("click", () => {
    item.classList.toggle("open");
  });
});


function urlHandler(value) {                               
  window.location.assign(`${value}`);
  let x = document.querySelector('.header_dls_1_0_0__language');
  
  if(x.classList[1] == 'en'){
      x.classList.remove('en');
      x.classList.add('vi');
  } else {
      x.classList.remove('vi');
      x.classList.add('en');
  }
}