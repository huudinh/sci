function Validator(formSelector){
    let formRules = {};
    let validatorRules
    /**
     * Quy ước tạo rules
     * Nếu có lỗi thì return `error message`
     */

    // Lấy ra form element trong DOM theo `fromSelector`
    let formElement = document.querySelector(formSelector);
    
    // Chỉ xử lý khi có element trong DOM
    if(formElement){

        var inputs = formElement.querySelectorAll('[name][rules]');
        for(let input of inputs){
            formRules[input.name] = input.getAttribute('rules');
        }

        console.log(formRules);
    }
}