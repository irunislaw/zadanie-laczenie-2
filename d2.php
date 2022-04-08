<head>
<style>
        td{
            border:1px solid black;
            padding:5px;
        }
        table {
  border-collapse: collapse;
}
.nag{
    background-color:pink;
    color:white;
}
        </style>
</head>
<a href=index.php> wroc</a>
<form action="d2.php" method="get">
    wprowadz imie:<input type='text' name="imie"> <br>
    wprowadz nazwisko:<input type='text' name="nazwisko"> <br>
    wprowadz srednia:<input type='number' step="0.01" name="srednia"> <br>
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
$wynik = mysqli_query($mysqli,"Select * from uczen");
echo '<table style="border:black solid 1px">
    <tr><td class="nag">L.p.</td><td class="nag">Imię</td><td class="nag">Nazwisko</td><td class="nag">Średnia ocen</td><td class="nag">klasa</td></tr>
';
while($row = mysqli_fetch_array($wynik))

{
    echo "
    <tr>
    <td>".$row['id'] . "</td> <td>" . $row['Imie']."</td> <td> ".$row['Nazwisko']."</td> <td> ".$row['Srednia_ocen']."</td> </tr>"; 
    
}
echo "</table>";


if($_SERVER['REQUEST_METHOD']== 'GET'){
    $idk= $_GET['idkla'];
    $imie = $_GET['imie'];
    $nazwisko = $_GET['nazwisko'];
    $sredia = $_GET['srednia'];
    mysqli_query($mysqli,"insert into uczen (Imie , Nazwisko, Srednia_ocen, id_klasy) VALUES ('".$imie."','".$nazwisko."','".$sredia."','".$idk."')");

}


?>
<br>
