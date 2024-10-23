<?php

session_start();
require_once "dbconn.php";

// fetch posts from database
function fetch_posts($pdo){
    $query = "SELECT * FROM posts ORDER BY id DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


// store all posts in a variable
$posts = fetch_posts($pdo);
// function to get all posts
function all_posts($posts){
    foreach($posts as $post){?>
        <div class="my_card">
            <div>
                <img src="includes/<?php echo htmlspecialchars($post['cover_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">

            </div>

            <div class="my_card_body">
                <form method="post">
                    <h4><?php echo $post["title"]; ?></h4>
                    <p><?php echo $post["description"]; ?></p>
                    <p class="align-self-center"><?php echo $post["likes"] . " likes"; ?></p>
                    <button class="buy-btn"><a href="<?php echo $post["affiliate_link"]; ?>" class="text-decoration-none text-white" target="_blank">Buy now</a></button>

                    <input type="hidden" name="id" value="<?php echo $post["id"] ; ?>">
                    <button class="my-btn" name="single_post" type="submit">
                        <a href="posts.php?title=<?php echo $post['title']; ?>" class="text-start text-decoration-none text-white">See full review
                        </a>
                    </button>
                </form>
            </div>
        </div>
<?php }
}
// store posts in a session
$_SESSION["posts"] = $posts;

// function to get full post from database
function get_full_post($pdo, $id){
    $query = "SELECT * FROM posts WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
// function to get the last 10 posts
function get_last_ten_posts($pdo){
    $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 10;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
// function to get side post full content using title
function side_post_content($pdo, $title){
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE title = :title;");
    $stmt->bindParam(":title", $title);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

// likes update function
function update_likes($pdo, $likes, $title){
    $query = "UPDATE posts SET likes = :likes WHERE title = :title;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":likes", $likes);
    $stmt->bindParam(":title", $title);
    $stmt->execute();
}