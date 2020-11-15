<?php
session_start();

include "connection.php";

$query = mysqli_query($connect, "SELECT * FROM posts");
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $_SESSION['username'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
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
                        <div class="card-header d-flex justify-content-between">
                            <h4>Posts</h4>
                            <a href="create-post.php" class="btn btn-primary">Create a post</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover border">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($results as $result) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $result['title'] ?></td>
                                        <td>
                                            <a href="edit-post.php?id=<?php echo $result['id'] ?>" class="text-primary px-1">Edit</a>
                                            <a href="delete-post-action.php?id=<?php echo $result['id'] ?>" class="text-danger px-1" onclick="return confirm('Apa Anda Yakin?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<?php if(isset($_GET['msg']) && $_GET['msg'] === 'true') : ?>
<script>
    swal({
        title: "Good job!",
        text: "Process Success!",
        icon: "success",
        button: false,
        timer: 1000
    });
</script>
<?php endif; ?>

<?php if(isset($_GET['msg']) && $_GET['msg'] === 'false') : ?>
<script>
    swal({
        title: "Failed!",
        text: "Process Fail!",
        icon: "error",
        button: false,
        timer: 1000
    });
</script>
<?php endif; ?>    

</html>