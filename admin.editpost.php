<?php
    
    session_start();
    require_once "includes/login.handler.view.php";

    if(!isset($admin)){
        header("Location: admin.login.php");
        exit();
    }
    if(isset($_SESSION["edit"])){
        $edit_post = $_SESSION["edit"];
        unset($_SESSION["edit"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Admin | Edit Post</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- my css -->
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/images.css">
     <link rel="stylesheet" href="css/admin.css">
     <!-- font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- jquery css -->
     <link rel="stylesheet" href="css/richtext.min.css">
     <!-- summernote -->
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- admin dashboard header-->
    <header>
        <div class="navbar">
            <div class="navbrand">
                <a href="index.php">View live website</a>
            </div>
            <div class="toggle_container">
                <button class="favicon-icon" id="nav_icon" type="button">
                    <i class="fa fa-navicon" style="font-size:30px"></i>
                </button>
                <ul class="nav_items">
                    <li><a href="admin.dashboard.php" class="my-list-item">Posts</a></li>
                    <li><a href="admin.createpost.php" class="my-list-item">Create Posts</a></li>
                    <li><a href="#" class="my-list-item">Edit Sections</a></li>
                    <li id="settings"><a href="#" class="my-list-item">Settings</a>
                    <div class="settings-list" id="settings_list">
                        <ul class="mt-3 py-3">
                            <li class="mt-2"><a href="admin.add.php">Add Admin</a></li>
                            <li class="mt-2"><a href="#">Change Password</a></li>
                            <li class="mt-2"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    </li>
                    <li class="text-white ms-4">Admin <?php echo ucwords($admin['username']) ?? ''; ?> </li>
                </ul>
            </div>
        </div>
    </header>

        <!-- post form -->
        <div class="my-container">
        <div class="post-form-container">
            <form action="includes/admin.createpost.handler.php" method="post" enctype="multipart/form-data">
                <h5 class="mt-3">Create Post</h5>

                <select class="form-select" name="posttype">
                    <option value="">Select Type</option>
                    <option value="normal" <?php echo isset($edit_post['type']) && $edit_post['type'] === 'normal' ? 'selected' : ''; ?>>Normal</option>
                    <option value="Special" <?php echo isset($edit_post['type']) && $edit_post['type'] === 'Special' ? 'selected' : ''; ?>>Special</option>
                </select>

                <!-- Display error message -->
                <p class="text-danger"><?php echo $postErrors['post_type_error'] ?? ''; ?></p>


                <label for="title" class="form-label mt-3">Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $edit_post['title'] ?? ''; ?>">
                <p class="text-danger"><?php echo $postErrors["title_error"]  ?? ''; ?></p>

                <label for="displayimage" class="form-label mt-3">Cover Image</label>
                <input type="file" class="form-control" placeholder="image" name="displayimage" value="<?php echo $edit_post['displayimage'] ?? ''; ?>">
                <p class="text-danger"><?php echo $postErrors["image_error"]  ?? ''; ?></p>

                <label for="description" class="form-label mt-3">Sales pitch</label>
                <input type="text" class="form-control" placeholder="Sales Pitch" name="description" value="<?php echo $edit_post['description'] ?? ''; ?>">
                <p class="text-danger"><?php echo $postErrors["sales_pitch"]  ?? ''; ?></p>

                <label for="title" class="form-label mt-3">Affiliate Link</label>
                <input type="text" class="form-control" placeholder="Affiliate Link" name="affiliate_link" value="<?php echo $edit_post['affiliate_link'] ?? ''; ?>">
                <p class="text-danger"><?php echo $postErrors["affiliate_link"]  ?? ''; ?></p>

                <label for="review" class="form-label mt-3">Post Text</label>
                <textarea type="text" class="form-control" id="summernote" placeholder="Post Text" name="post">
                    <?php echo $edit_post['post'] ??''; ?>
                </textarea>
                <p class="text-danger"><?php echo $postErrors["post_error"]  ?? ''; ?></p>

                <!-- Hidden input to ensure category[] always exists -->
                <input type="hidden" name="category[]" value="">
                <div class="form-check mt-3 align-self-start">
                    <p>Category</p>

                    <input class="form-check-input" type="checkbox" value="Household" id="flexCheckDefault" name="category[]" <?php echo (isset($edit_post['category']) && in_array('Household', $edit_post['category'])) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Household
                    </label>

                </div>
                <div class="form-check mt-3 align-self-start">
                    <input class="form-check-input" type="checkbox" value="Office" id="flexCheckChecked" name="category[]"<?php echo (isset($edit_post['category']) && in_array('Office', $edit_post['category'])) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexCheckChecked">
                        Office
                    </label>
                </div>
                <p class="text-danger"><?php echo $postErrors["category_error"]  ?? ''; ?></p>
                <button class="my-btn w-100 my-3" type="submit">Publish Post</button>
            </form>
        </div>
      </div>   

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jquery -->
     <script src="js/jquery.js"></script>
     <script src="js/main.js"></script>

     <!-- summernote -->
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
     <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
     </script>
  </body>
</html>
</body>
</html>