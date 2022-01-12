import { WinnerListItem } from "./winnerListItem.js";

class WinnerList {
    $container;
    $tr;
    $maNV;
    $tenNV;
    $thKhoi;
    $tenGiai;
    $phanThuong;
    $form;
    $titleMN;
    $tableMN;
    $winnerList;

    constructor() {
        this.$container = document.createElement('div');
        this.$container.style.display = 'none';
        this.$container.classList.add('modal-container');

        this.$titleMN = document.createElement('div');
        this.$titleMN.classList.add('winnerListTitle');
        this.$titleMN.innerHTML = 'Danh sách nhân viên trúng thưởng Miền Nam';

        this.$tableMN = document.createElement('table');
        this.$tr = document.createElement('tr');

        this.$maNV = document.createElement('th');
        this.$maNV.innerHTML = 'Mã Nhân Viên';

        this.$tenNV = document.createElement('th');
        this.$tenNV.innerHTML = 'Tên Nhân Viên';

        this.$thKhoi = document.createElement('th');
        this.$thKhoi.innerHTML = 'Thương hiệu / Khối';

        this.$tenGiai = document.createElement('th');
        this.$tenGiai.innerHTML = 'Tên Giải';

        this.$phanThuong = document.createElement('th');
        this.$phanThuong.innerHTML = 'Phần Thưởng';

        this.$btnCancel = document.createElement('button');
        this.$btnCancel.classList.add('btn', 'btn-secondary');
        this.$btnCancel.type = 'Button';
        this.$btnCancel.innerHTML = 'Thoát';
        this.$btnCancel.addEventListener('click', this.handleCancel);

        db.collection('listWinnersMN').onSnapshot(this.listWinnersMNListener);
    }
    listWinnersMNListener = (snapshot) => {
        snapshot.docChanges().forEach((change) => {
            const listWinnersMN = change.doc.data();
            // const id = change.doc.id;

            const $winnerListItem = new WinnerListItem(
                listWinnersMN.maNV,
                listWinnersMN.tenNV,
                listWinnersMN.thKhoi,
                listWinnersMN.tenGiai,
                listWinnersMN.phanThuong
            );
            this.$tableMN.appendChild($winnerListItem.render());
        });
    };


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
        modalContent.classList.add('winnerListBox');

        const footer = document.createElement('div');
        footer.classList.add('modal-footer');
        footer.appendChild(this.$btnCancel);

        this.$tr.appendChild(this.$maNV);
        this.$tr.appendChild(this.$tenNV);
        this.$tr.appendChild(this.$thKhoi);
        this.$tr.appendChild(this.$tenGiai);
        this.$tr.appendChild(this.$phanThuong);

        this.$tableMN.appendChild(this.$tr);

        modalContent.appendChild(this.$titleMN);
        modalContent.appendChild(this.$tableMN);
        modalContent.appendChild(footer);

        this.$container.appendChild(modalContent);
        return this.$container;
    }
}

export { WinnerList };