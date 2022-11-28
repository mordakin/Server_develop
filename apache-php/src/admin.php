<?php
session_start();
// require $_SERVER['DOCUMENT_ROOT'] .'/_helper.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="css/table.css" type="text/css" />
</head>

<body>
    <div id="wblock" style = 'background-color: <?php echo $_SESSION['background_color'] ?>;'>
        <h1>Список пользователей</h1>
        <?php
        require_once '_helper.php';
        $mysqli = openmysqli();
        $users = $mysqli->query('select * from ' . 'users');
        ?>
        <table cellspacing="0" , style="width:100%">
            <tr>
                <th>Номер</th>
                <th>Логин</th>
                <th>Хеш пароля</th>
            </tr>
            <?php foreach ($users as $user) {
                echo "
            <tr>
                <td>{$user['ID']}</td>
                <td>{$user['name']}</td>
                <td>{$user['password']}</td>
            </tr>
            ";
            }; 
            echo 'Количество входов '.  $_SESSION['count_adds'] .'<br>';
            echo 'Имя вошедшего '.  $_SESSION['login'] .'<br>';
            ?>
        </table>
        <br><a href="index.html">На главную</a>
        <div>
            <?php $mysqli->close(); ?>
</body>

</html>