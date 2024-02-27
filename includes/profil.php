
<div class="main-content">
<?php
session_start();
if (!isset($user['id'])) {
    echo "CETTE UTILISATEUR EXISTE PAS";
}
?>
<img src="<?php echo $path . $user['profile_picture'] ?>" alt="">
</div>