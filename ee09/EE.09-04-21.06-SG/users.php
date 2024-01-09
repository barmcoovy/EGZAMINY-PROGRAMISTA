<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <section id='baner'>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </section>
    <section id="lewy">
        <h4>Użytkownicy</h4>
       
        <?php
            $db = mysqli_connect('localhost','root','','dane4');
            
            $sql = 'SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;';
            $result = mysqli_query($db, $sql);
            $teraz = date('Y');
            while ($row = mysqli_fetch_array($result)){
               
               echo $row['id']. ". " . $row['imie'] ." ". $row['nazwisko']. ", " . $teraz -  $row['rok_urodzenia'] . " lat" ;
               echo "<br>";
            }
        ?></ol>
        <a href="settings.html">Inne ustawienia</a>
    </section>
    <section id="prawy">
        <h4>Podaj id użytkownika</h4>
        <form action="users.php" method="POST">
            <input type="number" name="id">
            <button type="submit">ZOBACZ</button>
            <hr>
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $id = $_POST['id'];
                $sql = "SELECT osoby.id, osoby.imie AS 'imie', osoby.nazwisko AS 'nazwisko', 
                osoby.zdjecie AS 'img', osoby.rok_urodzenia AS 'rok',osoby.opis AS 'opis', 
                hobby.nazwa AS'nazwa' FROM `osoby` INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id  ='$id'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                    echo "<h2>$id. {$row['imie']} {$row['nazwisko']}</h2>";
                    echo "<img src='{$row['img']}' alt='$id'>";
                    echo  "<p>Rok urodzenia: {$row['rok']}</p>";
                    echo  "<p>Opis: {$row['opis']}</p>";
                    echo  "<p>Hobby: {$row['nazwa']}</p>";
                }
                mysqli_close($db); 
            }
               
            ?>
        </form>
    </section>
    <footer>Stronę wykonał: 00000000000</footer>
</body>
</html>