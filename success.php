<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Password Generated</title>
</head>
<body>
<div class="container">
        <h1>Password Generata</h1>
        <p>La tua password sicura è:</p>
        <div class="password">
            <?php
                // Qui puoi inserire il codice per generare la password
                // Per ora, mostreremo una password di esempio
                echo "EsempioPassword123!";
            ?>
        </div>
        <button onclick="window.location.href='index.php'">Genera Nuova Password</button>
    </div>
</body>
</html>