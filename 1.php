
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
<body>
<?php    
$mysqli = new mysqli("localhost","root","","szkola");
mysqli_set_charset($mysqli, "utf8");
$wynik = mysqli_query($mysqli,"Select * from uczen");
echo '<table style="border:black solid 1px">
    <tr><td class="nag">L.p.</td><td class="nag">Imię</td><td class="nag">Nazwisko</td><td class="nag">Średnia ocen</td> </tr>
';
while($row = mysqli_fetch_array($wynik))

{
    echo "
    <tr>
    <td>".$row['id'] . "</td> <td>" . $row['Imie']."</td> <td> ".$row['Nazwisko']."</td> <td> ".$row['Srednia_ocen']."</td> </tr>"; 
    
}
echo "</table>";
$wynik2 = mysqli_query($mysqli,"Select avg(Srednia_ocen) as wynik from uczen");
while($row = mysqli_fetch_array($wynik2))
{
    echo 'Średnia klasy:'.round($row["wynik"],3);
}
?>
</body>
</html>

