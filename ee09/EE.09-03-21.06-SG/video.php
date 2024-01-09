<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section class="baner">
        <div class="baner-lewo">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div class="baner-prawo">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </section>
    <section id="lista-polecamy">
        <h3>Polecamy</h3>
        
        <?php
            $db = mysqli_connect("localhost","root","","dane3");
            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25)";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                echo "<div class='php'>";
                echo "<h4>{$row['id']} {$row['nazwa']}</h4>";
                echo "<br>";
                echo "<img src='{$row['zdjecie']}' alt='film'>";
                echo "<br>";
                echo "<p>{$row['opis']}</p></div>";
            }
        ?>
        
    </section>
    <section id="lista-fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            $sql = "SELECT id,nazwa,opis,zdjecie FROM `produkty` WHERE Rodzaje_id = '12'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)){
                echo "<div class='php'>";
                echo "<h4>{$row['id']}. {$row['nazwa']}</h4>";
                echo "<br>";
                echo "<img src='{$row['zdjecie']}' alt='film'>";
                echo "<br>";
                echo "<p>{$row['opis']}</p></div>";
            }
        ?>
    </section>
    <footer>
        <form action="video.php" method="post">
            <label for="id">Usuń film nr.:</label>
            <input type="number" name="id">
            <button type="submit">Usuń film</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $sql = "DELETE FROM `produkty` WHERE id = $id";
            mysqli_query($db, $sql);}
            mysqli_close($db);
        ?>
        Stronę wykonał:<a href="mailto:ja@poczta.com">barmc</a>
    </footer>
</body>
</html>