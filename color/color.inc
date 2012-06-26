<?php

drupal_add_js(array('color' => array('logo' => theme_get_setting('logo', 'sfsu_omega'))), 'setting');

$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'promobox-bg' => t('Promobox Background Color'),
	'promobox-text' => t('Promobox Text Color'),
  ),
  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('SF State Template (default)'),
      'colors' => array(
        'promobox-bg' => '#e2af2d',
  		'promobox-text' => '#464666',
      ),
    ),
    'firehouse' => array(
      'title' => t('Firehouse'),
      'colors' => array(
        'promobox-bg' => '#ff5c41',
    	'promobox-text' => '#FFFFFF',
      ),
    ),
    'ice' => array(
      'title' => t('Ice'),
      'colors' => array(
        'promobox-bg' => '#48a9e4',
    	'promobox-text' => '#FFFFFF',
      ),
    ),
  ),

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/colors.css',
  ),
  
  // Files to copy.
  'copy' => array(
    'logo.png',
  ),

  // Gradient definitions.
  'gradients' => array(
    array(
      // (x, y, width, height).
      'dimension' => array(0, 0, 0, 0),
      // Direction of gradient ('vertical' or 'horizontal').
      'direction' => 'vertical',
      // Keys of colors to use for the gradient.
      'colors' => array('top', 'bottom'),
    ),
  ),

  // Color areas to fill (x, y, width, height).
  'fill' => array(),

  // Coordinates of all the theme slices (x, y, width, height)
  // with their filename as used in the stylesheet.
  'slices' => array(),

  // Reference color used for blending. Matches the base.png's colors.
  'blend_target' => '#ffffff',

  // Preview files.
  'preview_css' => 'color/preview.css',
  'preview_js' => 'color/preview.js',
  'preview_html' => 'color/preview.html',

  // Base file for image generation.
  'base_image' => 'color/base.png',
);
