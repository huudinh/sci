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
    $titleMB;
    $tableMB;
    $winnerList;

    constructor() {
        this.$container = document.createElement('div');
        this.$container.style.display = 'none';
        this.$container.classList.add('modal-container');

        this.$titleMB = document.createElement('div');
        this.$titleMB.classList.add('winnerListTitle');
        this.$titleMB.innerHTML = 'Danh sách nhân viên trúng thưởng Miền Bắc';

        this.$tableMB = document.createElement('table');
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

        db.collection('listWinnersMB').onSnapshot(this.listWinnersMBListener);
    }
    listWinnersMBListener = (snapshot) => {
        snapshot.docChanges().forEach((change) => {
            const listWinnersMB = change.doc.data();
            // const id = change.doc.id;

            const $winnerListItem = new WinnerListItem(
                listWinnersMB.maNV,
                listWinnersMB.tenNV,
                listWinnersMB.thKhoi,
                listWinnersMB.tenGiai,
                listWinnersMB.phanThuong
            );
            this.$tableMB.appendChild($winnerListItem.render());
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

        this.$tableMB.appendChild(this.$tr);

        modalContent.appendChild(this.$titleMB);
        modalContent.appendChild(this.$tableMB);
        modalContent.appendChild(footer);

        this.$container.appendChild(modalContent);
        return this.$container;
    }
}

export { WinnerList };