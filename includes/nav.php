<?php if (isset($_SESSION['USER'])) : ?>
    <?php echo "salut " . $_SESSION['USER']['username']; ?>
    <a href="./Utilisateur/deconnexion.php">DECO</a>
<?php endif; ?>