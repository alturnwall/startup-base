<?php 
// Relies on Reading Time WP Plugin
// https://wordpress.org/plugins/reading-time-wp/
// Gracefull failure if plugin isn't activated

if (shortcode_exists('rt_reading_time')) {
  echo do_shortcode('[rt_reading_time postfix="minute read" postfix_singular="minute read"]');
};
?>  