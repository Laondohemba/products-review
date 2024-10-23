<?php
    require_once "includes/add.admin.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Admin | Add Admin</title>
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
    <!-- create post -->
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
                    <li><a href="admin.dashboard.php">Posts</a></li>
                    <li><a href="admin.createpost.php">Create Posts</a></li>
                    <li><a href="admin.createpost.php">Edit Sections</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- post form -->
      <div class="my-container">
        <div class="post-form-container">
            <form action="includes/add.admin.handler.php" method="post">
                <h5 class="mt-3">Add admin</h5>

                <label for="Username" class="form-label mt-3">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $formData['username'] ?? ''; ?>">
                <p class="text-danger"><?php echo $adminErrors["username_error"]  ?? ''; ?></p>

                <label for="email" class="form-label mt-3">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $formData['email'] ?? ''; ?>">
                <p class="text-danger"><?php echo $adminErrors["email_error"]  ?? ''; ?></p>
                
                <label for="phone" class="form-label mt-3">Phone Number</label>
                <input type="number" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $formData['phone'] ?? ''; ?>">
                <p class="text-danger"><?php echo $adminErrors["phone_error"]  ?? ''; ?></p>
                
                <label for="role" class="form-label mt-3">Role</label>
                <select name="role" class="form-select">
                    <option value="">Choose Role</option>
                    <option value="chief admin">Chief Admin</option>
                    <option value="publisher">Publisher</option>
                </select>
                <p class="text-danger"><?php echo $adminErrors["role_error"]  ?? ''; ?></p>

                <label for="password" class="form-label mt-3">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                <p class="text-danger"><?php echo $adminErrors["password_error"]  ?? ''; ?></p>
                
                <button class="my-btn w-100 my-3" type="submit">Add Admin</button>
            </form>
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