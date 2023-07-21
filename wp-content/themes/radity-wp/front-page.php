<?php
/**
 * Template Name: Custom Post Template
 */

get_header();
?>


<div class="container-fluid">
    <div class="row search">
    <div class="search-form-container">
      <form role="search" method="get" class="search-form" action="">
        <label>
          <span class="screen-reader-text">Search for:</span>
          <input type="search" class="search-field" placeholder="Search..." name="s" />
        </label>
      </form>
      <div id="search-results"></div>
    </div>
    </div>

    <div class="row postsgrid align-items-stretch">
            <?php
            // The Query
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => wp_is_mobile() ? 2 : 6,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1, 
            );

            // Add search query if available
            if (isset($_GET['s']) && !empty($_GET['s'])) {
                $query_args['s'] = sanitize_text_field($_GET['s']);
            }

            $the_query = new WP_Query($query_args);

            // The Loop
            if ($the_query->have_posts()) {
                $count = 0;
                while ($the_query->have_posts()) {
                    $the_query->the_post();

                    // Retrieve the author's name and image URL using ACF fields
                    $author_name = get_field('author_name');
                    $author_image_url = get_field('author_image');

                    // Start a new row after every 3 posts
                    if ($count % 3 === 0 && $count !== 0) {
                        echo '</div><div class="row">';
                    }
                    ?>

                    <div class="flex align-items-stretch col-sm-12 col-md-12 col-lg-4">
                        <div class="card mb-4" itemscope itemtype="http://schema.org/BlogPosting">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('large'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>" itemprop="image">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                            <h2 class="card-title" itemprop="headline">
                                <a href="<?php echo get_permalink($related_post->ID); ?>"><?php echo get_the_title($related_post->ID); ?></a>
                            </h2>
                                <p class="card-text" itemprop="description"><?php the_excerpt(); ?></p>
                                <div class="d-flex align-items-center mt-3">
                                    <?php if ($author_image_url) : ?>
                                        <div class="mr-3">
                                            <img src="<?php echo $author_image_url; ?>" alt="Author Image" class="img-fluid rounded-circle" itemprop="image">
                                        </div>
                                    <?php endif; ?>
                                    <p class="card-text" itemprop="author"><?php echo $author_name; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $count++;
                }
            } else {
                // If no posts are found
                echo '<div class="col">No posts found.</div>';
            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>
        </div>
        
    <div class="row pagination">
        <?php
        // Pagination
        $pagination_args = array(
            'total' => $the_query->max_num_pages,
            'prev_text' => 'Back',
            'next_text' => 'Next',
        );

        // Display different pagination based on device type
     if (wp_is_mobile()) {
    // Display previous and next buttons for mobile
    if ($the_query->max_num_pages > 1) {
        echo '<div class="prev-next-links">';

        $prev_link = get_previous_posts_link('Back');
        $next_link = get_next_posts_link('Next');

        if ($prev_link || $next_link) {
            echo '<div class="prev-link">';
            if ($prev_link) {
                echo $prev_link;
            } else {
                echo '<span class="disabled">Back</span>';
            }
            echo '</div>';

            echo '<div class="next-link">';
            if ($next_link) {
                echo $next_link;
            } else {
                echo '<span class="disabled">Next</span>';
            }
            echo '</div>';
        }

        echo '</div>';
    }

        } else {
            // Display page numbers with previous and next buttons for desktop
            echo '<div class="prev-next-links">';
            if ($the_query->max_num_pages > 1) {

                    echo paginate_links($pagination_args);
            }
            echo '</div>';
        }
        ?>
    </div>

</div>

<script>
(function ($) {
  var searchForm = $('.search-form');
  var searchField = $('.search-field');
  var searchResults = $('#search-results');

  searchField.on('input', function () {
    var searchTerm = searchField.val();

    if (searchTerm.length > 0) {
      $.ajax({
        url: '<?php echo rest_url('wp/v2/posts'); ?>',
        data: {
          search: searchTerm,
          per_page: 10
        },
        beforeSend: function (xhr) {
          xhr.setRequestHeader('X-WP-Nonce', '<?php echo wp_create_nonce('wp_rest'); ?>');
        },
        success: function (response) {
          var html = '';
          if (response.length > 0) {
            // Process the search results and generate HTML
            response.forEach(function (result) {
              html += '<li><a href="' + result.link + '">' + result.title.rendered + '</a></li>';
            });
          } else {
            html = '<li>No results found.</li>';
          }
          searchResults.html('<ul>' + html + '</ul>');
          searchResults.slideDown(); // Show the search results container
        }
      });
    } else {
      searchResults.empty();
      searchResults.slideUp(); // Hide the search results container if search term is empty
    }
  });

  // Hide the search results container initially
  searchResults.hide();
})(jQuery);
</script>

<?php get_footer(); ?>
