<?php get_header(); ?>

<main>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <h2 class="page-title"><?php the_title(); ?></h2>

      <section class="row">

        <?php the_content(); ?>

      </section>  

  <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>      

</main>
                    
<?php get_sidebar(); ?>        
<?php get_footer(); ?>