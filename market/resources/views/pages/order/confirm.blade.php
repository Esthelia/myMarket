@extends('layout.master')

@section('content')





<section class="vh-100" style="background-color: #f2f2f2;">
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
          <div class="card mt-4">
            <div class="card-header bg-warning text-white text-center">
              <h3>Bon de Commande</h3>
            </div>
            <div class="card-body">
              <h5 class="text-uppercase mb-3">Détails du Panier</h5>
              @if($cart && count($cart) > 0)
                @foreach($cart as $item)
                  <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                    <div>
                      <p class="mb-0"><strong>Libellé : </strong>{{ $item['wording'] }}</p>
                      <p class="mb-0"><strong>Catégorie : </strong>{{ $item['category'] }}</p>
                      <p class="mb-0"><strong>Quantité :</strong> {{ $item['quantity'] }}</p>
                      <p class="mb-0"><strong>Prix unitaire :</strong> {{ number_format($item['price_to_display'], 2) }} FCFA</p>
                    </div>
                    <div>
                      <p class="mb-0"><strong>Total : </strong>{{ number_format($item['price_to_display'] * $item['quantity'], 2) }} FCFA</p>
                    </div>
                  </div>
                @endforeach
                <hr>
                <h5 class="text-end">Sous-total : <strong>{{ number_format($total, 2) }} FCFA</strong></h5>
              @else
                <p class="text-center text-muted">Votre panier est vide.</p>
              @endif
            </div>
          </div>
  
          <!-- Formulaire de livraison -->
          <div class="card mt-4">
            <div class="card-body">
              <h5 class="text-uppercase mb-3">Détails de Livraison</h5>
              <form action="{{ route('Site-OrderPostConfirm') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="phone" class="form-label">Numéro de Téléphone <span class="text-danger">*</span></label>
                  <input 
                    type="text" 
                    class="form-control" 
                    id="phone" 
                    name="phone" 
                    placeholder="Ex: 0707070707" 
                    required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Enregistrer les Détails</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
  
  





@endsection