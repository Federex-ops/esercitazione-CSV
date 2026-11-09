<?php
    $file = fopen("log.csv", "r");
    if(!$file){ // Equivale a $file === false
        die("Errore nell'apertura del file");
        // die($msg) interrompe l'esecuzione dello script 
        // viene stampato a schermo il messaggio $msg
    }
    // Non mi serve avere un ramo else perchè in caso di errore
    // Lo script viene interrotto a riga 4

    // Apertura della struttura della tabella HTML
    echo "<table border='1' cell-spacing='0' cell-padding='5'>";

    // Se il file esiste e viene aperto correttamente:
    while(!feof($file)){ // feof($file) === false
        $row = fgets($file);

        // Ignora eventuali righe vuote alla fine del file
        if (trim($row) === '') {
            continue;
        }

        // Divido la riga in un array usando la virgola come separatore
        $data = explode(",", $row);

        // Apro la riga della tabella
        echo "<tr>";

        // Ciclo su ciascun elemento dell'array per creare le celle <td>
        foreach ($data as $cell) {
            // htmlspecialchars evita problemi con caratteri speciali o tag script
            echo "<td>" . htmlspecialchars(trim($cell)) . "</td>";
        }

        // Chiudo la riga della tabella
        echo "</tr>";
        // Questo ciclo viene eseguito finchè il file ha dei contenuti da leggere
    }

    // Chiudo la tabella HTML
    echo "</table>";

    fclose($file);
?>