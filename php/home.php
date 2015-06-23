<?php get_header(); ?>

<div class="row">

  <section class="col-sm-4 col-md-3">
    <?php if ( ! dynamic_sidebar( 'Home page left' ) ) : ?>

    <?php endif; ?>
  </section>

  <section class="col-md-6 col-sm-8">

    <?php $the_query = new WP_Query( 'category_name=featured&orderby=ID&posts_per_page=4' ); ?>

    <?php if ( $the_query->have_posts() ): ?>
      <div class="flexslider">
        <ul class="slides">
        
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        
        <li style="background:transparent url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-slider')[0]; ?>) no-repeat left top;background-size:cover;min-height:332px;max-height:488px;">   
            <p class="flex-caption">
              <a href="<?php the_permalink(); ?>"><?php has_excerpt() ? print get_the_excerpt() : the_title(); ?></a>
            </p>           
        </li>

        <?php endwhile; ?>
        
        </ul>
      </div>
      <?php else: ?>
        // No posts/pages in the category.
    <?php endif; wp_reset_postdata(); ?>

    <?php if ( ! dynamic_sidebar( 'Home page center' ) ) : ?>No widgets assigned to this region.<?php endif; ?>

  </section>

  <section class="col-md-3 col-sm-12">
  <?php if ( ! dynamic_sidebar( 'Home page right' ) ) : ?>
  
    <h3>News &amp; Events</h3>
    <ul class="list-unstyled">
      
      <?php query_posts('posts_per_page=8'); ?>    
      <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

        <?php if (in_category('news')): ?>     
          <li>   
            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>           
          </li>
        <?php endif ?>

      <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>      
      
    </ul>
    <p><a class="btn btn-alert pull-right" href="/category/news/">More news &raquo;</a></p>
  <?php endif; ?>

    

  </section>  

</div>  

<?php get_footer(); ?>