<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobmatch</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">

    <!-- CSS Smooth Scroll -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <div id="home" class="container-fluid header position-relative overflow-hidden p-0">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="#home" class="navbar-brand p-0">
                <h1 class="display-6 text-primary m-0"><i class="fas fa-envelope me-3"></i>JobMatch</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#services" class="nav-item nav-link">Services</a>
                    <a href="#contact" class="nav-item nav-link">Contact Us</a>
                </div>
                <?php if (logged_in() === false) : ?>
                    <a href="<?= base_url('login'); ?>" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
                    <a href="<?= base_url('register'); ?>" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a>
                <?php endif; ?>

                <?php if (in_groups('freelancer')) : ?>
                    <a href="<?= base_url('freelancer/profile'); ?>" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">My Account</a>
                <?php elseif (in_groups('company')) : ?>
                    <a href="<?= base_url('company/profile'); ?>" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">My Account</a>
                <?php elseif (in_groups('admin')) : ?>
                    <a href="<?= base_url('/admin/dashboard'); ?>" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Admin Panel</a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Hero Header Start -->
        <div class="hero-header overflow-hidden px-5">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.2s">Find your Style</h1>
                    <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">Cari kebutuhan mu dan ubah Cv mu menjadi pendapatan</p>
                    <a href="<?= base_url('cari-job'); ?>" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.2s">Cari Job <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <img src="img/hero-img-1.png" class="img-fluid w-100 h-100" alt="">
                </div>
            </div>
        </div>
        <!-- Hero Header End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- About Start -->
    <div id="about" class="container-fluid overflow-hidden py-5" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/about-1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="mb-1 text-primary">About Us</h4>
                    <h1 class="display-5 mb-4">Get Started Easily With a your experience through your CV</h1>
                    <p class="mb-4">Daftarkan dirimu sebagai pencari pendapatan (freelance) atau pencari jasa (client) hanya dengan beberapa langkah mudah! Kami memahami bahwa dunia kerja freelance bisa menjadi tantangan, baik untuk para freelancer yang mencari proyek maupun klien yang membutuhkan talenta terbaik.</p>
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">About More</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div id="services" class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="mb-1 text-primary">Our Service</h4>
                <h1 class="display-5 mb-4">What We Can Do For You</h1>
                <p class="mb-0">Menciptakan jembatan antara freelancer yang bernilai dan perusahaan yang membutuhkan keterampilan unik mereka. Kami percaya bahwa setiap orang memiliki kemampuan untuk berkontribusi dan kami ingin memfasilitasi itu.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i class="fas fa-mail-bulk fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Platform yang Mudah Digunakan</h4>
                            <p class="mb-4">daftar dengan cepat dan mudah, dengan proses pendaftaran yang ramah pengguna.
                            </p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i class="fas fa-thumbs-up fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Diverse Lowongan Kerja </h4>
                            <p class="mb-4">Temukan berbagai jenis pekerjaan freelance yang sesuai dengan keahlianmu, mulai dari desain grafis hingga penulisan konten.
                            </p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i class="fa fa-subway fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Akses ke Talenta Berkualitas</h4>
                            <p class="mb-4">Klien dapat menemukan freelancer yang tepat untuk proyek mereka dengan fitur pencarian yang canggih.
                            </p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i class="fas fa-sitemap fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Ulasan dan Rating</h4>
                            <p class="mb-4">Dengan sistem penilaian yang transparan, baik freelancer maupun klien dapat saling memberikan umpan balik untuk meningkatkan pengalaman.
                            </p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->

            <!-- Footer Start -->
            <div id="contact" class="container-fluid footer py-9 wow fadeIn" data-wow-delay="0.2s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="text-dark mb-4">Company</h4>
                                <a href=""> Why Mailler?</a>
                                <a href=""> Our Features</a>
                                <a href=""> Our Portfolio</a>
                                <a href=""> About Us</a>
                                <a href=""> Our Blog & News</a>
                                <a href=""> Get In Touch</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="mb-4 text-dark">Quick Links</h4>
                                <a href=""> About Us</a>
                                <a href=""> Contact Us</a>
                                <a href=""> Privacy Policy</a>
                                <a href=""> Terms & Conditions</a>
                                <a href=""> Our Blog & News</a>
                                <a href=""> Our Team</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="mb-4 text-dark">Services</h4>
                                <a href=""> All Services</a>
                                <a href=""> Promotional Emails</a>
                                <a href=""> Product Updates</a>
                                <a href=""> Email Marketing</a>
                                <a href=""> Acquistion Emails</a>
                                <a href=""> Retention Emails</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="footer-item d-flex flex-column">
                                <h4 class="mb-4 text-dark">Contact Info</h4>
                                <a href=""><i class="fa fa-map-marker-alt me-2"></i> Indonesia </a>
                                <a href=""><i class="fas fa-envelope me-2"></i> jobmatch@example.com</a>
                                <a href=""><i class="fas fa-phone me-2"></i> +62 8907 000</a>
                                <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-share fa-2x text-secondary me-2"></i>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>