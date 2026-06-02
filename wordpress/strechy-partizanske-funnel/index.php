<?php
/**
 * Default fallback — front-page.php má prednosť pre homepage.
 * Tento súbor bežne nenavštívi nikto, slúži pre archive/blog.
 *
 * @package StrechyPartizanskeFunnel
 */
get_header(); ?>

<main class="site-main">
  <div class="container" style="padding: 60px 20px; max-width: 820px;">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="entry-content"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>
      <?php the_posts_pagination(); ?>
    <?php else : ?>
      <h1><?php esc_html_e( 'Nič tu nie je.', 'strechy-partizanske-funnel' ); ?></h1>
      <p><?php esc_html_e( 'Späť na', 'strechy-partizanske-funnel' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'kalkulačku', 'strechy-partizanske-funnel' ); ?></a>.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
