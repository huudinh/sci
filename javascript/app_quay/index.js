let voucher = [{
        name: 'Voucher 300K',
        count: 35,
    },
    {
        name: 'Voucher 500K',
        count: 20,
    },
    {
        name: 'Voucher 1 Triệu',
        count: 5,
    },
    {
        name: 'Voucher chăm sóc nha chu',
        count: 20,
    },
    {
        name: 'Voucher chăm sóc da',
        count: 20,
    },
];

let spin_wheel = (number) => {
    let wheel = document.querySelector('#wheel .sec');
    wheel.style.transform = `rotate(${number}deg)`;
}

const spin = document.getElementById('spin');

let count = 1;

if (localStorage.getItem("checked")) {
    spin.classList.add('spin-end');
}

spin.addEventListener('click', () => {
    count++;
    let checked = localStorage.getItem("checked");

    if (count > 2 || checked) {
        alert('Bạn đã hết lượt quay');
        spin.classList.add('spin-end');
        localStorage.setItem("checked", true);

    } else {
        let randnum = Math.floor((Math.random() * 100) + 1);

        let number1 = voucher[0].count;
        let number2 = number1 + voucher[1].count;
        let number3 = number2 + voucher[2].count;
        let number4 = number3 + voucher[3].count;
        let number5 = number4 + voucher[4].count;

        if (randnum <= number1) {
            console.log(voucher[0].name);
            spin_wheel(20149);
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);

        } else if (randnum <= number2) {
            console.log(voucher[1].name);
            spin_wheel(20239);
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);


        } else if (randnum <= number3) {
            console.log(voucher[2].name);
            spin_wheel(20261);
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);


        } else if (randnum <= number4) {
            console.log(voucher[3].name);
            spin_wheel(20284);
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);


        } else if (randnum <= number5) {
            console.log(voucher[4].name);
            spin_wheel(20306);
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);


        }
    }

});