# Regist Limit

### Thêm thẻ thông báo trong form đăng ký

```html
    <div id="messageBottom" class="message" style="color: #fff;text-align: center;"></div>
```

### Khai báo code kiểm tra

```js
    // Khai báo bộ đếm
    let countdownIntervals = {}; // Object lưu nhiều interval

    // Kiểm tra khi tải trang
    window.onload = () => {
        // Xóa tất cả interval đang chạy
        for (const key in countdownIntervals) {
            clearInterval(countdownIntervals[key]);
        }
        countdownIntervals = {};

        // Khởi động lại đồng hồ cho các form (nếu cần)
        restrictLoginTime('lastLogin', 'phonebottomclick', 'messageBottom');
        restrictLoginTime('lastLogin', 'pop_sent', 'messageCall');
        restrictLoginTime('lastLogin', 'phonepopupclick', 'messageRegist');
    };
```

### Gọi hàm giới hạn khi Validate Form thành công

```js
    spamForm(data, 'phonebottomclick', 'messageBottom');
    spamForm(data, 'pop_sent', 'messageCall');
    spamForm(data, 'phonepopupclick', 'messageRegist');
```