<?php

// Header( "HTTP/1.1 301 Moved Permanently" );
// Header("Location: ".home_url()."");


?>
<?php get_header(); ?>
<main class="dt-main">
    <div class="dt-mainBox">
        <div>
            Nội dung không tìm thấy hoặc không tồn tại!<br>
            <br>
            Bấm <a href="/">vào đây</a> để quay về Trang chủ
        </div>
    </div>
</main>
<style>
    .dt-main {
        text-align: center;
        padding: 100px 20px;
        font-size: 20px
    }

    .dt-main a {
        color: #0056A4;
        text-decoration: underline;
        font-weight: bold
    }

    .dt-main a:hover {
        color: #FF706F;
    }

    .dt-mainBox {
        height: 180px;
    }

    @media (max-width:480px) {
        .dt-main {
            padding: 20px;
            font-size: 16px;
        }
    }
</style>
<?php get_footer(); ?>