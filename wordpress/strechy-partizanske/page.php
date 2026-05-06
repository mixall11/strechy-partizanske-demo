<?php
/**
 * Default page template
 *
 * @package StrechyPartizanske
 */

get_header(); ?>

<main class="site-main">
  <div class="container" style="padding: 60px 20px; max-width: 820px;">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="entry-content"><?php the_content(); ?></div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
