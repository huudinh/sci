const controller = {};

controller.login = async (loginInfo) => {
    if(!loginInfo.email){
        alert('Nhap Email:');
    }else if(!loginInfo.password){
        alert('Nhap Password:');
    }
    if(loginInfo.email && loginInfo.password){
        localStorage.setItem("checkLogin", 'false');
        for(let user of users ){
            //Check data.js
            if((loginInfo.email == user.email) && (loginInfo.password == user.password)){
                // view.setActiveScreen('mainScreen1');
                localStorage.setItem("checkLogin", 'true');
                localStorage.setItem("user", user.user);
                localStorage.setItem("role", user.role);
                break;
            }
        }

        switch (localStorage.getItem('role')){
            case 'admin' :
                view.setActiveScreen('mainScreen1');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                console.log('ok');
                break;
            case 'kangnam' :
                view.setActiveScreen('mainScreen2');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
            case 'donga' :
                view.setActiveScreen('mainScreen3');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
            case 'paris' :
                view.setActiveScreen('mainScreen4');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
            case 'hongha' :
                view.setActiveScreen('mainScreen5');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
            case 'hocvien' :
                view.setActiveScreen('mainScreen6');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
            case 'richard' :
                view.setActiveScreen('mainScreen7');
                document.getElementById('user').innerHTML = localStorage.getItem('user');
                break;
        }

        if(localStorage.getItem('checkLogin') == 'false') {
            alert('Bạn nhập sai thông tin');
            view.setActiveScreen('login');
        }
    }
}

controller.logOut = () => {
    localStorage.setItem("checkLogin", 'false');
    localStorage.setItem("role", '');
    view.setActiveScreen('login');
}
controller.adminMain = () => {
    view.setActiveScreen('adminMain');
}