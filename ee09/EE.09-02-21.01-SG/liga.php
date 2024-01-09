<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <section id="baner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </section>
    <section id='bloki'>
    <section id="lewy">
        <form action="liga.php" method="post">
            <select name="pozycja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <button type="submit">Zobacz</button>
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 00000000000</p>
        
    </section>
    <section id="prawy">
        <ol>
        <?php
            $db = mysqli_connect("localhost","root","","egzamin");
            if($_SERVER['REQUEST_METHOD']=='POST'){
            $pozycja = $_POST['pozycja'];
            $sql = "SELECT imie,nazwisko FROM `zawodnik` WHERE pozycja_id = $pozycja";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){
                echo"<li>{$row['imie']} {$row['nazwisko']}</li>";
            }
        }
        ?>
        </ol>
    </section>
    </section>
    <main>
        <h3>Liga mistrzów</h3>
    </main>
    <section id="liga">
        <?php
            $sql2="SELECT zespol,punkty,grupa FROM `liga` ORDER BY punkty DESC";
            $result2 = mysqli_query($db, $sql2);
            while($row = mysqli_fetch_assoc($result2)){
                echo "<div id='druzyna'><h2>{$row['zespol']}</h2>";
                echo "<h1>{$row['punkty']}</h1>";
                echo "<p>grupa: {$row['grupa']}</p></div>";
            }
            mysqli_close($db);
        ?>
    </section>
</body>
</html>