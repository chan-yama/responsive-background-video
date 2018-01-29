<?php

// ================================
//    カスタム投稿メニュー・画面の追加
// ================================

add_action('init', 'create_rbv_post_type');

function create_rbv_post_type()
{
  $rbvSupports = array(
    'title',
    'revisions',
  );

  // add post type
  register_post_type('rbv',
    array(
      'label'         => '背景動画テキスト',
      'public'        => true,
      'has_archive'   => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-editor-video',
      'supports'      => $rbvSupports,
    )
  );
}

// ================================
//        投稿フィールドの追加
// ================================

add_action('admin_menu', 'add_rbv_field');

function add_rbv_field()
{
  // add_meta_box(表示されるボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
  add_meta_box('rbv-description', 'サブテキスト', 'create_form_rbv_description', 'rbv', 'normal');
  add_meta_box('rbv-button_text', 'ボタンテキスト', 'create_form_rbv_button_text', 'rbv', 'normal');
  add_meta_box('rbv-button_url', 'ボタンリンク先URL', 'create_form_rbv_button_url', 'rbv', 'normal');
}

function create_form_rbv_description()
{
  global $post;
  echo '<textarea name="description" style="width: 100%; height: 200px;">' . get_post_meta($post->ID, 'description', true) . '</textarea>';

  // WYSIWYGエディタを使うときは以下のコードを記述
  // wp_editor( get_post_meta($post->ID,'description',true), 'description-box', ['textarea_name' => 'description'] );
}

function create_form_rbv_button_text()
{
  global $post;
  echo '<input name="button_text" style="width: 100%;" value="' . get_post_meta($post->ID, 'button_text', true) . '"/>';
}

function create_form_rbv_button_url()
{
  global $post;
  echo '<input name="button_url" style="width: 100%;" value="' . get_post_meta($post->ID, 'button_text', true) . '"/>';
}

add_action('save_post', 'save_rbv_field');

function save_rbv_field($post_id)
{
  $my_fields = array('description', 'button_text', 'button_url');

  foreach ($my_fields as $my_field) {
    if (isset($_POST[$my_field])) {
      $value = $_POST[$my_field];
    } else {
      $value = '';
    }
    if (strcmp($value, get_post_meta($post_id, $my_field, true)) != 0) {
      update_post_meta($post_id, $my_field, $value);
    } elseif ($value == "") {
      delete_post_meta($post_id, $my_field, get_post_meta($post_id, $my_field, true));
    }
  }
}
