<?php
include_once "db-php";
if (isset($_GET['id'])) {
    $file = find('files', $_GET['id']);
} else {
    exit();
}
?>

<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯檔案</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="header">編輯檔案</h1>
    <!----建立你的表單及設定編碼----->
    <?php
    if (isset($_GET['err'])) {
        echo $_GET['err'];
    }
    ?>
    <div class="text-center"><a href="manage.php">回列表</a></div>
    <form action="./api/edit_file.php" method="post" enctype="multipart/form-data">
        <div class="col-6 mx-auto"></div>
        <table class="table">
            <tr>
                <td>媒體</td>
                <td>
                    <?php
                    switch ($file['type']) {
                        case "image/webp":
                        case "image/jpeg":
                        case "image/png":
                        case "image/gif":
                        case "image/bmp":
                            $imgname = "./imgs/" . $file['name'];
                            break;
                        case 'msword':
                            $imgname = "./icon/wordicon.png";
                            break;
                        case 'msexcel':
                            $imgname = "./icon/msexcel.png";
                            break;
                        case 'msppt':
                            $imgname = "./icon/msppt.png";
                            break;
                        case 'pdf':
                            $imgname = "./icon/pdf.png";
                        break;
                        default:
                            $imgname = "./icon/other.png";
                    }

                    ?>
                    <img src="<?= $imgname; ?>" style="width:300px;250px"><br>
                    <input type="file" name="img" value="">
                </td>
            </tr>
            <tr>
                <td>檔名</td>
                <td><input type="text" name="name" value="<?= $file['name']; ?>"></td>
            </tr>
            <tr>
                <td>說明</td>
                <td><textarea name="desc" id="" style="width:350px;height:200px"><?= $file['desc']; ?></textarea>
            </tr>
        </table>
        <div class="text-center m-3">
            <input type="hidden" name="id" value="<?= $file['id']; ?>">
            <input type="subbit" value="" 更新>

        </div>

        <input type="file" name="img" id="">
        <input type="text" name="desc" value="" placeholder="請輸入檔案描述">
        <input type="submit" value="更新">
    </form>




    <!----建立一個連結來查看上傳後的圖檔---->
    <?php

    if (isset($_GET['img'])) {
        echo "<img src='./imges/{$_GET['img']}' style='width:250px;height:150px'>";
    }
    ?>

</body>

</html>