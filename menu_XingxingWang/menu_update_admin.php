<?php
include '../layout/header.php';
include 'db_wxx.php';
$a = $_GET['item_id'];
$result = mysqli_query($conn,"SELECT * FROM menu_items WHERE item_id= '$a'");
$row= mysqli_fetch_array($result);
?>

<h1>Update  Data</h1>
<form method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
First Name: <br>
<input type="text" name="fname"  value="<?php echo $row['fname']; ?>">
<br>
Last Name :<br>
<input type="text" name="lname" value="<?php echo $row['lname']; ?>">
<br>
City:<br>
<input type="text" name="city" value="<?php echo $row['city']; ?>">
<br>
Group ID:<br>
<select name="groupid"> 
    <option value="BBCAP19"> BBCAP19 </option>
    <option value="BBCAP20"> BBCAP20 </option>
    <option value="BBCAP21"> BBCAP21 </option>
    <option value="Others"> Others </option>
</select>
<br>

<input type="submit" name="submit" value="Submit" >
</form>
<?php 
if(isset($_POST['submit'])){
    # it now updates only fname, your task is to update all other fields in your team
    $fname = $_POST['fname'];
    $query = mysqli_query($conn,"UPDATE menu_items set fname='$fname' where id='$a'");
    if($query){
        echo "Record Modified Successfully <br>";
        echo "<a href='update.php'> Check your updated List </a>";
        // if you want to redirect to update page after updating
        //header("location: update.php");
    }
    else { echo "Record Not modified";}
    }

    
$conn->close();
include '../layout/footer.php';
?>