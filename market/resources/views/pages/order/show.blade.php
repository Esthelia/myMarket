@extends('layout.master')


@section('content')


<section class="vh-100" style="background-color: #f2f2f2;">
  <div class="container py-5 d-flex justify-content-center">
    <div class="row">
      <div class="col-lg-12">
        <!-- Vérification si le panier est vide -->
        @if(empty($cart) || count($cart) === 0)
          <div class="alert alert-warning text-center">
            <h4>Votre panier est vide !</h4>
            <p>Veuillez ajouter des articles à votre panier avant de valider la commande.</p>
            <a href="{{ route('Site-AboutGetShow') }}" class="btn btn-primary">Ajouter des articles</a>
          </div>
        @else
          <!-- Détails du panier -->
          <div class="card">
            <div class="card-header bg-warning text-white text-center">
              <h3>Bon de Commande</h3>
            </div>
            <div class="card-body">
              <h5 class="text-uppercase mb-3">Détails du Panier</h5>
              @foreach($cart as $item)
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <p class="mb-0"><strong>Libellé: </strong>{{ $item['wording'] }}</p>
                    <p class="mb-0"><strong>Catégorie: </strong>{{ $item['category'] }}</p>
                    <p class="mb-0"><strong>Quantité :</strong> {{ $item['quantity'] }}</p>
                    <p class="mb-0"><strong>Prix :</strong> {{ number_format($item['price'], 2) }} FCFA</p>
                  </div>
                </div>
              @endforeach
              <hr>
              <h5 class="text-end">Sous-total : <strong>{{ number_format($total, 2) }} FCFA</strong></h5>
            </div>
          </div>

          <!-- Détails de livraison -->
          <div class="card mt-4">
            <div class="card-body">
              <h5 class="text-uppercase mb-3">Détails de Livraison</h5>
              <p>Option de Livraison : 
                <strong>{{ $deliveryOption === 'pickup' ? 'Retrait sur place' : 'Livraison à domicile' }}</strong>
              </p>
              <p>Lieu de Livraison : 
                <strong>{{ $deliveryLocation ?? 'Non spécifié' }}</strong>
              </p>
              <p>Frais de Livraison : 
                <strong>{{ $deliveryOption === 'pickup' ? 'Pas de frais' : number_format($deliveryCost, 2) . ' FCFA' }}</strong>
              </p>
              <hr>
              <h5 class="text-end">Total à Payer : 
                <strong>{{ number_format($finalTotal, 2) }} FCFA</strong>
              </h5>
            </div>
          </div>

          <!-- Boutons d'action -->
          <div class="text-center mt-4">
            <a href="{{ route('Site-AboutGetShow') }}" class="btn btn-light">
              <i class="fas fa-arrow-left"></i> Retour
            </a>
            <form action="{{ route('Site-OrderPostConfirm') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">Valider la Commande</button>
            </form>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>




{{-- <section class="vh-100" style="background-color: #f2f2f2;">
  <div class="container py-5 d-flex justify-content-center">
    <div class="row">
      <div class="col-lg-12">
        <!-- Message d'erreur ou de succès -->
        @if(session('error'))
          <div class="alert alert-warning text-center">
            <h4>{{ session('error') }}</h4>
            <p>Veuillez vérifier les informations de votre panier et de livraison.</p>
            <a href="{{ route('cart.index') }}" class="btn btn-primary">Retour au panier</a>
          </div>
        @elseif(session('success'))
          <div class="alert alert-success text-center">
            <h4>{{ session('success') }}</h4>
            <p>Votre commande a été validée avec succès.</p>
            <a href="{{ route('invoice.pdf') }}" class="btn btn-primary mt-3">Télécharger votre facture (PDF)</a>
          </div>
        @endif

        <!-- Détails du panier -->
        <div class="card">
          <div class="card-header bg-warning text-white text-center">
            <h3>Bon de Commande</h3>
          </div>
          <div class="card-body">
            <h5 class="text-uppercase mb-3">Détails du Panier</h5>
            @foreach($cart as $item)
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <p class="mb-0"><strong>Libellé: </strong>{{ $item['wording'] }}</p>
                  <p class="mb-0"><strong>Catégorie: </strong>{{ $item['category'] }}</p>
                  <p class="mb-0"><strong>Quantité :</strong> {{ $item['quantity'] }}</p>
                  <p class="mb-0"><strong>Prix :</strong> {{ number_format($item['price_to_display'], 2) }} FCFA</p>
                </div>
              </div>
            @endforeach
            <hr>
            <h5 class="text-end">Sous-total : <strong>{{ number_format($total, 2) }} FCFA</strong></h5>
          </div>
        </div>

        <!-- Formulaire de livraison -->
        <div class="card mt-4">
          <div class="card-body">
            <h5 class="text-uppercase mb-3">Détails de Livraison</h5>
            <form action="" method="POST">
              @csrf
              <div class="mb-3">
                <label for="phone" class="form-label">Numéro de Téléphone <span class="text-danger">*</span></label>
                <input 
                  type="text" 
                  class="form-control" 
                  id="phone" 
                  name="phone" 
                  value="{{ old('phone') }}" 
                  placeholder="Ex: 0707070707" 
                  required>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer les Détails</button>
            </form>
          </div>
        </div>

        <!-- Boutons d'action -->
        <div class="text-center mt-4">
          <a href="{{ route('Site-AboutGetShow') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> Retour
          </a>
          <form action="{{ route('Site-OrderPostConfirm') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Valider la Commande</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section> --}}








@endsection