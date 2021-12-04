let voucher = [
    {
        name: 'Voucher 300K',
        count: 35,
    },
    {
        name: 'Voucher 500K',
        count: 20,
    },
    {
        name:'Voucher 1 Triệu',
        count: 5,
    },
    {
        name:'Voucher chăm sóc nha chu',
        count: 20,
    },
    {
        name:'Voucher chăm sóc da',
        count: 20,
    },
];
// console.log(voucher);


let count = 0;

let quaTang = () => {

    count ++;
    let checked = localStorage.getItem("checked");

    if (count > 2 || checked){
        alert('Bạn đã hết lượt nhận quà');
        localStorage.setItem("checked", true);
    } else {
        let randnum = Math.floor((Math.random() * 100) + 1);
        // console.log('randnum', randnum);
        
        let number1 = voucher[0].count;
        let number2 = number1 + voucher[1].count;
        let number3 = number2 + voucher[2].count;
        let number4 = number3 + voucher[3].count;
        let number5 = number4 + voucher[4].count;
        
        if (randnum <= number1){
            console.log(voucher[0].name);
        
        } else if (randnum <= number2){
            console.log(voucher[1].name);
        
        } else if (randnum <= number3){
            console.log(voucher[2].name);
        
        } else if (randnum <= number4){
            console.log(voucher[3].name);
        
        } else if (randnum <= number5){
            console.log(voucher[4].name);
        
        }
    }

}

document.getElementById('btnClick').addEventListener('click', quaTang);









