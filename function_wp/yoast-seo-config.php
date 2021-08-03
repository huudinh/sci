<?php
/** Disable schema yoast seo **/
add_filter( 'wpseo_json_ld_output', '__return_false' );

/** Remove Yoast HTML Comments from version **/
add_filter( 'wpseo_debug_markers', '__return_false' );

// Schema Yoast Seo
include "yoast-seo-config.php";

// Schema.org JSON for breadcrumbs
add_action('wp_footer','nvt_schema_breadcrumbs');
function nvt_schema_breadcrumbs() {

if(is_singular('post')) {
    global $post;
    $postId = $post->ID;
    $meta_desc = get_post_meta($postId, '_yoast_wpseo_metadesc', true);
    if(empty($meta_desc)) {
        $sapo = preg_split('/\r?\n|\r/', $post->post_content);

        $description = $sapo[0];
        if(mb_strlen($description, 'UTF-8') > 297) {
            $meta_desc = mb_substr($description, 0, 297, 'UTF-8') . '...';
        } else {
            $meta_desc = $description;
        }
    }

    $image = '/wp-content/themes/dichvu/Module/Header/header_1_0_2/images/logo.png';
    if(has_post_thumbnail($postId)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'full', false);
        $image = $image[0];
    }

    $count = 1;
    ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo get_the_permalink($postId); ?>"
            },
            "url": "<?php echo get_the_permalink($postId); ?>",
            "headline": "<?php echo esc_html(get_the_title($postId)); ?>",
            "image": {
                "@type": "ImageObject",
                "url": "<?php echo $image; ?>",
                "height": 1280,
                "width": 628
            },
            "datePublished": "<?php echo get_the_date('d/m/Y', $postId); ?>",
            "dateModified": "<?php echo get_the_modified_date('d/m/Y', $postId); ?>",
            "author": {
                "@type": "Person",
                "name": "Hồng Hà"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Trung Tâm Điều Trị Vô Sinh Hiếm Muộn",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo home_url(); ?>/wp-content/themes/dichvu/Module/Header/header_1_0_2/images/logo.png",
                    "width": 425,
                    "height": 124
                }
            },
            "description": "<?php echo esc_html($meta_desc); ?>"
        }
    </script>
<?php
}
?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "MedicalOrganization",
            "url": "https://chuahiemmuon.vn/",
            "name": "Trung Tâm Điều Trị Vô Sinh Hiếm Muộn Hồng hà",
            "brand": "Trung Tâm Điều Trị Vô Sinh Hiếm Muộn ",
            "email": "tuvan@benhvienhongha.com",
            "logo":"<?php echo home_url(); ?>/wp-content/themes/dichvu/Module/Header/header_1_0_2/images/logo.png",
            "description": "Trung tâm điều trị vô sinh hiếm muộn Hồng Hà cung cấp đầy đủ các giải pháp điều trị vô sinh hiếm muộn và sản phụ khoa cho cả vợ và chồng trên khắp cả nước",
            "telephone": "+842473030988",
            "availableChannel": {
                "@type": "ServiceChannel",
                "name": "Bệnh Viện đa khoa",
                "availableLanguage": {
                    "@type": "Language",
                    "name": "Việt Nam, English",
                    "alternateName": "vi,en"
                }
            },
            "serviceLocation": {
                "@type": "Hospital",
                "name": "Trung Tâm Điều Trị Vô Sinh Hiếm Muộn Hồng hà",
                "image": ["https://chuahiemmuon.vn/wp-content/uploads/2020/03/kinh-nghiem-ivf-lan-dau-thanh-cong-1.jpg",
                    "https://chuahiemmuon.vn/wp-content/uploads/2020/04/mo-u-nang-buong-trung-5.jpg", "https://chuahiemmuon.vn/wp-content/uploads/2020/04/mo-u-nang-buong-trung-4.jpg", "https://chuahiemmuon.vn/wp-content/uploads/2020/03/IMG_4592.jpg"
                ],
                "telephone": "+842473030988",
                "HasMap": "https://www.google.com/maps/place/B%E1%BB%87nh+Vi%E1%BB%87n+%C4%90a+Khoa+H%E1%BB%93ng+H%C3%A0/@21.0267947,105.8368982,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab998d7fb6a5:0x931a195055921e1e!8m2!3d21.0267947!4d105.8390869",
                "priceRange": "$$",
                "openingHours": "Mo-Su 00:00-24:00",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "16 Nguyễn Như Đổ, Văn Miếu, Đống Đa, Hà Nội",
                    "addressLocality": "Hà Nội",
                    "addressRegion": "Việt Nam"
                },
                "ContactPoint": {
                    "telephone": "+842473030988",
                    "contactType": "sales",
                    "contactOption": "TollFree",
                    "areaServed": "VN"
            },
            "sameAs": ["https://vi.wikipedia.org/wiki/B%E1%BB%87nh_vi%E1%BB%87n#B%E1%BB%87nh_vi%E1%BB%87n_%C4%91a_khoa",
                "https://www.facebook.com/trungtamdieutri.vshm.hongha/",
                "https://www.youtube.com/channel/UCm5XvglnqTJZ9wq1IGurpOA",
                "https://twitter.com/benhvienhongha"
            ]}
        }
    </script>    
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Trung Tâm Điều Trị Vô Sinh Hiếm Muộn Hồng Hà",
            "alternateName": "Trung tâm điều trị vô sinh hiếm muộn",
            "url": "<?php echo home_url(); ?>",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "<?php echo home_url(); ?>/?s={s}",
                "query-input": "required name=s"
            }
        }
    </script>
<?php
}

?>