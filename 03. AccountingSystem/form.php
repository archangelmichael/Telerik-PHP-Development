<?php
mb_internal_encoding('UTF-8');
// echo '<pre>'.print_r($_POST, true).'</pre>';
$pageTitle = 'Expenses Registration';
include './includes/header.php';
require './includes/groups.php';

if($_POST) {
    $product=  str_replace('!', '', trim($_POST['productName']));
    $price= floatval(str_replace(',', '.', $_POST['price']));
    $selectedGroup=(int)$_POST['group'];
    $error = false;

    if( mb_strlen($product) < 4) {
        echo '<p style="color:red">Name is too short</p>';
        $error = true;
    }
    
    if( $price <= 0) {
        echo '<p style="color:red">Invalid price</p>';
        $error = true;
    }
    
    if( !array_key_exists($selectedGroup, $groups)) {
        echo '<p style="color:red">Invalid group selection</p>';
        $error = true;
    }
        
    if (!$error) {
        $currentDate = date("Y-m-d h:i:sa");
        $result=$currentDate.'!'.$product.'!'.$price.'!'.$selectedGroup."\n";
        if(file_put_contents($filePath, $result, FILE_APPEND)) {
            echo 'New expenses added successfully <br/>';
        }
    }
}
?>
    <a href="index.php"> Back To Address Book </a>
    <form method="POST">
        Expenses Addition
        <div> Name: <input type="text" name="productName" /> </div>
        <div> Price: <input type="text" name="price" /> </div>
        <div> Group selection:
            <select name="group">
                <?php
                foreach ($groups as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
                ?>
            </select>
        </div>
        <div> <input type="submit" value="Add" /></div>
    </form>
<?php
include './includes/footer.php';
?>
