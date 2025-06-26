# Form Base

Các form trực tiếp gắn trên màn hình Landingpage

### Random Number

``` javascript
    // Random Number
    const total = (elm) => {
        const a = Math.floor(Math.random() * 5) + 1;
        const b = Math.floor(Math.random() * 5) + 1;
        document.querySelector(`${elm} .number--one`).innerHTML = a;
        document.querySelector(`${elm} .number--tow`).innerHTML = b;
        return a + b;
    };
```

### Kiểm tra Gửi Form

```javascript
function checkSendForm(data, formID, number){
    const result = document.querySelector(`${formID} .form__result`).value;

    // Lấy thông tin cơ bản
    data.first_link = document.URL;
    data.website = document.referrer;
    
    // Kiểm tra dữ Email      
    !data.iemail && (data.iemail = 'no@email.benhvienthammykangnam.com.vn');
    // Kiểm tra Code Campaign
    !data.code_campaign && (data.code_campaign = '583971142');
    // Kiểm tra Name Campaign
    !data.name_campaign && (data.name_campaign = '[Kangnam] Sale Kangnam');
    
    if (getValue(`${formID} input[name="email"]`) === "") {
        if (Number(result) !== number) {
            alert("Đáp án chưa chính xác. Vui lòng thử lại");
        } else {
            console.log(data);
            // sendForm(data, "/dang-ky-thanh-cong");
            // Parame disableButton: Form, Input
            disableButton(formID, `${formID} input[type="submit"]`);
        }
    } else {
        disableButton(formID, `${formID} input[type="submit"]`);
    }
}
```

### Khai báo Form cơ bản

``` javascript
    // Form Bottom
    const formBottom = "#form-bottom";
    const number = total(formBottom);
    
    // Validate
    Validator({
        form: formBottom,
        errorSelector: ".form-message",
        formGroupSelector: ".form-group",
        rules: [
            Validator.isRequired('input[name="imob"]'),
            Validator.isRequired('input[name="iname"]'),
            Validator.isMobile('input[name="imob"]'),
            Validator.addInput(`${formBottom} input[name="itext"]`, () => (`Chi nhánh gần nhất: ${document.querySelector(`${formBottom} select[name="address"]`).value} + Dịch vụ quan tâm: ${document.querySelector(`${formBottom} select[name="service"]`).value}`)),
        ],
        onSubmit: function (data) {
            // data.iemail = 'a@a.vn'; data.code_campaign = '583971142 1'; data.name_campaign = '[Kangnam] Sale Kangnam 1';
            // Kiểm tra Form Gửi: (data, formID, number)
            checkSendForm(data, this.form, number);
        },
    });
```

<!-- *Bài tiếp theo [RS2 Cài đặt React](/lesson/session/session_002_react_setup.md)* -->
