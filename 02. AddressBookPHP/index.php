<?php
$pageTitle = 'Address Book';
include './includes/header.php';
require './includes/groups.php';
?>
    <a href="form.php"> Add Contact </a>
    <table  border="1" >
        <tr>
            <td> Name </td>
            <td> Phone </td>
            <td> Group </td>
        </tr>
        <?php
        if (file_exists('data.txt')) {
            $contactsInfo = file('data.txt');
            foreach ($contactsInfo as $key => $value) {
                $columns = explode('!', $value);
                echo '<tr>'.
                    '<td>'.$columns[0].'</td>'.
                    '<td>'.$columns[1].'</td>'.
                    '<td>'.$groups[trim($columns[2])].'</td>'.
                    '</tr>';
            }
        }
        ?>
    </table>
<?php
include './includes/footer.php';
?>
