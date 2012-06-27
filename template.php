<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

require_once dirname(__FILE__) . '/includes/theme_imagebar_info.class.php';

/**
 * Implements hook_preprocess_region().
 */
function omega_sfsu_preprocess_region(&$vars) {
  if (isset($vars['region'])){
    switch ($vars['region']) {
      case "branding":
        $vars['attributes_array']['id'] = 'sitestripe';
        $vars['content_attributes_array']['id'] = 'sitebox';
        break;

      case "content":
        $vars['content_attributes_array']['id'] = 'main';
        break;

      case "sidebar_first":
        $vars['content_attributes_array']['id'] = 'nav';
        break;

      case "sidebar_second":
        $vars['content_attributes_array']['id'] = 'sidebar';
        break;
    }
  }//if
}

function omega_sfsu_process_region(&$vars) {
  if (in_array($vars['elements']['#region'], array('branding'))) {
    switch ($vars['elements']['#region']) {
      case 'branding':
        //Create Department link
        $sfsu_department = theme_get_setting('sfsu_department');
        if(strlen(trim($sfsu_department)) > 0){
          $sfsu_department_url = theme_get_setting('sfsu_department_url');  
          if(strlen(trim($sfsu_department_url)) > 0){
            $sfsu_department = ' <a href="' . $sfsu_department_url . '" class="parent">{' . $sfsu_department . '}</a>';
          }//if
          else{
            $sfsu_department = ' {' . $sfsu_department . '}';
          }//if
        }//if
            
        // Update Site name class
        $linked_site_name = $vars['linked_site_name'];
        if(strstr($vars['linked_site_name'], 'class="active"')){
          $linked_site_name = str_replace('class="active">', 'class="site">', $linked_site_name) . $sfsu_department;
        }//if
        else {
          $linked_site_name = str_replace('title="Home"', 'class="site" title="Home"', $linked_site_name) . $sfsu_department;
        }//else

        // imagebox css       
        $imagebox_css = '#imagebox  {background-image: url(' . $vars['logo'] . ') repeat-x 50% 0;}';
        $imagestripe_css = '#imagestripe  {background-image: url(' . $vars['logo'] . ') repeat-x 50% 0;}';

        // Create promobox text
        $sfsu_promobox_text = theme_get_setting('sfsu_promobox_text');
        if(strlen(trim($sfsu_promobox_text)) > 0){
          $sfsu_promobox_link = theme_get_setting('sfsu_promobox_link');
          if(strlen(trim($sfsu_promobox_link)) > 0){
            $sfsu_promobox_text = ' <h2><a href="' . $sfsu_promobox_link . '" target="_blank" >' . $sfsu_promobox_text . '</a></h2>';
          }//if
        }//if

        //update reader note
        $vars['sfsu_imagebar_readernote'] = theme_get_setting('sfsu_imagebar_readernote');
        
        // dynamic image bar
        if (theme_get_setting('sfsu_use_dynamic_imagebar') && strlen(theme_get_setting('sfsu_dynamic_imagebar_info')) > 0){
          $sfsu_dynamic_imagebar_info_values = unserialize(theme_get_setting('sfsu_dynamic_imagebar_info'));
          $curr_url = drupal_get_path_alias(request_uri());

          foreach ($sfsu_dynamic_imagebar_info_values as $sfsu_dynamic_imagebar_info_value) {
            if(strstr($curr_url, $sfsu_dynamic_imagebar_info_value->get_imagebar_activeurl())){
              
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_text() != ''){  // update promobox text and link
                $sfsu_promobox_text = str_replace(theme_get_setting('sfsu_promobox_text'), $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_text(), $sfsu_promobox_text);                   
              }
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_link() != ''){
                $sfsu_promobox_text = str_replace(theme_get_setting('sfsu_promobox_link'), $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_link(), $sfsu_promobox_text);                   
              }
                
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_color() != ''){  // update promobox color
                $vars['imagebar_promobox_color'] = $sfsu_dynamic_imagebar_info_value->get_imagebar_promobox_color();
              }
                
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_reader_note() != ''){  //update reader note
                $vars['sfsu_imagebar_readernote'] = $sfsu_dynamic_imagebar_info_value->get_imagebar_reader_note();
              }                  
              
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle() != ''){  // update department name and link
                $linked_site_name = str_replace(theme_get_setting('sfsu_department'), $sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle(), $linked_site_name);                
              }
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle_link() != ''){
                $linked_site_name = str_replace(theme_get_setting('sfsu_department_url'), $sfsu_dynamic_imagebar_info_value->get_imagebar_subtitle_link(), $linked_site_name);
              }
              
              $linked_site_name = str_replace($vars['site_name'], $sfsu_dynamic_imagebar_info_value->get_imagebar_title(),$linked_site_name);                                
              preg_match('/href\="\S+"/', $linked_site_name, $matches);
              $linked_site_name = str_replace($matches[0], 'href="' . $sfsu_dynamic_imagebar_info_value->get_imagebar_title_link() . '"', $linked_site_name);
                
              if($sfsu_dynamic_imagebar_info_value->get_imagebar_imageurl() != ''){
                $imagebox_css = str_replace($vars['logo'], $sfsu_dynamic_imagebar_info_value->get_imagebar_imageurl(), $imagebox_css);
                $imagestripe_css = str_replace($vars['logo'], $sfsu_dynamic_imagebar_info_value->get_imagebar_imageurl(), $imagestripe_css);
              }
 
              break;
            }//if
          }//foreach
        }//if
        
        
        $vars['sfsu_promobox_text'] = $sfsu_promobox_text;      
        $vars['linked_site_name'] = $linked_site_name;
        
        $option['type'] = 'inline';
        $option['weight'] = 100;
        $option['group'] = CSS_THEME;
        drupal_add_css($imagebox_css, $option);
        drupal_add_css($imagestripe_css, $option);
        break;
    }
  }
}


