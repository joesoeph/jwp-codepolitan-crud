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
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="login-action.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputUsername">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername" aria-describedby="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>