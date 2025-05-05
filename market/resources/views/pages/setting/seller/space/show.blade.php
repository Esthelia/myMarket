@extends('layout.master-2')

@section('content')
<div class="hero">
     
  <h1 class="text-white">Bienvenue dans notre Boutique de Légumes Frais</h1>
</div> 
<a href="{{route('Site-SellerGetShow')}}" class="btn btn-danger" style="margin-right:40rem; margin-top:" data-mdb-ripple-init>Retour</a>

  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif 
<section class="h-100">
    <div class="container py-5 h-100 d-flex justify-content-center">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card bg-white app card-registration my-4" style="background: url('images\space.jpg')">
            <div class="row d-flex justify-content-center g-0">
              <div class="col-xl-10">
                <form method="POST" action="{{route('Site-SpacePostStore')}}">
                  @csrf

                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Gestion Information Utilisateur</h3>
    
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="name" id="form3Example1m" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1m">Nom & Prénom du Vendeur</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="pseudo" id="form3Example1n" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1n">Nom d’utilisateur</label>
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="email" id="form3Example1m1" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1m1">Adresse e-mail</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="phone" id="form3Example1n1" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1n1">Numéro de téléphone</label>
                        </div>
                      </div>
                    </div>
    
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" name="address" id="form3Example8" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example8">Localisation Geographique</label>
                    </div>
    
                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
    
                      <h6 class="mb-0 me-4">Genre: </h6>
    
                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                          value="option1" />
                        <label class="form-check-label" for="femaleGender">Femme</label>
                      </div>
    
                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender"
                          value="option2" />
                        <label class="form-check-label" for="maleGender">Homme</label>
                      </div>
    
                      {{-- <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                          value="option3" />
                        <label class="form-check-label" for="otherGender">Other</label>
                      </div> --}}
    
                    </div>
    
                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <label for="countrySelect" class="form-label">Entrez votre pays</label>
                        <select id="countrySelect" name="country" class="form-select">
                          <option selected disabled>Choisissez un pays</option>
                          <option value="cote d'ivoire">Cote D'Ivoire</option>
                          <option value="togo">Togo</option>
                          <option value="mali">Mali</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-4">
                        <label for="citySelect" class="form-label">Entrez votre ville</label>
                        <select id="citySelect" name="city" class="form-select">
                          <option selected disabled>Choisissez une ville</option>
                          <option value="abidjan">Abidjan</option>
                          <option value="abidjan">Option 2</option>
                          <option value="abidjan">Option 3</option>
                        </select>
                      </div>
                    </div>
                    
    
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example9" name="shop" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example9">Entrez le nom de Votre Boutique</label>
                    </div>
    
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example90" name="category" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example90">Type de Boutique</label>
                    </div>
    
                    {{-- <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example99" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example99">Course</label>
                    </div>
    
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example97" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example97">Email ID</label>
                    </div> --}}
    
                    <div class="d-flex justify-content-end pt-3">
                      <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Enregistrer</button>
                    </div>
    
                  </div>
                </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection