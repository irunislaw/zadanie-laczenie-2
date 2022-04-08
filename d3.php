<form action="d3.php" method="get">
    wprowadz imie wychowawcy:<input type='text' name="imie"> <br>
    wprowadz nazwisko wychowawcy <input type="text" name="nazwisko" id=""> <br>
    <?php 
    error_reporting(0);
    $mysqli = new mysqli("localhost","root","","szkola");
    mysqli_set_charset($mysqli, "utf8");
    $wynik = mysqli_query($mysqli,"select id,nazwa from klasa");
    echo 'wybierz klase:';
    echo "<select name='idkla'>";
    while($row = mysqli_fetch_array($wynik)){
        echo '<option value="'.$row['id'].'">'.$row['nazwa'].'</option>';
    }

    
    
    ?>
    <input type="submit" value="dodaj">
</form>   
<?php
error_reporting(0);

if($_SERVER['REQUEST_METHOD']== 'GET'){
    $mysqli = new mysqli("localhost","root","","szkola");
    mysqli_set_charset($mysqli, "utf8");
    
    mysqli_query($mysqli,"INSERT INTO wychowawca(imie,nazwisko,id_klasy) value ('".$_GET['imie']."','".$_GET['nazwisko']."','".$_GET['idkla']."')");
    mysqli_query($mysqli,"ALTER TABLE klasa auto_increment=1");
   
}


?>
<br>
<a href=index.php> wroc</a>