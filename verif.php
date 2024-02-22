<?php
if (!isset($_POST['register'])) {
    return;
} else {
    include('database.php');
    $verif = new functions;
    $VerifBasique = $verif->verification_utilisateur_bot();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="verif_bot">Taper <?php echo $VerifBasique ?> :</label>
        <input type="text" name="verif_bot" id="verif_bot">
        <input type="hidden" name="hidden_verif" value="<?php echo $VerifBasique ?>">
        <input type="submit" value="Verifier">
    </form>
</body>

</html>