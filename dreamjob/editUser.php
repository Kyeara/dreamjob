<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$user = null;
if (isset($_GET['user_id'])) {
    $user = getUserById($pdo, $_GET['user_id']);
    if (!$user) {
        die("User not found!");
    }
} else {
    die("Invalid user ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h3>Edit User Information</h3>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $user['UserID']; ?>">
        <p><label for="firstName">First Name</label> <input type="text" name="firstName" value="<?php echo $user['FirstName']; ?>" required></p>
        <p><label for="lastName">Last Name</label> <input type="text" name="lastName" value="<?php echo $user['LastName']; ?>" required></p>
        <p><label for="dateOfBirth">Date of Birth</label> <input type="date" name="dateOfBirth" value="<?php echo $user['DateOfBirth']; ?>" required></p>
        <p><label for="gender">Gender</label> <input type="text" name="gender" value="<?php echo $user['Gender']; ?>" required></p>
        <p><label for="school">School</label> <input type="text" name="school" value="<?php echo $user['School']; ?>" required></p>
        <p><label for="currentCourse">Current Course</label> <input type="text" name="currentCourse" value="<?php echo $user['CurrentCourse']; ?>" required></p>
        <p><label for="dreamProfession">Dream Profession</label> <input type="text" name="dreamProfession" value="<?php echo $user['DreamProfession']; ?>" required></p>
        <p><label for="dreamCompany">Dream Company</label> <input type="text" name="dreamCompany" value="<?php echo $user['DreamCompany']; ?>" required></p>
        <p><label for="skills">Skills</label> <input type="text" name="skills" value="<?php echo $user['Skills']; ?>" required></p>
        <p><label for="yearOfExperience">Years of Experience</label> <input type="number" name="yearOfExperience" min="0" value="<?php echo $user['YearofExperience']; ?>" required></p>
        <p><input type="submit" name="editUserBtn" value="Update"></p>
    </form>
    <p><a href="index.php">Back to Dashboard</a></p>
</body>
</html>
