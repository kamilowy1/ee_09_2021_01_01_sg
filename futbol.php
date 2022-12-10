<!DOCTYPE html>
<head> 
    <meta charset="utf-8"/>
    <html lang="pl">
        <title> Rozgrywki futbolowe</title>
        <link rel="stylesheet" type="text/css" href="styl.css"/>

</head>
<body>

<div id="baner">
<h2> Światowe rozgrywki piłkarskie </h2>
<img src="obraz1.jpg" alt="boisko"/>
</div>

       <div id="mecze">
        <?php
        //polaczenie
        $server = "localhost";
        $user = "root";
        $passwd = "";
        $dbname = "egzamin1";

        $conn = mysqli_connect($server,$user,$passwd,$dbname);
        /*
        if (!$conn) {
            die ("fatal error".mysqli_error($conn));
        } echo "jest okej";
        */

        //pobranie danych z bazy
        $zapytanie = 'SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1= "EVG"';

        $sql = mysqli_query($conn,$zapytanie);
        while ($wynik = mysqli_fetch_row($sql)) {
            echo "<div class='pojemniki'>";
            echo "<h3>" .$wynik[0]. "-" .$wynik[1]."</h3>";
            echo "<h4>" .$wynik[2]. "</h4>";
            echo "<p>" ."w dniu:" .$wynik[3]. "</p>";
            echo "</div>";
        }

        ?>
       </div>
          
           <div id="główny">
            <h2> Reprezentacja Polski</h2>
           </div>

               <div id="lewy">
                <p> Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy) </p>
                <form action="futbol.php" method="post">
                    <input type="number" id="numer" name="numer"/>
                    <button type="submit" name="sprawdz">Sprawdź</button>
                </form>
                <?php
                
                if (!empty($_POST['numer'])) {
                    $poz = $_POST["numer"];
                    $zapytanie2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id='$poz'; ";
                    $sql2 = mysqli_query($conn,$zapytanie2);
        
                
                while ($wynik2 = mysqli_fetch_row($sql2)) {
                    echo "<ul>";
                    echo "<li>".$wynik2[0]. " ". $wynik2[1]."</li>";
                    echo "</ul>";
                }
            }

                ?>
               </div>

                  <div id="prawy">
                   <img src="zad1.png" alt="piłkarz"/>
                   <p> Autor:000000000</p>
                  </div>


</body>
</html>