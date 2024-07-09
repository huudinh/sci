function loadElement(url, id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementsByTagName("body")[0].insertAdjacentHTML('beforeend', this.responseText);
    }
    xhttp.open("GET", url);
    xhttp.send();

    // Load logic Header
    if(id == 1){
        setTimeout(() => {
            loadScript('https://noisoidrgiang.com/wp-content/themes/SCI_Theme_2024/Module/Header/header_drg_1_0_0/js/header_drg_1_0_0.min.js');
            loadScript('https://noisoidrgiang.com/wp-content/themes/SCI_Theme_2024/Module/Regist/popupRegist_drg_1_0_0/js/popupRegist_drg_1_0_0.min.js');
        }, 600);
    }
}

function loadScript(url) {
    const script = document.createElement('script');
    script.type = "text/javascript";
    script.src = url;
    const t = document.getElementsByTagName('body')[0];
    t.insertAdjacentElement('beforeend', script);
}

document.body.insertAdjacentHTML("beforeend", `
    <div class="loading_kn_1_0_0"></div>
    <style>
      .loading_kn_1_0_0{
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        width: 100vw;
        height: 100vh;
        background: #fff;
        background-image: url("https://noisoidrgiang.com/css/lib/images/loading_icon3.gif");
        background-repeat: no-repeat;
        background-position: center;
      }
    </style>
`)

setTimeout(() => {
    document.querySelector('.loading_kn_1_0_0').remove();
}, 500)

// Load Header
loadElement('https://noisoidrgiang.com/css/landing/header.js?t', 1);

// Load Footer
loadElement('https://noisoidrgiang.com/css/landing/footer.js?t', 2);