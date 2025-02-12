<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD with AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">PHP CRUD with Bootstrap, AJAX, and jQuery</h1>

        <!-- Button to Open Add Modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>

        <!-- Users Table -->
        <div id="usersTable">
            <!-- Table will be loaded here using AJAX -->
        </div>
    </div>

    <!-- Add User Modal -->
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addUserForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- First Name -->
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Father's Name -->
                        <div class="mb-3">
                            <label for="fatherName" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="fatherName" name="fatherName" required>
                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="addUser()">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Update User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editUserForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editUserId" name="id">
                        <div class="mb-3">
                            <label for="editFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="editFirstName" name="FirstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="editLastName" name="LastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editPassword" name="Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFatherName" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="editFatherName" name="FatherName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editPhone" name="Phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateDetails()">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script>
    // Display function
    function DisplayData() {
        var displaydata = "true";
        $.ajax({
            url: "display.php",
            type: "POST",
            data: {
                displaySend: displaydata
            },
            success: function(data, status) {
                $('#usersTable').html(data);
            }
        });
    }

    // Add user function
    function addUser() {
        var firstnameAdd = $('#firstName').val();
        var lastnameAdd = $('#lastName').val();
        var emailAdd = $('#email').val();
        var passwordAdd = $('#password').val();
        var fathernameAdd = $('#fatherName').val();
        var phoneAdd = $('#phone').val();

        $.ajax({
            url: "userdata.php",
            type: "POST",
            data: {
                Firstname: firstnameAdd,
                Lastname: lastnameAdd,
                email: emailAdd,
                password: passwordAdd,
                Fathername: fathernameAdd,
                phone: phoneAdd,
            },
            success: function(data, status) {
                $('#editUserForm')[0].reset(); // Clear the edit form
                $('#addUserModal').modal('hide'); // Hide modal
                DisplayData(); // Reload data
            }
        });
    }

    // Initialize data display on page load
    $(document).ready(function() {
        DisplayData();
    });
    // Delete User Record
    function DeleteUser(deleteid) {
        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                deletesend: deleteid
            },
            success: function(data, status) {
                DisplayData();
            }
        });
    }

    function Edituser(editid) {
        // Set the user ID in a hidden input field for later use
        $('#editUserId').val(editid);

        // Send an AJAX POST request to the server to fetch user data
        $.ajax({
            url: "edit.php", // Server-side script that processes the request
            type: "POST", // HTTP method
            data: {
                EditID: editid // Send the user ID as POST data
            },
            success: function(response) {
                // Try to process the server's response
                try {
                    const userData = JSON.parse(response); // Convert the JSON string to an object

                    // Check if the server returned an error
                    if (userData.error) {
                        alert(userData.error); // Show the error message to the user
                        return; // Stop execution
                    }

                    // Fill the form fields in the modal with the fetched user data
                    $('#editFirstName').val(userData.FirstName);
                    $('#editLastName').val(userData.LastName);
                    $('#editEmail').val(userData.Email);
                    $('#editPassword').val(userData.Password);
                    $('#editFatherName').val(userData.FatherName);
                    $('#editPhone').val(userData.Phone);

                    // Display the modal to the user
                    $('#editUserModal').modal('show');
                } catch (error) {
                    // Handle any errors that occur during response parsing
                    console.error("Error parsing response:", error);
                    alert("There was an error fetching the user data. Please try again.");
                }
            }
        });
    }

    function updateDetails() {
        var editFirstName = $('#editFirstName').val();
        var editLastName = $('#editLastName').val();
        var editEmail = $('#editEmail').val();
        var editPassword = $('#editPassword').val();
        var editFatherName = $('#editFatherName').val();
        var editPhone = $('#editPhone').val();
        var editUserId = $('#editUserId').val();


        $.ajax({
            url: "update.php",
            type: "POST",
            data: {
                updateFirstname: editFirstName,
                updateLastname: editLastName,
                updateEmail: editEmail,
                updatepassword: editPassword,
                updateFathername: editFatherName,
                updatephone: editPhone,
                hiddendata: editUserId
            },
            success: function(data, status) {
                $('#editUserModal').modal('hide'); // Hide modal
                DisplayData(); // Reload data
            }
        });
    }
    </script>
</body>

</html>