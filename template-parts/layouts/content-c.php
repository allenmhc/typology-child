<?php 
    $has_image = typology_get_option( 'layout_c_fimg' ) ? 'post-image-on' : 'post-image-off';
?>
<article <?php post_class( 'typology-post typology-layout-c col-lg-6 text-center '.esc_attr($has_image).'' ); ?>>

  <div class="featured-image-overlay">

    <?php if( typology_get_option( 'layout_c_fimg' ) && has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail('typology-c', ['class'=> 'featured-image']); ?>
    <?php endif; ?>

    <div class="entry-header-container">
      <header class="entry-header">
          <?php the_title( sprintf( '<h2 class="entry-title h4"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
          <?php if( $meta = typology_meta_display('c') ) : ?> 
              <div class="entry-meta">
                <div class="meta-item meta-category">
                  <?php echo __typology('in') . " "; the_category( ', ' ); ?>
                </div>
                <div class="meta-item meta-date">
                  <span class="updated"><?php the_date(); ?></span>
                </div>
              </div>
          <?php endif; ?>
          <?php if( typology_get_option( 'layout_c_dropcap' ) ) : ?>
              <div class="post-letter"><?php echo typology_get_letter(); ?></div>
          <?php endif; ?>
      </header>
    </div>

    <?php if( typology_get_option( 'layout_c_fimg' ) && has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" class="defuser featured-image-defuser"></a>
    <?php else: ?>
      <a href="<?php the_permalink(); ?>" class="defuser default-background-image-defuser"></a>
    <?php endif; ?>

  </div>

</article>
