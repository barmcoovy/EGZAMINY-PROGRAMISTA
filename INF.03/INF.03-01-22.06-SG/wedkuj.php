<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="lewy-1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
                $db = mysqli_connect("localhost","root","","wedkowanie");
                $sql = "SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo FROM `ryby` 
                INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj =3";
                $result = mysqli_query($db,$sql);
                while($row = mysqli_fetch_array($result)){
                    echo "<li>{$row['nazwa']} pływa w rzecze
                    {$row['akwen']}, {$row['wojewodztwo']}</li>";
                }
            ?>
        </ol>
    </div>
    
    <div id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="lewy-2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                $sql2 = "SELECT id, nazwa, wystepowanie FROM `ryby` WHERE styl_zycia =1";
                $result2 = mysqli_query($db,$sql2);
                while($row = mysqli_fetch_array($result2)){
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nazwa']}</td>";
                    echo "<td>{$row['wystepowanie']}</td>";
                    echo "</tr>";
                }
                mysqli_close($db);
            ?>
        </table>
    </div>
    <footer>
        <p>Stronę wykonał: 00000000000 </p>
    </footer>
</body>
</html>