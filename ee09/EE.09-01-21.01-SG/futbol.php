<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
    <section id="mecze">
        <?php
            $db = mysqli_connect("localhost","root","","egzamin");
            $sql ="SELECT zespol1,zespol2,wynik,data_rozgrywki FROM `rozgrywka` WHERE zespol1 = 'EVG' ";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){
                echo "<section id='informacja'><h3>{$row['zespol1']} - {$row['zespol2']}</h3>";
                echo "<h4>{$row['wynik']}</h4>";
                echo "<p>w dniu: {$row['data_rozgrywki']}</p></section>";
            }
        ?>
    </section>
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
    <section id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy
            , 3-pomocnicy, 4-napastnicy)</p>
        <form action="futbol.php" method="POST">
            <input type="number" name="pozycja">
            <button type="submit">Sprawdź</button>
        </form>
        <ul>
            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" and !empty($_POST['pozycja'])){
                    $pozycja = $_POST["pozycja"];
                    $sql2 = "SELECT imie,nazwisko FROM `zawodnik`WHERE pozycja_id = $pozycja";
                    $result2 = mysqli_query($db,$sql2);
                    while($row = mysqli_fetch_array($result2)){
                        echo "<li><p>{$row['imie']} {$row['nazwisko']}</p></li>";
                    }                    
                }
                mysqli_close($db);
            ?>
        </ul>
    </section>
    <section id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 00000000000</p>
    </section>
</body>
</html>