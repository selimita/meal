<?php
/*
Plugin Name: Selimita Loadmore
Plugin URI:
Description: Companion Plugin for Selimita Loadmore BTN
Version: 1.0.0
Author: SELIMITA
Author URI:
License: GPLv2 or later
Text Domain: selimita-loadmore
Domain Path: /languages/
*/
function selimita_loadmore_textdomain() {
	load_plugin_textdomain( 'selimita-loadmore', false, dirname( __FILE__ ) . "/languages" );
}
add_action( 'plugins_loaded', 'selimita_loadmore_textdomain' );

// Blog PAGE => Load MORE FUNCTION
function get_max_page_number() {
	global $wp_query;
	return $wp_query->max_num_pages;
}

// Loadmore BTN HTML
/* ?>
<a href="<?php next_posts( get_max_page_number() ); ?>"
    id="loadmore" class="btn btn-danger">
    <?php _e( 'Load More', 'flowpp' ); ?>
</a>
<?PHP */

// Loadmore JS => loadmore.js
    $script = <<<EOD
(function ($) {
    $(document).ready(function () {
        $("#loadmore").on('click', function (e) {
            var nexturl = $(this).attr('href');
            $.get(nexturl, {}, function (data) {
                var posts = $(data).find("#posts-container").html();
                //console.log(posts);
                $("#posts-container").append(posts);
                var newpagelink = $(data).find("#loadmore").attr("href");
                if(newpagelink){
                    $("#loadmore").attr('href', newpagelink);
                }
                else{
                    $("#loadmore").hide('slow');
                }
            });
            return false;
        });
        // HIDE LM BTN => IF PostPerPage < POST
        var newpagelink = $("#loadmore").attr("href");
        if(!newpagelink){
            $("#loadmore").hide('slow');
        }
    });
})(jQuery);
EOD;


