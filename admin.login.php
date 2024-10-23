<?php
    require_once "includes/login.handler.view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Review | Admin | Login</title>
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

    <!-- admin login -->
    <div class="login-form-container">
        <form action="includes/admin.login.handler.php" method="post">
            <p class="mt-3">Admin Dashboard</p>
            <h3>Login to continue</h3>
            <label for="username" class="form-label mt-3">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
            <p class="text-danger"><?php echo $loginError["username_error"] ?? ''; ?></p>

            <label for="password" class="form-label mt-3">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password">
            <p class="text-danger"><?php echo $loginError["login_error"] ?? ''; ?></p>

            <button class="my-btn w-100 my-3" type="submit">Login</button>
        </form>
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