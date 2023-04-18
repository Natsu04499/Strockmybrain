
@if(session('status'))
    {{ session('status') }}
@endif
{{-- 
<form method="POST" action="/login">
    @csrf
    Email: <input type="text" name="email"><br>
    Mot de Passe: <input type="password" name="password"><br>
    <button type="submit">Se connecter</button>
    <a href="/forgot-password">Mot de passe oublié ?</a>
</form>

<hr>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif --}}

@include('components.footer')

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Connexion</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Connexion
         </div>
         <form action="/login" method="POST">
            @csrf
            <div class="field">
               <input type="text" name="email" required>
               <label>Email</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Mot de passe</label>
            </div>
            <div class="content">
               <div class="pass-link">
                  <a href="/forgot-password">Mot de passe oublié ?</a>
               </div>
            </div>
            <div class="field">
               <button type="submit">Se connecter</button>
            </div>
         </form>
         <div class="signup-link">
            Vous n'avez pas de compte ? <a class="menu__link" href="{{ route('register') }}">Inscrivez vous</a></li>
         </div>
      </div>
   </body>
</html>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
