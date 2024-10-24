<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

// Handle Insert New User
if (isset($_POST['insertNewUserBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $dateOfBirth = trim($_POST['dateOfBirth']);
    $gender = trim($_POST['gender']);
    $school = trim($_POST['school']);
    $currentCourse = trim($_POST['currentCourse']);
    $dreamProfession = trim($_POST['dreamProfession']);
    $dreamCompany = trim($_POST['dreamCompany']);
    $skills = trim($_POST['skills']);
    $yearOfExperience = trim($_POST['yearOfExperience']);

    // Ensure all fields are filled
    if (!empty($firstName) && !empty($lastName) && !empty($dateOfBirth) && !empty($gender) && 
        !empty($school) && !empty($currentCourse) && !empty($dreamProfession) && 
        !empty($dreamCompany) && !empty($skills) && !empty($yearOfExperience)) {
        
        // Call the function to insert a new user
        if (insertUser($pdo, $firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience)) {
            header("Location: ../index.php?message=User added successfully!");
        } else {
            header("Location: ../index.php?error=Failed to add user.");
        }
        exit();
    } else {
        header("Location: ../index.php?error=All fields must be filled in.");
        exit();
    }
}

// Handle Edit User
if (isset($_POST['editUserBtn'])) {
    $userID = $_POST['user_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $dateOfBirth = trim($_POST['dateOfBirth']);
    $gender = trim($_POST['gender']);
    $school = trim($_POST['school']);
    $currentCourse = trim($_POST['currentCourse']);
    $dreamProfession = trim($_POST['dreamProfession']);
    $dreamCompany = trim($_POST['dreamCompany']);
    $skills = trim($_POST['skills']);
    $yearOfExperience = trim($_POST['yearOfExperience']);

    // Ensure all fields are filled
    if (!empty($userID) && !empty($firstName) && !empty($lastName) && !empty($dateOfBirth) && 
        !empty($gender) && !empty($school) && !empty($currentCourse) && !empty($dreamProfession) && 
        !empty($dreamCompany) && !empty($skills) && !empty($yearOfExperience)) {
        
        // Call the function to update the user
        if (updateUser($pdo, $userID, $firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience)) {
            header("Location: ../index.php?message=User updated successfully!");
        } else {
            header("Location: ../index.php?error=Failed to update user.");
        }
        exit();
    } else {
        header("Location: ../index.php?error=All fields must be filled in.");
        exit();
    }
}

// Handle Delete User
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $userID = $_GET['user_id'];

    if (!empty($userID)) {
        // Call the function to delete the user
        if (deleteUser($pdo, $userID)) {
            header("Location: ../index.php?message=User deleted successfully!");
        } else {
            header("Location: ../index.php?error=Failed to delete user.");
        }
    } else {
        header("Location: ../index.php?error=Invalid user ID.");
    }
    exit();
}
?>
