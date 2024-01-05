<?php
function getTodos()
{
    $todos = json_decode(file_get_contents(__DIR__ . "/todo.json"), true);
    return $todos;
}

function getTodoById($id) {
    $todos = getTodos();
        foreach ($todos as $todo) {
            if( $todo['id'] == $id ) {
                return $todo;
            }
        }
        return null;
}

function addTodo($todo) {
    $todos = json_decode(file_get_contents(__DIR__ . "/todo.json"), true);
    if($todos) {
        $newid = end($todos)['id'] + 1;
        $todo['id'] = $newid;
        $todo['finished'] = false;
        array_push($todos, $todo);
            $jsonData = json_encode($todos);
        file_put_contents(__DIR__ . "/todo.json", $jsonData);    
    } else {
        $jsonData = json_encode(array(array('id' => 1, 'text' => $todo['text'], 'finished' => false)));
        file_put_contents(__DIR__ . "/todo.json", $jsonData);
    }
}

function updateStatus($id) {
    $todos = getTodos();
    foreach ($todos as $key => $todo) {
            if( $todo['id'] == $id ) {
                //echo "<pre>".var_dump($todos[$key]['finished'])."</pre>";
                if($todos[$key]['finished'] == false) {
                    $todos[$key]['finished'] = true;
                } else {
                    $todos[$key]['finished'] = false;
                }
            }
        }
    $jsonData = json_encode($todos);
    file_put_contents(__DIR__ . '/todo.json', $jsonData);
}

function deleteTodo($id) {
    $todos = getTodos();
    foreach ($todos as $key => $todo) {
            if( $todo['id'] == $id ) {
                unset($todos[$key]);
            }
        }
    $jsonData = json_encode($todos);
    file_put_contents(__DIR__ . '/todo.json', $jsonData);
}

?>