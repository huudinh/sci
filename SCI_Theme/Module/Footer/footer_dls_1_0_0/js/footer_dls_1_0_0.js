(function () {
    const registerForm = document.getElementById('register-form');
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const registerInfo = {
            email: registerForm.iemail,
            note: registerForm.inote,
        };
        validateForm(registerInfo);
    });

})();

/* Hàm Kiểm Tra Form Dự Đoán */
function validateForm(registerInfo) {

    if (registerInfo.email.value == "") {
        alert("Bạn chưa nhập Email");
        registerInfo.email.classList.add("border");
        return false;
    } else {
        registerInfo.email.classList.remove("border");
    }

    sendAPI(registerInfo);
    alert('Bạn đã gửi thành công');
    registerInfo.email.value = '';
    registerInfo.note.value = '';
}


function sendAPI(registerInfo){
    value1 = registerInfo.email.value;
    value2 = registerInfo.note.value;
    value3 = new Date().toLocaleDateString();
    name1 = 'Email';
    name2 = 'Comment';
    name3 = 'Date Create';

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    fetch(`https://script.google.com/macros/s/AKfycbxPo7DDFQ8xmgp0XitMYpMCM3ukaWUZ_UyDyw-Dn1zQZ32FouprZHnCc9OWje59jG-Z/exec?${name1}=${value1}&${name2}=${value2}&${name3}=${value3}`, requestOptions)
    .then(response => response.text())
    .then(result => {
        console.log(result);            
    })
    .catch(error => console.log('error', error));
}
