<?php
// $Id: theme-settings.php,v 1.2.4.4 2012/04/18 06:35:00 supakitk Exp $

require_once dirname(__FILE__) . '/includes/theme_imagebar_info.class.php';

/**
 * Implements hook_form_system_theme_settings_alter()
 */
function omega_sfsu_form_system_theme_settings_alter(&$form, &$form_state)  {
  $form['general_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('SF State Web Template settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#weight' => -10,
  );

  $form['general_settings']['css_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('CSS settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
  );

  $form['general_settings']['css_settings']['sfsu_default_cssfile'] = array(
    '#type' => 'checkbox',
    '#title' => t('Load custom CSS file'),
    '#default_value' => theme_get_setting('sfsu_default_cssfile'),
    '#tree' => FALSE,
    '#description' => t('Check here if you want to load custom CSS on your site.')
  );
  $form['general_settings']['css_settings']['settings'] = array(
    '#type' => 'container',
    '#states' => array(
      // Hide the css settings when using the default css.
      'invisible' => array(
        'input[name="sfsu_default_cssfile"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['general_settings']['css_settings']['settings']['sfsu_css_path'] = array(
    '#type' => 'textfield',
    '#title' => t('Path to custom css file'),
    '#default_value' => theme_get_setting('sfsu_css_path'),
    '#description' => t('This can be the fully qualified URL to a custom stylesheet. e.g., http://www.sfsu.edu/template/preview/includes/local.css or relative path the the files directory on your site e.g. local.css'),
  );
  $form['general_settings']['css_settings']['settings']['sfsu_css_upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload CSS file'),
    '#maxlength' => 100,
    '#description' => t("If you don't have direct file access to the server, use this field to upload your CSS file.")
  );

  $form['general_settings']['js_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('JS settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
  );
  
  $form['general_settings']['js_settings']['sfsu_default_jsfile'] = array(
    '#type' => 'checkbox',
    '#title' => t('Load custom JS file'),
    '#default_value' => theme_get_setting('sfsu_default_jsfile'),
    '#tree' => FALSE,
    '#description' => t('Check here if you want to load custom JS on your site.')
  );
  $form['general_settings']['js_settings']['settings'] = array(
    '#type' => 'container',
    '#states' => array(
      // Hide the js settings when using the default js.
      'invisible' => array(
        'input[name="sfsu_default_jsfile"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['general_settings']['js_settings']['settings']['sfsu_js_path'] = array(
    '#type' => 'textfield',
    '#title' => t('Path to custom JS file'),
    '#default_value' => theme_get_setting('sfsu_js_path'),
    '#description' => t('This can be the fully qualified URL to a custom stylesheet. e.g., http://www.sfsu.edu/template/preview/includes/site.js or relative path the the files directory on your site e.g. site.js'),
  );
  $form['general_settings']['js_settings']['settings']['sfsu_js_upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload JS file'),
    '#maxlength' => 100,
    '#description' => t("If you don't have direct file access to the server, use this field to upload your js file.")
  );
  
  $form['general_settings']['sitelabel_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Site Label settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['general_settings']['sitelabel_settings']['sfsu_department'] = array(
    '#type' => 'textfield',
    '#title' => t('College or Department Name'),
    '#description' => t('The College or Department Name is optional. If set, it will appear to the right of the site name in the header in {} brackets'),
    '#default_value' => theme_get_setting('sfsu_department'),
  );

  $form['general_settings']['sitelabel_settings']['sfsu_department_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Link to College or Department web site'),
    '#description' => t('Link to the College or Department Name which is optional. If set along with the department name then it will make it a link.'),
    '#default_value' => theme_get_setting('sfsu_department_url'),
  );
  
  $form['general_settings']['imagebar_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Image Bar settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['general_settings']['imagebar_settings']['sfsu_imagebar_readernote'] = array(
    '#type' => 'textfield',
    '#title' => t('The alt text for the imagebar'),
    '#description' => t('Per 508 Accessibility regulations, the imagebar needs to have descriptive text. It should describe the image you link to above.'),
    '#default_value' => theme_get_setting('sfsu_imagebar_readernote'),
  );
  
  $form['general_settings']['imagebar_settings']['sfsu_imagebar_height'] = array(
    '#type' => 'textfield',
    '#title' => t('The height of the imagebar'),
    '#description' => t('Adjust the height of image bar. Default size is 60px'),
    '#default_value' => theme_get_setting('sfsu_imagebar_height'),
  );

  $form['general_settings']['imagebar_settings']['sfsu_display_promobox'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display Promobox'),
    '#default_value' => theme_get_setting('sfsu_display_promobox'),
    '#tree' => FALSE,
    '#description' => t('Check here if you want to display the promobox.')
  );
  
  $form['general_settings']['imagebar_settings']['settings'] = array(
    '#type' => 'container',
    '#states' => array(
      // Hide the js settings when using the default js.
      'invisible' => array(
        'input[name="sfsu_display_promobox"]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['general_settings']['imagebar_settings']['settings']['sfsu_promobox_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Promobox Text'),
    '#default_value' => theme_get_setting('sfsu_promobox_text'),
    '#description' => t('Enter text to display within the promobox area'),
  );
  
  $form['general_settings']['imagebar_settings']['settings']['sfsu_promobox_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Promobox Link'),
    '#default_value' => theme_get_setting('sfsu_promobox_link'),
    '#description' => t('Enter a link to display for the promobox text'),
  );
  
  $form['general_settings']['content_area_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Content settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['general_settings']['content_area_settings']['sfsu_enable_feeds'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable RSS Auto-discovery'),
    '#description' => t('If set and the site has published RSS feeds, the browser can automatically find the site\'s RSS feed'),
    '#default_value' => theme_get_setting('sfsu_enable_feeds'),
  );

  $form['general_settings']['content_area_settings']['sfsu_show_title'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show the node title on the page as an H1'),
    '#description' => t('If set then the node title will be displayed above the breadcrumbs but below the tabs on the page'),
    '#default_value' => theme_get_setting('sfsu_show_title'),
  );

  /*
  $form['general_settings']['content_area_settings']['sfsu_hide_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Don\'t display the primary links in the sidebar by default'),
    '#description' => t('Checking this box will prevent the primary links menu from showing in the left sidebar by default. This can be useful if you want to use the primary links block directly'),
    '#default_value' => theme_get_setting('sfsu_hide_links'),
  );
  */
  
  $form['general_settings']['advanced_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Advanced settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
  );
  
  $form['general_settings']['advanced_settings']['sfsu_use_dynamic_imagebar'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use the dynamic imagebar'),
    '#default_value' => theme_get_setting('sfsu_use_dynamic_imagebar'),
    '#tree' => FALSE,
    '#description' => t('Check here if you use dynamic imagebar based on site path.')
  );

  $form['general_settings']['advanced_settings']['settings'] = array(
    '#type' => 'container',
    '#states' => array(
      // Hide the css settings when using the default css.
      'invisible' => array(
        'input[name="sfsu_use_dynamic_imagebar"]' => array('checked' => FALSE),
      ),
    ),
  );
  
  $form['general_settings']['advanced_settings']['settings']['sfsu_dynamic_imagebar_info'] = array(
    '#type' => 'hidden',
    '#value' => theme_get_setting('sfsu_dynamic_imagebar_info'),
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_table_header'] = array(
    '#markup' => '<table summary="Manager Dynamic Image Bar rule">' .
                '<tr>' .
                   '<th>Title</th>' .
                   '<th>Title Link</th>' .
                   '<th>Department</th>' .
                   '<th>Department Link</th>' .
                   '<th>Promobox Text</th>' .
  				   '<th>Promobox Link</th>' .
  				   '<th>Promobox Color</th>' .
  				   '<th>Image URL</th>' .
  				   '<th>Image Reader Note</th>' .
  				   '<th>Activate Path</th>' .
                   '<th></th>' .
               '</tr>',
  );
  
  $sfsu_dynamic_imagebar_info_values = theme_get_setting('sfsu_dynamic_imagebar_info');
  if (strlen($sfsu_dynamic_imagebar_info_values) > 0){
    $sfsu_dynamic_imagebar_info_values = unserialize($sfsu_dynamic_imagebar_info_values);

    foreach ($sfsu_dynamic_imagebar_info_values as $sfsu_dynamic_imagebar_info_value) {
  
      $form['general_settings']['advanced_settings']['settings']['dynamic_imagebar_info_header_' . $sfsu_dynamic_imagebar_info_value->get_imagebar_id()] = array(
        '#markup' => '<tr>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_title() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_title_link() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle_link() . '</td>' .
       	  '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_text() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_link() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_color() . '</td>' .
		  '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_imageurl() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_reader_note() . '</td>' .
          '<td>' . $sfsu_dynamic_imagebar_info_value->get_imagebar_activeurl() . '</td>',
      );

      $form['general_settings']['advanced_settings']['settings']['dynamic_imagebar_info_view_' . $sfsu_dynamic_imagebar_info_value->get_imagebar_id()] = array(
        '#type' => 'submit',
        '#name' => $sfsu_dynamic_imagebar_info_value->get_imagebar_id(),
        '#value' => 'Delete',
        '#prefix' => '<td>',
        '#suffix' => '</td>',
      );
  
      $form['general']['advanced_settings']['settings']['dynamic_imagebar_info_footer_' . $sfsu_dynamic_imagebar_info_value->get_imagebar_id()] = array(
        '#markup' => '</tr>',
      );
  
    }
      
  }//if
    
  $form['general_settings']['advanced_settings']['settings']['imagebar_add_prefix'] = array(
    '#markup' => '<tr>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_title'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
  	'#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_title_link'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
  	'#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_subtitle'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_subtitle_link'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_promobox_text'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_promobox_link'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_promobox_color'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_imageurl'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_reader_note'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );
  
  $form['general_settings']['advanced_settings']['settings']['imagebar_activeurl'] = array(
    '#type' => 'textfield',
    '#size' => '20',
    '#default_value' => '',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );

  $form['general_settings']['advanced_settings']['settings']['imagebar_button_add'] = array(
    '#type' => 'submit',
    '#value' => 'Add',
    '#prefix' => '<td>',
    '#suffix' => '</td>',
  );

  $form['general_settings']['advanced_settings']['settings']['imagebar_add_suffix'] = array(
    '#markup' => '</tr>',
  );

  $form['general_settings']['advanced_settings']['settings']['imagebar_table_footer'] = array(
    '#markup' => '</table>',
  );

  
  $form['#validate'][] = 'omega_sfsu_settings_validate';
  $form['#submit'][] = 'omega_sfsu_settings_submit';
}

/**
* Capture theme settings submissions and update uploaded image
*/
function omega_sfsu_settings_submit($form, &$form_state) {
  if ($form_state['triggering_element']['#value'] == 'Delete') {
    $sfsu_dynamic_imagebar_info_values = unserialize($form_state['values']['sfsu_dynamic_imagebar_info']);
    unset($sfsu_dynamic_imagebar_info_values[$form_state['triggering_element']['#name']]);
    $form_state['values']['sfsu_dynamic_imagebar_info'] = serialize($sfsu_dynamic_imagebar_info_values);
  }//if
  
  if ($form_state['triggering_element']['#value'] == 'Add') {
    $themeimagebarinfo_value = new ThemeImageBarInfo();
    $themeimagebarinfo_value->set_imagebar_id(uniqid());
    $themeimagebarinfo_value->set_imagebar_title(trim($form_state['values']['imagebar_title']));
    $themeimagebarinfo_value->set_imagebar_title_link(trim($form_state['values']['imagebar_title_link']));
    $themeimagebarinfo_value->set_imagebar_subtitle(trim($form_state['values']['imagebar_subtitle']));
    $themeimagebarinfo_value->set_imagebar_subtitle_link(trim($form_state['values']['imagebar_subtitle_link']));
    $themeimagebarinfo_value->set_imagebar_promobox_text(trim($form_state['values']['imagebar_promobox_text']));
    $themeimagebarinfo_value->set_imagebar_promobox_link(trim($form_state['values']['imagebar_promobox_link']));
    $themeimagebarinfo_value->set_imagebar_promobox_color(trim($form_state['values']['imagebar_promobox_color']));
    $themeimagebarinfo_value->set_imagebar_imageurl(trim($form_state['values']['imagebar_imageurl']));
    $themeimagebarinfo_value->set_imagebar_reader_note(trim($form_state['values']['imagebar_reader_note']));
    $themeimagebarinfo_value->set_imagebar_activeurl(trim($form_state['values']['imagebar_activeurl']));

    $sfsu_dynamic_imagebar_info_values = $form_state['values']['sfsu_dynamic_imagebar_info'];
    if (strlen($sfsu_dynamic_imagebar_info_values) == 0){
      $sfsu_dynamic_imagebar_info_values = array();
    }//if
    else{
      $sfsu_dynamic_imagebar_info_values = unserialize($sfsu_dynamic_imagebar_info_values);
    }//if
    $sfsu_dynamic_imagebar_info_values[$themeimagebarinfo_value->get_imagebar_id()] = $themeimagebarinfo_value;
    
    $form_state['values']['sfsu_dynamic_imagebar_info'] = serialize($sfsu_dynamic_imagebar_info_values);
  }//if

  $validators = array('file_validate_extensions' => array());

  // Check for a new uploaded file, and use that if available.
  if ($file = file_save_upload('sfsu_css_upload', $validators)) {
    $parts = pathinfo($file->filename);
    $destination = 'public://' . $parts['basename'];
    $file->status = FILE_STATUS_PERMANENT;
  
    if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
      $_POST['sfsu_css_path'] = $destination;
      $form_state['values']['sfsu_css_path'] = $parts['basename'];
    }
  }
  
  // Check for a new uploaded file, and use that if available.
  if ($file = file_save_upload('sfsu_js_upload', $validators)) {
    $file->filename = substr($file->filename, 0, strlen($file->filename)-4);
    $file->filemime = file_get_mimetype($file->filename);

    $parts = pathinfo($file->filename);
    $destination = 'public://' . $parts['basename'];
    $file->status = FILE_STATUS_PERMANENT;
  
    if (file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
      $_POST['sfsu_js_path'] = $destination;
      $form_state['values']['sfsu_js_path'] = $parts['basename'];
    }
  }
  
}

