<?
// hướng dẫn cài đặt ứng dụng Laravel 9 + react
// https://www.tutussfunny.com/laravel-9-react-complete-crud-application/


// Xay dung lavarel login
// https://bephongviet.com/reactjs-bai-1-khoi-dong-du-an-voi-reactjs/
// https://bephongviet.com/xay-dung-web-service-cho-chuc-nang-dang-ky-dang-nhap-tren-laravel/


// Token
// https://viblo.asia/p/api-rest-trong-laravel-su-dung-xac-thuc-passport-RQqKLEzzZ7z


// Upload file
// https://www.tutsmake.com/laravel-9-file-upload-validation-example-tutorial/

try{
    // Code
} catch (Exception $e) {
    return response()->json([
        'status' => false,
        'message' => $e
    ], 500);
}

// Lỗi khi sử dụng đường dẫn cần gõ lệnh
// php artisan storage:link
public_path();

// Giải pháp: Bạn cần khôi phục lại file vendor/autoload.php trong ứng dụng laravel của bạn. 
// composer install hoặc composer update 