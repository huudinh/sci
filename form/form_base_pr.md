# Form Base Paris

Các form trực tiếp gắn trên màn hình Landingpage

### Thư viện
```css
<link rel="stylesheet" href="https://nhakhoaparis.vn/css/lib/lib.min.css?v=3">
```

```javascript
<script type="text/javascript" src="https://nhakhoaparis.vn/css/lib/js_v2.min.js?ver=16"></script>
```

### Capcha HTML

```html
<div class="capcha">
    <p class="capcha__note">Vui lòng điền kết quả phép tính trước khi gửi thông tin.</p>
    <div class="capcha__question">
        <div class="capcha__number number--one">2</div>
        <div class="capcha__number">+</div>
        <div class="capcha__number number--tow">1</div>
        <div class="capcha__number">=</div>
        <input type="number" class="capcha__result form__result">
    </div>
</div>
```

### Function js_v2.min.js

#### Get Number Random
```
    const number = totalCapcha(formRegist);
```

#### Gửi Form 

```
    checkSendForm(data, this.form, number)
```

### HTML Form Base

``` html
<form class="registSidebar_pr_1_0_0" id="registSidebar_pr_1_0_0">
    <article>
        <div>
            <div style="display:none">
                <input name="email" value="" type="textbox" placeholder="Email:">
                <input id="gclid_field" name="referred" value="">
                <input name="location" value="">
            </div>
            <div class="form-group">
                <input name="iname" type="textbox" placeholder="Họ tên*:">
                <div class="form-message"></div>
            </div>
            <div class="form-group">
                <input name="imob" type="textbox" placeholder="Điện thoại*:">
                <div class="form-message"></div>
            </div>
            <div class="form-group">
                <textarea name="inote" placeholder="Nhu cầu tư vấn"></textarea>
                <div class="form-message"></div>
            </div>
            <div class="capcha">
                <p class="capcha__note">Vui lòng điền kết quả phép tính trước khi gửi thông tin.</p>
                <div class="capcha__question">
                    <div class="capcha__number number--one">2</div>
                    <div class="capcha__number">+</div>
                    <div class="capcha__number number--tow">1</div>
                    <div class="capcha__number">=</div>
                    <input type="number" class="capcha__result form__result">
                </div>
            </div>        
        </div>
        <div>
            <input class="registSidebar_pr_1_0_0__Sent" type="submit" value="HOÀN THÀNH">
        </div>
    </article>
</form>
```

### Logic Form Base

```js
// Form Bottom
const formBottom = "#registSidebar_pr_1_0_0";
const number = totalCapcha(formBottom);

// Validate
Validator({
    form: formBottom,
    errorSelector: ".form-message",
    formGroupSelector: ".form-group",
    rules: [
        Validator.isRequired('input[name="imob"]'),
        Validator.isRequired('input[name="iname"]'),
        Validator.isMobile('input[name="imob"]'),
    ],
    onSubmit: function (data) {
        data.code_campaign = '558803151'; 
        data.name_campaign = '[Paris] Thương Hiệu Tư Vấn - Sidebar';
        data.itext = `Đăng ký tư vấn miễn phí: ${data.inote}`;
        checkSendForm(data, this.form, number);
    },
});
```

### Template Form Regist

```html
    <button type="button" class="btn btn-danger notiRegist">button</button>
    <div id="box-render"></div>

    <template id="template-popup_regist_1_0_1">
        <form class="popup_regist_1_0_1 popup_regist_1_0_1__boxTv" id="popup_regist_1_0_1__form">
            <div class="popup_regist_1_0_1__overlay modal-bg" id="popup_regist_1_0_1__overlay"></div>
            <div id="popup_regist_1_0_1__overlayClickForm" class="overlay_form">
                <div class="popup_regist_1_0_1__box">
                    <article>
                        <div style="display:none">
                            <input name="email" type="textbox" value="">
                            <input id="gclid_field" name="referred" value="">
                            <input name="location" value="">
                        </div>
                        <div class="popup_regist_1_0_1__header">
                            <img src="https://nhakhoaparis.vn/wp-content/themes/ParisBrand2024/Module/Header/header_pr_2_0_0/images/logo.jpg" alt="Nha khoa Paris">
                            <p class="popup_regist_1_0_1__header_tt">Đăng kí tư vấn miễn phí</p>
                        </div>
                        <div class="popup_regist_1_0_1__contentBox">
                            <div class="popup_regist_1_0_1__inputBox">
                                <div class="form-group">
                                    <input id="iname" name="iname" type="textbox" placeholder="Họ tên*:">
                                    <div class="form-message"></div>
                                </div>
                                <div class="form-group">
                                    <input id="imob" name="imob" type="textbox" placeholder="Điện thoại*:">
                                    <div class="form-message"></div>
                                </div>
                                <div class="form-group">
                                    <input id="iemail" name="iemail" type="textbox" placeholder="Email:">
                                    <div class="form-message"></div>
                                </div>
                                <div class="form-group">
                                    <textarea id="itext" type="hidden" name="itext" value=""
                                    placeholder="Nhu cầu tư vấn"></textarea>
                                    <div class="form-message"></div>
                                </div>
                            </div>
                            <div class="capcha">
                                <p class="capcha__note">Vui lòng điền kết quả phép tính trước khi gửi thông tin.</p>
                                <div class="capcha__question">
                                    <div class="capcha__number number--one">2</div>
                                    <div class="capcha__number">+</div>
                                    <div class="capcha__number number--tow">1</div>
                                    <div class="capcha__number">=</div>
                                    <input type="number" class="capcha__result form__result">
                                </div>
                            </div>
                            <div class="popup_regist_1_0_1__btnSend">
                                <input id="pop_sent" type="submit" value="HOÀN THÀNH">
                                <div class="popup_regist_1_0_1__contact">
                                    Tư vấn trực tiếp 24/7: <a class="popup_regist_1_0_1__number"
                                        href="tel:19006900">1900.6900</a>
                                </div>
                            </div>
                            <div id="popup_regist_1_0_1__closePopup" class="modal-close">✕</div>
                    </article>
                </div>
            </div>
        </form>
    </template>
```


### Logic Form Regist

```js
const registBtnPopup_1_0_1 = document.querySelectorAll(".notiRegist, .btnnktv");

for (let i = 0; i < registBtnPopup_1_0_1.length; i++) {
    registBtnPopup_1_0_1[i].addEventListener('click', () => {
        
        renderModalTemplate("template-popup_regist_1_0_1", "popup_regist_1_0_1__form", "#box-render");

        const formRegist = "#popup_regist_1_0_1__form";
        const number = totalCapcha(formRegist);
        getLocation().then((data) => {document.querySelector(`${formRegist} input[name="location"]`).value = data.city;});

        // Validate Form
        if(document.querySelector('.popup_regist_1_0_1')){
            Validator({
                form: formRegist,
                errorSelector: '.form-message',
                formGroupSelector: '.form-group',
                rules: [
                    Validator.isRequired('input[name="iname"]'),
                    Validator.isRequired('input[name="imob"]'),
                    Validator.isMobile('input[name="imob"]'),
                ],
                onSubmit: function (data) {
                    checkSendForm(data, this.form, number);
                }
            });
        }
    })
}
```