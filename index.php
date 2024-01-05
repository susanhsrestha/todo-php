<?php
include(__DIR__ . "/partials/header.php");
require(__DIR__ . "/todos.php");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data['text'] = $_POST['data'];
    if ($data['text'] == null) {
        $error['message'] = "You must write in the field to add.";
    } else {
        addTodo($data);
    }
}
$todos = getTodos();
if ($todos) {
    $todos = array_reverse(getTodos());
}
?>
<div class="container">
    <br><br><br>
    <form class="form-inline" action="" method="post" role="form">
        <div class="form-group">
            <input class="form-control" type="text" id="todo-item" name="data" placeholder="Add items">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary align-center">Add TODO</button>
        </div>
    </form>
    <?php if ($error) : ?>
        <div class="card">
            <?php echo $error["message"] ?>
        </div>
    <?php endif; ?>
    <?php if ($todos) : ?>
        <table class="table table-hover">
            <thead class="thead-light">
                <th style="width: 70%;" scope="col">Todo Item</th>
                <th style="width: 30%;" scope="col">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo) : ?>
                    <tr scope="row">
                        <td>
                            <?php if ($todo['finished']) : ?>
                                <? echo '<s>' . $todo['text'] . '</s>'; ?>
                            <? else : ?>
                                <? echo '' . $todo['text'] . ''; ?>
                            <? endif; ?>
                        </td>
                        <td>
                            <a href="view.php/?id=<?php echo $todo['id'] ?>" class="btn btn-outline-info">View</a>
                            <?php if ($todo['finished']) : ?>
                                <a href="mark.php/?id=<?php echo $todo['id'] ?>" class="btn btn-outline-secondary">Mark as Not Done</a>
                            <? else : ?>
                                <a href="mark.php/?id=<?php echo $todo['id'] ?>" class="btn btn-outline-success">Mark as Done</a>
                            <? endif; ?>
                            <a href="delete.php/?id=<?php echo $todo['id'] ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php include(__DIR__ . "/partials/footer.php"); ?>