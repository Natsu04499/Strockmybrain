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

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
  /* Mise en forme du header */
  .header {
      background: linear-gradient(to right, #000428, #004e92);
      color: #fff;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }

  .navbar {
      position: absolute;
      top: 0;
      width: 100%;
      z-index: 999;
  }

  .navbar__logo {
      float: left;
      padding: 15px 0;
  }

  .navbar__menu {
      float: right;
      padding: 15px 0;
  }

  .menu-icon {
      display: none;
  }

  .menu {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: transparent;
      text-align: center;
  }

  .menu__item {
      display: inline-block;
  }

  .menu__link {
      display: block;
      color: #fff;
      padding: 15px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease;
  }

  .menu__link:hover {
      background-color: rgba(255,255,255,0.3);
  }

  /* Mise en forme de la section principale */
  .header__text-box {
      width: 80%;
      margin: 0 auto;
      text-align: center;
  }

  .heading-secondary {
      font-size: 3.5rem;
      font-weight: 400;
      line-height: 1.2;
      margin-bottom: 60px;
      letter-spacing: 2px;
      text-transform: uppercase;
  }

  .btn--white {
      background-color: transparent;
      color: #fff;
      border: 2px solid #fff;
      padding: 12px 40px;
      font-size: 16px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
  }

  .btn--white:hover {
      background-color: #fff;
      color: #000428;
  }

  .btn--animated {
      animation: moveInBottom 0.5s ease-out 0.75s;
      animation-fill-mode: backwards;
  }

  @keyframes moveInBottom {
      0% {
          opacity: 0;
          transform: translateY(30px);
      }

      100% {
          opacity: 1;
          transform: translateY(0);
      }
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
    
    
    </body>
    
</html>