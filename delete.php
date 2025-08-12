<?php
$conn=mysqli_connect('localhost', 'root', '', 'student');
if(isset($_POST['deletesend']))
{
    $ID=$_POST['deletesend'];
    $query="DELETE FROM student_record WHERE id='$ID'";
    $execution=mysqli_query($conn,$query);
}
if($execution)
 {
    header('Location: index.php?msg=success');
    exit();
 }else
 {
    header('Location:../index.php?msg=failed');
 }
?>