<?php 
/* 
* Plugin Name: add new product notifications
*/ 

include('vendor/autoload.php');
include('TelegramBot.php');

$telegramApi = new TelegramBot();
$user_id = -322228546;

add_action('add_meta_boxes', 'metabox_init'); 
add_action('save_post', 'send_notification', 10, 3); 

function metabox_init() { 
add_meta_box('new_add_product', 'Email', 
'metabox', 'product', 'side', 'default');
}

function metabox() {
    echo '<p>Введите Email:</p>
    <input type="text" name="email_new_product" value="">';
    wp_nonce_field('metabox_action', 'metabox_nonce');
}


function send_notification($postID, $post, $update) {
    
    if (!isset($_POST['post_title'])) {
        return;
    }

    if (!isset($_POST['email_new_product'])) {
        return;      
    }

    if (wp_is_post_revision($postID)) {
        return;
    }    

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return; 
    }

    $update = $post->post_date === $post->post_modified;
    
    if (!$update) {
        return;
    }

    /* request validation */ 
    check_admin_referer('metabox_action', 'metabox_nonce'); 
    
    /* link new product */
    $link = get_the_permalink ( $id, $leavename );
    
    /* name new product */
    $title = $_POST['post_title'];

    /* sending mail */
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $mail = $_POST['email_new_product'];
    wp_mail($mail, 'add new product: ', "Go to the site and see! $link", $headers);
    
    /* sending Telegram Chat */
    global $telegramApi, $user_id;
    
    $telegramApi->sendMessage($user_id, "Add new product!   
    Name product: $title   
    Url: $link");

    
}

?>