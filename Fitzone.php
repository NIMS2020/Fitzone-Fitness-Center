<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="fitzone.css" />
    <title>Fitzone Fitness Center</title>
</head>
<body>
    <nav>
        <ul class="nav__links">
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#program">Programs</a></li>
            <li class="link"><a href="#service">Services</a></li>
            <li class="link"><a href="#about">About Us</a></li>
            <li class="link"><a href="#contact">Contact Us</a></li>
        </ul>
        <?php
        // Check if user is logged in
        session_start();
        if(isset($_SESSION['user_id'])) {
            echo '<a href="logout.php" class="btn">Logout</a>';
            echo '<span class="welcome-message">Welcome, '.$_SESSION['username'].'</span>';
        } else {
            echo '<a href="login.php" class="btn" target="_blank">Login</a>';
        }
        ?>
        
        <button style="margin-right: 100px;"></button>
    </nav>

    <section id="home">
        <header class="section__container header__container">
            <div class="header__content">
                <span class="bg__blur"></span>
                <span class="bg__blur header__blur"></span>
                <h4>BEST FITNESS IN THE TOWN</h4>
                <h1><span>MAKE</span> YOUR BODY SHAPE</h1>
                <p>
                    Unleash your potential and embark on a journey towards a stronger,
                    fitter, and more confident you. Sign up for 'Make Your Body Shape' now
                    and witness the incredible transformation your body is capable of!
                </p>
                <a href="register.php" class="btn" target="_blank">Get Started</a>
                <button style="margin-right: 100px;"></button>
            </div>
            <div class="header__image">
                <img src="images/header.png" alt="header" />
            </div>
        </header>
    </section>

    <section id="program">
        <section class="section__container explore__container">
            <div class="explore__header">
                <h2 class="section__header">EXPLORE OUR PROGRAM</h2>
                <div class="explore__nav"></div>
            </div>
            <div class="explore__grid">
                <div class="explore__card">
                    <h4>Strength</h4>
                    <p>
                        Embrace the essence of strength as we delve into its various
                        dimensions physical, mental, and emotional.
                    </p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'book_class.php?program=strength' : 'login.php'; ?>">Join Now <i class="ri-arrow-right-line"></i></a>
                </div>
                <div class="explore__card">
                    <h4>Physical Fitness</h4>
                    <p>
                        It encompasses a range of activities that improve health, strength,
                        flexibility, and overall well-being.
                    </p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'book_class.php?program=strength' : 'login.php'; ?>">Join Now <i class="ri-arrow-right-line"></i></a>
                </div>
                <div class="explore__card">
                    <h4>Fat Lose</h4>
                    <p>
                        Through a combination of workout routines and expert guidance, we'll
                        empower you to reach your goals.
                    </p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'book_class.php?program=strength' : 'login.php'; ?>">Join Now <i class="ri-arrow-right-line"></i></a>
                </div>
                <div class="explore__card">
                    <h4>Weight Gain</h4>
                    <p>
                        Designed for individuals, our program offers an effective approach
                        to gaining weight in a sustainable manner.
                    </p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'book_class.php?program=strength' : 'login.php'; ?>">Join Now <i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
        </section>
    </section>

    <section class="section__container class__container">
        <div class="class__image">
            <span class="bg__blur"></span>
            <img src="images/class-1.jpg" alt="class" class="class__img-1" />
            <img src="images/class-2.jpg" alt="class" class="class__img-2" />
        </div>
        <div class="class__content">
            <h2 class="section__header">THE CLASS YOU WILL GET HERE</h2>
            <p>
                Led by our team of expert and motivational instructors, "The Class You
                Will Get Here" is a high-energy, results-driven session that combines
                a perfect blend of cardio, strength training, and functional
                exercises. Each class is carefully curated to keep you engaged and
                challenged, ensuring you never hit a plateau in your fitness
                endeavors.
            </p>
            <a href="<?php echo isset($_SESSION['user_id']) ? 'book_class.php' : 'login.php'; ?>" class="btn" target="_blank">Book A Class</a>
            <button style="margin-right: 100px;"></button>
        </div>
    </section>

    <section class="section__container join__container">
        <h2 class="section__header">WHY JOIN US?</h2>
        <p class="section__subheader">
            Our diverse membership base creates a friendly and supportive
            atmosphere, where you can make friends and stay motivated.
        </p>
        <div class="join__image">
            <img src="images/join.jpg" alt="Join" />
            <div class="join__grid">
                <div class="join__card">
                    <div class="join__card__content">
                        <h4>Personal Trainer</h4>
                        <p>Unlock your potential with our expert Personal Trainers.</p>
                    </div>
                </div>
                <div class="join__card">
                    <div class="join__card__content">
                        <h4>Practice Sessions</h4>
                        <p>Elevate your fitness with practice sessions.</p>
                    </div>
                </div>
                <div class="join__card">
                    <div class="join__card__content">
                        <h4>Good Management</h4>
                        <p>Supportive management, for your fitness success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__container price__container">
        <h2 class="section__header">OUR PRICING PLAN</h2>
        <p class="section__subheader">
            Our pricing plan comes with various membership tiers, each tailored to
            cater to different preferences and fitness aspirations.
        </p>
        <div class="price__grid">
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Basic Plan</h4>
                    <h3>Rs.3000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <a href="login.php" class="btn">Join Now</a>
            </div>
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Weekly Plan</h4>
                    <h3>Rs.4000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        PRO Gyms
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                </div>
                <a href="login.php" class="btn">Join Now</a>
            </div>
            <div class="price__card">
                <div class="price__card__content">
                    <h4>Monthly Plan</h4>
                    <h3>Rs.5000</h3>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        ELITE Gyms & Classes
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        PRO Gyms
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Smart workout plan
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        At home workouts
                    </p>
                    <p>
                        <i class="ri-checkbox-circle-line"></i>
                        Personal Training
                    </p>
                </div>
                <a href="login.php" class="btn">Join Now</a>
            </div>
        </div>
    </section>

    <section class="review">
        <div class="section__container review__container">
            <span><i class="ri-double-quotes-r"></i></span>
            <div class="review__content">
                <h4>MEMBER REVIEW</h4>
                <p>
                    What truly sets this gym apart is their expert team of trainers. The
                    trainers are knowledgeable, approachable, and genuinely invested in
                    helping members achieve their fitness goals. They take the time to
                    understand individual needs and create personalized workout plans,
                    ensuring maximum results and safety.
                </p>
                <div class="review__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-half-fill"></i></span>
                </div>
                <div class="review__footer">
                    <div class="review__member">
                        <img src="images/member1.jpeg" alt="member" />
                        <div class="review__member__details">
                            <h4>Nimal Dasanayaka</h4>
                            <p>Accountant</p>
                        </div>
                    </div>
                    <div class="review__nav">
                        <span><i class="ri-arrow-left-line"></i></span>
                        <span><i class="ri-arrow-right-line"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="service" class="container">  
        <h2>Facilities at FitZone Fitness Center</h2>
        <p>FitZone Fitness Center offers a wide range of modern facilities to ensure a comprehensive fitness experience for all members.</p>
        <div class="service__grid">
            <div class="service__card">
                <div class="service">
                    <h3>Gym Area & Equipment</h3>
                    <li>Cardio Zone - Treadmills, elliptical machines, rowing machines, and stationary bikes.</li>
                    <li>Strength Training Zone - Dumbbells, barbells, kettlebells, weightlifting racks, and resistance machines.</li>
                    <li>Functional Training Area - Battle ropes, medicine balls, TRX suspension trainers, and agility ladders.</li> 
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Group Exercise Studios</h3>
                    <li>Spacious and air-conditioned studios for Zumba, Yoga, Pilates, HIIT, and Aerobics classes.</li>
                    <li>High-quality sound system and mirrored walls for an immersive experience.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Personal Training Section</h3>
                    <li>Dedicated area for one-on-one training sessions with certified fitness coaches.</li>
                    <li>Specialized equipment for personalized workout routines.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Locker Rooms & Changing Areas</h3>
                    <li>Secure lockers to store personal belongings.</li>
                    <li>Clean and well-maintained showers and changing rooms with toiletries.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Nutrition & Wellness Corner</h3>
                    <li>Consultation space for nutrition counseling and meal planning.</li>
                    <li>Healthy snacks, protein shakes, and beverages available for purchase.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Outdoor Workout Space</h3>
                    <li>Open-air training area with turf flooring for boot camps and circuit training.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Relaxation & Recovery Zone</h3>
                    <li>Sauna & Steam Room for post-workout recovery.</li>
                    <li>Massage Therapy services available upon appointment.</li>
                </div>
            </div>
            <div class="service__card">
                <div class="service">
                    <h3>Member Lounge & Wi-Fi Access</h3>
                    <li>Comfortable seating area for members to relax before or after workouts.</li>
                    <li>Free Wi-Fi and charging stations for mobile devices</li>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <section class="section__container contact__container">
            <div class="contact__header">
                <h2 class="section__header">Contact Us</h2>
                <div class="contact__nav"></div>
            </div>
            <div class="contact__grid">
                <div class="contact__card">
                    <div class="contact">
                        <h2>We're Here to Help You Stay on Track!</h2>
                        <p>Have questions about our classes, membership plans, or personal training sessions? 
                        Our team is always ready to assist you. Whether you're a new member looking for guidance or an existing member needing support,
                        we're just a call or message away.</p>
                        
                        <h2>Get in Touch with Us</h2>
                        <ul>
                            <p>📍 Location: [38/6,Kandy road,Kurunegala]</p>
                            <p>📞 Phone: [+94 763154986]</p>
                            <p>📧 Email: [fitzonefitness@gmail.com]</p>
                            <p>🕒 Gym Hours:</p>
                            <p>Monday - Friday: 5:00 AM - 10:00 PM</p>
                            <p>Saturday - Sunday: 6:00 AM - 8:00 PM</p>
                        </ul>
                    </div>
                </div>
                <div class="contact__card">
                    <div class="contact">
                        <h3>Connect with Us Online</h3>
                        <p>Follow us on social media for fitness tips, class updates, and special promotions:</p>
                        <ul>
                            <p>🔹 Facebook - [facebook.com]</p>
                            <p>🔹 Instagram - [insta.com]</p>
                            <p>🔹 YouTube - [youtube.com]</p>
                            <p>📢 Join the FitZone community today and take the first step toward your fitness goals!</p>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <footer class="section__container footer__container">
        <span class="bg__blur"></span>
        <span class="bg__blur footer__blur"></span>
        <div class="footer__col">
            <div class="footer__logo"><img src="assets/logo.png" alt="logo" /></div>
            <p>
                Take the first step towards a healthier, stronger you with our
                unbeatable pricing plans. Let's sweat, achieve, and conquer together!
            </p>
            <div class="footer__socials">
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-twitter-fill"></i></a>
            </div>
        </div>
        <div class="footer__col">
            <h4>Company</h4>
            <a href="#">Business</a>
            <a href="#">Franchise</a>
            <a href="#">Partnership</a>
            <a href="#">Network</a>
        </div>
        <div class="footer__col">
            <h4>About Us</h4>
            <a href="https://detailed.com/fitness-blogs/">Blogs</a>
            <a href="#">Security</a>
            <a href="#">Careers</a>
        </div>
        <div class="footer__col">
            <h4>Contact</h4>
            <a href="#">Contact Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">BMI Calculator</a>
        </div>
    </footer>
    <div class="footer__bar">
        Copyright © 2023 Web Design Mastery. All rights reserved.
    </div>
</body>
</html>