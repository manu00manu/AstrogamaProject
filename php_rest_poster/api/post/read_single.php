<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../connection.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get ID
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_item = array(
    'profile_id' =>$post->profile_id,
    'post_id' =>$post->post_id,
    'horoscope_id'=>$post->horoscope_id,
    'caption' =>$post->caption,
    'public' =>$post->public,
    'likes_id'=>$post->likes_id,
    'comments_id'=>$post->comments_id,
    'user_id' =>$post->user_id
  );
  // Make JSON
  print_r(json_encode($post_arr));