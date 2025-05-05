@extends('layout.master-2')

@section('content')

<div class="" style="background-image: url('images/accueil.jpg'); background-size: cover; background-position: center; padding: 5rem 2rem;">

  <!-- Titre principal -->
  <h1 class="text-white" style="text-align: center; font-size: 3rem; color: white;">
    Bienvenue dans notre Boutique de Légumes Frais
  </h1>

  <div class="row align-items-center">
    <!-- Premier bouton -->
    <div class="col-auto">
        <a href="{{ route('Site-SellerGetShow') }}" class="btn btn-light mb-4">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>
    <!-- Deuxième bouton -->
    <div class="col text-end">
        <a href="{{ route('Site-AboutGetShow') }}" class="btn btn-light mb-4">
            <i class="fas fa-arrow-left"></i> Retour aux achats
        </a>
    </div>
  </div>

</div> 


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



<section class="h-100 h-custom bg-light py-5">
  <div class="container d-flex justify-content-center">
    <div class="row align-items-center">
      <div class="col-lg-8 col-xl-12">
        <div class="card rounded-3 shadow-lg">
          <form method="POST" action="{{ route('Site-ProductPostStore') }}" class="px-md-4 py-4" enctype="multipart/form-data">
            @csrf
            
            <!-- Téléchargement d'image -->
            <label class="custum-file-upload d-flex flex-column align-items-center p-4 mb-4 border rounded" for="file">
              <div class="icon mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" width="48" height="48">
                  <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"></path>
                </svg>
              </div>
              <span class="text-muted">Cliquez pour télécharger l'image</span>
              <input type="file" name="image" id="file" class="d-none">
            </label>
            
            <div class="card-body">
              <h3 class="text-center mb-4">Ajouter un Article</h3>
              
              <!-- Libellé -->
              <div class="mb-3">
                <label for="form3Example1q" class="form-label">Libellé</label>
                <input type="text" name="wording" id="form3Example1q" class="form-control" placeholder="Entrez le libellé">
              </div>

              <!-- Description -->
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez une description ici..."></textarea>
              </div>

              <!-- Catégorie -->
              <div class="mb-3">
                <label for="categorySelect" class="form-label">Catégorie</label>
                <select id="categorySelect" name="category" class="form-select">
                  <option selected disabled>Choisissez une catégorie</option>
                  <option value="legume">Légumes</option>
                  <option value="fruit">Fruits</option>
                  <option value="epice">Épices</option>
                  <option value="viande">Viandes</option>
                </select>
              </div>

              <!-- Prix -->
              <div class="mb-3">
                <label for="form3Example1w" class="form-label">Prix</label>
                <input type="text" name="price" id="form3Example1w" class="form-control" placeholder="Entrez le prix">
              </div>

              <!-- Quantité -->
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
              </div>

              <!-- Stock -->
              <div class="mb-3">
                <label for="form3Example1w" class="form-label">Stock</label>
                <input type="text" name="stock" id="form3Example1w" class="form-control" placeholder="Entrez le stock disponible">
              </div>

              <!-- Bouton Valider -->
              <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Valider</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection