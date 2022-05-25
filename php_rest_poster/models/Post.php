<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'post';

    // Post Properties
    public $profile_id;
    public $post_id;
    public $horoscope_id;
    public $caption;
    public $created_at;
    public $public;
    public $likes_id;
    public $comments_id;
    public $user_id;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT profile_id, post_id, horoscope_id, caption, created_at, public, likes_id, comments_id, user_id
                                FROM ' . $this->table . ' 
                                ORDER BY
                                  created_at DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    // Get Single Post
    public function read_single() {
      // Create query
      $query = 'SELECT profile_id, post_id, horoscope_id, caption, created_at, public, likes_id, comments_id, user_id
                                FROM ' . $this->table . '
                                WHERE
                                  p.id = ?
                                LIMIT 0,1';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->post_id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->profile_id = $row['profile_id'];
      $this->horoscope_id = $row['horoscope_id'];
      $this->caption = $row['caption'];
      $this->public = $row['public'];
      $this->likes_id = $row['likes_id'];
      $this->comments_id = $row['comments_id'];
      $this->user_id = $row['user_id'];
    }


  // Create Post
  public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET profile_id = :profile_id, horoscope_id = :horoscope_id, caption = :caption, public = :public, likes_id = :likes_id, comments_id = :comments_id, user_id = :user_id ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->profile_id = htmlspecialchars(strip_tags($this->profile_id));
      $this->horoscope_id = htmlspecialchars(strip_tags($this->horoscope_id));
      $this->caption = htmlspecialchars(strip_tags($this->caption));
      $this->public = htmlspecialchars(strip_tags($this->public));
      $this->likes_id = htmlspecialchars(strip_tags($this->likes_id));
      $this->comments_id = htmlspecialchars(strip_tags($this->comments_id));
      $this->user_id = htmlspecialchars(strip_tags($this->user_id ));
    }

      // Bind data
      $stmt->bindParam(':profile_id', $this->profile_id);
      $stmt->bindParam(':horoscope_id', $this->horoscope_id);
      $stmt->bindParam(':caption', $this->caption);
      $stmt->bindParam(':public', $this->public);
      $stmt->bindParam(':likes_id', $this->likes_id);
      $stmt->bindParam(':comments_id', $this->comments_id);
      $stmt->bindParam(':user_id', $this->user_id);

      // Execute query
      if($stmt->execute()) {
        return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}

  // Update Post
  public function update() {
      // Create query
      $query = 'UPDATE ' . $this->table . '
                          SET profile_id = :profile_id, horoscope_id = :horoscope_id, caption = :caption, public = :public, likes_id = :likes_id, comments_id = :comments_id, user_id = :user_id 
                            WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->body = htmlspecialchars(strip_tags($this->body));
      $this->author = htmlspecialchars(strip_tags($this->author));
      $this->category_id = htmlspecialchars(strip_tags($this->category_id));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':profile_id', $this->profile_id);
      $stmt->bindParam(':horoscope_id', $this->horoscope_id);
      $stmt->bindParam(':caption', $this->caption);
      $stmt->bindParam(':public', $this->public);
      $stmt->bindParam(':likes_id', $this->likes_id);
      $stmt->bindParam(':comments_id', $this->comments_id);
      $stmt->bindParam(':user_id', $this->user_id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
}

  // Delete Post
  public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
}

