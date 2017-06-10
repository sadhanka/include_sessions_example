<?php
include 'func.php';
$output = $msg = '';

$dirName = 'img/' . $userName;

if (!empty($_FILES['img'])) {
    $n = getImgNumber($dirName);
    move_uploaded_file($_FILES['img']['tmp_name'], 'img/'. $userName . '/' . ++$n . '.jpg');
}
if (!file_exists('img/' . $userName)) {
    mkdir('img/' . $userName);
}

$output = getUserPhotos($dirName, $userName);
?>
<div class="bs-header">
    <div class="container">
        <h3 align="center">Gallery</h3>
    </div>
</div>
<div class="container">
    <div><?=$output;?></div>
    <form class="form-horizontal" action="page.php?page=<?=basename(__FILE__)?>" method="POST" data-toggle="validator" id="form1" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-4" for="text">Your photo:</label>
            <div class="col-sm-4">
                <input type="file" name="img" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" value="Submit" name="submit" class="btn btn-default btn-success">Submit</button>
                <button type="reset" value="Reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </form>
</div>

