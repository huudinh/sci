const view = {};

view.setActiveScreen = (screenName) => {
    switch (screenName) {
        case 'login' :
            //mount login screen
            document.getElementById('app').innerHTML = components.login;

            //add form submit listeners
            const loginForm = document.getElementById('login-form');
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const loginInfo = {
                    email: loginForm.email.value,
                    password: loginForm.password.value,
                }
                controller.login(loginInfo);
            });
            break;

        case 'mainScreen1' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen1;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            document.getElementById('userAdmin').addEventListener('click', ()=>{
                controller.adminMain();
            });
            getAPI();
            showIP(ipdata);
            showType(typeData);
            showBrand(brand);
            showDate(dateData)
            showTrangQL(trangQL)
            break;

        case 'mainScreen2' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen2;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Kangnam');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;

        case 'mainScreen3' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen3;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Đông Á');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;
        case 'mainScreen4' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen4;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Paris');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;
        case 'mainScreen5' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen5;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Hồng Hà');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;
        case 'mainScreen6' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen6;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Học Viện');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;
        case 'mainScreen7' :
            //mount login screen
            document.getElementById('app').innerHTML = components.mainScreen7;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            getAPIbrand('Richard Huy');
            showIP(ipdata);
            showType(typeData);
            showDate(dateData)
            break;
        case 'adminMain' :
            document.getElementById('app').innerHTML = components.adminMain;
            document.getElementById('user').innerHTML = localStorage.getItem('user');
            document.getElementById('userLogout').addEventListener('click', ()=>{
                controller.logOut();
            });
            document.getElementById('viewAdmin').addEventListener('click', ()=>{
                view.setActiveScreen('mainScreen1');
            });
            break;
    }
};