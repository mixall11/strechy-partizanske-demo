<?php
/**
 * Default fallback template
 *
 * @package StrechyPartizanske
 */

get_header(); ?>

<main class="site-main">
  <div class="container" style="padding: 60px 20px;">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="entry-content"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
    <?php else : ?>
      <h1><?php esc_html_e( 'Nič tu nie je.', 'strechy-partizanske' ); ?></h1>
      <p><?php esc_html_e( 'Skús hľadať alebo prejsť do eshopu.', 'strechy-partizanske' ); ?></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
