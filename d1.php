<form action="d1.php" method="get">
    wprowadz nazwe klasy:<input type='text' name="nazwak"> <br>
    <input type="submit" value="dodaj">
</form>   
<?php
error_reporting(0);

if($_SERVER['REQUEST_METHOD']== 'GET'){
    $mysqli = new mysqli("localhost","root","","szkola");
    mysqli_set_charset($mysqli, "utf8");
    mysqli_query($mysqli,"INSERT INTO klasa(nazwa) value ('".$_GET['nazwak']."')");
    mysqli_query($mysqli,"ALTER TABLE klasa auto_increment=1");
    echo "dodano klase:".$_GET['nazwak']."";
}


?>
<br>
<a href=index.php> wroc</a>