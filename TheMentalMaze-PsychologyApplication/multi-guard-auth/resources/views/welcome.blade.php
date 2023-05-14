<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>{{ config('app.name') }}</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ URL::to('/assets/img/logo.png') }}" rel="icon">
    <link href="{{ URL::to('/assets/img/log.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::to('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::to('/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}">The Mental Maze</a></h1>

      <nav id="navbar" class="navbar">
        
         <ul>
            <li class="sm:fixed sm:top-0 sm:left-0 p-6 text-left">
            @auth('helper')
                <a href="{{ url('/helper/dashboard') }}" class="getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Helper Dashboard
                </a>
            @else
            @auth
            <li class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <a href="{{ url('/profile') }}" class="getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                User Dashboard
                </a>
            </li>
            @else
            @if (Route::has('login'))
                    <li class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        <a href="{{ route('login') }}" class="getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Log in
                        </a>
                    </li>

                        @if (Route::has('register'))
                        <li class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            <a href="{{ route('register') }}" class="getstarted scrollto ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Register
                            </a>
                        </li>
                        @endif
                </li>
            @endif
            @endauth
            @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Your mental health is a priority. Your happiness is an essential. Your self-care is a necessity.</h1>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ URL::to('/assets/img/img1.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
          <div class="container">
            <div class="section-title">
              <h2>Majority of Mental Illnesses Go Untreated</h2>
            </div>
            <div class="row" data-aos="zoom-in">
        
              <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                <a>
                  <img src="{{ URL::to('/assets/img/disorders/adhd.jpg') }}" class="img-fluid" alt="">
                  <p>ADHD</p>
                </a>
              </div>
        
              <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                <a>
                  <img src="{{ URL::to('/assets/img/disorders/anxiety.jpg') }}" class="img-fluid" alt="">
                  <p>Anxiety</p>
                </a>
              </div>
        
              <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                <a>
                  <img src="{{ URL::to('/assets/img/disorders/depression.jpg') }}" class="img-fluid" alt="">
                  <p>Depression</p>
                </a>
              </div>
        
              <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                <a>
                  <img src="{{ URL::to('/assets/img/disorders/narcissism.jpg') }}" class="img-fluid" alt="">
                  <p>Narcissism</p>
                </a>
              </div>
            </div>
          </div>
        </section>

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Welcome to our psychology application! We are a team of passionate and dedicated professionals who are committed to helping individuals lead fulfilling and meaningful lives through the application of psychology.
              <br>
              Our mission is to provide comprehensive and compassionate mental health support to individuals from all walks of life. We believe that everyone deserves access to quality psychological care and strive to create a safe and inclusive environment where individuals can explore their thoughts, feelings, and experiences.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Our team consists of highly trained psychologists who specialize in various areas of psychology, including clinical, counseling, and educational psychology. We are committed to staying up-to-date with the latest research and therapeutic approaches, ensuring that we provide the most effective and evidence-based treatments to our clients.
              At our psychology application, we understand that seeking help can be a courageous step. We aim to create a warm and welcoming atmosphere where individuals feel comfortable discussing their concerns and working towards personal growth. We believe in fostering a collaborative relationship with our clients, tailoring our interventions to meet their unique needs and goals.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Why you should choose <strong>The Mental Maze</strong></h3>
              <p>
                By choosing our web application, you gain access to a comprehensive, evidence-based, and personalized platform that can support you in your mental health and personal growth. We are dedicated to providing a valuable and transformative experience that helps individuals lead happier and healthier lives.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Comprehensive and User-Friendly Experience<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                        Our web application offers a comprehensive and user-friendly experience that sets it apart from others. We have carefully designed and developed our platform to provide a seamless and intuitive interface, making it easy for users to navigate and access the features they need. Our application combines a range of essential tools and resources, such as self-assessment questionnaires, educational materials, and interactive exercises, all in one place. By choosing our web application, you can benefit from a holistic and convenient approach to psychological support.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Evidence-Based Approach and Expertise <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        Our web application offers a comprehensive and user-friendly experience that sets it apart from others. We have carefully designed and developed our platform to provide a seamless and intuitive interface, making it easy for users to navigate and access the features they need. Our application combines a range of essential tools and resources, such as self-assessment questionnaires, educational materials, and interactive exercises, all in one place. By choosing our web application, you can benefit from a holistic and convenient approach to psychological support.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Personalization and Progress Tracking <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        One of the key advantages of our web application is the ability to personalize your experience and track your progress over time. We understand that every individual is unique, and their psychological needs may vary. Our application allows you to tailor your journey by setting goals, tracking your progress, and adjusting interventions based on your specific needs and preferences. Through interactive exercises, personalized recommendations, and progress monitoring tools, our application empowers you to take an active role in your mental health journey and make meaningful strides towards your well-being.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/img2.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Helping Materials</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Support Groups</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

           <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Connectivity</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= WANT TO HELP Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                @auth('helper')
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>You are currently logged in as Helper</h3>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a href="{{ url('/helper/dashboard') }}" class="cta-btn align-middle getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Helper Dashboard
                    </a>
                </div>
                @else
                @auth
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>You are currently logged in as User</h3>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a href="{{ url('/profile') }}" class="cta-btn align-middle getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    User Dashboard
                    </a>
                </div>
                @else
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>Want to Help?</h3>
                    <p> You can help the people in need by either giving your valuable advice in the support groups or share helpful resources.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a href="{{ url('/helper/register') }}" class="cta-btn align-middle getstarted scrollto font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Want to help?
                    </a>
                </div>
                @endauth
                @endauth
            </div>
        </div>
    </section>
    <!-- End WANT TO HELP Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>The People behind the working of this organization</p>
        </div>

        <div class="row">

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="https://www.tvstyleguide.com/wp-content/uploads/2016/10/gus_fring_yellow_dress_shirt_glasses.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Gus Fring</h4>
                <span>CEO</span>
                <p>Get back to work!</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i></a>
                </div>
              </div>
        </div>
    </div>

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="https://media-cldnry.s-nbcnews.com/image/upload/t_fit-760w,f_auto,q_auto:best/streams/2013/September/130903/8C8841868-8fb1d903-b402-03f4-c3ab-7f1ec513daa8-bbs5b-gallery-0878-rgb-v1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Dr. heisenberg</h4>
                <span>"Medical" Expert</span>
                <p>YOUR GODDAMN RIGHT!!</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
            </div>  
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">       
                <div class="pic"><img src="https://s.yimg.com/ny/api/res/1.2/7LLqhXJahtEQRRxz9ZKKcw--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MDtoPTQyNw--/https://media.zenfs.com/en_US/News/TheWrap/_Breaking_Bad_s__Aaron_Paul_Mashup-cc4e382363561b0d677608ff7aa79b8d" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Jesse Pinkman</h4>
                <span>Chief Marketing Officer</span>
                <p>MAGNETS!</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i></a>
                </div>
              </div>     
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Some of the Questions we often get asked.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What is the purpose of this web application? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">How secure is my personal information? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">What types of psychological concerns does the application address? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Are the interventions and resources evidence-based? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Can I use this application as a substitute for in-person therapy? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Connect With Specialists ==> <a href="{{ URL::to('/assets/Hotline.pdf') }}" download="Hotline.pdf">Click !</a></p>
        </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color: #f3f5fa; color: #37517e;">

        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-6">
                    <h1><span class="special">The Mental Maze</span></h1>
                    <hr class="light">
                    <p>the_mental_maze@email.com</p>
                    <p>+14844731779</p>

                </div>
                <div class="col-md-6">
                    <hr class="light">
                    <h5>Office</h5>
                    <hr class="light">
                    <p>Regus, New York City - 140 Broadway</p>
                </div>
                <div class="col-12">
                    <hr class="light1">
                    <h5>&copy; The-Mental-Maze.com</h5>
                </div>
            </div>
        </div>
  </footer><!-- End Footer -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{ URL::to('/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ URL::to('/assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ URL::to('/assets/js/main.js') }}"></script>
</body>
</html>