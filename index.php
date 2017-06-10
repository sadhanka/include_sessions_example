<?php
if (isset($_GET['name']) && isset($_GET['pass']) && !empty($_GET['name']) && !empty($_GET['pass'])) {
    include 'usernames.txt';
    if (isset($userArray[$_GET['name']])) {
        $passMd5 = md5($_GET['pass']);
        if ($userArray[$_GET['name']] == $passMd5) {
            $_SESSION['user'] = $_GET['name'];
        }
        else {
            unset($_SESSION['user']);
        }
    }
    else {
        unset($_SESSION['user']);
    }
}

?>

<div class="bs-header">
    <div class="container">
        <h3 align="center">Site</h3>
    </div>
</div>
<div class="container">
    <?php
    if (!$userName) {
        ?>
        <form class="form-horizontal" action="page.php" method="GET" data-toggle="validator" id="form1">
            <div class="form-group">
                <label class="control-label col-sm-6" for="name">Username:</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6" for="pass">Password:</label>
                <div class="col-sm-6">
                    <input type="text" name="pass" id="pass">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                    <button type="submit" value="Submit" name="submit" class="btn btn-default btn-success">Submit
                    </button>
                    <button type="reset" value="Reset" class="btn btn-default">Reset</button>
                </div>
            </div>
        </form>
        <?php
    }
    else {
        ?>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <a href="page.php?page=logout">Logout</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>