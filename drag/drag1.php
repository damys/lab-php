<?php
if($_FILES['file_upload']['error']==0){
     $uploadFileName=$_FILES['file_upload']['name'];
     $uploadFileTemp=$_FILES['file_upload']['tmp_name'];

     $uploadFileTrue='./upload/';
     move_uploaded_file($uploadFileTemp, $uploadFileTrue.$uploadFileName);
 }