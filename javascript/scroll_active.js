window.onscroll = () => {
  scrollFunction();
};

const scrollFunction = () => {
  if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) {
    document
      .getElementsByClassName("header_sci_1_0_0")[0]
      .classList.add("header_sci_1_0_0--active");
  } else {
    document
      .getElementsByClassName("header_sci_1_0_0")[0]
      .classList.remove("header_sci_1_0_0--active");
  }
};