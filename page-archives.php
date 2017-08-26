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

<div class="typology-fake-bg">
  <div class="typology-section">
    <?php if( !typology_get_option('page_cover') ) : ?>
      <?php $heading = typology_get_archive_heading(); ?>
      <?php typology_section_heading( array( 'title' => $heading['title'],  'pre' => $heading['pre'], 'element' => 'h1' , 'avatar' => $heading['avatar']) ); ?>
    <?php endif; ?>

      <div class="section-content">

        <h3>Categories</h3>

        <p>
          <ul class="display-categories">
          <?php
            $categories = get_terms(array('taxonomy' => 'category'));
            $max_count = max(array_map(
              function($category) { return $category->count; },
              $categories
            ));
            foreach($categories as $category) {
              $name = $category->name;
              $percentage = $category->count / $max_count * 100;
              $link = get_category_link($category->term_id);
              echo "<li style=\"width: $percentage%\" class=\"category\"><a href=\"$link\">$name</a></li>";
            }
          ?>
          </ul>
        </p>

        <h3>Posts by Year</h3>

        <p>
          <ul class="display-archives">
          <?php
            $first_year = date('Y', strtotime(get_posts(array(
              'numberposts' => 1,
              'post_status' => 'publish',
              'order' => 'ASC'
            ))[0]->post_date));
            for ($i = date('Y'); $i >= $first_year; $i--) {
              $link = get_year_link($i);
              echo "<li class=\"archive\"><a href=\"$link\">$i</a></li>";
            }
          ?>
          </ul>
        </p>
      </div>

    </div>

<?php get_footer(); ?>
