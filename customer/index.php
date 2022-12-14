<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['cust_email'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: customer-login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['cust_email']);
	header("location: customer-login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />


    <!-- FontAwesome -->
    <script
      src="https://kit.fontawesome.com/5c10e22d0a.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="../src/styles.css" />
<!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<title>My account</title>
</head>
<body>
	<div class="container">
<!-- NAVBAR STARTS -->
    <div class="border-bottom" pb-5>
        <nav class="navbar bg-light py-lg-2 pt-3 px-0 pb-0">
          <div class="container">
            <div class="row w-100 align-items-center g-3">
              <div class="col-lg-3 col-xxl-2">
                <a class="navbar-brand d-none d-lg-block" href="/index.html">
                  <img
                    src="/images/logo_changed.JPG"
                    alt="logo"
                    width="150"
                    id="logo"
                  />
                </a>
                <div class="d-flex justify-content-between w-100 d-lg-none">
                  <a class="navbar-brand" href="#">
                    <img
                      src="/images/logo_changed.JPG"
                      class="ms-3"
                      alt="logo"
                      width="150"
                      id="logo"
                    />
                  </a>
                  <div 
                  class="d-flex align-items-center lh-1">
                    <div class="list-inline me-2">
                      <div class="list-inline-item">
                        <a
                          href="/customer/customer-login.php"
                        >
                          <i class="fa fa-solid fa-user me-3 nav-icon"></i>
                        </a>
                      </div>
                      <div class="list-inline-item">
                        <a
                          class="text-muted"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offCanvasRight"
                          href="#"
                          role="button"
                          aria-controls="offCanvasRight"
                        >
                          <i
                            class="fa fa-solid fa-cart-shopping me-2 nav-icon"
                          ></i>
                        </a>
                      </div>
                      <button
                        class="navbar-toggler collapsed"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#navbar-default"
                        aria-controls="navbar-default"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
                <form action="#" class="search-header">
                  <div class="input-group" id="search-bar">
                    <input
                      class="form-control border-end-0"
                      type="text"
                      placeholder="Search for products..."
                      aria-label="Search for products"
                      aria-describedby="basic-addon2"
                    />
                    <span
                      class="input-group-text bg-transparent"
                      id="basic-addon2"
                    >
                      <a href="#">
                        <i class="fa fa-light fa-magnifying-glass nav-icon"></i>
                      </a>
                    </span>
                  </div>
                </form>
              </div>
              <div class="col-md-4 col-xxl-4 text-end d-none d-lg-block">
                <div class="list-inline">
                  <div class="list-inline-item">
                    <a
                      href="#"
                      class="text-muted"
                      data-bs-toggle="modal"
                      data-bs-target="#userModal"
                    >
                      <i class="fa fa-solid fa-cart-shopping me-2 nav-icon"></i>
                    </a>
                  </div>
                  <div class="list-inline-item">
                    <a
                      class="position-relative"
                    
                      href="/customer/customer-login.php"
                     
                    >
                      <i class="fa fa-solid fa-user me-3 nav-icon"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- Second navbar -->

        <nav
          class="navbar navbar-expand-lg bg-light pt-0 pb-0 navbar-default">
          <div class="container px-0 px-md-3">
            <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default" aria-modal="true" role="dialog">
              <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                <div>
                  <a class="navbar-brand" href="lo/index.html">
                    <img src="/images/logo_changed.JPG" width="100">
                  </a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="d-none d-md-block">
                <ul class="navbar-nav">
                  <li class="nav-item ">
                    <a class="nav-link mx-3" href="/index.html"> Home </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link mx-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Products </a>
                      <ul  class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" href="#">Mobile Phones</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Accessories</a>
                        </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-3" href="#"> Brands </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-3" href="#"> New arrivals </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-3" href="#"> Best Sellers </a>
                  </li>
                </ul>
              </div>
              <div class="d-block d-md-none">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/index.html"> Home </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Products </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#"> Brands </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#"> New Arrivals </a>
                  </li>
                  <li class="nav-item dropdown">   
                    <a class="nav-link" href="#"> Best Sellers </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
<!-- NAVBAR ENDS -->

<!-- MAIN SECTION STARTS -->

<div class="container mt-5">
    <div class="row">
            <div class="col-md-8 col-sm-12 order-md-last">


		<!-- Creating notification when the
				user logs in -->
		
		<!-- Accessible only to the users that
				have logged in already -->
		<?php if (isset($_SESSION['cust_email'])) : ?>
			<div class="alert alert-primary" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- information of the user logged in -->
		<!-- welcome message for the logged in user -->
		<?php if (isset($_SESSION['cust_email'])) : ?>
			


            <p class="d-none d-md-block" >
				Welcome
				<strong>
					<?php echo $_SESSION['cust_email']; ?>
				</strong> !
			</p>



			


            <p class="d-none d-md-block" >
				<a href="index.php?logout='1'" style="color: red;">
					Click here to Logout
				</a>
			</p>



		<?php endif ?>

    </div>
    <!-- MAIN SECTION ENDS -->
<!-- Sidebar starts -->
    <div class="col-md-4 col-sm-12 d-flex flex-column flex-shrink-0 p-3 bg-light">

   
        <span class="fs-4  d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">My Account</span>
 
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="dashboard">
           <i class="fa-solid fa-gauge"></i>
            Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
            <i class="fa-solid fa-calendar-days"></i>
            Orders
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
            <i class="fa-solid fa-circle-info"></i>
            Account details
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Logout
            </a>
        </li>
        </ul>
    </div>
        <!-- Sidebar ends -->
    </div>

    <!-- FOOTER STARTS -->
    <div class="footer">
  <div class="container border-top mt-5">
    <footer class="row g-4 py-4 bg-light">
      <div class="d-none d-lg-block col-lg-3 text-center">
        <img src="/images/logo_changed.JPG" width="150" alt="logo">
      </div>
      <div class="col-12 col-md-12 col-lg-5">
<p class="footer-title"> Need help?</p>
<p class="support-hours">
  Support Hours:
  <br>
10am - 6pm / Mon-Fri, excl Public Holiday
</p>
<div class="contacts">
  <ul class="contact-details list-unstyled">
    <li>
      <i class="fa-solid fa-location-dot"></i>
      66 Ernest Street, South Brisbane QLD 4101
    </li>
    <li>
        <i class="fa-solid fa-phone"></i>
          <a href="tel:+61401xxxxxx">
          +61 401 xxx xx xx
          </a>
    </li>
    <li>
      <i class="fa-solid fa-envelope"></i>
      <a href="mailto:online@themobilehour.com.au">  
        online@themobilehour.com.au
      </a>
    </li>
  </ul>
</div>

      </div>
      <div class="col-12 col-md-12 col-lg-4">
<p class="footer-title"> Payment Methods</p>
  <div class="row text-center align-items-center my-3 mx-0">
    
     <div class="col-4 text-start p-0">
        <i class="fa-brands fa-cc-paypal fa-2xl"></i>
      </div>
      <div class="col-4 text-start p-0">
        <i class="fa-brands fa-cc-mastercard fa-2xl"></i>
      </div>
       <div class="col-4 text-start p-0">
        <i class="fa-brands fa-amazon-pay fa-2xl"></i>
      </div>
  </div>
  <div class="row text-center align-items-center my-3 mx-0">
    <div class="col-4 text-start p-0">
      <i class="fa-brands fa-cc-visa fa-2xl"></i>
    </div>
    <div class="col-4 text-start p-0">
      <i class="fa-brands fa-cc-amex fa-2xl"></i>
    </div>
<div class="col-4 text-start p-0">
    <i class="fa-brands fa-apple-pay fa-2xl"></i>
    </div>
  </div>


      </div>
    </footer>


    <!-- FOOTER ENDS -->
</div>
</body>
</html>
