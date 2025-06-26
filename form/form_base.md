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

### HTMl Mẫu Form cơ bản

```html
    <form id="form-bottom">
        <div style="display: none">
            <input name="email" type="text" placeholder="Email:" />                           
            <input name="referred" value="" />
            <input name="location" value="" />
        </div>
        <div class="form-group screen8__input">
            <input name="iname" type="text" placeholder="*Họ và tên" />
            <div class="form-message"></div>
        </div>
        <div class="form-group screen8__input">
            <input type="text" id="phonebottom" maxlength="11" minlength="10"
                pattern="(84|0)([3|5|7|8|9])([0-9]{8})" required name="imob"
                placeholder="*Số điện thoại" />
            <div class="form-message"></div>
        </div>
        <div>
            <select class="input__select" name="address" aria-label="address">
                <option value="">Chọn chi nhánh gần nhất</option>
                <option value="Hà Nội 1: 190 Trường Chinh, Đống Đa">
                    Hà Nội 1: 190 Trường Chinh, Đống Đa
                </option>
                <option value="Sài Gòn 1: 666 CM Tháng 8, Q. Tân Bình">
                    Sài Gòn 1: 666 CM Tháng 8, Q. Tân Bình
                </option>
                <option value="Sài Gòn 2: 218 Nguyễn Trãi, P.3, Q.5">
                    Sài Gòn 2: 218 Nguyễn Trãi, P.3, Q.5
                </option>
                <option value="Hải Phòng: 378 Tô Hiệu, Q. Lê Chân">
                    Hải Phòng: 378 Tô Hiệu, Q. Lê Chân
                </option>
                <option value="Thanh Hóa: 103 Nguyễn Trãi, P. Ba Đình">
                    Thanh Hóa: 103 Nguyễn Trãi, P. Ba Đình
                </option>
                <option value="Nghệ An: 148 Nguyễn Văn Cừ, P. Hưng Phúc">
                    Nghệ An: 148 Nguyễn Văn Cừ, P. Hưng Phúc
                </option>
                <option value="Đà Nẵng: 293 Hùng Vương, Q. Thanh Khê">
                    Đà Nẵng: 293 Hùng Vương, Q. Thanh Khê
                </option>
                <option value="Buôn Ma Thuột: 26 Lê Thánh Tông, Thắng Lợi">
                    Buôn Ma Thuột: 26 Lê Thánh Tông, Thắng Lợi
                </option>
                <option value="Bình Dương: 688A CM Tháng 8, P. Chánh Nghĩa">
                    Bình Dương: 688A CM Tháng 8, P. Chánh Nghĩa
                </option>
                <option value="Cần Thơ: 28 Lý Tự Trọng, Q. Ninh Kiều">
                    Cần Thơ: 28 Lý Tự Trọng, Q. Ninh Kiều
                </option>
            </select>
            <div class="form-message"></div>
        </div>
        <div class="screen8__service">
            Dịch vụ bạn quan tâm:
            <select name="service" aria-label="service">
                <option value="">Bấm chọn</option>
                <option value="nâng mũi">Nâng mũi</option>
                <option value="cắt mí">Cắt mí</option>
                <option value="nâng vòng 1">Nâng vòng 1</option>
                <option value="Hàm mặt">Hàm mặt</option>
                <option value="Trẻ hóa">Trẻ hóa</option>
                <option value="Điều trị da">Điều trị da</option>
                <option value="hút mỡ">Hút mỡ</option>
                <option value="Khác">Khác</option>
            </select>
            <div class="form-message"></div>
        </div>
        <div class="form-group" style="display: none">
            <input name="itext" type="text" placeholder="Ghi chú" />
            <div class="form-message"></div>
        </div>
        <p class="screen8__note">
            Vui lòng điền kết quả phép tính trước khi gửi.
        </p>
        <div class="screen8__question">
            <div class="screen8__number number--one">1</div>
            <div class="screen8__number">+</div>
            <div class="screen8__number number--tow">1</div>
            <div class="screen8__number">=</div>
            <input type="number" class="screen8__result form__result" aria-label="result" />
        </div>
        <div class="screen8__submit">
            <input type="submit" value="TƯ VẤN NGAY" id="phonebottomclick"
                class="target fbt bmk submit_s button-71" />
        </div>
    </form>
```

<!-- *Bài tiếp theo [RS2 Cài đặt React](/lesson/session/session_002_react_setup.md)* -->
