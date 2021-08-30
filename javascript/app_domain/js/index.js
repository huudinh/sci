window.onload = () => {
    if(localStorage.getItem('checkLogin') == 'true'){
        switch (localStorage.getItem('role')){
            case 'admin' :
                view.setActiveScreen('mainScreen1');
                break;
            case 'kangnam' :
                view.setActiveScreen('mainScreen2');
                break;
            case 'donga' :
                view.setActiveScreen('mainScreen3');
                break;
            case 'paris' :
                view.setActiveScreen('mainScreen4');
                break;
            case 'hongha' :
                view.setActiveScreen('mainScreen5');
                break;
            case 'hocvien' :
                view.setActiveScreen('mainScreen6');
                break;
            case 'richard' :
                view.setActiveScreen('mainScreen7');
                break;
        }

    } else{
        view.setActiveScreen('login');
    }
}