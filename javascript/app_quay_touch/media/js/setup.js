// Scroll to anchors
(function() {

    const smoothScroll = function(targetEl, duration) {
        const headerElHeight = document.querySelector('.menu, .regist,.siteHeaderLogo,.siteHeaderMain,.popup_map_2_0_0__regist, .temp2').clientHeight;
        let target = document.querySelector(targetEl);
        let targetPosition = target.getBoundingClientRect().top - headerElHeight;
        let startPosition = window.pageYOffset;
        let startTime = null;

        const ease = function(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        };

        const animation = function(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, targetPosition, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        };
        requestAnimationFrame(animation);

    };

    const scrollTo = function() {
        const links = document.querySelectorAll('.temp2 .temp2_box1__item ,.siteHeader__item, .regist a, .siteHeaderLogo a ,.siteHeaderMain a,.popup_map_2_0_0__regist a,.regist_ft_1_0_0 a,.modal-regist a,.temp8 .item');
        links.forEach(each => {
            each.addEventListener('click', function() {
                const currentTarget = this.getAttribute('href');
                smoothScroll(currentTarget, 1000);
            });
        });
    };
    scrollTo();
}());
window.addEventListener("scroll", function() {

    myLoad('section', 'loaded');
    myLoad('.slide_run', 'slide');
});
// add Img Lazy Demo
addImgDefault('img.lazy', 'src');
addImgDefault('source.lazy', 'srcset');

autoLazy('section', 'loaded');
autoLazy('.slide_run', 'slide');
autoLazy('img.lazy', 'src');
autoLazy('source.lazy', 'srcset');
autoLazy('.lazy-bg', 'img-bg');

window.addEventListener("scroll", function() {
    // Add Onscroll .menu a
    // Add Lazy Screen LDP
    myLazy('img.lazy', 'src');
    myLazy('source.lazy', 'srcset');
    myLazy('.lazy-bg', 'img-bg');
});


var slider_pro = tns({
    container: '.slider_pro',
    items: 1,
    controlsContainer: '#slider-contPro',
    navContainer: '#slider_navpro',
    navAsThumbnails: true,
    autoplay: false,
    autoplayTimeout: 1000,
    gutter: 10,
});
var slider_navpro = tns({
    container: '.slider_navpro',
    items: 4,
    slideBy: 'page',
    autoplay: false,
    autoplayButtonOutput: false,
    mouseDrag: true,
    lazyload: true,
    lazyloadSelector: '.tns-lazy',
    gutter: 10,
    navPosition: 'bottom',
    controlsPosition: 'bottom',
});

// Add Class : 1. Name Button / 2. Name Object / 3. Name Class Add
addClass('.siteHeaderNav', '.siteHeaderMain', 'active');
addClass('.siteHeaderNav', '.siteHeader-bg', 'active');

// Remove Class : 1. Name Button / 2. Name Object / 3. Name Class Add
removeClass('.siteHeader-bg', '.siteHeaderMain', 'active');
removeClass('.siteHeader-bg', '.siteHeader-bg', 'active');
removeClass('.siteHeader a', '.siteHeaderMain', 'active');
removeClass('.siteHeader a', '.siteHeader-bg', 'active');

const btn_reg = document.getElementsByClassName('reg');
const modal_map = document.getElementById('modal-map');
const btn_call = document.getElementsByClassName('call');
const modal_seo = document.getElementById('modal-Seo');
const btn_regist = document.getElementsByClassName('regsit_btn');

for (const item of btn_regist) {
    item.addEventListener("click", () => {
        modal_seo.style.display = 'none';
    });
}
for (const item of btn_reg) {
    item.addEventListener("click", () => {
        modal_map.style.display = 'none';
    });
}
for (const item of btn_call) {
    item.addEventListener("click", () => {
        modal_map.style.display = 'none';
    });
}

// Registbutton modal

const registButton = document.getElementsByClassName('regsit_btn');
const modal = document.getElementsByClassName('modal');

for (const registBtn of registButton) {
    registBtn.addEventListener("click", popHidden);
}

function popHidden() {
    for (const mod of modal) {
        mod.style.display = "none";
    }
}



document.addEventListener("DOMContentLoaded", function() {

    const btnkn1kmmm = document.querySelectorAll(".btnkntvv");
    const popup_regist_1_0_2_overlayClickForm = document.getElementById("popup_regist_1_0_2_overlayClickForm");
    const popup_regist_1_0_2_overlay = document.getElementById("popup_regist_1_0_2_overlay");
    const popup_regist_1_0_2_closePopup = document.getElementById("popup_regist_1_0_2_closePopup");

    for (const regist of btnkn1kmmm) {
        regist.addEventListener("click", function() {
            popup_regist_1_0_2_overlayClickForm.style.display = "block";
            popup_regist_1_0_2_overlay.style.display = "block";
        });
    }

    popup_regist_1_0_2_closePopup.addEventListener("click", function() {
        popup_regist_1_0_2_overlayClickForm.style.display = "none";
        popup_regist_1_0_2_overlay.style.display = "none";
    });

    popup_regist_1_0_2_overlay.addEventListener("click", function() {
        popup_regist_1_0_2_overlayClickForm.style.display = "none";
        popup_regist_1_0_2_overlay.style.display = "none";
    });

});