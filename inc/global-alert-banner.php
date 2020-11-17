<?php if ( get_field('alert_banner_visible', 'option') ): ?>
  <a class="sitewide-alert-banner" href="<?php the_field('alert_banner_link', 'option'); ?>" data-alertid="<?php the_field('alert_banner_cookie', 'option'); ?>" data-alertstate="default">
      <span class="alert-banner-title"><?php the_field('alert_banner_title', 'option'); ?> &nbsp;</span>
      <span class="alert-banner-text"><?php the_field('alert_banner_text', 'option'); ?> &nbsp;
          <span class="theme-icon icon-arrow_forward"></span>
      </span>
      <span class="close-alert-banner">
          <span class="theme-icon icon-close"></span>
      </span>
  </a>
<?php endif; ?>