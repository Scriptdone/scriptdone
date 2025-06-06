<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Scriptdone.com</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="scriptdone">
	<meta name="description" content="scriptdone">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="sweetalert2.min.css">

</head>

<body>

<!-- Header START -->
<header class="header-sticky header-absolute header-sticky-on" data-bs-theme="dark">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-0" href="/">
				<img class="light-mode-item navbar-brand-item" src="assets/img/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="assets/img/logo.svg" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Main navbar START -->
			<div class="navbar-collapse collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">

					
					<!-- Nav item -->
					<li class="nav-item"> <a class="nav-link" href="/solution.php">Solutions</a> </li>

					<li class="nav-item"> <a class="nav-link" href="/pricing.php">Pricing</a> </li>


					<li class="nav-item"> <a class="nav-link" href="/contact.php">Contact Us</a> </li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Buttons -->
			<ul class="nav align-items-center dropdown-hover ms-sm-2">
				

				<!-- Authentication button -->
				<li class="nav-item bg-secondary rounded d-none d-sm-block gap-1 ms-2 p-1">
					<a href="#" class="btn btn-sm btn-secondary mb-0" id="getFree" onclick="openPopup()">Let’s discuss</a>
					<!-- <a href="sign-up.html" class="btn btn-sm btn-primary mb-0">Sign up</a> -->
				</li>



				<!-- Responsive navbar toggler -->
				<li class="nav-item">
					<button class="navbar-toggler ms-sm-3 p-2"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-animation">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
				</li>	
			</ul>

		</div>
	</nav>


	<!-- Logo Nav END -->
</header>
<!-- Header END -->



	<!-- Contact Form Popup -->

  <div class="container-fluid">
    <div class="row">
      <div class="popup-overlay" id="popupOverlay">  
      <div class="popup-container" id="popupContainer">
        <button class="popup-close" id="popupClose">&times;</button>
        <div class="popup-content">
          <h1>Contact Us</h1>
          <p>Fill out the form below to send us a message</p>
          <form action="sendmail.php" method="post" id="contactForm">
            <div class="form-group">
              <label">Full Name</label>
              <input name="fullname" type="text" id="fullName" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone (Optional)</label>
              <input name="mobile" type="tel" id="phone" class="form-control">
            </div>
            <div class="form-group">
              <label for="message">Your Message</label>
              <textarea  name="message" id="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" name="sendform" class="btn-submit">Send Message</button>
          </form>
        </div>
      </div>
	  </div>
    </div> 
  </div>




<!-- **************** MAIN CONTENT START **************** -->