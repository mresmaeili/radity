<?php
/**
 * Template Name: Radity Blog 
 * Description: The template for displaying the Blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
<div class="row">
	<div class="col-md-12">
	</div><!-- /.col -->
	<div class="col-md-12">
		<?php
			get_template_part( 'archive', 'loop' );
		?>
	</div><!-- /.col -->
</div><!-- /.row -->
<?php
get_footer();
