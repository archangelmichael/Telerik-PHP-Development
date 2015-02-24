<?php
mb_internal_encoding('UTF-8');
echo '<pre>'.print_r($_POST, true).'</pre>';
$pageTitle = 'Entry Registration';
include './includes/header.php';
require './includes/groups.php';

if($_POST) {
    $username=  str_replace('!', '', trim($_POST['username']));
    $phone=str_replace('!', '', trim($_POST['phone']));
    $selectedGroup=(int)$_POST['group'];
    $error = false;

    if( mb_strlen($username) < 4) {
        echo '<p style="color:red">Name is too short</p>';
        $error = true;
    }
    
    if( mb_strlen($phone) < 6 || mb_strlen($phone) > 12) {
        echo '<p style="color:red">Invalid phone</p>';
        $error = true;
    }
    
    if( !array_key_exists($selectedGroup, $groups)) {
        echo '<p style="color:red">Invalid group selection</p>';
        $error = true;
    }
    
    if (!$error) {
        $result=$username.'!'.$phone.'!'.$selectedGroup."\n";
        if(file_put_contents('data.txt', $result, FILE_APPEND)) {
            echo 'New entry added successfully <br/>';
        }
    }
}
?>
    <a href="index.php"> Back To Address Book </a>
    <form method="POST">
        Entry Information
        <div> Name: <input type="text" name="username" /> </div>
        <div> Phone: <input type="text" name="phone" /> </div>
        <div> Group selection:
            <select name="group">
                <?php
                foreach ($groups as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }
                ?>
            </select>
        </div>
        <div> <input type="submit" value="Submit" /></div>
    </form>
<?php
include './includes/footer.php';
?>
