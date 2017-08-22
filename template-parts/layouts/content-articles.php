<article <?php post_class( 'typology-post typology-layout-b' ); ?>>

  <header class="entry-header">
    <?php if( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" class="typology-featured-image">
        <?php the_post_thumbnail('typology-article-thumb', ['class'=> 'articles-featured-image']); ?>
      </a>
    <?php endif; ?>

    <div class="post-date-hidden"><?php echo get_the_date(); ?></div>
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
     <?php if( $meta = typology_meta_display('b') ) : ?> 
        <div class="entry-meta"><?php echo typology_get_meta_data( $meta ); ?></div>
    <?php endif; ?>
    <?php $date = the_date('d', '', '', false ); ?>
    <div class="post-date">
      <?php if( !empty( $date  ) ) : ?>
        <span class="post-date-day"><?php echo get_the_date( 'd' ); ?></span>
        <span class="post-date-month"><?php echo get_the_date( 'F' ); ?></span>
      <?php endif; ?>
    </div>
  </header>

  <div class="entry-content">
    <?php if( !has_post_thumbnail() ) : ?>
      <?php echo typology_get_excerpt(140); ?>
    <?php endif; ?>
  </div>
  <?php if( $buttons = typology_buttons_display('b') ) : ?>
    <div class="entry-footer">
      <?php echo typology_get_buttons_data( $buttons ); ?>
    </div>
  <?php endif; ?>

</article>
