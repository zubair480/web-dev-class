<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php get_header(); ?>



<section>
<?php
wp_nav_menu( array(
    'theme_location' => 'custom-menu',
    'container'      => 'nav',
    'container_class' => 'custom-menu-class',
    'menu_class'     => 'custom-menu-list',
) );
?>
  
  <article>
    <h1>London</h1>
    <p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
    <p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
  </article>
</section>

<hr>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <h1> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a> </h1>
        <p> <?php the_content(); ?>  </p>
        <hr>
        <?php
    endwhile;
endif;
?>
<div class="main-2">
  <div class="sidebar">
    <h1>Wordpress</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, earum eveniet! Eum distinctio deserunt provident dolorem recusandae et natus magnam!</p>
  </div>
  <div class="sidebar-display">
    <?php get_sidebar() ?>
  </div>
</div>

<?php get_footer(); ?>

</body>
</html>

