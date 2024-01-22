<header>
  <h1>This is a header</h1>
  <img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>"
   height="<?php echo absint( get_custom_header()->height ); ?>">

  <?php wp_head(); ?>
</header>

