<?php
/**
 * Single post template
 *
 * @package StrechyPartizanske
 */

get_header(); ?>

<main class="site-main">
  <div class="container" style="padding: 60px 20px; max-width: 820px;">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <p class="entry-meta"><?php echo esc_html( get_the_date() ); ?> · <?php the_author(); ?></p>
        </header>
        <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'large' ); ?>
        <div class="entry-content"><?php the_content(); ?></div>
      </article>
      <?php comments_template(); ?>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
