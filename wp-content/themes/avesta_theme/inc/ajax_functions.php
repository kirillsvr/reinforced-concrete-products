<?php




add_action('wp_ajax_order_product', 'order_product');
add_action('wp_ajax_nopriv_order_product', 'order_product');
function order_product(){
  $message = 'Имя: '.$_POST['u-name']."\n\r";
  $message .= 'Телефон: '.$_POST['u-telephone']."\n\r";
  

  if($_POST['u-product-id']){
    $message .= 'Товар: '.get_the_title((int)$_POST['u-product-id'])."\n\r";
    $message .= 'Ссылка на товар: '.get_permalink((int)$_POST['u-product-id'])."\n\r";
  }

  if($_POST['u-product-detail']){
    $message .= 'Наименование: '.$_POST['u-product-detail']."\n\r";
  }


  $headers = 'From: avesta.kbportfolio.ru <contact@avesta.kbportfolio.ru>' . "\r\n\\";
  if(wp_mail( get_option('admin_email'), $_POST['u-theme'], $message, $headers)){
  	die('true');
  }
  die('false');
}




add_action('wp_ajax_order_call_back', 'order_call_back');
add_action('wp_ajax_nopriv_order_call_back', 'order_call_back');
function order_call_back(){
  $message = 'Имя: '.$_POST['u-name']."\n\r";
  $message .= 'Телефон: '.$_POST['u-telephone']."\n\r";

  $headers = 'From: avesta.kbportfolio.ru <contact@avesta.kbportfolio.ru>' . "\r\n\\";
  if(wp_mail( get_option('admin_email'), $_POST['u-theme'], $message, $headers)){
  	die('true');
  }
  die('false');
}


