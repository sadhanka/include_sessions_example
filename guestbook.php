<?php
ob_start();
include 'func.php';

$output = $msg = '';
$forbiddenWords[] = 'кака';
$forbiddenWords[] = 'дупа';

$dirName = 'guest_book/';
if (isset($_REQUEST['text']) && isset($_GET['name'])) {
    if ($_POST['text'] != '' && $_GET['name'] != '' && isCorrectFilename($_GET['name']) && !issetForbiddenWords($_GET['text'], $forbiddenWords)) {
        $filename = $dirName . $_GET['name'] . '.txt';
        $text = $_GET['text'];
        $text = strip_tags($text, '<b>');
        file_put_contents($filename, $text);
    }
}
elseif (issetForbiddenWords($_GET['text'], $forbiddenWords)) {
    $msg = 'Forbidden words were found!';
}

if (!isCorrectFilename($_GET['name'])) {
    $msg = !empty($msg) ? $msg . '<br>Type latin leters in Name input!' : 'Type latin leters in Name input!';
}

$output = getUserTexts($dirName);
ob_end_clean();
?>
<div class="bs-header">
    <div class="container">
        <h3 align="center">Guest book</h3>
    </div>
</div>
<div class="container">
    <div><?=$output;?></div>
    <form class="form-horizontal" action="<?=basename(__FILE__)?>" method="GET" data-toggle="validator" id="form1">
        <div class="form-group">
            <label class="control-label col-sm-4" for="text">Leave a comment:</label>
            <div class="col-sm-4">
                <textarea name="text"></textarea>
            </div>
        </div>
        <?=$msg;?>
        <div class="form-group">
            <label class="control-label col-sm-4" for="text">Your name:</label>
            <div class="col-sm-4">
                <?=$userName?>
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