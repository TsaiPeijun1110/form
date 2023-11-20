<?php

echo $_POST['name'];

if(!empty($_FILES['img']['tmp_name'])){
    echo $_FILES['img']['tmp_name'];
    echo "<br>";
    echo $_FILES['img']['name'];
    echo "<br>";
    echo $_FILES['img']['type'];
    echo "<br>";
    echo $_FILES['img']['size'];
    $tmp=explode(".",['img'] ['name']);
    $sunname=".".end($tmp);
    $filname=date("YmdHis").rand(10000,99999).
    move_uploaded_file($_FILES['img']['tmp_name'],"../imgs/".$_FILES['img'] ['name']);
    header("location:../uploade.php?img=".$filname);
}else{
    header("location:../upload.php?err=上傳失敗");
}

?>