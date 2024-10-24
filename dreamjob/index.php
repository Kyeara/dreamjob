<?php
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

// Fetch all users to display in the table
$users = fetchAllUsers($pdo);

// Get success or error messages
$successMessage = isset($_GET['message']) ? $_GET['message'] : '';
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>User Registration</h3>
        <?php if ($successMessage) echo "<p class='success'>$successMessage</p>"; ?>
        <?php if ($errorMessage) echo "<p class='error'>$errorMessage</p>"; ?>

        <form action="core/handleForms.php" method="POST">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" name="dateOfBirth" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" name="gender" required>
            </div>
            <div class="form-group">
                <label for="school">School</label>
                <input type="text" name="school" required>
            </div>
            <div class="form-group">
                <label for="currentCourse">Current Course</label>
                <input type="text" name="currentCourse" required>
            </div>
            <div class="form-group">
                <label for="dreamProfession">Dream Profession</label>
                <input type="text" name="dreamProfession" required>
            </div>
            <div class="form-group">
                <label for="dreamCompany">Dream Company</label>
                <input type="text" name="dreamCompany" required>
            </div>
            <div class="form-group">
                <label for="skills">Skills</label>
                <input type="text" name="skills" required>
            </div>
            <div class="form-group">
                <label for="yearOfExperience">Year of Experience</label>
                <input type="number" name="yearOfExperience" min="0" required>
            </div>
            <div class="form-group">
                <input type="submit" name="insertNewUserBtn" value="Register">
            </div>
        </form>

        <h3>Registered Users</h3>
        <table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>School</th>
                <th>Current Course</th>
                <th>Dream Profession</th>
                <th>Dream Company</th>
                <th>Skills</th>
                <th>Years of Experience</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['UserID']); ?></td>
                <td><?php echo htmlspecialchars($user['FirstName']); ?></td>
                <td><?php echo htmlspecialchars($user['LastName']); ?></td>
                <td><?php echo htmlspecialchars($user['DateOfBirth']); ?></td>
                <td><?php echo htmlspecialchars($user['Gender']); ?></td>
                <td><?php echo htmlspecialchars($user['School']); ?></td>
                <td><?php echo htmlspecialchars($user['CurrentCourse']); ?></td>
                <td><?php echo htmlspecialchars($user['DreamProfession']); ?></td>
                <td><?php echo htmlspecialchars($user['DreamCompany']); ?></td>
                <td><?php echo htmlspecialchars($user['Skills']); ?></td>
                <td><?php echo htmlspecialchars($user['YearofExperience']); ?></td>
                <td>
                    <a class="edit-btn" href="editUser.php?user_id=<?php echo $user['UserID']; ?>">Edit</a>
                    <a class="delete-btn" href="core/handleForms.php?action=delete&user_id=<?php echo $user['UserID']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
