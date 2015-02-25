<?php
$pageTitle = 'Accounting Book';
include './includes/header.php';
require './includes/groups.php';
require './includes/tableDataSorting.php';
if ($_POST) {
    $selectedGroup = 0;
    $selectedGroup = (int) $_POST['filter'];
}
?>
    <a href="form.php"> Add Contact </a>
    <form method="post">
        <select name="filter">
            <?php
            foreach ($groups as $key => $value) {
                echo '<option ';
                if ($selectedGroup == $key) {
                    echo ' selected ';
                }
                
                echo ' value="'.$key.'">'.$value.'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Filter By Selected Group" />
    </form>
    <div id="foo" ></div>
    <table  border="1" >
        <tr>
            <td> Date </td>
            <td> Name </td>
            <td> Price </td>
            <td> Group </td>
            <td> Edit </td>
            <td> Delete </td>
        </tr>
        <?php
        if (file_exists($filePath)) {
            $selectedGroup = 0;
            $sum = 0;
            if ($_POST) {
                $selectedGroup = (int) $_POST['filter'];
            }
            $contactsInfo = getEntriesFromFile($filePath, $groups, $selectedGroup);
            
            if (empty($contactsInfo)) {
                echo '<tr> <td colspan="6">No entries in this group </td></tr>';
            }
            else {
                //print_r($contactsInfo);
                foreach ($contactsInfo as $key => $value) {
                    echo '<tr>'.
                        '<td>'.$value['date'].'</td>'.
                        '<td>'.$value['name'].'</td>'.
                        '<td>'.$value['price'].'</td>'.
                        '<td>'.$value['groupName'].'</td>'.
                        '</tr>';
                    $sum += $value['price'];
                }
                
                echo '<tr>'.
                        '<td>...</td>'.
                        '<td>Total Costs</td>'.
                        '<td>'.number_format($sum, 2, '.', ',').'</td>'.
                        '<td>Euro</td>'.
                        '</tr>';
            }
        }
        ?>
    </table>
<?php
include './includes/footer.php';
?>
