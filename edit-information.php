<?php 
session_start();
if(!$_SESSION){
    header('Location:index.php');
    exit();
}

include('connection.php');

$id = $_GET['id'];

if(!$id)
    header('Location:profile.php');

$query = mysqli_query($connect,"SELECT * FROM users WHERE id='$id' LIMIT 1");
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simple Blog - Codepolitan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Dependencies -->
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="index.php">Simple Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <?php if(!$_SESSION) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php endif; ?>

                    <?php if($_SESSION) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $_SESSION['username'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group mt-4">
                        <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
                        <a href="posts.php" class="list-group-item list-group-item-action">Posts</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h4>Profile - Change information</h4>
                        </div>
                        <div class="card-body">
                            <form action="update-information-action.php" method="POST">
                                <input type="hidden" name="id" value=<?php echo $results[0]['id']?>>
                                <div class="form-group">
                                    <label for="exampleInputUsername">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername" value="<?php echo $results[0]['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullname">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" id="exampleInputFullname" value="<?php echo $results[0]['fullname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBirth">Date of birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" id="exampleInputBirth" value="<?php echo $results[0]['date_of_birth'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword3">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male"  value="<?php $results[0]['gender'] == 'Male' ? 'selected' : null ?>">Male</option>
                                        <option value="Female" value="<?php $results[0]['gender'] == 'Female' ? 'selected' : null ?>">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAvatarURL">Avatar URL</label>
                                    <input type="text" name="avatar_url" class="form-control" id="exampleInputAvatarURL" value="<?php echo $results[0]['avatar_url'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword3">Short Bio</label>
                                    <textarea class="form-control" name="short_bio"><?php echo $results[0]['short_bio'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>