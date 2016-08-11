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


<nav class="pagination">
	<ul>
		<li class="older-entries">
			<?php if( get_next_posts_link() ) :

				next_posts_link( '« Older news', 0 );

			endif; ?>
		</li>
		<li class="newer-entries">
			<?php if( get_previous_posts_link() ) :

				previous_posts_link( 'Newer news »' );

			endif; ?>
		</li>
	</ul>
</nav>
      
               
<?php get_sidebar(); ?>        
<?php get_footer(); ?>