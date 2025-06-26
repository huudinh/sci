# Form Base

Các form trực tiếp gắn trên màn hình Landingpage

### Thư viện

```javascript
<script type="text/javascript" src="https://benhvienthammykangnam.com.vn/css/lib/js_v2.min.js?ver=16"></script>
```

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

### Xử lý Modal Template

```javascript
    const renderModalRegis = (id, modal) => {
        const template = document.getElementById(id);
        const box = document.querySelector("#box-render");
        const clone = template.content.cloneNode(true);
        clone.querySelector(".modal-close").addEventListener("click", () =>
            document.getElementById(modal).remove()
        );
        clone.querySelector(".modal-bg").addEventListener("click", () =>
            document.getElementById(modal).remove()
        );
        box.appendChild(clone);
    };
```

### Form Call

```javascript
// form call
    const callBtn = document.getElementsByClassName("call-btn");
    for (let i = 0; i < callBtn.length; i++) {
        callBtn[i].addEventListener("click", () => {
            renderModalRegis("template-call", "pop-call");

            const formCall = "#form-call";
            const number = total(formCall);
            getLocation().then((data) => {document.querySelector(`${formCall} input[name="location"]`).value = data.city;});

            Validator({
                form: formCall,
                errorSelector: ".form-message",
                formGroupSelector: ".form-group",
                rules: [
                    Validator.isRequired('input[name="imob"]'),
                    Validator.isMobile('input[name="imob"]'),
                ],
                onSubmit: function (data) {
                    data.code_campaign = '533588630';
                    data.name_campaign = '[Kangnam] Yêu Cầu Gọi Lại';

                    checkSendForm(data, this.form, number);
                },
            });
        });
    }
```

### Teamplate Modal Call

```html
    <template id="template-call">
        <div class="modal pop_callkn_1_2_0" id="pop-call" style="display: flex">
            <div class="modal-bg"></div>
            <div class="modal-box animate-pop">
                <div class="modal-close">×</div>
                <div class="modal-body">
                    <div class="pop_callkn_1_2_0__logo">
                        <img width="300" height="110" src="media/images/logo.svg?ver=2" alt="" />
                    </div>
                    <div class="pop_callkn_1_2_0__desc">
                        <p>Để lại SĐT để được chuyên viên tư vấn liên hệ ngay cho bạn</p>
                    </div>
                    <div class="pop_callkn_1_2_0__form">
                        <div class="pop_callkn_1_2_0__inputGroup">
                            <form id="form-call">
                                <div style="display: none">
                                    <input name="iname" value="Yêu Cầu Gọi Lại" type="text" placeholder="Họ tên" />
                                    <input name="email" type="text" placeholder="Email" />
                                    <input name="referred" value="" />
                                    <input name="location" value="" />
                                </div>
                                <div class="form-group pop_callkn_1_2_0__inputGroup">
                                    <input id="phonecall" name="imob" type="text" maxlength="11" minlength="10"
                                        pattern="(84|0)([3|5|7|8|9])([0-9]{8})" required
                                        placeholder="Nhập số điện thoại của bạn*:" />
                                    <div class="form-message"></div>
                                </div>
                                <p class="pop_callkn_1_2_0__note">
                                    Vui lòng điền kết quả phép tính trước khi gửi.
                                </p>
                                <div class="pop_callkn_1_2_0__question">
                                    <div class="pop_callkn_1_2_0__number number--one">1</div>
                                    <div class="pop_callkn_1_2_0__number">+</div>
                                    <div class="pop_callkn_1_2_0__number number--tow">1</div>
                                    <div class="pop_callkn_1_2_0__number">=</div>
                                    <input type="number" class="pop_callkn_1_2_0__result form__result" />
                                </div>
                                <div class="pop_callkn_1_2_0__click">
                                    <input id="pop_sent" type="submit" value="gửi sđt" />
                                </div>
                            </form>
                            <div class="pop_callkn_1_2_0__contact">
                                <p class="pop_callkn_1_2_0__or mb mt20">Hoặc</p>
                            </div>
                        </div>
                        <div class="pop_callkn_1_2_0__des">
                            <div class="pop_callkn_1_2_0__phone pc">
                                <p>
                                    <img src="media/images/call.png" alt="" /> Tư vấn trực tiếp
                                    24/7: <span><a href="tel:1900.6466"> 1900.6466</a></span>
                                </p>
                            </div>
                            <a class="pop_callkn_1_2_0__more mb" href="tel:1900.6466">Liên hệ <img
                                    src="media/images/call_form.png" alt="" />
                                <span>1900.6466</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
```

