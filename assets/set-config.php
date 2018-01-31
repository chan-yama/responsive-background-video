<?php
add_action('admin_menu', 'rbv_menu');

function rbv_menu()
{
  add_options_page('My Plugin Options', 'Responsive Background Video', 'manage_options', 'responsive-background-video', 'rbv_options');
  add_action('admin_init', 'register_rbv_settings');
}

function register_rbv_settings()
{
  register_setting('rbv-settings-group', 'rbv_title');
  register_setting('rbv-settings-group', 'rbv_description');
  register_setting('rbv-settings-group', 'rbv_button_text');
  register_setting('rbv-settings-group', 'rbv_button_url');
}

function rbv_options()
{
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  echo '<h2>Responsive Background Video Settings</h2>';

  echo '<form method="post" action="options.php">';
  settings_fields('rbv-settings-group');
  do_settings_sections('rbv-settings-group');

  echo '<table class="form-table">';
  echo '<tbody>';

  echo '<tr>';
  echo '<th scope="row">';
  echo '<label for="rbv_title">タイトル</label>';
  echo '</th>';
  echo '<td><input type="text" id="rbv_title" class="regular-text" name="rbv_title" value="' . get_option('rbv_title') . '"></td>';
  echo '</tr>';

  echo '<tr>';
  echo '<th scope="row">';
  echo '<label for="rbv_description">サブテキスト</label>';
  echo '</th>';
  echo '<td><textarea id="rbv_description" class="regular-text" name="rbv_description" rows="5">' . get_option('rbv_description') . '</textarea></td>';
  echo '</tr>';

  echo '<tr>';
  echo '<th scope="row">';
  echo '<label for="rbv_title">ボタンテキスト</label>';
  echo '</th>';
  echo '<td><input type="text" id="rbv_title" class="regular-text" name="rbv_button_text" value="' . get_option('rbv_button_text') . '"></td>';
  echo '</tr>';

  echo '<tr>';
  echo '<th scope="row">';
  echo '<label for="rbv_title">ボタンURL</label>';
  echo '</th>';
  echo '<td><input type="text" id="rbv_title" class="regular-text" name="rbv_button_url" value="' . get_option('rbv_button_url') . '"></td>';
  echo '</tr>';

  echo '</tbody>';
  echo '</table>';

  submit_button();

  echo '</form>';
}
