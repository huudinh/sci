// console.log(compoinents.inputGroup('radio', 'radio', 'radio'));
// console.log(compoinents.questionGroup('Cau 1', 'Ban muon hoi gi'));

const app_check = document.getElementById('app_check');
const container = document.createElement('div');
container.classList.add('checkForm');

for (let i = 0; i < data.length; i++) {
    let index = i;
    let containerCheck = document.createElement('div');
    containerCheck.classList.add('checkQuestion');

    containerCheck.insertAdjacentHTML(
        'beforeend',
        compoinents.questionGroup(data[i].name, data[i].nameValue)
    );

    for (let item of data[i].question) {
        containerCheck.insertAdjacentHTML(
            'beforeend',
            compoinents.inputGroup(index, item.questionName, item.questionValue, )
        );
    }
    container.appendChild(containerCheck);
}


let button = document.createElement('button');
button.innerHTML = 'Nhan ket qua';
button.classList.add('ketQua');

app_check.appendChild(container);
app_check.appendChild(button);


button.addEventListener('click', () => {
    let arrResult = [];
    let radio = document.getElementsByClassName('radio');
    console.log(radio);
    for (let i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            arrResult.push(radio[i].value);
        }
    }
    console.log(arrResult);
    let ketQua = filterSame(arrResult);

    let a, b, c, d;

    if (ketQua.A) {
        a = ketQua.A;
    } else {
        a = 0;
    }
    if (ketQua.B) {
        b = ketQua.B;
    } else {
        b = 0;
    }
    if (ketQua.C) {
        c = ketQua.C;
    } else {
        c = 0;
    }
    if (ketQua.D) {
        d = ketQua.D;
    } else {
        d = 0;
    }

    let number = data.length / 2;

    if (arrResult.length > 0) {
        if (a >= number) {
            console.log('Nam Muc 1')
        } else if (b >= number) {
            console.log('Nam Muc 2')
        } else {
            console.log('Nam Muc 3')
        }
    } else {
        alert('Bạn chưa chọn đủ thông tin');
    }

});

function filterSame(a) {
    let result = {};
    for (var i = 0; i < a.length; ++i) {
        if (!result[a[i]])
            result[a[i]] = 0;
        ++result[a[i]];
    }
    return result;
}