### Form Regist

```javascript
    const regBtn = document.getElementsByClassName("reg-btn");
    for (let i = 0; i < regBtn.length; i++) {
        regBtn[i].addEventListener("click", () => {
            renderModalRegis("template-register", "pop-reg");

            const formRegist = "#form-reg";
            const number = total(formRegist);
            getLocation().then((data) => {document.querySelector(`${formRegist} input[name="location"]`).value = data.city;});

            Validator({
                form: formRegist,
                errorSelector: ".form-message",
                formGroupSelector: ".form-group",
                rules: [
                    Validator.isRequired('input[name="imob"]'),
                    Validator.isRequired('input[name="iname"]'),
                    Validator.isMobile('input[name="imob"]'),
                    Validator.addInput('#form-reg input[name="itext"]', () => (`Chi nhánh gần nhất: ${document.querySelector('#form-reg select[name="address"]').value} + Dịch vụ quan tâm: ${document.querySelector('#form-reg select[name="service"]').value}`)),
                ],
                onSubmit: function (data) {
                    checkSendForm(data, this.form, number);
                },
            });
        });
    }
```

### Template Regist

```javascript
    <template id="template-register">
        <div class="modal pop_regkn_1_3_0" id="pop-reg" style="display: flex">
            <div class="modal-bg"></div>
            <div class="modal-box animate-pop">
                <div class="modal-close">×</div>
                <div class="modal-body">
                    <div class="pop_regkn_1_3_0__logo">
                        <img width="300" height="110" src="media/images/logo.svg?ver=2" alt="" />
                    </div>
                    <div class="pop_regkn_1_3_0__des">
                        <p>Để lại thông tin để nhận tư vấn báo giá và ưu đãi tốt nhất</p>
                    </div>
                    <form class="pop_regkn_1_3_0__inputGroup" id="form-reg">
                        <div style="display: none">
                            <input name="email" type="text" placeholder="Email:" />
                            <input name="referred" value="" />
                            <input name="location" value="" />
                        </div>
                        <div class="form-group">
                            <input name="iname" type="text" placeholder="Họ tên*:" />
                            <div class="form-message"></div>
                        </div>
                        <div class="form-group">
                            <input id="phonepopup" name="imob" type="text" maxlength="11" minlength="10"
                                pattern="(84|0)([3|5|7|8|9])([0-9]{8})" required placeholder="Điện thoại*:" />
                            <div class="form-message"></div>
                        </div>
                        <div class="form-group" style="display: none">
                            <input name="itext" type="text" placeholder="Ghi chú" />
                            <div class="form-message"></div>
                        </div>
                        <div class="form-group">
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
                        <div class="form-group time">
                            Dịch vụ bạn quan tâm:
                            <select name="service">
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
                        </div>
                        <p class="pop_regkn_1_3_0__note">
                            Vui lòng điền kết quả phép tính trước khi gửi.
                        </p>
                        <div class="pop_regkn_1_3_0__question">
                            <div class="pop_regkn_1_3_0__number number--one">1</div>
                            <div class="pop_regkn_1_3_0__number">+</div>
                            <div class="pop_regkn_1_3_0__number number--tow">1</div>
                            <div class="pop_regkn_1_3_0__number">=</div>
                            <input type="number" class="pop_regkn_1_3_0__result form__result" />
                        </div>
                        <div class="pop_regkn_1_3_0__clicknow">
                            <input id="phonepopupclick" type="submit" value="gửi thông tin" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
```

<!-- *Bài tiếp theo [RS2 Cài đặt React](/lesson/session/session_002_react_setup.md)* -->
