<?php
    require_once "includes/posts.handler.php";
    $posts = $_SESSION["posts"];

    if(isset($_POST["single_post"])){
        $_SESSION["id"] = $_POST["id"];
        // $title = $_POST["id"]["title"];
        header("Location: posts.php?title=");
        // exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Home</title>
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
                    <li><a href="#" class="my-list-item">Home</a></li>
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

    <!-- welcome -->
    <div class="my-container">
        <div class="welcome-container text-center text-white p-5">
            <h3>Welcome to the home of unbiased product reviews</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus repudiandae atque eius iure praesentium quaerat temporibus illo quae quasi molestiae dicta, ipsum fugiat laudantium distinctio suscipit corrupti dolor officiis saepe quos ad. Rem laboriosam, aperiam odio deserunt eos laudantium? Consequatur adipisci aliquam cupiditate eius. Exercitationem in dolor animi aliquid maxime?</p>
        </div>
  </div>

    <div class="my-container">
        <h3 class="text-center display-2 ">Most Recent Reviews</h3>
        <div class="row">
                <div class="mx-auto my-5">
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