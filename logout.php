<?php
session_start();
session_destroy();
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
    <main role="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card shadow mt-4">
                        <div class="card-body text-center">
                            <h4>Logout successfuly</h4>
                            <a href="index.php" class="btn btn-outline-primary">Go to homepage</a>
                            <a href="login.php" class="btn btn-primary">Re-login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>