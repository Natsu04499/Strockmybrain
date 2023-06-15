<header class="site-header">
    <div class="site-header__back-btn">
      <form method="GET" action="/echrif.rayan/{{ url()->previous() }}">
        <button class="site-header__button">⬅️ Retour en arrière</button>
      </form>
    </div>
    <div class="site-header__logo">
      <a href="/echrif.rayan/dashboard">
        <button class="site-header__button">🏠 Page d'Accueil</button>
      </a>
    </div>
    <div class="site-header__settings">
      <a href="/echrif.rayan/settings">
        <button class="site-header__button">⚙️ Paramètres</button>
      </a>
    </div>
    <div class="site-header__logout">
      <form method="POST" action="/echrif.rayan/{{ route('logout') }}">
        @csrf
        <button type="submit" class="site-header__button">🚪🚶 Se déconnecter</button>
      </form>
    </div>
</header>

<br>
