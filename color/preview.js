
(function ($) {
  Drupal.color = {
    logoChanged: false,
    callback: function(context, settings, form, farb, height, width) {
      // Change the logo to be the real one.
      if (!this.logoChanged) {
    	  $('#preview-imagebox', form).css('background-image', 'url(' + Drupal.settings.color.logo + ')');
        this.logoChanged = true;
      }
      // Remove the logo if the setting is toggled off. 
      if (Drupal.settings.color.logo == null) {
        $('div').remove('#preview-logo');
      }
      
      $('#preview-promobox', form).css('background-color', $('#palette input[name="palette[promobox-bg]"]', form).val());
      $('#preview-promobox', form).css('color', $('#palette input[name="palette[promobox-text]"]', form).val());

    }
  };
})(jQuery);
