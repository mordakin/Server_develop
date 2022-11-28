<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] .'/_helper.php';

// Если кнопка нажата, то выполняет вход
if (isset($_POST['done'])) {

    $name = htmlspecialchars($_POST['login']);
    $password = (htmlspecialchars($_POST['pass']));
    $mysqli = openmysqli();
    // Подготовка и отправка запроса
    $statement = $mysqli->query('SELECT * FROM users WHERE name = "'.$name.'" AND password = "'.$password.'";');
    
    // Есть в списке пользователей
    $mysqli->close();
    if ($statement != false && $statement->num_rows == 1) {
        $result = mysqli_fetch_assoc($statement);
        $_SESSION['count_adds']++;
        $_SESSION['login'] = $result['name'];
        $_SESSION['background_color'] = $result['ID'];
        if ($_SESSION['background_color']%2 == 0){
            $_SESSION['background_color'] = '#8B0000';
        }
        else{
            $_SESSION['background_color'] = '#FF1493';
        }
        header('Location: ' . '../admin.php');
    } else {
        header('Location: ' . '../index.html');
    }
}
