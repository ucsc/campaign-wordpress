<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="promoted-item">
      <h3>
        <small><?php the_time('F d, Y') ?></small>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h3>
    </div>
        
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>      
               
<?php get_sidebar(); ?>        
<?php get_footer(); ?>