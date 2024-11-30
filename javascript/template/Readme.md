# Thẻ Template

Sử dụng thẻ `<template>` trong HTML mang lại nhiều lợi ích, đặc biệt là khi bạn muốn tạo ra các phần tử HTML có thể tái sử dụng và dễ dàng quản lý. Dưới đây là một số lợi ích chính

#### 1. Tái sử dụng mã HTML: 

Thẻ `<template>` cho phép bạn định nghĩa một đoạn mã HTML mà bạn có thể tái sử dụng nhiều lần trong trang web của mình. Điều này giúp giảm thiểu việc lặp lại mã và làm cho mã của bạn dễ bảo trì hơn.

#### 2. Hiệu suất tốt hơn

Nội dung bên trong thẻ `<template>` không được hiển thị ngay lập tức khi trang được tải. Thay vào đó, nó chỉ được hiển thị khi bạn sao chép và chèn nó vào DOM. Điều này giúp cải thiện hiệu suất tải trang ban đầu.

#### 3. Tách biệt cấu trúc và logic

Sử dụng thẻ `<template>` giúp tách biệt cấu trúc HTML khỏi logic JavaScript. Bạn có thể định nghĩa cấu trúc HTML trong thẻ `<template>` và sử dụng JavaScript để chèn nó vào DOM khi cần thiết.

#### 4. Dễ dàng quản lý và cập nhật: 

Khi bạn cần thay đổi cấu trúc HTML, bạn chỉ cần cập nhật nội dung bên trong thẻ `<template>`. Điều này giúp bạn dễ dàng quản lý và cập nhật mã HTML mà không cần phải thay đổi nhiều nơi trong mã của bạn.

#### 5.Hỗ trợ Shadow DOM 

Thẻ `<template>` thường được sử dụng cùng với Shadow DOM để tạo ra các thành phần web tùy chỉnh. Điều này giúp bạn tạo ra các thành phần có tính năng độc lập và không bị ảnh hưởng bởi các phong cách CSS bên ngoài.

#### 6. Dưới đây là một ví dụ về cách sử dụng thẻ `<template>`

```
<template id="my-template">
  <div class="item">
    <h2>Title</h2>
    <p>Description</p>
  </div>
</template>

<script>
  const template = document.getElementById('my-template').content;
  const clone = document.importNode(template, true);
  document.body.appendChild(clone);
</script>

```

#### 7. Trình duyệt hỗ trợ

Google Chrome: Từ phiên bản 26 trở lên

Mozilla Firefox: Từ phiên bản 22 trở lên

Microsoft Edge: Từ phiên bản 13 trở lên

Safari: Từ phiên bản 7.1 trở lên

Opera: Từ phiên bản 15 trở lên

*=> Các trình duyệt di động cũng hỗ trợ thẻ `<template>`:*

Chrome for Android: Từ phiên bản 26 trở lên

Firefox for Android: Từ phiên bản 22 trở lên

Safari on iOS: Từ phiên bản 7.1 trở lên

Opera Mobile: Từ phiên bản 15 trở lên

*Với sự hỗ trợ rộng rãi này, bạn có thể yên tâm sử dụng thẻ `<template>` trong các dự án web của mình mà không phải lo lắng về vấn đề tương thích trình duyệt.*