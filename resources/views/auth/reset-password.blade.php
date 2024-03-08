<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html>
  <head>
    <meta charset="utf-8" />
    <title>Galaxy - Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="plugins/fontawesome/css/all.css" />

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
  </head>
  <body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
      <div class="preloader-inner">
        <div class="spinner-border text-red"></div>
      </div>
    </div>
    <!-- END preloader-wrapper -->

    <!-- START main-wrapper -->
    <section class="d-flex">
      <!-- start of sidenav -->
      <aside>
        <div
          class="sidenav position-sticky d-flex flex-column justify-content-between"
        >
          <a class="navbar-brand" href="index.html" class="logo">
            <img src="images/logo.png" alt="" />
          </a>
          <!-- end of navbar-brand -->

          <div class="navbar navbar-dark my-4 p-0 font-primary">
            <ul class="navbar-nav w-100">
              <li class="nav-item">
                <a class="nav-link text-white px-0 pt-0" href="index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-white px-0" href="about.html">About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white px-0" href="contact.html"
                  >Contact</a
                >
              </li>
              <li class="nav-item accordion">
                <div id="drop-menu" class="drop-menu collapse">
                  <a class="d-block" href="index-2.html">Home 2</a>
                  <a class="d-block" href="category.html">Category</a>
                  <a class="d-block" href="post-details.html">Post Details</a>
                  <a class="d-block" href="privacy.html"
                    >Privacy &amp; Policy</a
                  >
                </div>
                <a
                  class="nav-link text-white"
                  href="#!"
                  role="button"
                  data-toggle="collapse"
                  data-target="#drop-menu"
                  aria-expanded="false"
                  aria-controls="drop-menu"
                  >Pages</a
                >
              </li>
              <li class="nav-item mt-3">
                <select
                  class="custom-select bg-transparent rounded-0 text-white shadow-none"
                  id="pick-lang"
                >
                  <option selected value="en">English</option>
                  <option value="fr">French</option>
                </select>
              </li>
            </ul>
          </div>
          <!-- end of navbar -->

          <ul class="list-inline nml-2">
            <li class="list-inline-item">
              <a href="#!" class="text-white text-red-onHover pr-2">
                <span class="fab fa-twitter"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-facebook-f"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-instagram"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#!" class="text-white text-red-onHover p-2">
                <span class="fab fa-linkedin-in"></span>
              </a>
            </li>
          </ul>
          <!-- end of social-links -->
        </div>
      </aside>
      <!-- end of sidenav -->
      <div class="main-content">
        <!-- start of mobile-nav -->
        <header class="mobile-nav pt-4">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-6">
                <a href="index.html">
                  <img src="images/logo.png" alt="" />
                </a>
              </div>
              <div class="col-6 text-right">
                <button class="nav-toggle bg-transparent border text-white">
                  <span class="fas fa-bars"></span>
                </button>
              </div>
            </div>
          </div>
        </header>
        <div class="nav-toggle-overlay"></div>
        <!-- end of mobile-nav -->

        <div class="container py-4 my-5">
          <div class="row">
            <div class="col-md-10">
              <div class="contact-form bg-dark">
                <h1 class="text-white add-letter-space mb-5">Rset Password</h1>
                <form method="POST" action="{{ route('password.store') }}" class="needs-validation" novalidate>
                  @csrf
                  {{-- <div class="row"> --}}
                    <div class="col-md-6">
                      <div class="form-group mb-5">
                        <label for="email" class="text-black-300" 
                          >E-Mail Address</label
                        >
                        <input
                          type="email"
                          name="email"
                          id="email"
                          :value="old('email')"
                          class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                          placeholder="email"
                          required
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <p class="invalid-feedback">Your email is required!</p>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group mb-5">
                        <label for="firstName" class="text-black-300"
                          >Your Password</label
                        >
                        <input
                          type="password"
                          id="firstName"
                          name="password"
                          class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0"
                          placeholder="password"
                          required
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <p class="invalid-feedback">
                          Your Password is required!
                        </p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-5">
                          <label for="password_confirmation" class="text-black-300">Your Password confirmation</label>
                          <input type="password" name="password_confirmation" id="lastName" class="form-control bg-transparent rounded-0 border-bottom shadow-none pb-15 px-0" placeholder="confirmation_password" required>
                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                          <p class="invalid-feedback">Your confirmation password is required!</p>
                      </div>
                  </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-sm btn-primary">
                        Login <img src="images/arrow-right.png" alt="" />
                      </button>
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END main-wrapper -->

    <!-- All JS Files -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="js/script.js"></script>
  </body>
</html>
