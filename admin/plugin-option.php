<?php

function shop_page_button_view()
{
    global $product;
    $pid = $product->get_id();
    echo "<a  href='#' datapid = '$pid' class='woo-quickv quick-view'>Quick View</a>";
}

add_action('woocommerce_after_shop_loop_item', 'shop_page_button_view');



function woo_quick_view_modal()
{
    ?>

    <div class="woo_quick_view_modal animated lightSpeedIn">
        <a href="#" id="woo-modal-close">X</a>
        <div class="woo-modal-content">

        </div>
    </div>


<?php


}
add_action('wp_footer', 'woo_quick_view_modal');


?>