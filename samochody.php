<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajmujemy samochody</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <header>
        <h1>Wynajem Samochodów</h1>
    </header>
    <div id="left">
        <h2>DZIŚ POLECAMY TOYOTĘ ROCZNIK 2014</h2>
        <?php skrypt1()?>
        <h2>WSZYSTKIE DOSTĘPNE SAMOCHODY</h2>
        <?php skrypt2()?>
    </div>
    <div id="mid">
        <h2>ZAMÓWIONE AUTA Z NUMERAMI TELEFONÓW KLIENTÓW</h2>
        <?php skrypt3()?>
    </div>
    <div id="right">
        <h2>NASZA OFERTA</h2>
        <ul>
            <li>Fiat</li>
            <li>Toyta</li>
            <li>Opel</li>
            <li>Mercedes</li>
        </ul>
        <p>Tu pobierzesz naszą <a href="komis.sql">bazę danych</a></p>
        <p>Autor strony:Joszczyk Hubert</p>
    </div>
</body>
</html>

<?php
    function skrypt1(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="wynajem";
        $conn=mysqli_connect($host,$user,$pass,$db);
        $sql='SELECT id,model,kolor from samochody where marka="Toyota" AND rocznik="2014"';
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res)){
            echo $row['id']." Toyota ".$row['model']." Kolor: ".$row['kolor'];
        }
        mysqli_close($conn);
    }
    function skrypt2(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="wynajem";
        $conn=mysqli_connect($host,$user,$pass,$db);
        $sql="SELECT id, marka, model, rocznik from samochody";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res)){
            echo $row['id']." ".$row['marka']." ".$row['model']." ".$row['model']." ".$row['rocznik']."<br>";
        }
        mysqli_close($conn);
    }
    function skrypt3(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="wynajem";
        $conn=mysqli_connect($host,$user,$pass,$db);
        $sql='SELECT samochody.id, model, telefon from samochody, zamowienia where samochody.id=zamowienia.Samochody_id';
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res)){
            echo $row['id']." ".$row['model']." ".$row['telefon']."<br>";
        }

        mysqli_close($conn);
    }
?>