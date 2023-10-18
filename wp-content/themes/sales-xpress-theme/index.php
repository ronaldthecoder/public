<?php get_header(); ?>

<section class="featured-blog-section flex-center">
  <div class="container">
    <header class="flex-col">
      <p class="title--1 bold">All Posts</p>
      <div class="divider"></div>
    </header>
    <?php
    function getReadTime($content)
    {
      $wordCount = str_word_count(strip_tags($content));
      return ceil($wordCount / 238);
    }

    while (have_posts()) {
      the_post();
      $readTime = getReadTime(get_the_content());

    ?>
      <div class="main-post flex-row">
        <a href="<?php the_permalink(); ?>">
          <div class="main-post-img">
            <?php the_post_thumbnail('featuredBlogSize'); ?>
          </div>
        </a>
        <div class="main-post--description flex-col">
          <a href="<?php the_permalink(); ?>">
            <h3 class="underline"><?php the_title(); ?></h3>
          </a>
          <a href="<?php the_permalink(); ?>">
            <p class="underline">
              <?php
              echo wp_trim_words(get_the_content(), 19);
              ?>
            </p>
          </a>
          <div class="article-details flex-row">
            <p class="read-time bold"><?php echo $readTime ?> MIN READ</p>
            <p class="title--1 bold">&middot;</p>
            <p class="author"><?php the_author(); ?></p>
          </div>
        </div>
      </div>
    <?php
      break;
    }
    ?>
  </div>
</section>
<section class="side-blog-section flex-center">
  <div class="container grid grid--3cols">
    <?php
    while (have_posts()) {
      the_post();
      $readTime = getReadTime(get_the_content());

    ?>
      <div class="blog-card rounded">
        <a href="<?php the_permalink(); ?>" class="img-box bg-grey--100">
          <?php the_post_thumbnail('blogCardSize'); ?>
        </a>
        <div class="flex-col blog-card-description bg-grey--200">
          <a href="<?php the_permalink(); ?>">
            <h5 class="underline"><?php the_title(); ?></h5>
          </a>
          <a href="<?php the_permalink(); ?>">
            <p class="underline">
              <?php echo wp_trim_words(get_the_content(), 19); ?>
            </p>
          </a>
          <div class="article-details flex-row">
            <p class="read-time bold"><?php echo $readTime ?>&nbsp;MIN READ</p>
            <p class="title--1 bold">&middot;</p>
            <p class="author"><?php the_author(); ?></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</section>
<?php
echo paginate_links();
?>
<?php get_footer(); ?>