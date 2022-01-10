import { CreateMessageModal } from './createMessageModal.js';

class Rotation {
    $containerBox;
    $container;
    $wheel;
    $sec;
    $img;
    $wheelSidebar;
    $wheelIcon;
    $wheelSpin;
    $spin;
    $btnReset;
    $text;
    $gift;
    count;
    $createMessageModal;

    constructor() {
        this.$containerBox = document.createElement('div');
        this.$containerBox.classList.add('rotationBox');
        this.count = 0;

        this.$container = document.createElement('div');
        this.$wheel = document.createElement('div');
        this.$wheel.classList.add('wheel');
        this.$wheel.setAttribute('id', 'wheel');

        this.$sec = document.createElement('div');
        this.$sec.classList.add('sec');

        this.$img = document.createElement('img');
        this.$img.setAttribute('src', 'images/vongnho.png');

        this.$wheelSidebar = document.createElement('div');
        this.$wheelSidebar.classList.add('wheelSidebar');
        this.$wheelIcon = document.createElement('div');
        this.$wheelIcon.classList.add('wheelIcon');

        this.$wheelSpin = document.createElement('div');
        this.$wheelSpin.classList.add('wheelSpin');
        this.$spin = document.createElement('div');
        this.$spin.classList.add('spin');
        this.$spin.setAttribute('id', 'spin');
        this.$spin.addEventListener('click', this.handlePlay);

        this.$btnReset = document.createElement('button');
        this.$btnReset.setAttribute('id', 'reset');
        this.$btnReset.innerHTML = 'reset';

        this.$text = document.createElement('div');
        this.$text.innerHTML = 'CẢM ƠN SỰ ĐÓNG GÓP CỦA BẠN VÀO SỰ PHÁT TRIỂN CỦA TẬP ĐOÀN';
        this.$text.classList.add('rotationText');

        this.$gift = document.createElement('div');
        this.$gift.classList.add('rotationGift')


    }
    handlePlay = () => {
        this.count++;
        let checked = localStorage.getItem("checked");

        let giai_kk3 = gifts[0].count;
        let giai_kk2 = giai_kk3 + gifts[1].count;
        let giai_kk1 = giai_kk2 + gifts[2].count;
        let giai_3 = giai_kk1 + gifts[3].count;
        let giai_2 = giai_3 + gifts[4].count;
        let giai_1 = giai_2 + gifts[5].count;

        if (this.count > giai_1 || checked) {
            alert('Đã hết phần thưởng');
            spin.classList.add('spin-end');
            localStorage.setItem("checked", true);

        } else {
            if (this.count <= giai_kk3) {
                // console.log(gifts[0].name);
                this.spin_wheel(20039, gifts[0]);

            } else if (this.count <= giai_kk2) {
                // console.log(gifts[1].name);
                this.spin_wheel(20071, gifts[1]);

            } else if (this.count <= giai_kk1) {
                // console.log(gifts[2].name);
                this.spin_wheel(20100, gifts[2]);

            } else if (this.count <= giai_3) {
                // console.log(gifts[3].name);
                this.spin_wheel(20131, gifts[3]);

            } else if (this.count <= giai_2) {
                // console.log(gifts[4].name);
                this.spin_wheel(20161, gifts[4]);

            } else if (this.count <= giai_1) {
                // console.log(gifts[5].name);
                this.spin_wheel(20192, gifts[5]);

            }
            this.resetSpinWheel();
        }
    }

    loadNVMB = async(gift) => {
        try {
            const res = await fetch(
                "./js/data/data_mb.json"
            );
            const responseJSON = await res.json();
            this.randMB(responseJSON.mienBac, gift);
        } catch (err) {
            console.error(err);
            console.log('Loi ket noi');
        }
    };

    randMB(data, gift) {
        let item = data[Math.floor(Math.random() * data.length)];
        // console.log(item);

        this.$createMessageModal = new CreateMessageModal(item, gift);
        this.$createMessageModal.setVisible(true);
        this.$containerBox.appendChild(this.$createMessageModal.render());
    }

    spin_wheel = (number, gift) => {
        this.$sec.style.transition = 'transform 12s ease';
        this.$sec.style.transform = `rotate(${number}deg)`;
        setTimeout(() => {
            this.loadNVMB(gift);
        }, 13000)
    }

    resetSpinWheel = () => {
        setTimeout(() => {
            this.$sec.style.transition = 'none';
            this.$sec.style.transform = `rotate(0deg)`;
        }, 13000)
    }

    render() {
        this.$sec.appendChild(this.$img);
        this.$wheelSidebar.appendChild(this.$wheelIcon);
        this.$wheelSpin.appendChild(this.$spin);

        this.$wheel.appendChild(this.$sec);
        this.$wheel.appendChild(this.$wheelSidebar);
        this.$wheel.appendChild(this.$wheelSpin);

        this.$container.appendChild(this.$wheel);
        this.$containerBox.appendChild(this.$container);

        this.$containerBox.appendChild(this.$text);
        this.$containerBox.appendChild(this.$gift);
        this.$containerBox.appendChild(this.$btnReset);

        return this.$containerBox;
    }
}
export { Rotation }