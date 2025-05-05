@extends('layout.master-2')

@section('content')



<body>
  <br>
  <a href="{{route('Site-AboutGetShow')}}" class="btn btn-danger ms-5" data-mdb-ripple-init>Retour</a>
  <div class="wrapper">
    <div class="app-wrapper">
      <div class="container mt-3">
        <div class="row g-2">
          <div class="col-6">
            <div class="card p-5 position-relative bg-danger border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body text-center position-relative" style="z-index: 1;">
                    <a href="{{route('Site-SellerGetShow')}}" class="text-decoration-none"><h5 class="card-title text-white">Devenir Vendeur</h5></a>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #3e0412; opacity: 0.5; top: 50%; left: 90%; transform: translate(-70%, -50%);"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="card p-5 position-relative bg-warning border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body text-center position-relative" style="z-index: 1;">
                    <a href="{{route('Site-ProfilGetShow')}}" class="text-decoration-none"><h5 class="card-title text-white">Profil</h5></a>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #4b3303; opacity: 0.4; top: 50%; left: 82%; transform: translate(-50%, -50%);"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="card p-5 position-relative bg-violet border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body position-relative" style="z-index: 1;">
                    <h5 class="card-title">Suivi de Ta Commande</h5>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #60064b; opacity: 0.5; top: 50%; left: 80%; transform: translate(-50%, -50%);"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="card p-5 position-relative bg-light border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body d-flex justify-content-center position-relative" style="z-index: 1;">
                    <a href="{{route('Site-RegisterGetShow')}}" class="text-decoration-none text-dark"><h5 class="card-title">S'enregistrer</h5></a>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #031628; opacity: 0.5; top: 50%; left: 82%; transform: translate(-50%, -50%);"></i>
            </div>
          </div>
          {{-- <div class="col-6">
            <div class="card p-5 position-relative bg-light border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body position-relative" style="z-index: 1;">
                    <h5 class="card-title">Suivi de Ta Commande</h5>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #6c757d; opacity: 0.1; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
            </div>
          </div>
          <div class="col-6">
            <div class="card p-5 position-relative bg-light border rounded">
                <!-- Texte principal en avant-plan -->
                <div class="card-body position-relative" style="z-index: 1;">
                    <h5 class="card-title">Suivi de Ta Commande</h5>
                </div>
                <!-- Icône en arrière-plan -->
                <i class="fas fa-cog position-absolute" style="font-size: 10rem; color: #6c757d; opacity: 0.1; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</body>



@endsection