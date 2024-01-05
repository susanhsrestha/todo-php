<?php
include(__DIR__ . "/includes/header.php");
require(__DIR__ . "/logic.php");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
}
$todos = getTodos();
?>
<div class="container">
    <br><br><br>
    <form class="form-group" action="" method="post">
        <input type="text" id="todo-item" name="todo-item">
        <div>
            <button type="submit">Add TODO</button>
        </div>
    </form>
    <?php foreach ($todos as $key => $value): ?>
        <div class="card">
            <?php echo $value['text'] ?>
        </div>
    <?php endforeach; ?>
</div>
<?php include(__DIR__ . "/includes/footer.php"); ?>