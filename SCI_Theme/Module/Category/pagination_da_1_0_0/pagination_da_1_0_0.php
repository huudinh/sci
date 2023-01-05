<div class="pagination_da_1_0_0">
    <?php
        if (function_exists("pagination")) {
                pagination($custom_query->max_num_pages,2);
            }
        ?>
</div>