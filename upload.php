<?php

if(isset($_FILES['imageToUpload'])){
  move_uploaded_file($_FILES['imageToUpload']['tmp_name'], "assets/save_image_user/". $_FILES['imageToUpload']['name']);
}
else{
    echo "image not found!";
}
 
?>