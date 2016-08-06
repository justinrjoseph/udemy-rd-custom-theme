<?php
/**
 * Template Name: Home Page
 * 
 * @package Custom Theme
 * @since Custom Theme 1.0
 */
?>

<?php get_header(); ?>

  <div class="jumbotron gradient-bg">
    <div class="container">
      <h1 class="text-center">Welcome to Our Custom Theme</h1>
    </div>
  </div>
    
  <div class="container">
    <div class="row">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
    
<?php get_footer(); ?>