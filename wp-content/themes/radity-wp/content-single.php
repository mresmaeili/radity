<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- /.entry-header -->
	<div class="entry-content">
		<?php
			if ( has_post_thumbnail() ) :
				echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
			endif;

			if ( 'post' === get_post_type() ) :
		?>
			<div class="entry-meta">
				<?php radity_wp_article_posted_on(); ?>
			</div>
		<?php
			endif;
	

			the_content();

			wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'radity-wp' ) . '</span>', 'after' => '</div>' ) );
		?>
	</div><!-- /.entry-content -->

	<?php
		edit_post_link( __( 'Edit', 'radity-wp' ), '<span class="edit-link">', '</span>' );
	?>

<footer class="entry-meta">
		<hr>


<?php
// Get manually selected related posts using ACF repeater field
$related_posts = get_field('post_object');

// Check if there are manually selected related posts using ACF
if ($related_posts) {
  echo '<h3>Related Posts From ACF</h3>';
  echo '<ul class="rp">';
  foreach ($related_posts as $related_post) {
    if ($related_post->ID !== get_the_ID()) {
      echo '<li>';
      echo '<div class="related-post-image">' . get_the_post_thumbnail($related_post->ID, 'medium') . '</div>';
      echo '<div class="related-post-content">';
      echo '<h4><a href="' . get_permalink($related_post->ID) . '">' . get_the_title($related_post->ID) . '</a></h4>';
      $post_categories = get_the_category($related_post->ID);
      if (!empty($post_categories)) {
        echo '<p class="related-post-category">' . esc_html($post_categories[0]->name) . '</p>';
      }
      echo '</div>';
      echo '</li>';
    }
  }
  echo '</ul>';
} else {
  // Get related posts based on tags or category if no custom selection is made
  $post_tags = wp_get_post_tags(get_the_ID());
  $post_categories = wp_get_post_categories(get_the_ID());

  // Check if there are any selected tags
  $tag_posts = array();
  if (!empty($post_tags)) {
    $tag_args = array(
      'tag__in' => wp_list_pluck($post_tags, 'term_id'),
      'post__not_in' => array(get_the_ID()),
      'posts_per_page' => 2,
      'orderby' => 'rand',
    );
    $tag_posts = get_posts($tag_args);
  }

  // Display related posts based on tags, if any found
  if ($tag_posts) {
    echo '<h3>Related Posts based on Tags</h3>';
    echo '<ul class="rp">';
    foreach ($tag_posts as $related_post) {
      echo '<li>';
      echo '<div class="related-post-image">' . get_the_post_thumbnail($related_post->ID, 'medium') . '</div>';
      echo '<div class="related-post-content">';
      echo '<h4><a href="' . get_permalink($related_post->ID) . '">' . get_the_title($related_post->ID) . '</a></h4>';
      $post_categories = get_the_category($related_post->ID);
      if (!empty($post_categories)) {
        echo '<p class="related-post-category">' . esc_html($post_categories[0]->name) . '</p>';
      }
      echo '</div>';
      echo '</li>';
    }
    echo '</ul>';
  } elseif (!empty($post_categories)) {
    // Check if there are any posts in the same category
    $cat_args = array(
      'category__in' => $post_categories,
      'post__not_in' => array(get_the_ID()),
      'posts_per_page' => 2,
      'orderby' => 'rand',
    );
    $cat_posts = get_posts($cat_args);

    // Display related posts based on categories, if any found
    if ($cat_posts) {
      echo '<h3>Related Posts based on Category</h3>';
      echo '<ul class="rp">';
      foreach ($cat_posts as $related_post) {
        echo '<li>';
        echo '<div class="related-post-image">' . get_the_post_thumbnail($related_post->ID, 'medium') . '</div>';
        echo '<div class="related-post-content">';
        echo '<h4><a href="' . get_permalink($related_post->ID) . '">' . get_the_title($related_post->ID) . '</a></h4>';
        $post_categories = get_the_category($related_post->ID);
        if (!empty($post_categories)) {
          echo '<p class="related-post-category">' . esc_html($post_categories[0]->name) . '</p>';
        }
        echo '</div>';
        echo '</li>';
      }
      echo '</ul>';
    }
  }
}
?>








		<hr>
	</footer><!-- /.entry-meta -->
</article><!-- /#post-<?php the_ID(); ?> -->
