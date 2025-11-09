<?php
session_start();
include("dbconnect.php");
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="fitzone.css" />
    <title>Fitzone Fitness Center</title>
  </head>
  <body>
    
        <nav>
      <ul class="nav__links">
        <li class="link"><a href="Fitzone.html">Home</a></li>
        <li class="link"><a href="#explore">Appointments</a></li>
        <li class="link"><a href="#inquiry">Inquiry</a></li>
        <li class="link"><a href="#contact">Contact Us</a></li>
      </ul>
      <a href="logout.php"button class="btn"  target="_blank">Logout</a>
      <button style="margin-right: 100px;"></button>
    </nav>

      <section id="home">
        <header class="section__container header__container">
        
          <div class="header__content">
            <span class="bg__blur"></span>
            <span class="bg__blur header__blur"></span>
            <h4>Welcome back to</h4>
            <h1><span>User Profile</span> <?php echo $_SESSION["user"]; ?>!</h1>
            <p>
                Manage your appointments with ease —
                You can add, view, update, or cancel appointments anytime.
                Need help? Send us a message through the inquiry option!
            </p>
            
          </div>
          <div class="header__image">
            <img src="images\header.png" alt="header" />
          </div>
        </header></section>

        <section id="explore">
            <section class="section__container explore__container">
              <div class="explore__header">
                <h2 class="section__header">Manage Appointment</h2>
                <div class="explore__nav">
                
                </div>
              </div>
        
              <div class="explore__grid">
                <div class="explore__card">
                    <h4>Add Appointment</h4>
                    <p>
                      Designed for individuals, our program offers an effective approach
                      to gaining weight in a sustainable manner.
                    </p>
                    <a href="book_class.php">Click here<i class="ri-arrow-right-line"></i></a>
                  </div>
                <div class="explore__card">
                  <h4>View Appointment</h4>
                  <p>
                    Embrace the essence of strength as we delve into its various
                    dimensions physical, mental, and emotional.
                  </p>
                  <a href="view_appointment.php">Click here<i class="ri-arrow-right-line"></i></a>
                </div>
                <div class="explore__card">
                  <h4>Update Appointment</h4>
                  <p>
                    It encompasses a range of activities that improve health, strength,
                    flexibility, and overall well-being.
                  </p>
                  <a href="update_appointment.php">Click here<i class="ri-arrow-right-line"></i></a>
                </div>
                <div class="explore__card">

                  <h4>Cancel Appointment</h4>
                  <p>
                    Through a combination of workout routines and expert guidance, we'll
                    empower you to reach your goals.
                  </p>
                  <a href="view_appointment.php">Click here<i class="ri-arrow-right-line"></i></a>
                </div>
                
              </div>
            </section>
</section>
<section id="trainers">
    <section class="section__container trainer__container">
        <div class="trainers__header">
          <h2 class="section__header">Trainers</h2>
          <div class="trainers__nav">
          
          </div>
        </div>
    <div class="trainers__card">
        <h4>View Trainers</h4>
        <p>
          Through a combination of workout routines and expert guidance, we'll
          empower you to reach your goals.
        </p>
        <a href="view_trainer.php">Click here<i class="ri-arrow-right-line"></i></a>
      </div>
</section>

<section id="inquiry">
    <section class="section__container inquiry__container">
        <div class="inquiry__header">
          <h2 class="section__header">Make Inquiry</h2>
          <div class="inquiry__nav">
          
          </div>
        </div>

        <div class="login-container">
            <h2>Inquiry</h2>
            <form class="login-form" >
                <div class="input-group">
                    <input type="text" placeholder="Full name" required>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Phone number" required>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" required>
                </div>
                
                <div class="input-group">
                    <input type="Text" placeholder="Message" required>
                </div>
                <button type="submit" class="login-btn">Submit</button>
                
            </form>
        </div>
      
</section>
    