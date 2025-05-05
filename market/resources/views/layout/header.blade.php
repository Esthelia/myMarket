<!-- Navbar -->
<br><br><br>

<div class="" style="background-image: url('images/accueil.jpg'); background-size: cover; background-position: center; padding: 5rem 2rem;">
  <!-- Barre de recherche -->
  <div class="search-bar" style="text-align: center; margin-bottom: 2rem;">
    <input id="search-input" type="text" placeholder="Recherchez vos légumes préférés..." style="padding: 0.8rem; width: 50%; border-radius: 5px; border: 1px solid #ccc;">
    <button id="search-button" style="padding: 0.8rem; background-color: #e76f51; color: white; border: none; border-radius: 5px; cursor: pointer;">
      Rechercher
    </button>
  </div>

  <!-- Titre principal -->
  <h1 class="text-white" style="text-align: center; font-size: 3rem; color: white;">
    Bienvenue dans notre Boutique de Légumes Frais
  </h1>

  <!-- Carte d'information -->
  <div class="card-item" style="margin: 2rem auto; max-width: 600px; padding: 1.5rem; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
      <p>
        <span class="h2">Jour de Marché Chaque Mardi</span><br>
      </p>
    </div>
  </div>
</div>


<nav class="navbar shadow navbar-expand-lg fixed-top bg-white" style="height: 4.5rem;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="{{asset('images/market-2.jpg')}}" height="70" alt="MDB Logo" loading="lazy"/>
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item h5">
          <a class="nav-link" href="{{route('Site-HomeGetShow')}}">Accueil</a>
        </li>
        <li class="nav-item h5">
          <a class="nav-link" href="{{route('Site-AboutGetShow')}}">Commodités</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3 btn btn-warning position-relative" href="{{ route('Site-CartGetShow') }}">
        <i class="fas fs-4 fa-shopping-cart text-dark"></i>
        <span id="cart-item-count" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle">
          {{ $cartCount }}
        </span>
      </a>
      

      <a class="text-reset me-3 btn btn-outline-warning" href="{{route('Site-SettingGetShow')}}">
        <i class="fa-solid fs-4 fa-gear"></i>
      </a>

      <a class="btn btn-primary me-2" href="{{route('Site-ProductGetShow')}}">
        <i class="fa-solid fs-4 fa-plus"></i>
      </a>
    

      <form action="{{ route('postLogout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
        <i class="fa-solid fs-4 fa-sign-out-alt"></i>
        </button>
      </form>

      <!-- Notifications -->
      {{-- <div class="dropdown">
        <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
        </div> --}}
    </div>
  </div>
</nav>




