<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <section id="baner1">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="baner2">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
            </ol>
        </section>
    </header>
    <main>
        <?php
            $db = mysqli_connect("localhost","root","","dane2");
            $sql = "SELECT nazwa,ilosc,opis,cena,zdjecie FROM `produkty` WHERE Rodzaje_id IN(1,2)";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($result)){
                echo "<div id='skrypt'>";
                echo "<img src='{$row['zdjecie']}' alt='warzywniak'";
                echo "<h5>{$row['nazwa']}</h5>";
                echo "<p>opis: {$row['opis']}</p>";
                echo "<p>na stanie: {$row['ilosc']}</p>";
                echo "<h2>{$row['cena']} zł</h2>";
                echo "</div>";
            }
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="post">
            <label for="nazwa">Nazwa:</label>
            <input type="text" name="nazwa">
            <label for="cena">Cena:</label>
            <input type="number" name="cena">
            <button>Dodaj produkt</button>
        </form>
        <?php
        if (!empty($_POST['nazwa']) && !empty($_POST['cena'])) {
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            $sql2 = "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', $cena, 'owoce.jpg')";
            $result2 = mysqli_query($db,$sql2);
        }
        mysqli_close($db);
    ?>
        Stronę wykonał: 00000000000
    </footer>
   
</body>
</html>