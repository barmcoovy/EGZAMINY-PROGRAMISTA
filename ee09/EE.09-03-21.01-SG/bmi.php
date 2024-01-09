<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="wzor.png" alt="wzór BMI">
        </div>
        <div id="baner">
            <h1>Oblicz swoje BMI</h1>
        </div>
        <div id="glowny">
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost","root","","egzamin");
                    $sql = "SELECT informacja,wart_min,wart_max FROM bmi";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['informacja']}</td>";
                        echo "<td>{$row['wart_min']}</td>";
                        echo "<td>{$row['wart_max']}</td>";
                        echo "</tr>";
                    }
                    mysqli_close($db);
                ?>
            </table>
        </div>
    </header>
    <main>
        <div id="lewy">
            <h2>Podaj wagę i wzrost</h2>
            <form action="bmi.php" method="POST">
                <label for="waga">Waga:</label>
                <input type="number" name="waga" min="1"><br>
                <label for="wzrost">Wzrost w cm:</label>
                <input type="number" name="wzrost" min="1"><br>
                <button type="submit">Oblicz i zapamiętaj wynik</button>
            </form>
            <?php
                $db = mysqli_connect("localhost","root","","egzamin");
                if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['waga']) and isset($_POST['wzrost'])){
                    $waga = $_POST['waga'];
                    $wzrost = $_POST['wzrost'];
                    $bmi = $waga/($wzrost*$wzrost) * 10000;
                    echo "Twoja waga: ". $waga ;
                    echo "  Twój wzrost: ". $wzrost."<br>";
                    echo "BMI wynosi: ".$bmi;
                    $bmi_id=0;
                    if($bmi>0 and $bmi<18){
                        $bmi_id = 1;
                    }
                    if($bmi>19 and $bmi<25){
                        $bmi_id = 2;
                    }
                    if($bmi>26 and $bmi<30){
                        $bmi_id = 3;
                    }
                    if($bmi>31 and $bmi<100){
                        $bmi_id = 4;
                    }
                    $czas = date("Y-m-d");
                    $sql = "INSERT INTO `wynik` (`bmi_id`, `data_pomiaru`, `wynik`) VALUES ('$bmi_id', '$czas', '$bmi')";
                    $wynik = mysqli_query($db, $sql);
                    mysqli_close($db);
                }else{
                    header("Location: bmi.php");
                }}
            ?>
        </div>
        <div id="prawy">
            <img src="rys1.png" alt="ćwiczenia">
        </div>
    </main>
    <footer>Autor: 00000000000 <a href="kwerendy.txt">Zobacz kwerendy</a></footer>
</body>
</html>