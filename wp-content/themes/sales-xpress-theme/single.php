<?php get_header(); ?>
<section class="post-content flex-center">
  <div class="container">
    <?php
    $post_id = get_the_ID();

    function getReadTime($content)
    {
      $wordCount = str_word_count(strip_tags($content));
      return ceil($wordCount / 238);
    }

    while (have_posts()) {
      the_post();
      $readTime = getReadTime(get_the_content());

      $categorySlug = explode('/', "$_SERVER[REQUEST_URI]")[1];
    ?>
      <div class="page-route flex-row">
        <a class="title--2" href="<?php echo site_url('/blogs/'); ?>">blogs</a>
        <svg class="caretRight" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.51552 6.26531L4.76552 10.0153C4.73068 10.0501 4.68932 10.0778 4.64379 10.0966C4.59827 10.1155 4.54948 10.1252 4.50021 10.1252C4.45094 10.1252 4.40214 10.1155 4.35662 10.0966C4.3111 10.0778 4.26974 10.0501 4.2349 10.0153C4.20005 9.98047 4.17242 9.9391 4.15356 9.89358C4.1347 9.84806 4.125 9.79927 4.125 9.75C4.125 9.70072 4.1347 9.65193 4.15356 9.60641C4.17242 9.56089 4.20005 9.51952 4.2349 9.48468L7.72005 5.99999L4.2349 2.51531C4.16453 2.44494 4.125 2.34951 4.125 2.24999C4.125 2.15048 4.16453 2.05505 4.2349 1.98468C4.30526 1.91432 4.4007 1.87479 4.50021 1.87479C4.59972 1.87479 4.69516 1.91432 4.76552 1.98468L8.51552 5.73468C8.55039 5.76951 8.57805 5.81087 8.59692 5.85639C8.61579 5.90192 8.6255 5.95071 8.6255 5.99999C8.6255 6.04928 8.61579 6.09807 8.59692 6.1436C8.57805 6.18912 8.55039 6.23048 8.51552 6.26531Z" fill="#374151" />
        </svg>
        <a class="title--2" href="<?php echo site_url("/category/{$categorySlug}/"); ?>">
          <?php
          //GET URL CATEGORY SLUG AND USE AS BREADCRUMB LINK
          echo str_replace("-", " ", $categorySlug);
          ?>
        </a>
        <svg class="caretRight" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.51552 6.26531L4.76552 10.0153C4.73068 10.0501 4.68932 10.0778 4.64379 10.0966C4.59827 10.1155 4.54948 10.1252 4.50021 10.1252C4.45094 10.1252 4.40214 10.1155 4.35662 10.0966C4.3111 10.0778 4.26974 10.0501 4.2349 10.0153C4.20005 9.98047 4.17242 9.9391 4.15356 9.89358C4.1347 9.84806 4.125 9.79927 4.125 9.75C4.125 9.70072 4.1347 9.65193 4.15356 9.60641C4.17242 9.56089 4.20005 9.51952 4.2349 9.48468L7.72005 5.99999L4.2349 2.51531C4.16453 2.44494 4.125 2.34951 4.125 2.24999C4.125 2.15048 4.16453 2.05505 4.2349 1.98468C4.30526 1.91432 4.4007 1.87479 4.50021 1.87479C4.59972 1.87479 4.69516 1.91432 4.76552 1.98468L8.51552 5.73468C8.55039 5.76951 8.57805 5.81087 8.59692 5.85639C8.61579 5.90192 8.6255 5.95071 8.6255 5.99999C8.6255 6.04928 8.61579 6.09807 8.59692 6.1436C8.57805 6.18912 8.55039 6.23048 8.51552 6.26531Z" fill="#374151" />
        </svg>
      </div>
      <h1><?php the_title(); ?></h1>
      <p class="post-info">By <span class="author bold"><?php the_author(); ?></span> | Published on <?php the_time('F j, Y'); ?> | <?php echo $readTime ?> min read</p>
      <?php the_post_thumbnail('singleBlogSize'); ?>
      <div class="content flex-col">
        <?php the_content(); ?>
      </div>
      <div class="divider"></div>
      <div class="author-segment flex-row">
        <div class="author-img rounded-full">
          <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="Author Picture">
        </div>
        <div class="author-descriptions flex-col">
          <p class="title--1 bold">
            <?php the_author(); ?>
          </p>
          <p><?php the_author_meta('description'); ?></p>
        </div>
      </div>
  </div>
<?php
    }
    wp_reset_postdata();
?>
</section>
<section class="related-post flex-col flex-center">
  <div class="container">
    <h2>Related Post</h2>
    <ul class="related-post-cards grid grid--2cols">
      <?php
      $relatedPost = new WP_Query(array(
        "category_name" => $categorySlug,
      ));

      $postUsed = 0;
      while ($relatedPost->have_posts()) {
        $relatedPost->the_post();

        if ($post_id == get_the_ID() || $postUsed == 2) {
          continue;
        } else {
          $postUsed++;
          echo get_template_part("template-parts/content-blog-card");
        }
      }
      ?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>