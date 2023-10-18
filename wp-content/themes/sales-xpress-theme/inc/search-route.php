<?php

function salesXpressSearch()
{
  register_rest_route('salesXpress/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'salesXpressSearchResults'
  ));
}

add_action('rest_api_init', 'salesXpressSearch');

function salesXpressSearchResults($data)
{
  $searchTerm = sanitize_text_field($data['term']);
  $postSearch = postSearch($searchTerm);
  $categoryPostSearch = categoryPostSearch($searchTerm);
  $authorPostSearch = authorPostSearch($searchTerm);

  //MERGE ALL SEARCH CATEGORIES TOGETHER
  $mergedPosts = array_merge($postSearch, $categoryPostSearch, $authorPostSearch);

  //REMOVE ANY DUPLICATIONS IN MERGED SEARCH RESULTS AND MAX OUT AT 3 POST
  $postIds = array();
  $finalPost = array();
  foreach ($mergedPosts as $i => $post) {
    if ($i == 3) {
      break;
    }
    if (array_search($post['id'], $postIds) === false) {
      array_push($postIds, $post['id']);
      array_push($finalPost, $post);
    }
  }

  return $finalPost;
}


function postSearch($searchTerm)
{
  $post = new WP_Query(array(
    'post_type' => 'post',
    's' => $searchTerm
  ));

  $postResults = array();
  while ($post->have_posts()) {
    $post->the_post();
    array_push($postResults, array(
      "id" => get_the_ID(),
      'link' => get_the_permalink(),
      'title' => get_the_title(),
      'content' => get_the_content(),
      'author' => get_the_author(),
      'blogCardImgUrl' => get_the_post_thumbnail_url(null, 'blogCardSize')
    ));
  }

  return $postResults;
}

function categoryPostSearch($searchTerm)
{
  //PUSH ALL CATEGORIES INTO AN ARRAY
  $categories = array();
  foreach (get_categories() as $cat) {
    array_push($categories, $cat->name);
  };

  //TURN ARRAY OF SELECTED CATEGORIES INTO STRING
  $categoryString = "";
  foreach ($categories as $i => $cat) {
    $index = strpos(strtolower($cat), strtolower($searchTerm));
    $comma = $i === 0 ? "" : ",";
    if ($index === 0 ? true : (!$index ? false : $index)) {
      $categoryString = $categoryString . $comma . $cat;
    }
  }

  //IF STRING IS EMPTY END FUNCTION AND RETURN EMPTY ARRAY
  if (!$categoryString) {
    return array();
  }

  $categoryPost = new WP_Query(array(
    'category_name' => $categoryString
  ));

  $categoryPostResults = array();
  while ($categoryPost->have_posts()) {
    $categoryPost->the_post();
    array_push($categoryPostResults, array(
      "id" => get_the_ID(),
      'link' => get_the_permalink(),
      'title' => get_the_title(),
      'content' => get_the_content(), 12,
      'author' => get_the_author(),
      'blogCardImgUrl' => get_the_post_thumbnail_url(null, 'blogCardSize')
    ));
  }

  return $categoryPostResults;
}

function authorPostSearch($searchTerm)
{
  //GET ALL AUTHORS
  $authorNames = get_users(array(
    'role' => 'author'
  ));

  // GET MATCHING AUTHOR ID(s) AND CONCAT INTO STRING
  $authorIds = "";
  foreach ($authorNames as $author) {
    //CHECK IF AUTHOR MATCHES SEARCH
    $index = strpos(strtolower($author->display_name), strtolower($searchTerm));

    //PUSH ID(s) IF AUTHOR MATCHES
    if ($index === 0 ? true : (!$index ? false : $index)) {
      $comma = $authorIds === "" ? "" : ",";
      $authorIds = $authorIds . $comma . $author->ID;
    }
  }

  //IF STRING IS EMPTY END FUNCTION AND RETURN EMPTY ARRAY
  if (!$authorIds) {
    return array();
  }

  //GET POST BASED ON AUTHOR IDs
  $authorPost = new WP_Query(array(
    'author' => $authorIds
  ));

  $authorPostResults = array();
  while ($authorPost->have_posts()) {
    $authorPost->the_post();
    array_push($authorPostResults, array(
      "id" => get_the_ID(),
      'link' => get_the_permalink(),
      'title' => get_the_title(),
      'content' => get_the_content(), 12,
      'author' => get_the_author(),
      'blogCardImgUrl' => get_the_post_thumbnail_url(null, 'blogCardSize')
    ));
  }

  return $authorPostResults;
}
