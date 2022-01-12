class WinnerListItem {
    $container;
    $count;
    $maNV;
    $tenNV;
    $thKhoi;
    $tenGiai;
    $phanThuong;

    constructor(maNV, tenNV, thKhoi, tenGiai, phanThuong) {
        this.$container = document.createElement('tr');

        this.$maNV = document.createElement('td');
        this.$maNV.innerHTML = maNV;

        this.$tenNV = document.createElement('td');
        this.$tenNV.innerHTML = tenNV;

        this.$thKhoi = document.createElement('td');
        this.$thKhoi.innerHTML = thKhoi;

        this.$tenGiai = document.createElement('td');
        this.$tenGiai.innerHTML = tenGiai;

        this.$phanThuong = document.createElement('td');
        this.$phanThuong.innerHTML = phanThuong;
    }
    render() {
        this.$container.appendChild(this.$maNV);
        this.$container.appendChild(this.$tenNV);
        this.$container.appendChild(this.$thKhoi);
        this.$container.appendChild(this.$tenGiai);
        this.$container.appendChild(this.$phanThuong);

        return this.$container;
    }
}
export { WinnerListItem }