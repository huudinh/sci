jQuery(document).ready(function($) {
    function showPopup(e) {
        e.preventDefault();
        
        // Tạo nội dung popup
        var popupContent = `
            <div id="custom-popup-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999;">
                <div id="custom-popup" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
                    <p>Vui lòng kiểm tra lại nội dung trước khi xuất bản.</p>
                    <button id="confirm-publish" class="button button-primary button-large">Xác nhận</button>
                    <button id="cancel-publish" class="button button-large">Hủy</button>
                </div>
            </div>
        `;
                    // <ul>
                    //     <li><a href="#">Link 1</a></li>
                    //     <li><a href="#">Link 2</a></li>
                    // </ul>

        // Thêm popup vào body
        $('body').append(popupContent);

        // Xử lý sự kiện của các nút trong popup
        $('#confirm-publish').on('click', function() {
            // Cho phép submit form
            $('#publish, #submit').off('click', showPopup).click();
        });

        $('#cancel-publish').on('click', function() {
            // Đóng popup
            $('#custom-popup-overlay').remove();
        });
    }

    // Gắn sự kiện showPopup vào các nút publish/submit
    $('#publish, #submit').on('click', showPopup);
});
