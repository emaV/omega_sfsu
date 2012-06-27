
<!-- #utilitystripe -->
<div class="grid-12 region region-utilitystripe" id="utilitystripe">
  <ul class="skiplinks">
    <li><a class="skip" href="#main">Skip to main content</a></li>
    <li><a class="skip" href="#nav">Skip to local site navigation</a></li>
    <li><a class="skip" href="#sidebar">Skip to sidebar</a></li>
  </ul>
  <div class="utility-box" id="utilitybox">
    <ul>
      <li id="sfsutype"><a href="http://www.sfsu.edu/">San Francisco State University</a></li>
      <li><a href="http://www.sfsu.edu/">Home</a></li>
      <li><a href="http://www.sfsu.edu/login.htm">Login</a></li>
      <li><a href="http://www.sfsu.edu/calendar/">Calendar</a></li>
      <li><a href="http://www.sfsu.edu/atoz/">A&ndash;Z Index</a></li>
      <li><a href="http://www.sfsu.edu/search.htm">Search Tools</a></li>
      <li>
        <form action="http://google.sfsu.edu/search" method="get" title="Search SF State">
          <div>
            <span class="readernote"><label for="search">Search SF State</label></span>
            <input class="searchbox" type="text" id="search" name="q" size="12" maxlength="50" value="" />
            <input type="submit" name="search" value="Search" class="button" />
          </div>
        </form>
      </li>
    </ul>
  </div>
</div>
<!-- /#utilitystripe -->

<!-- .region-branding -->
<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($site_name || $site_slogan): ?>
    <div class="branding-data clearfix">
      <?php if ($site_name || $site_slogan): ?>
      <?php $class = $site_name_hidden && $site_slogan_hidden ? ' element-invisible' : ''; ?>
          <hgroup class="site-name-slogan<?php print $class; ?>">
            <?php if ($site_name): ?>
            <?php $class = $site_name_hidden ? ' element-invisible' : ''; ?>
            <h2 class="site-name<?php print $class; ?>"><?php print $linked_site_name; ?></h2>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
            <?php $class = $site_slogan_hidden ? ' element-invisible' : ''; ?>
            <h6 class="site-slogan<?php print $class; ?>"><?php print $site_slogan; ?></h6>
            <?php endif; ?>
         </hgroup>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
<!-- /.region-branding -->

<!-- #imagestripe -->
<div class="grid-12 region region-imagestripe" id="imagestripe">
  <div id="imagebox"><span class="readernote"><?php print $sfsu_imagebar_readernote; ?></span>
    <div id="promobox">
      <?php print $content; ?>
      <?php print $sfsu_promobox_text; ?>
    </div>
  </div>
</div>
<!-- /#imagestripe -->

