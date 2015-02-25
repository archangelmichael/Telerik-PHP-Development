<?php
include 'header.php';

if($_POST) {
    // print_r($_FILES);
    if (count($_FILES)> 0) {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],
                'uploads'.DIRECTORY_SEPARATOR.$_FILES['fileToUpload']['name'])) {
            echo 'File Successfully downloaded';
        } 
        else {
            echo 'Error While Uploading';
        }
    }

    // echo '<pre>'.print_r($_FILES, true).'</pre>';
}
else {
    echo 'No POST made';
}
?>

<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php 
include 'footer.php'
?>
        
    
