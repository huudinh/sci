<?php
$file = 'likes_ip.txt';

// Lấy địa chỉ IP của người dùng
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_ip = getUserIP();

    // Đọc nội dung tệp tin
    $likes = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // Kiểm tra xem IP đã ấn "like" chưa
    if (isset($likes[$user_ip]) && $likes[$user_ip] === true) {
        echo json_encode(['success' => false, 'message' => 'Bạn đã ấn like rồi!']);
    } else {
        // Cập nhật trạng thái "like" trong tệp tin
        $likes[$user_ip] = true;
        file_put_contents($file, json_encode($likes));

        // Thiết lập cookie "liked"
        // setcookie("liked", "true", time() + (365 * 24 * 60 * 60), "/"); // Cookie hết hạn sau 1 năm
        
        echo json_encode(['success' => true, 'message' => 'Cảm ơn bạn đã ấn like!']);
    }
}
?>
