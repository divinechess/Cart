<?php
include('db_connect.php');
if (isset($_POST['submit'])){
    $prod_name = $_POST['prodname'];
    $price = $_POST['price'];
    $img_name = $_POST['imgname'];
    $filename = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $get_ext = explode('.',$filename);
    $fileActualExt = strtolower(end($get_ext));
    $uniq_filename = uniqid('', true). "." . $fileActualExt;
    $destination = 'images/'.$uniq_filename;  //images folder from the current directory of index file


    $query = "insert into product values (NULL,' $prod_name','$price','$img_name','$uniq_filename')";
    if ($db->query($query)){
        move_uploaded_file($file_temp, $destination );
    echo "image has been moved";
    }else{
    echo "file not uploaded";
    }
    echo "<br/ >";
    echo "<br/ >";
    //var_dump($_FILES);
}
?>

<!DOCTYPE html>


<head>
    <title>Upload an image into a destination folder</title>


</head>

<body>
<header>




</header>

    <form action="update_db.php" method="POST" enctype="multipart/form-data">

        <label>Choose a product name</label>
        <input type="input" name="prodname">
        <br>
        <label>Enter price</label>
        <input type="input" name="price">
        <br>
        <label>Enter image name</label>
        <input type="input" name="imgname">
        <br>
        <label>Select image to upload</label>
        <input type="file" name="image">
         <input type="submit" name="submit" value="Upload picture">
    </form>



</body>
</html>