/**
 * Validates settings before submission
 */
function omega_sfsu_settings_validate($form, &$form_state){
  $error_msg = null;
  
  // validate file extension    
    $file_ext = pathinfo($_FILES['files']['name']['sfsu_css_upload'], PATHINFO_EXTENSION);
    if($file_ext != '' && strcasecmp($file_ext, 'css')){
      $error_msg = "The file you upload for custom css must have a css extension.";
      form_set_error('general_settings][css_settings][settings][sfsu_css_path', $error_msg);
    }

    $file_ext = pathinfo($_FILES['files']['name']['sfsu_js_upload'], PATHINFO_EXTENSION);
    if($file_ext != '' && strcasecmp($file_ext, 'js')){
      $error_msg = "The file you upload for js must have a js extension.";
      form_set_error('general_settings][js_settings][settings][sfsu_js_path', $error_msg);
    }

    // validate image bar height
    $image_height_value = $form['general_settings']['imagebar_settings']['sfsu_imagebar_height']['#value'];
    $is_valid = (strstr($image_height_value, 'px') Xor strstr($image_height_value, '%'));
    if(!$is_valid){
      $error_msg = '<i>The height of the imagebar</i> can only be in "px" OR "%"';
      form_set_error('general_settings][imagebar_settings][sfsu_imagebar_height', $error_msg);
    }

    // enforce absolute link for image bar promobox link
    $text = $form['general_settings']['imagebar_settings']['settings']['sfsu_promobox_link']['#value'];
    if($text != ''){
      $text = substr($text, 0 , strlen('http'));
      if(strcasecmp($text, 'http')){
        $error_msg = '<i>Promobox Link</i> must start with "http"';
        form_set_error('general_settings][imagebar_settings][settings][sfsu_promobox_link', $error_msg);
      }
    }// if

  // Check for required fields in dynamic image bar
  if ($form_state['triggering_element']['#value'] == 'Add') {    // iff adding new image bar
    if(trim($form['general_settings']['advanced_settings']['settings']['imagebar_activeurl']['#value']) == ''){
      $error_msg = '<i>Activate Path</i> is missing for Dynamic image bar';
      form_set_error('general_settings][advanced_settings][settings][imagebar_activeurl', $error_msg);
    }
    if(trim($form['general_settings']['advanced_settings']['settings']['imagebar_title']['#value']) == ''){
      $error_msg = '<i>Title</i> is missing for Dynamic image bar';
      form_set_error('general_settings][advanced_settings][settings][imagebar_title', $error_msg);
    }
    if(trim($form['general_settings']['advanced_settings']['settings']['imagebar_title_link']['#value']) == ''){
      $error_msg = '<i>Title Link</i> is missing for Dynamic image bar';
      form_set_error('general_settings][advanced_settings][settings][imagebar_title_link', $error_msg);
    }
  
    // enforce the use of absolute links for title link
    $imagebar_title_link = $form['general_settings']['advanced_settings']['settings']['imagebar_title_link']['#value'];
    if(trim($imagebar_title_link) != ''){
      if(!strstr($imagebar_title_link, 'http')){
        $error_msg ='<i>Title Link</i> for Dynamic image bar must start with "http"';
        form_set_error('general_settings][advanced_settings][settings][imagebar_title_link', $error_msg);
      }
    }//if
    
  }//if
  
}

?>
