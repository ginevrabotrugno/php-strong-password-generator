<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
Buon lavoro!
Ps: La grafica è libera, in ogni caso vi invio lo screenshot se avete bisogno di ispirazione ;-)
PPSS: per i numeri e le lettere gestiteli voi, i caratteri speciali sono i seguenti: !?&%$<>^+-*/()[]{}@#_= -->

<?php
    $allChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?&%$<>^+-*/()[]{}@#_=';

    $min = 8;
    $max = 32;

    require_once __DIR__ . '/functions.php';


    if (isset($_GET['lunghezza']) && !empty($_GET['lunghezza'])) {
        session_start();

        $psw = generatePassword($allChars, $_GET['lunghezza']);
        $_SESSION['password'] = $psw;
        // $output = "la mia password è:" . htmlspecialchars($psw);
        header('Location: ./success.php');
    } else {
        $output = "Generare un password di lunghezza compresa fra $min e $max";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Strong Password Generator</title>
</head>
<body>
<div class="container">
        <h1>Strong Password Generator</h1>
        <h2>Genera una password sicura</h2>
        <p>
            <?php echo $output ?>
        </p>
        <form action="index.php" method="GET">
            <label for="lunghezza">Lunghezza password:</label>
            <input type="number" id="lunghezza" name="lunghezza" min="<?php echo $min ?>" max="<?php echo $max ?>">
            
            <!-- <p>Consenti ripetizioni di uno o più caratteri:</p>
            <input type="radio" id="si" name="ripetizioni" value="si" checked>
            <label for="si">Sì</label>
            <input type="radio" id="no" name="ripetizioni" value="no">
            <label for="no">No</label>
            
            <div>
                <input type="checkbox" id="lettere" name="lettere">
                <label for="lettere">Lettere</label>
                <input type="checkbox" id="numeri" name="numeri">
                <label for="numeri">Numeri</label>
                <input type="checkbox" id="simboli" name="simboli">
                <label for="simboli">Simboli</label>
            </div> -->
            
            <button type="submit">Invia</button>
            <button type="reset">Annulla</button>
        </form>
    </div>
</body>
</html>