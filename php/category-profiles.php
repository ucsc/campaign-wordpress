<?php get_header(); ?>

<div class="row js-masonry">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php 

  $categories = get_the_category();
  $cat_list = '';
  foreach ($categories as $cat) {
    $cat_list .= " " . strtolower($cat->name);
  }

?>

 <div class="col-sm-4 col-md-3<?php echo $cat_list; ?>">
    <div class="thumbnail">
      <img src="<?php echo get_post_meta(get_the_ID(), 'image_url', true ); ?>" alt="<?php the_title(); ?>" />
      <div class="caption">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
      </div>
    </div>
  </div>
        
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>      
</div>
                    
<?php get_sidebar(); ?>        
<?php get_footer(); ?>
