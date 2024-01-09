<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id='baner'>
        <div id="pierwszy">
            <img src="zad5.png" alt="logo lotnisko">
        </div>
        <div id="drugi">
            <h1>Przyloty</h1>
        </div>
        <div id="trzeci">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz kwerendy</a>
        </div>
    </section>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $db = mysqli_connect("localhost","root","","egzamin2");
                $sql = "SELECT czas,kierunek,nr_rejsu,status_lotu FROM przyloty ORDER BY `przyloty`.`czas` ASC";
                $wynik= mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($wynik)) {
                    echo "<tr>";
                    echo"<td>{$row['czas']}</td>";
                    echo"<td>{$row['kierunek']}</td>";
                    echo"<td>{$row['nr_rejsu']}</td>";
                    echo"<td>{$row['status_lotu']}</td>";
                    echo "</tr>";
                }
                mysqli_close($db);
            ?>
        </table>
    </main>
    <section id="footer">
        <div id="jeden">
            <?php
                setcookie("cookie",time() + 7200);
                if(isset($_COOKIE['cookie'])){
                    echo "<p style='font-style: italic '>Witaj ponownie na stronie lotniska</p>";
                }else{
                    echo "<p style='font-weight: bold'>Dzień dobry strona lotniska używa ciasteczek</p>";
                }
            ?>
        </div>
        <div id="dwa">
            Autor: 000000000
        </div>
    </section>
</body>
</html>