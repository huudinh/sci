// Enter call Function
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('keyup', function (event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('seach_2_0_0__send').click();
    }
});

//auto function
(function () { })();

// onscroll add class
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