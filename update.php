


<?php
$conn=mysqli_connect('localhost', 'root', '', 'student');
if(isset($_POST['hiddendata'])){
    $dataid=$_POST['hiddendata'];
    $firstname=$_POST['updateFirstname'];
    $lastname=$_POST['updateLastname'];
    $email=$_POST['updateEmail'];
    $password=$_POST['updatepassword'];
    $fathername=$_POST['updateFathername'];
    $phone=$_POST['updatephone'];
    $query="UPDATE student_record SET FirstName='$firstname', LastName='$lastname', Email='$email', Password='$password', FatherName='$fathername', Phone='$phone' WHERE id ='$dataid'";
$execution=mysqli_query($conn,$query);
}
?>