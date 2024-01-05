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
updateStatus($_GET["id"]);
header("Location: ..");
?>