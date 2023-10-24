1. Tạo cơ sở dữ liệu và đặt tên theo đúng tên trong file cấu hình 
2. Download composer https://getcomposer.org/download/
3. Clone dự án về từ git 
4. Đổi lại cấu hình trong file .env  và database.php 
5. Mở ứng dụng Console hoặc terminal và nhớ trỏ tới đúng tới thư mục gốc của dự án 
6. Chạy composer install hoặc php composer.phar install
7. Chạy (login authent nếu có) php artisan passport:install
8. Chạy php artisan key:generate
9. Chạy php artisan migrate
10. Chạy php artisan db:seed
11. Chạy php artisan serve