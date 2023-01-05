<style>
.pagination_dls_1_0_0{text-align:center;margin-bottom:30px;}
.pagination_dls_1_0_0 .page_nav{padding:0;margin:0}
.pagination_dls_1_0_0 .wp-pagenavi{display:flex;justify-content:center}
.pagination_dls_1_0_0 .wp-pagenavi .pages{margin:0 20px 0 0;line-height:30px}
.pagination_dls_1_0_0 .wp-pagenavi .current{background:#af1d7f;color:#fff}
.pagination_dls_1_0_0 .wp-pagenavi .current,.pagination_dls_1_0_0 .wp-pagenavi a{border:1px solid #af1d7f;width:30px;height:30px;display:block;line-height:30px;margin:0 5px}
</style>

<div class="pagination_dls_1_0_0">
    <?php
        if (function_exists("pagination")) {
                pagination($custom_query->max_num_pages,2);
            }
        ?>
</div>