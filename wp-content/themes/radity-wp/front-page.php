<?php
/**
 * Template Name: Custom Post Template
 */

get_header();
?>

<style>
  .card.mb-4 {
      border: 0;
  }

  img.card-img-top {
      height: 350px;
      width: 100%;
      object-fit: cover;
      border-radius: 15px;
  }

  img.img-fluid.rounded-circle {
      height: 75px;
      width: 75px;
      border-radius: 75px;
      object-fit: cover;
  }

  main#main {
      width: 100%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
      max-width: 100%;
  }

  .card-title {
      height: 40px;
      font-size: 1.25rem;
  }

  #search-box {
      width: 300px;
      margin-bottom: 10px;
  }

  #search-results {
      list-style-type: none;
      padding: 0;
  }

  #search-results li {
      padding: 5px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
  }

.search-box {
  position: relative;
  display: inline-block;
}

.search-box input[type="search"] {
  width: 300px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: border-color 0.3s ease;
  outline: none;
}

.search-box input[type="search"]::-webkit-search-cancel-button,
.search-box input[type="search"]::-webkit-search-decoration,
.search-box input[type="search"]::-webkit-search-results-button,
.search-box input[type="search"]::-webkit-search-results-decoration {
  -webkit-appearance: none;
  appearance: none;
}

.search-box input[type="search"]:focus {
  border-color: #5c9be5;
  box-shadow: 0 0 6px rgba(92, 155, 229, 0.5);
}

/* Styling for the search results */
.search-results {
  list-style-type: none;
  padding: 0;
  margin-top: 10px;
}

.search-results li {
  padding: 10px;
  border: 1px solid #ccc;
  background-color: #f9f9f9;
  transition: background-color 0.3s ease;
}

.search-results li:hover {
  background-color: #e5e5e5;
}


button.search-submit {
  display: none;
}
form.search-form {
  width: 60%;
  text-align: center;
  margin-bottom: 50px;
  outline: 0;
}
form.search-form > label {
  width: 100%;
  user-select: none;
-moz-user-select: none;
-khtml-user-select: none;
-webkit-user-select: none;
-o-user-select: none;
}
input.search-field {
  width: 100%;
  outline: 0;
  border: 1px solid #ccc;
  border-radius: 15px;
  padding: 5px 16px;
}

/* Pagination styles */
.prev-next-links {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.prev-link, .next-link {
  margin: 0 5px;
}

.disabled {
  color: #999999;
  cursor: not-allowed;
}

/* Button styles */
.prev-link a, .next-link a {
  display: inline-block;
  padding: 8px 12px;
  background-color: #f2f2f2;
  border: 1px solid #cccccc;
  color: #333333;
  text-decoration: none;
  border-radius: 3px;
  transition: background-color 0.3s ease;
}

.prev-link a:hover, .next-link a:hover {
  background-color: #dddddd;
}

/* Page number styles */

.prev-next-links {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
  margin: 16px auto;
  width: 60%;
}

.page-numbers, .prev-link  {
  display: inline-block;
  padding: 8px 16px;
  background-color: #f2f2f2;
  border: 0;
  color: #333333;
  text-decoration: none;
  border-radius: 20px;
  transition: background-color 0.3s ease;
  margin: 0 5px;
}

.page-numbers:hover {
  background-color: #dddddd;
}





.search-form-container {
position: relative;
    margin-right: -15px;
    margin-left: -15px;
}

form.search-form {
display: flex;
}
form.search-form {
  width: 60%;
  text-align: center;
  margin: 25px auto 50px;
  outline: 0;
}

.search-field {
width: 100%;
}

div#search-results {
position: absolute;
top: 100%;
left: 0;
right:0;
width: 60%;
z-index: 999;
background-color: #ffffff;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
margin: 0 auto;
display: none;
}

#search-results ul {
list-style-type: none;
padding: 0;
margin: 0;
}

#search-results li {
padding: 15px;
border-bottom: 1px solid #eaeaea;
}

#search-results li:last-child {
border-bottom: none;
}

#search-results a {
color: #333333;
text-decoration: none;
transition: color 0.3s ease;
}

#search-results a:hover {
color: #000000;
}

#search-results li {
  padding: 10px 5px;
  border: none;
  border-bottom: 1px solid #eaeaea;
  font-size: 14px;
}

.card-body.d-flex.flex-column {
  padding-left: 0;
}

.prev-link a, .next-link a {
  display: inline-block;
  padding: 8px 16px;
  background-color: #f2f2f2;
  border: 0;
  color: #333333;
  text-decoration: none;
  border-radius: 20px;
  transition: background-color 0.3s ease;
  margin: 0 5px;
  font-size: 14px;
}

@media screen and (max-width: 768px) {
ul#menu-primary {
    margin-top: 16px;
}
}

@media screen and (max-width: 992px) {
div#search-results {
  width: 100%;
}
form.search-form {
  width: 100%;
}

.flex.align-items-stretch.col-sm-12.col-md-12.col-lg-4 {
  padding-left: 0;
}
.prev-next-links {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
  margin: 16px auto;
  width: 100%;
}
.prev-link {
  padding: 0;
}
.prev-link > span {
    display: inline-block;
    padding: 8px 16px;
    background-color: #f2f2f2;
    border: 0;
    color: #333333;
    text-decoration: none;
    border-radius: 20px;
    transition: background-color 0.3s ease;
    margin: 0 5px;
    font-size: 14px;
}

}

@media (min-width: 768px) {
.navbar-expand-md .navbar-nav .nav-link {
  margin-right: 3vw;
}
}

#navbar {
overflow: hidden;
transition: max-height 0.3s ease;
}

#navbar ul {
list-style-type: none;
margin: 0;
padding: 0;
display: flex;
justify-content: flex-end;
}

#navbar li {
margin: 0 10px;
}

#navbar a {
text-decoration: none;
color: #333333;
transition: color 0.3s ease;
}

#navbar a:hover {
color: #000000;
}

</style>




<div class="container-fluid">
    
    <div class="search-form-container">
      <form role="search" method="get" class="search-form" action="">
        <label>
          <span class="screen-reader-text">Search for:</span>
          <input type="search" class="search-field" placeholder="Search..." name="s" />
        </label>
      </form>
      <div id="search-results"></div>
    </div>


    <div class="row align-items-stretch">
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
                                <h2 class="card-title" itemprop="headline"><?php the_title(); ?></h2>
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
