{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}

<style>
    /* Styles pour le header */
.header {
  background-image: url('https://source.unsplash.com/1600x900/?productivity');
  background-size: cover;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.header__text-box {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 3rem;
  border-radius: 2rem;
  box-shadow: 0 2rem 4rem rgba(0, 0, 0, 0.2);
}

.heading-secondary {
  font-size: 5rem;
  margin-bottom: 6rem;
}

.btn--white {
  background-color: #fff;
  color: #333;
  border-radius: 10rem;
  padding: 1.5rem 4rem;
  transition: all 0.2s;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 1.6rem;
  font-weight: 300;
  display: inline-block;
}

.btn--white:hover {
  background-color: #333;
  color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
}

.navbar {
background-color: #333;
color: #fff;
width: 1220px;
}

.navbar__logo {
float: left;
}

.logo {
font-size: 2rem;
margin: 0;
}

.navbar__menu {
float: right;
}

.menu {
list-style: none;
margin: 0;
padding: 0;
display: flex;
}

.menu__item {
margin-right: 1rem;
}

.menu__link {
color: #fff;
text-decoration: none;
font-size: 1.2rem;
display: block;
padding: 1rem;
transition: all 0.3s ease;
}

.menu__link:hover {
background-color: #444;
}

.menu-icon {
color: #fff;
font-size: 2rem;
cursor: pointer;
display: none;
}

@media (max-width: 768px) {
.menu {
display: none;
position: absolute;
top: 100%;
left: 0;
width: 100%;
background-color: #333;
padding: 0;
text-align: center;
}

.menu__item {
margin: 0;
}

.menu__link {
font-size: 1.5rem;
padding: 1.5rem 0;
}

.menu-icon {
display: block;
}

#menu-toggle:checked ~ .menu {
display: block;
}
}

/* Styles pour la section 'About' */
.section-about {
  background-color: #f7f7f7;
  padding: 10rem 0;
}

.u-center-text {
  text-align: center;
}

.u-margin-bottom-big {
  margin-bottom: 8rem;
}

.col-1-of-2 {
  width: 50%;
  float: left;
}

.heading-tertiary {
  font-size: 2.5rem;
  margin-bottom: 2rem;
}

.paragraph {
  font-size: 1.6rem;
  line-height: 1.5;
  margin-bottom: 3rem;
}

.composition {
  position: relative;
  width: 100%;
  height: 0;
  margin-top: -25rem;
}

.composition__photo {
  width: 55%;
  box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.4);
  position: absolute;
  z-index: 10;
  transition: all 0.2s;
}

.composition__photo--p1 {
  left: 0;
  top: 0;
}

.composition__photo--p2 {
  right: 0;
  top: 0;
}

.composition__photo--p3 {
  left: 20%;
  top: 30%;
}

.composition__photo:hover {
  transform: scale(1.05) translateY(-1rem);
  box-shadow: 0 2.5rem 4rem rgba(0, 0, 0, 0.5);
}

/* Styles pour la section 'Features' */
.section-features {
  background-color: #fff;
  padding: 10rem 0;
}

.col-1-of-4 {
  width: calc(100% / 4);
  float: left;
}

.feature-box {
  background-color: #f2f2f2;
  padding: 6rem;
  margin: 3rem;
border-radius: 5px;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskManager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="navbar__logo">
                    <h1 class="logo">TaskManager</h1>
                </div>
                <div class="navbar__menu">
                    <label for="menu-toggle" class="menu-icon">&#9776;</label>
                    @if (Route::has('login'))
                        <ul class="menu">
                        @auth
                            <li class="menu__item"><a class="menu__link" href="{{ url('/dashboard') }}">Home</a></li>
                        @else 
                            <li class="menu__item"><a class="menu__link" href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li class="menu__item"><a class="menu__link" href="{{ route('register') }}">Register</a></li>
                            @endif
                            </ul>
                        @endauth
                    @endif    
                </div>
            </div>
        </nav>
        <div class="header__text-box">
            <h2 class="heading-secondary">
                The Ultimate Task Management Tool
            </h2>
            <a href="#" class="btn btn--white btn--animated">Get started</a>
        </div>
    </header>
    
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.0.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/jquery.fancybox.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/aos.js"></script>
    
        <script src="js/main.js"></script>
    
    </body>
    
</html>