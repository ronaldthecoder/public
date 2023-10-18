<div class="latest-post">
  <header class="flex-col">
    <p class="title--1 bold">Latest Posts</p>
    <div class="divider"></div>
  </header>
  <div class="content flex-row">
    <?php
    $posts = new WP_Query(array(
      'post_type' => 'post',
      'orderby' => 'date',
      'order' => 'DESC',
    ));

    while ($posts->have_posts()) {
      $posts->the_post();
    ?>
      <div class="main-post">
        <a href="<?php the_permalink(); ?>">
          <div class="main-post-img">
            <?php the_post_thumbnail('featuredBlogSize'); ?>
          </div>
        </a>
        <div class="article-details flex-row">
          <p class="read-time bold" data-blog="<?php echo wp_strip_all_tags(get_the_content(), true); ?>"></p>
          <p class="title--1 bold">&middot;</p>
          <p class="author"><?php the_author(); ?></p>
        </div>
        <a class="header-link" href="<?php the_permalink(); ?>">
          <h3 class="underline"><?php the_title(); ?></h3>
        </a>
        <a class="p-link" href="<?php the_permalink(); ?>">
          <p class="underline">
            <?php
            echo wp_trim_words(get_the_content(), 19);
            ?>
          </p>
        </a>
      </div>
    <?php
      break;
    }
    ?>
    <ul class="side-post">
      <?php
      $index = 0;
      while ($posts->have_posts()) {
        $posts->the_post();
      ?>
        <li class="flex-row 
        <?php
        echo $index == 0 ? "top" : ($index == 1 ? "mid" : ($index == 2 ? "bottom" : ""));
        ?>">
          <a href="<?php the_permalink(); ?>">
            <div class="side-post-img">
              <?php the_post_thumbnail('featuredBlogSize'); ?>
            </div>
          </a>
          <div class="side-post-details">
            <div class="article-details flex-row">
              <p class="read-time bold" data-blog="<?php echo wp_strip_all_tags(get_the_content(), true); ?>"></p>
              <p class=" title--1 bold">&middot;</p>
              <p class="author"><?php the_author(); ?></p>
            </div>
            <a class="header-link" href="<?php the_permalink(); ?>">
              <h5 class="underline"><?php echo wp_trim_words(get_the_title(), 20); ?></h5>
            </a>
            <a class="p-link" href="<?php the_permalink(); ?>">
              <p class="underline">
                <?php
                echo wp_trim_words(get_the_content(), 8);
                ?>
              </p>
            </a>
          </div>
        </li>
      <?php
        if ($index >= 2) {
          break;
        }
        $index++;
      }
      ?>
    </ul>
  </div>
</div>