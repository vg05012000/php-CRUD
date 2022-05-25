<?php
    include('Config/db.php');
    if(ISSET($_POST['filter'])){
        $class=$_POST['class'];
 
        $query=$db->query( 'SELECT * FROM lol WHERE class=' . $class) or die('Error: ' . mysqli_error($db));
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['name']."</td><td>".$fetch['class']."</td></tr>";
        }
    }else if(ISSET($_POST['reset'])){
        $query=mysqli_query($db, "SELECT * FROM champions") or die(mysqli_error($db));
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['name']."</td><td>".$fetch['class']."</td></tr>";
        }
    }else{
        $query=mysqli_query($db, "SELECT * FROM champions") or die(mysqli_error($db));
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['name']."</td><td>".$fetch['class']."</td></tr>";
        }
    };




?>

<?php
if (! empty($_POST['country'])) {
    ?>
<table cellpadding="10" cellspacing="1">

    <thead>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Gender</strong></th>
            <th><strong>Country</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
    $query = "SELECT * from tbl_user";
    $i = 0;
    $selectedOptionCount = count($_POST['country']);
    $selectedOption = "";
    while ($i < $selectedOptionCount) {
        $selectedOption = $selectedOption . "'" . $_POST['country'][$i] . "'";
        if ($i < $selectedOptionCount - 1) {
            $selectedOption = $selectedOption . ", ";
        }
        
        $i ++;
    }
    $query = $query . " WHERE country in (" . $selectedOption . ")";
    
    $result = $db_handle->runQuery($query);
}
if (! empty($result)) {
    foreach ($result as $key => $value) {
        ?>
        <tr>
            <td><div class="col" id="user_data_1">
                    <?php echo $result[$key]['Name']; ?>
                </div></td>
            <td><div class="col" id="user_data_2">
                    <?php echo $result[$key]['Gender']; ?>
                </div></td>
            <td><div class="col" id="user_data_3">
                    <?php echo $result[$key]['Country']; ?>
                </div></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>
<?php
	}
?>



