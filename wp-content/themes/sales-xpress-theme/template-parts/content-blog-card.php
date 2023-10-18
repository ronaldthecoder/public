<?php

//PERMA LINK CONFIG (FOR ACCURATE URL BREADCRUMB)
$urlParams = explode('/', "$_SERVER[REQUEST_URI]");
$pageType = "posts";
foreach ($urlParams as $param) {
  if ($param === "blogs") {
    $pageType = "blogs";
    break;
  } else if ($param === "category") {
    $pageType = "category";
    break;
  }
}
$permaLink = get_the_permalink();
if ($pageType === "category") {
  $postCategory = $urlParams[2];
  $postSlug = explode('/', get_the_permalink())[4];
  $permaLink = esc_url(site_url("/{$postCategory}/{$postSlug}"));
} else if ($pageType == 'posts') {
  $postCategory = $urlParams[1];
  $postSlug = explode('/', get_the_permalink())[4];
  $permaLink = esc_url(site_url("/{$postCategory}/{$postSlug}"));
}

?>
<li class="blog-card rounded">
  <a href="<?php echo $permaLink ?>" class="img-box bg-grey--100">
    <?php the_post_thumbnail('blogCardSize'); ?>
  </a>
  <div class="flex-col blog-card-description bg-grey--200">
    <a href="<?php echo $permaLink ?>">
      <h5 class="underline"><?php the_title(); ?></h5>
    </a>
    <a href="<?php echo $permaLink ?>">
      <p class="underline">
        <?php echo wp_trim_words(get_the_content(), 19); ?>
      </p>
    </a>
    <div class="article-details flex-row">
      <p class="read-time bold" data-blog="<?php echo wp_strip_all_tags(get_the_content(), true); ?>"></p>
      <p class="title--1 bold">&middot;</p>
      <p class="author"><?php the_author(); ?></p>
    </div>
  </div>
</li>