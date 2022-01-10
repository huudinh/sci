let gifts = [{
        name: 'Giải Khuyến khích 3 - Thành công bắt đầu từ những việc nhỏ nhất',
        meed: 'Bình giữ nhiệt Lock & Lock',
        count: 8,
    },
    {
        name: 'Giải Khuyến khích 2 - Đam mê phục vụ khách hàng',
        meed: 'Nồi lẩu điện Sunhouse',
        count: 7,
    },
    {
        name: 'Giải Khuyến khích 1 - Trách nhiệm với công việc và khách hàng',
        meed: 'Bàn ủi hơi nước Philips',
        count: 5,
    },
    {
        name: 'Giải Ba - Nhân viên là tài sản quan trọng nhất',
        meed: 'Máy xay sinh tố cầm tay Philips',
        count: 3,
    },
    {
        name: 'Giải Nhì -  Mang lại trải nghiệm tốt nhất cho Nhân viên & Khách hàng',
        meed: 'Máy lọc không khí Xiaomi',
        count: 2,
    },
    {
        name: 'Giải Nhất - Lấy Khách hàng làm trung tâm',
        meed: 'Nồi chiên không dầu 6,2 lít Philips',
        count: 1,
    },
];

const loadNVMB = async() => {
    try {
        const res = await fetch(
            "./js/data_mb.json"
        );
        const responseJSON = await res.json();
        // console.log(responseJSON.mienBac);
        randMB(responseJSON.mienBac)
    } catch (err) {
        console.error(err);
        console.log('Loi ket noi');
    }
};

//Fuction Rrandom NV Mien Bac
function randMB(data) {
    let item = data[Math.floor(Math.random() * data.length)];
    console.log(item);
}


let spin_wheel = (number, gift) => {
    let wheel = document.querySelector('#wheel .sec');
    wheel.style.transition = 'transform 12s ease';
    wheel.style.transform = `rotate(${number}deg)`;
    setTimeout(() => {
        loadNVMB(gift);
    }, 13000)
}

let resetSpinWheel = () => {
    setTimeout(() => {
        let wheel = document.querySelector('#wheel .sec');
        wheel.style.transition = 'none';
        wheel.style.transform = `rotate(-12deg)`;
    }, 13000)
}

const spin = document.getElementById('spin');

let count = 0;

if (localStorage.getItem("checked")) {
    spin.classList.add('spin-end');
}

spin.addEventListener('click', () => {
    count++;
    let checked = localStorage.getItem("checked");

    let giai_kk3 = gifts[0].count;
    let giai_kk2 = giai_kk3 + gifts[1].count;
    let giai_kk1 = giai_kk2 + gifts[2].count;
    let giai_3 = giai_kk1 + gifts[3].count;
    let giai_2 = giai_3 + gifts[4].count;
    let giai_1 = giai_2 + gifts[5].count;

    if (count > giai_1 || checked) {
        alert('Đã hết phần thưởng');
        spin.classList.add('spin-end');
        localStorage.setItem("checked", true);

    } else {
        // let randnum = Math.floor((Math.random() * 100) + 1);

        if (count <= giai_kk3) {
            console.log(gifts[0].name);
            spin_wheel(20149, gifts[0]);


        } else if (count <= giai_kk2) {
            console.log(gifts[1].name);
            spin_wheel(20239, gifts[1]);


        } else if (count <= giai_kk1) {
            console.log(gifts[2].name);
            spin_wheel(20261, gifts[2]);


        } else if (count <= giai_3) {
            console.log(gifts[3].name);
            spin_wheel(20284, gift[3]);

        } else if (count <= giai_2) {
            console.log(gifts[4].name);
            spin_wheel(20306, gifts[4]);

        } else if (count <= giai_1) {
            console.log(gifts[5].name);
            spin_wheel(20306, gifts[5]);

        }
        resetSpinWheel();
    }

});


//Reset
document.getElementById('reset').addEventListener('click', () => {
    localStorage.removeItem("checked");
    spin.classList.remove('spin-end');
    count = 0;
});