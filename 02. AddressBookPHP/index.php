<?php
$pageTitle = 'Address Book';
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
                echo '<option value="'.$key.'">'.$value.'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Get Entries From Selected Group" />
    </form>
    <div id="foo" ></div>
    <table  border="1" >
        <tr>
            <td> Date Added </td>
            <td> Name </td>
            <td> Phone </td>
            <td> Group </td>
            <td> Edit </td>
            <td> Delete </td>
        </tr>
        <?php
        if (file_exists($filePath)) {
            $selectedGroup = 0;
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
                        '<td>'.$value['phone'].'</td>'.
                        '<td>'.$value['groupName'].'</td>'.
                        '</tr>';
                }
            }
        }
        ?>
    </table>
<?php
include './includes/footer.php';
?>
