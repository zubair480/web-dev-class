<?php
/*
Template Name: Generic Template
*/
?>

<?php get_header(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_title(); ?>
            <div>
                <?php
                while (have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </article>
        
<?php get_footer(); ?>
