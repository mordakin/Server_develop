<div>
<form enctype="multipart/form-data" action="./processing_pdf.php" method="POST">
    <input name="file" type="file" />
    <input type="submit" value="Отправить" />
</form>
</div>
<h1>Загруженные файлы:</h1>
<?php
        $scanned_directory = array_diff(scandir('./a'), array('..', '.'));
        if (count($scanned_directory) > 0) {
            foreach ($scanned_directory as $file) {
                echo "<a class='filelink' href='./a/" . $file . "'>" . $file . "</a><br>";
            }
        }
        ?>