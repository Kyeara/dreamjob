USE dreamjob; -- Make sure to select the correct database

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    DateOfBirth DATE,
    Gender VARCHAR(50),
    School VARCHAR(50),
    CurrentCourse VARCHAR(50),
    DreamProfession VARCHAR(50),
    DreamCompany VARCHAR(255),
    Skills VARCHAR(255),
    YearofExperience INT,
    DateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
