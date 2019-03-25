<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking System CMS</title>
    <link rel="stylesheet" href="<?php echo url('/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('/assets/css/back.css'); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
                <a class="navbar-brand" href="<?php echo url('/dashboard');?>">Booking System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">States</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Districts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bookings</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo url('/assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo url('/assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo url('/assets/js/back.js');?>"></script>
</body>
</html>