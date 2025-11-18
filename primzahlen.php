<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primzahl & Logarithmus-Berechnung</title>
</head>
<body>

<h2>Primzahlberechnung</h2>
<!--Eingabe einer Zahl -->
<form method="POST">
    <label>Zahl eingeben:</label>
    <input type="number" name="primzahl" required>
    <button type="submit">Berechnen</button>
</form>

<?php
function istPrimZahl($zahl) {       //Überprüfung, ob eine Zahl eine Primzahl ist
    if ($zahl < 2) return false;          //kleiner 2 // keine Primzahlen
    for ($i = 2; $i <= sqrt($zahl); $i++) {     //ob durch 2 bis eingegeben zahl teibar ist 
        if ($zahl % $i == 0) return false; // Teilbar → keine Primzahl
    }
    return true; // Keine Teiler gefunden → Primzahl
}


if (isset($_POST["primzahl"])) {            //if eine Zahl vom Formular gesendet wurde
    $zahl = intval($_POST["primzahl"]); // Eingabe sichern

    echo "<h3>Ergebnis:</h3>";

    if (istPrimZahl($zahl)) {
        echo "$zahl ist eine Primzahl.<br><br>";
    } else {
        echo "$zahl ist KEINE Primzahl.<br><br>";
    }

    // Alle Primzahlen der zahl ausgeben
    echo "<strong>Alle Primzahlen $zahl:</strong><br>";
    for ($i = 2; $i <= $zahl; $i++) {
        if (istPrimZahl($i)) echo $i . "<br>";
    }
}
?>
<h2>Logarithmische Funktion</h2>
<!-- Eingabe logarithmischen Darstellung -->
<form method="POST">
    <label>welcher Zahl soll die Logarithmus berechnen?</label>
    <input type="number" name="log_limit" required>
    <button type="submit">Anzeigen</button>
</form>
<?php
if (isset($_POST["log_limit"])) {       // ob eine zahl für log gegeben wurde 
    $limit = intval($_POST["log_limit"]); // Eingabe sichern

    // Schleife von 1 bis zahl die man ein gibt wird ausgerechnet 
    for ($x = 1; $x <= $limit; $x++) {
        $log = log($x);              // Logarithmus ln(x)
        $sterne = round($log * 3);   // Anzahl Sterne *3 für Sichtbarkeit 

        for ($i = 0; $i < $sterne; $i++) {  // Ausgabe in Sterne
            echo "*";
        }
        echo "<br>"; // Zeilenumbruch für nächste Zahl
    }
}
?>
</body>
</html>
