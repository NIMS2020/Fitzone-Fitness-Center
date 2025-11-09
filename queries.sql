/* ----------    register---------*/
CREATE TABLE coustemers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role ENUM('coustemer','staff') NOT NULL,
    password VARCHAR(255) NOT NULL
);

/* ----------    login--------------*/
CREATE TABLE coustemers_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

/* ----------    admin/staff login--------------*/
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') NOT NULL
);

/*------------------book a class-----------------*/
CREATE TABLE class_bookings (
    fullname VARCHAR(100),
    email VARCHAR(100),
    phonenumber VARCHAR(20),
    booking_date DATE,
    booking_time TIME,
    trainer VARCHAR(100),
    gender ENUM('Male','Female'),
    age ENUM('child','teenage','middleage','after55'),
    class ENUM('Individual Strength Training','Individual Physical Fitness','Individual Fat loss','Individual Weight gain',
    'Group Strength Training','Group Physical Fitness','Group Fat loss','Group Weight gain','Neutrition councelling-Individual',
    'Neutrition councelling-Group'),
    message TEXT
);

/*------------------add trainer-----------------*/
CREATE TABLE add_trainer (
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Phone_Number VARCHAR(20) NOT NULL,
    Experience INT(10) NOT NULL,
    Profile_image VARCHAR(255)
    
);

