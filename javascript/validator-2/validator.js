function Validator(formSelector){
   let _this = this;
   let formRules = {};

    function getParent(element, selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    let validatorRules = {
        required: function(value){
            return value ? undefined : 'Vui long nhap truong nay';
        },
        email: function(value){
            let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Vui long nhap Email';
        },
        min: function(min){
            return function(value){
                return value.length >= min ? undefined : `Vui long nhap it nhat ${min} ki tu`;
            }
        },
        max: function(max){
            return function(value){
                return value.length <= max ? undefined : `Vui long nhap it nhat ${max} ki tu`;
            }
        },
    };
    

    let formElement = document.querySelector(formSelector);

    // Chi xu ly khi co element trong DOM
    if(formElement){

        let inputs = formElement.querySelectorAll('[name][rules]');
        for(let input of inputs){

            let rules = input.getAttribute('rules').split('|');
            for(let rule of rules){

                let ruleInfo;
                let isRuleHasValue = rule.includes(':');

                if(isRuleHasValue){
                    ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                }

                let ruleFunc = validatorRules[rule];

                if(isRuleHasValue){
                    ruleFunc = ruleFunc(ruleInfo[1]);
                }

                if(Array.isArray(formRules[input.name])){
                    formRules[input.name].push(ruleFunc);
                } else {
                    formRules[input.name] = [ruleFunc];
                }
            }

            // Lang nghe su kien validate (blur, change, ...)
    
            input.onblur = handleValidate;
            input.oninput = handleClearError;
        }

        // Ham thuc hien validate
        function handleValidate(event){
            let rules = formRules[event.target.name];
            let errorMessage;

            for (let rule of rules){
                errorMessage = rule(event.target.value);
                if(errorMessage) break;
            }

            // Neu co loi hien thi loi ra UI
            if(errorMessage){
                let formGroup = getParent(event.target, '.form-group');
                if(formGroup){
                    formGroup.classList.add('invalid');
                    let formMessage = formGroup.querySelector('.form-message');
                    if(formMessage) {
                        formMessage.innerText = errorMessage;
                    }
                }
            }

            return !errorMessage;
        }

        // Ham clear loi
        function handleClearError(event){
            let formGroup = getParent(event.target, '.form-group');
            if(formGroup.classList.contains('invalid')){
                formGroup.classList.remove('invalid');
                let formMessage = formGroup.querySelector('.form-message');
                
                if(formMessage){
                    formMessage.innerText = '';
                }
            }
        }
    }

    // Xu ly hanh vi submit form
    formElement.onsubmit = function(event){
        event.preventDefault();

        let inputs = formElement.querySelectorAll('[name][rules]');
        let isValid = true;

        for(let input of inputs){
            if(!handleValidate({target: input})){
                isValid = false;
            }
        }
        
        // Khi khong co loi thi submit form
        if(isValid){
            if (typeof _this.onSubmit === 'function'){
                let enableInputs = formElement.querySelectorAll('[name]');
                let formValues = Array.from(enableInputs).reduce(function(values, input){
                    switch(input.type){
                        case 'radio':
                            values[input.name] = formElement.querySelector('input[name="'+input.name+'"check="'+input.check+'"');
                        case 'checkbox':
                            if(!input.matches(':checked')){
                                values[input.name] = '';
                                return values;
                            }
                            if(!Array.isArray(values[input.name])){
                                values[input.name] = [];
                            }
                            values[input.name].push(input.value);
                            break;
                        case 'file':
                            values[input.name] = input.files;
                            break;
                        default:
                            values[input.name] = input.value;
                    }

                    return values;
                }, {});

                // Goi lai ham onSubmit va tra ve gia tri cua form
                _this.onSubmit(formValues);
            } else {
                formElement.submit();
            }
        }
    }
}