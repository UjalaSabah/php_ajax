




<?php
$conn=mysqli_connect('localhost', 'root', '', 'student');
extract($_POST);
if(isset($_POST['Firstname']) && isset($_POST['Lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['Fathername']) && isset($_POST['phone'])){
$query="insert INTO student_record SET FirstName='$Firstname',LastName='$Lastname',Email='$email',	Password='$password',FatherName='$Fathername',Phone='$phone'";
$execution=mysqli_query($conn,$query);
if($execution)
 {
    header('Location: index.php?msg=success');
    exit();
 }else
 {
    header('Location:index.php?msg=failed');
 }
}

?>