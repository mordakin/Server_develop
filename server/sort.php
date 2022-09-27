<!-- http://localhost:8088/sort.php?array=1,2,3,0,4,0 -->
<!DOCTYPE html>
<html lang="ru">

<!-- ?array=5,3,2,5,8,1,0 -->

<head>
    <meta charset="UTF-8">
    <title>Сортировка</title>
    <style>
        body {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <?php

        //Сортировка слиянием
    function mergeSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }
    
        $left  = array_slice($arr, 0, (int)($count/2));
        $right = array_slice($arr, (int)($count/2));
    
        $left = mergeSort($left);
        $right = mergeSort($right);
    
        return merge($left, $right);
    }
    
    function merge(array $left, array $right) {
        $ret = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                array_push($ret, array_shift($left));
            } else {
                array_push($ret, array_shift($right));
            }
        }
    
        array_splice($ret, count($ret), 0, $left);
        array_splice($ret, count($ret), 0, $right);
    
        return $ret;
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        // Массив
        echo "<p>Массив</p>";
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";

        // Отсортированный массив
        echo "<p>Отсортированный массив</p>";
        $array = mergeSort($array);
        echo "<p>[";
        echo implode(", ", $array);
        echo "]</p>";
    } else {
        echo '<p>Отсутствует переменная: ?array=</p>';
    }

    ?>
</body>

</html>