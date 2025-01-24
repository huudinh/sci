<?php
if(isset($_GET['t'])):

    // $url = 'https://benhvienthammykangnam.com.vn/hoi-dap/wp-json/wp/v2/categories';
    function readAPI($url){
        // Khởi tạo cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Thực hiện yêu cầu và lấy phản hồi
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Giải mã JSON
        return $data = json_decode($response, true);
    }

    $data = readAPI('https://benhvienthammykangnam.com.vn/hoi-dap/wp-json/wp/v2/categories');

    // Lấy name và slug
    foreach ($data as $category) {
        echo 'Name: ' . $category['name'] . '<br>';
        echo 'Slug: ' . $category['slug'] . '<br><br>';
    }

endif;