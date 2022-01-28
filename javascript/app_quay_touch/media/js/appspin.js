let voucher = [{
        name: 'Bông tai Vàng PNJ',
        count: 1,
        total: 2,
        url: 'media/images/gift1'
    },
    {
        name: 'Voucher Miễn phí chăm sóc nha chu ',
        count: 200,
        // total: 2,
    },
    {
        name: 'Voucher Miễn phí chăm sóc da ',
        count: 60,
        // total: 30,
        total: 2,
    },
    {
        name: 'Voucher Phun xăm -50%',
        count: 80,
        // total: 40,
        total: 2,
    },
    {
        name: 'Voucher 500K  ',
        count: 300,
        // total: 150,
        total: 2,
    },
    {
        name: 'Voucher 200K ',
        count: 300,
        // total: 4,
        // total: 2,
    },
    {
        name: 'Bình giữ nhiệt Kangnam ',
        count: 5,
        // total: 28,
        total: 2,
    },

];
const spin = document.getElementById('spin');
let count = 0;
let message;

// Khai báo giới hạn
let number1_slot = 1;
let number3_slot = 1;
let number4_slot = 1;
let number5_slot = 1;
let number7_slot = 1;

let limit_slot1 = localStorage.getItem("limit_slot1");
let limit_slot3 = localStorage.getItem("limit_slot3");
let limit_slot4 = localStorage.getItem("limit_slot4");
let limit_slot5 = localStorage.getItem("limit_slot5");
let limit_slot7 = localStorage.getItem("limit_slot7");


let spin_wheel = (number) => {
    let wheel = document.querySelector('#wheel .sec');
    wheel.style.transform = `rotate(${number}deg)`;
    wheel.style.transition = `5s ease-in-out`;
}

// Hien thi ket qua
let spinShow = (number, text) => {
    spin.classList.add('spin-end');
    spin_wheel(number);

    setTimeout(() => {
        modalCheckResult2.style.display = 'block';
        modalCheckText2.innerHTML = text;
    }, 1000)
}

if (localStorage.getItem("checked")) {
    spin.classList.add('spin-end');
}

// Reset
let reset = document.getElementsByClassName('modal-close');
let reset2 = document.getElementsByClassName('modal-bg');
reset[0].addEventListener('click', () => {
    reset_wheel();
})
reset2[0].addEventListener('click', () => {
    reset_wheel();
})

function reset_wheel() {
    let wheel = document.querySelector('#wheel .sec');
    wheel.removeAttribute("style");
    playError(false);
}

//Result
let result = []

// Quay nhan qua
spin.addEventListener('click', () => {
    vongQuay();
});

// Loi khi quay
function playError(error) {
    if (error) {
        spin.setAttribute('disabled', 'true');
        spin.classList.add('spin-end');
    } else {
        spin.removeAttribute('disabled');
        spin.classList.remove('spin-end');
    }
}

// Xu ly vong quay
function vongQuay() {
    let randnum = Math.floor((Math.random() * 1000));

    let number1 = voucher[0].count;
    let number2 = number1 + voucher[1].count;
    let number3 = number2 + voucher[2].count;
    let number4 = number3 + voucher[3].count;
    let number5 = number4 + voucher[4].count;
    let number6 = number5 + voucher[5].count;
    let number7 = number6 + voucher[6].count;

    if (randnum <= number1) {
        if ((number1_slot > voucher[0].total) || (limit_slot1 > voucher[0].total)) {
            vongQuay();
        } else {
            console.log(voucher[0].name);

            playError(true)
            spinShow(20426, voucher[0].name);
            number1_slot++;
            localStorage.setItem("limit_slot1", number1_slot);
        }

    } else if (randnum <= number2) {
        console.log(voucher[1].name);

        playError(true)
        spinShow(20426, voucher[1].name);


    } else if (randnum <= number3) {

        if ((number3_slot > voucher[0].total) || (limit_slot3 > voucher[0].total)) {
            vongQuay();
        } else {
            console.log(voucher[2].name);

            playError(true)
            spinShow(20426, voucher[2].name);
            number3_slot++;
            localStorage.setItem("limit_slot3", number3_slot);
        }


    } else if (randnum <= number4) {
        if ((number4_slot > voucher[0].total) || (limit_slot4 > voucher[0].total)) {
            vongQuay();
        } else {
            console.log(voucher[3].name);

            playError(true)
            spinShow(20426, voucher[3].name);
            number4_slot++;
            localStorage.setItem("limit_slot4", number4_slot);
        }

    } else if (randnum <= number5) {
        if ((number5_slot > voucher[0].total) || (limit_slot5 > voucher[0].total)) {
            vongQuay();
        } else {
            console.log(voucher[4].name);

            playError(true)
            spinShow(20426, voucher[4].name);
            number5_slot++;
            localStorage.setItem("limit_slot5", number5_slot);
        }

    } else if (randnum <= number6) {
        console.log(voucher[5].name);

        playError(true)
        spinShow(20426, voucher[5].name);

    } else if (randnum <= number7) {
        if ((number7_slot > voucher[0].total) || (limit_slot7 > voucher[0].total)) {
            vongQuay();
        } else {
            console.log(voucher[6].name);

            playError(true)
            spinShow(20426, voucher[6].name);
            number7_slot++;
            localStorage.setItem("limit_slot7", number7_slot);
        }
    }
}

let setup = document.getElementById('setup');
setup.addEventListener('click', () => {
    let input = prompt('Xin nhap ma');
    if (input == '19006466') {
        alert('Bạn đã reset thành công');
        number1_slot = 1;
        number3_slot = 1;
        number4_slot = 1;
        number5_slot = 1;
        number7_slot = 1;
        localStorage.setItem("limit_slot1", number1_slot);
        localStorage.setItem("limit_slot3", number3_slot);
        localStorage.setItem("limit_slot4", number4_slot);
        localStorage.setItem("limit_slot5", number5_slot);
        localStorage.setItem("limit_slot7", number7_slot);
        location.reload(true);
    } else {
        alert('Mã Pin không đúng')
    }
})

function sendResult(message) {
    localStorage.setItem("checked", true);
    modalCheckText2.innerHTML = message;

    let formNote = document.querySelector('#modalCheckResult2 textarea');
    let formResut = document.querySelector('#modalCheckText').textContent;

    let formText = ` Ket qua kiem tra: ${formResut} . Qua tang : ${message}`;

    console.log(formText)
    formNote.value = formText;
}