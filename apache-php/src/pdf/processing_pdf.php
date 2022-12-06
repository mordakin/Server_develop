<?php

if($_FILES['file']){
    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/pdf/a/';
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $a  = $_FILES['file']['name'];
    if ($ext != "pdf") {
        echo "Это не pdf файл!!! Выберите  pdf для загрузки";
    } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir.$a)) {
            exec('file ' . $uploaddir.$a, $ext);
            $status = strripos($ext[0], 'pdf doc');
            if ($status == True){
                echo "Файл корректен и был успешно загружен.\n";
            }
            else {
                $temp = array();
                exec('rm ' . $uploaddir.$a, $temp);
                echo "Вы загружаете файл с расширением pdf, но на самом деле его расширение: ";
                echo mb_substr($ext[0], strripos($ext[0], ': ') + 2) . "</h3>";
                echo "<h3>Не пытайтесь нас обмануть и выберите  pdf для загрузки!</h3>";
            }
            
        }
        else {
            echo "Ошибочная загадка...\n";
        }
    }
}