class CreateMessageModal {
    $container;
    $maNV;
    $tenNV;
    $thKhoi;
    $tenGiai;
    $phanThuong;
    $btnCreate;
    $form;
    user;
    gift;



    constructor(user, gift) {
        this.user = user;
        this.gift = gift;
        this.$container = document.createElement('div');
        this.$container.style.display = 'none';
        this.$container.classList.add('modal-container');

        this.$form = document.createElement('div');

        this.$maNV = document.createElement('div');
        this.$maNV.innerHTML = 'Mã Nhân viên: ' + this.user.MaNV;

        this.$tenNV = document.createElement('div');
        this.$tenNV.innerHTML = 'Tên nhân viên: ' + this.user.TenNV;

        this.$thKhoi = document.createElement('div');
        this.$thKhoi.innerHTML = 'Thương hiệu / Khối: ' + this.user.TH_Khoi;

        this.$tenGiai = document.createElement('div');
        this.$tenGiai.innerHTML = 'Bạn đã đạt giải: ' + this.gift.name;

        this.$phanThuong = document.createElement('div');
        this.$phanThuong.innerHTML = 'Phần thưởng của bạn là: ' + this.gift.meed;

        this.$btnCreate = document.createElement('button');
        this.$btnCreate.classList.add('btn', 'btn-primary');
        this.$btnCreate.style.marginLeft = '5px';
        this.$btnCreate.innerHTML = 'Create';
        this.$btnCreate.addEventListener('click', this.handleSubmit);

        this.$btnCancel = document.createElement('button');
        this.$btnCancel.classList.add('btn', 'btn-secondary');
        this.$btnCancel.type = 'Button';
        this.$btnCancel.innerHTML = 'Cancel';
        this.$btnCancel.addEventListener('click', this.handleCancel);
    }

    handleSubmit = (event) => {
        event.preventDefault();

        db.collection('listWinnersMB')
            .add({
                maNV: this.user.MaNV,
                tenNV: this.user.TenNV,
                thKhoi: this.user.TH_Khoi,
                tenGiai: this.gift.name,
                phanThuong: this.gift.meed

            })
            .then(() => {
                this.setVisible(false);
            });


    }

    handleCancel = () => {
        this.setVisible(false);
    }

    setVisible(visible) {
        if (visible) {
            this.$container.style.display = 'flex';
        } else {
            this.$container.style.display = 'none';
        }
    }

    render() {
        const modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        this.$form.appendChild(this.$maNV);
        this.$form.appendChild(this.$tenNV);
        this.$form.appendChild(this.$thKhoi);
        this.$form.appendChild(this.$thKhoi);
        this.$form.appendChild(this.$tenGiai);
        this.$form.appendChild(this.$phanThuong);

        const footer = document.createElement('div');
        footer.classList.add('modal-footer');
        footer.appendChild(this.$btnCancel);
        footer.appendChild(this.$btnCreate);
        this.$form.appendChild(footer);

        modalContent.appendChild(this.$form);

        this.$container.appendChild(modalContent);
        return this.$container;
    }
}

export { CreateMessageModal };