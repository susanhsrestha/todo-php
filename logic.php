<?php

function getTodos()
{
    $todos = json_decode(file_get_contents(__DIR__ . "/todo.json"), true);
    return $todos;
}

?>