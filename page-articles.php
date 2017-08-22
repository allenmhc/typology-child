<?php
  /**
   * Template Name: Articles Template
   *
   * @package WordPress
   * @subpackage Typology Child
   */

?>

<?php get_header(); ?>

<?php $cover_class = !typology_get_option( 'page_cover' ) ? 'typology-cover-empty' : ''; ?>
<div id="typology-cover" class="typology-cover <?php echo esc_attr($cover_class); ?>">
  <?php get_template_part('template-parts/cover/cover-page'); ?>
</div>

<?php
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array(
    'post_type'      => 'post',
    'paged'          => $paged,
    'orderby'        => 'date',
    'meta_key'       => 'article',
    'meta_value'     => 1
  );
  $wp_query = new WP_Query( $args );
?>

<div class="typology-fake-bg">
  <div class="typology-section">
    <?php if( !typology_get_option('page_cover') ) : ?>
      <?php $heading = typology_get_archive_heading(); ?>
      <?php typology_section_heading( array( 'title' => $heading['title'],  'pre' => $heading['pre'], 'element' => 'h1' , 'avatar' => $heading['avatar']) ); ?>
    <?php endif; ?>
    <?php $archive_layout = 'articles'; ?>

    <?php if( $wp_query->have_posts() ) : ?>

      <div class="section-content section-content-<?php echo esc_attr( $archive_layout ); ?>">

        <div class="typology-posts">

          <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <?php get_template_part('template-parts/layouts/content-'. $archive_layout ); ?>
          <?php endwhile; ?>

        </div>
        <?php get_template_part('template-parts/pagination/'. typology_get_option( 'archive_pagination') ); ?>

      </div>

      <?php else: ?>

        <?php get_template_part('template-parts/layouts/content-none' ); ?>

      <?php endif; ?>

    </div>

<?php get_footer(); ?>
