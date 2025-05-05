@extends('layout.master-2')


@section('content')

<div class="hero">
     
  <h1 class="text-white">Bienvenue dans notre Boutique de Légumes Frais</h1>
</div> 

<a href="{{route('Site-SettingGetShow')}}" class="btn btn-danger ms-5" data-mdb-ripple-init>Retour</a>
{{-- <div class="content">
    <div class="left">
  
      <div class="top profile">
        <div class="bg-profile"></div>
        <img src="https://i.ibb.co/pxvkv6Z/download.jpg" class="pic-profile" />
        <div class="profil">
          <img src="https://cdn-icons-png.flaticon.com/512/7011/7011411.png" />
          <span>Stats</span>
        </div>
        <div class="trophy">
          <img src="https://cdn-icons-png.flaticon.com/512/7011/7011471.png" />
          <span>Trophies</span>
        </div>
          <a href="" class="btn btn-outline-primary">Information Personnel</a>
      </div>
      <div class="bottom" style="height:12rem;">
        <h1>Options</h1>
        
        <p class="play"><a href="" class="text-decoration-none ">Information Personnel</a></p>
      </div>
    </div>
    <div class="right">
      <div class="top stats" style="height:14rem;">
        <h1 class="fw-bold">Informations personnelles</h1>
        <div class="skills">
          <h3 class="skillsTop fw-bold"> Nom & Prenom Complet :</h3>
          <br> 
          <h3 class="skillsTop fw-bold"> Genre :</h3>
          <br>
          <h3 class="skillsTop fw-bold">Date de naissance :</h3>
        </div>
      </div>
      <div class="bottom" style="height:10rem;">
        <h1>Coordonnées</h1>
        <div class="skills">
          <h3 class="skillsTop fw-bold"> Adresse e-mail :</h3>
          <br> 
          <h3 class="skillsTop fw-bold"> Numéro de téléphone :</h3>
        </div> 
      </div>
    </div>
</div> --}}



<section>
  <div class="container py-5 d-flex justify-content-center">
    <div class="row">
      <div class="col-lg-4" style="width:16rem;">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{ asset('images/' . $user->gender . '.png') }}" alt="Avatar" class="rounded-circle img-fluid" style="width: 150px;">
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group">
              <li class="list-group-item active" aria-current="true">Information Personnel</li>
              <li class="list-group-item">Coordonnée</li>
              <li class="list-group-item">Satus Connexion</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8" style="width:38rem;">
        <div class="card mb-4" style="height:23rem;">
          <div class="card-body">
            <h1 class="fw-bold">Information Personnel</h1>
            <br>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom & Prenom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->name . $user->lastname ?? 'Non Renseigné'}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->email ?? 'Non Renseigné'}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->phone ?? 'Non Renseigné'}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Role</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->role ?? 'Non Renseigné'}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Genre</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $user->gender ?? 'Non Renseigné'}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection