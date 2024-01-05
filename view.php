<?php
require("./todos.php");
if(!isset($_GET['id'])) {
    echo "Not found";
    exit;
}
$todo = getTodoById($_GET["id"]);
if(!$todo) {
    echo "Not found";
    exit;
}
include(__DIR__."/partials/header.php");
?>
<div class="container">
    <br><br><br>
    <?php if($todo['finished'] == true): ?>
        <?echo '<div class="card text-white bg-success">';?>
            <? else: ?>
        <?echo '<div class="card text-white bg-primary">';?>
        <? endif; ?>
        <div class="card-header">
            TODO ITEM
        </div>
        <div class="card-footer">
            <?php echo $todo["text"]; ?>
        </div>
    </div>
</div>
<?php include(__DIR__."/partials/footer.php"); ?>