/**
 * Implements template_preprocess_html().
 *
 * Override or insert variables into the page template for HTML output.
 */
function omega_sfsu_preprocess_html(&$variables) {
  // Change delimiter to use - instead of |
  $variables['head_title'] = str_replace('|', '-', $variables['head_title']);

  // Set up Feeds Header
  $sfsu_department = theme_get_setting('sfsu_department');
  $sfsu_department_with_dash = '';
  if($sfsu_department) {
     $sfsu_department_with_dash = $sfsu_department .' - ' ;
   }//if

  if(theme_get_setting('sfsu_enable_feeds') && drupal_is_front_page()){
    $variables['feeds_header'] = '<link rel="alternate" type="application/rss+xml" title="' . variable_get('site_name','') . ' - ' . check_plain($sfsu_department_with_dash) . ' San Francisco State University" href="rss.xml" />';
  }//if
  else{
    $variables['feeds_header'] = '';
  }//else
}

/**
 * Implements template_process_html().
 *
 * Override or insert variables into the page template for HTML output.
 */
function omega_sfsu_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/*
 * Implements template_process_page().
 */
function omega_sfsu_preprocess_page(&$variables, $hook) {
  if (!theme_get_setting('sfsu_display_promobox')){
    drupal_add_css('#promobox {display:none;}', $option['type'] = 'inline');
  }//if

  drupal_add_css('#imagestripe {height: ' . theme_get_setting('sfsu_imagebar_height') . ';}', $option['type'] = 'inline');
  
  $sfsu_default_cssfile = theme_get_setting('sfsu_default_cssfile');
  if ($sfsu_default_cssfile){
    $file_path = theme_get_setting('sfsu_css_path');
    if (strstr($file_path, '://')){
      drupal_add_css($file_path);
    }//if
    else{
      drupal_add_css(file_default_scheme() . '://' . $file_path);
    }//else
  }//if
  
  $sfsu_default_jsfile = theme_get_setting('sfsu_default_jsfile');
  if ($sfsu_default_jsfile){
    $file_path = theme_get_setting('sfsu_js_path');
    if (strstr($file_path, '://')){
      drupal_add_js($file_path);
    }//if
    else{
      drupal_add_js(file_default_scheme() . '://' . $file_path);
    }//else
  }//if
}

/*
 * Implements template_process_page().
 */
function omega_sfsu_process_page(&$variables, $hook) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}

/*
 * 
 * Implementation of theme_search_block_form().
 *
 */
function omega_sfsu_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['actions']['submit']['#attributes']['class'][] = 'gobutton';
    $form['actions']['submit']['#value'] = t('Go');
    $form['search_block_form']['#attributes']['title'] = 'Enter the terms you wish to search for in ' . variable_get('site_name','');
  }
}
