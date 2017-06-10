<?php
session_start();

if (isset($_GET['page']) && !isset($_SESSION['user'])) {
    header('Location: page.php');
}
$userName = isset($_SESSION['user']) ? $_SESSION['user'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Guest book</title>

    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="page.php">Site</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="page.php?page=about.php">About</a></li>
            <li><a href="page.php?page=gallery.php">Gallery</a></li>
            <li class="active"><a href="page.php?page=guestbook.php">Guest book</a></li>
        </ul>
    </div>
</nav>
<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'logout') {
        unset($_SESSION['user']);
        include 'index.php';
    }
    else {
        include $_GET['page'];
    }
}
else {
    include 'index.php';
}
?>
</body>
</html>