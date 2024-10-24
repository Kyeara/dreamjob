<?php
require_once 'dbConfig.php';

function insertUser($pdo, $firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience) {
    $sql = "INSERT INTO Users (FirstName, LastName, DateOfBirth, Gender, School, CurrentCourse, DreamProfession, DreamCompany, Skills, YearofExperience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience]);
}

function fetchAllUsers($pdo) {
    $sql = "SELECT * FROM Users";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($pdo, $userId) {
    $sql = "SELECT * FROM Users WHERE UserID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($pdo, $userId, $firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience) {
    $sql = "UPDATE Users SET FirstName = ?, LastName = ?, DateOfBirth = ?, Gender = ?, School = ?, CurrentCourse = ?, DreamProfession = ?, DreamCompany = ?, Skills = ?, YearofExperience = ? WHERE UserID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$firstName, $lastName, $dateOfBirth, $gender, $school, $currentCourse, $dreamProfession, $dreamCompany, $skills, $yearOfExperience, $userId]);
}

function deleteUser($pdo, $userId) {
    $sql = "DELETE FROM Users WHERE UserID = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$userId]);
}
?>
