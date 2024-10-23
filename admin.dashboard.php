<?php
    require_once "includes/login.handler.view.php";
    require_once "includes/admin_posts_handler.php";
    require_once "includes/edit_posts_handler.php";

    $admin_posts = fetch_admin_posts($pdo);
    // deny access if not logged in
    if(!isset($admin)){
        header("Location: admin.login.php");
        exit();
    }

    $title = "";
    if(isset($_POST["edit"])){
        $title = $_POST["post_title"];
        $_SESSION["edit"] = edit_post($pdo, $title);
        header("Location: admin.editpost.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Admin | Dashboard</title>
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
      <div class="my-container">
        <table class="table table-primary">
            <tr>
                <th>Title</th>
                <th>Date Publised</th>
                <th>Admin</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php
                foreach($admin_posts as $admin_post){?>
                    <tr>
                        <td><?php echo $admin_post["title"]; ?></td>
                        <td><?php echo $admin_post["created_at"]; ?></td>
                        <td><?php echo ucwords($admin_post["admin"]); ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" value="<?php echo $admin_post["title"]; ?>" name="post_title">
                                <button class="btn btn-secondary" name="edit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php  }
            ?>
        </table>
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