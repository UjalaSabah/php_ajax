<?php
$conn = mysqli_connect("localhost", "root", "", "student");

if (isset($_POST['displaySend'])) {
    echo '<table class="table table-bordered">';
    echo '<thead><tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>FatherName</th>
            <th>Phone</th>
            <th>Actions</th>
          </tr></thead>';
    echo '<tbody>';
    $query = "SELECT * FROM student_record";
    $exec = mysqli_query($conn, $query);

    while ($record = mysqli_fetch_assoc($exec)) {
        echo '<tr>';
        echo '<td>' . $record['id'] . '</td>';
        echo '<td>' . $record['FirstName'] . '</td>';
        echo '<td>' . $record['LastName'] . '</td>';
        echo '<td>' . $record['Email'] . '</td>';
        echo '<td>' . $record['Password'] . '</td>';
        echo '<td>' . $record['FatherName'] . '</td>';
        echo '<td>' . $record['Phone'] . '</td>';
        echo '<td>
             <button class="btn btn-warning btn-sm editUserBtn" onclick="Edituser('. $record['id'] .')">Edit</button>
             <button class="btn btn-danger btn-sm deleteUserBtn" onclick="DeleteUser('. $record['id'] .')">Delete</button>
           </td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}
?>
