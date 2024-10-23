<?php
    require_once "includes/dbconn.php";
    require_once "includes/posts.handler.php";
    require_once "includes/comments.view.php";
    require_once "includes/comments.fetch.php";
    $id = $_SESSION["id"];
    $homePagePost = get_full_post($pdo, $id);

    // store last ten posts in a variable
    $lastTenPosts = get_last_ten_posts($pdo);

    // get title for side post
    $title = "";
    if(isset($_GET["title"])){
        $title = $_GET["title"];
    }
    $_SESSION['title'] = $title;
    // assign either side post or post from homepage
    $singlePost = [];
    if($title){
        $singlePost = side_post_content($pdo, $title);
    }else{
        $singlePost = get_full_post($pdo, $id);
    }

    // store current post details in a session
    $_SESSION["current_post"] = $singlePost;
    // 
    $comments = [];
    $postId = $singlePost["id"];
    if(select_comments($pdo, $postId)){
        $comments = select_comments($pdo, $postId);
    }

    // like handler
    if(isset($_POST['like'])){
        $likes = (int)$_POST["like_num"] + 1;
        update_likes($pdo, $likes, $title);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Posts</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- my css -->
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/images.css">
     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  <header>
        <div class="navbar">
            <div class="navbrand">
                <a href="index.php">Products Review</a>
            </div>
            <div class="toggle_container">
                <button class="favicon-icon" id="nav_icon" type="button">
                    <i class="fa fa-navicon" style="font-size:30px"></i>
                </button>
                <ul class="nav_items">
                    <li><a href="index.php" class="my-list-item">Home</a></li>
                    <li><a href="#" class="my-list-item">Categories</a></li>
                    <li><a href="#" class="my-list-item">Services</a></li>
                    <li><a href="#" class="my-list-item">About Us</a></li>
                    <li><a href="#" class="my-list-item">Contact Us</a></li>
                </ul>
            </div>

        </div>
  </header>

  <!-- search form -->
  <div class="search-container">
    <form action="#" method="get" class="d-flex w-lg-50 mx-auto">
        <input type="text" placeholder="Search..." name="search" class="form-control">
        <button class="my-btn">Search</button>
    </form>
  </div>

    <div class="my-container">
        <div class="container-fluid">
            <div class="row">
                <!-- side headlines for trending posts -->
                <div class="col-md-3 py-3 side-posts">
                    <h4 class="text-white">Trending Posts</h4>
                    <!-- loop out the last ten posts -->
                     <?php
                        foreach($lastTenPosts as $post){
                            ?>
                                <button>
                                    <a href="posts.php?title=<?php echo $post['title']; ?>" class="text-start"><?php echo $post['title']; ?>
                                    </a>
                                </button>
                            <?php
                        }
                     ?>
                    
                    <button class="my-btn"><a href="index.php">Back to home page</a></button>
                </div>
                <!-- main post -->
                <div class="col-md-9">
                    <div>
                        <h4><?php echo $singlePost["title"]; ?></h4>
                        <img src="includes/<?php echo htmlspecialchars($singlePost['cover_image']); ?>" alt="<?php echo htmlspecialchars($singlePost['title']); ?>" class="img-fluid" width="700">

                        
                        <p><?php echo htmlspecialchars_decode($singlePost["post"]) ; ?></p>

                        <!-- like -->
                        <div class="ms-5 mt-3">
                            <form method="post">
                                <input type="hidden" value="<?php echo $singlePost["likes"]; ?>" name="like_num">
                                <button class="ms-2 like_btn" name="like">
                                    <i class="fa fa-thumbs-o-up" style="font-size:30px"></i>
                                </button>
                            </form>
                            <p class="align-self-center"><?php echo $singlePost["likes"] . " likes"; ?></p>
                        </div>

                        <!-- form for comments -->
                         <form action="includes/comments.handler.php" method="post" class="w-sm-50 text-center" id="comment">
                            <h4>Make a comment</h4>
                            <label for="name" class="form-label">Name <small class="text-muted">Optional</small> </label>
                            <input type="text" class="form-control" name="name">
                            <label for="name" class="form-label mt-2">Comment Text</label>
                            <textarea name="comment" class="form-control" rows="5"></textarea>
                            <p class="text-danger"><?php echo $commentError["comment_error"] ?? ''; ?></p>

                            <button class="my-btn mt-3">Post Comment</button>
                         </form>
                         <!-- display comments -->
                          <?php 
                            // if($comments){
                                foreach($comments as $comment){
                                    ?>
                                    <div class="row mt-5 ms-3">
                                        <div class="col-2">
                                            <i class='fa fa-user' style='font-size:60px'></i>
                                        </div>
                                        <div class="col-8">
                                            <h5><?php echo $comment["created_by"] ?? ''; ?></h5>
                                            <p><?php echo $comment["comment"] ?? ''; ?></p>
                                        </div>
                                    </div>
                                <?php }
                            // }
                          ?>

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="mx-auto my-5">
                <h4 class="text-center">Posts with most engagements</h4>
                    <?php
                        echo all_posts($posts);
                    ?>
                </div>
            </div>
        </div>

    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jquery -->
     <script src="js/jquery.js"></script>
  </body>
</html>
</body>
</html>