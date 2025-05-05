@extends('layout.master')

@section('content')




{{-- <section class="vh-100" style="background-color: #fdccbc;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <p><span class="h2">Nombre d'article ajouté au panier </span><span class="h4">({{ $cartCount }})</span></p>
  
          <div class="card mb-4">
            <div class="card-body p-4">
  
            @foreach ($cart as $id => $item)    
              <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid" style="max-width: 100px;">
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Libéllé</p>
                    <p class="lead fw-normal mb-0">{{ $item['wording'] }}</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Catégorie</p>
                    <p class="lead fw-normal mb-0">{{ $item['category'] }}</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Quantité</p>
                    <p class="lead fw-normal mb-0">{{ $item['quantity'] }}</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Prix</p>
                    <p class="lead fw-normal mb-0">{{ $item['price'] }}</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Total</p>
                    <p class="lead fw-normal mb-0"><strong>{{ number_format(session('totalPrice', 0), 2) }} FCFA</p>
                  </div>
                  <div class="mt-4 ms-4">
                    <a href="{{ route('Site-CartGetRemove', $id) }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                  </div>
                </div>

              </div>
            @endforeach
            </div>
          </div>
  
          <div class="card mb-5">
            <div class="card-body p-4">
  
              <div class="center">
                <h5 class="text-uppercase mb-3"><u>Coût de la livraison</u></h5>
                <p class="mb-0 me-5 d-flex align-items-center">
                    "Choisissez retrait sur place pour éviter les frais de livraison, ou sélectionnez une adresse pour une livraison sécurisée."
                </p>
                <form id="delivery-form" method="POST" action="">
                    @csrf
        
                    <!-- Option de retrait sur place (case à cocher) -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="delivery_option" id="pickup" value="pickup" data-cost="0">
                        <label class="form-check-label" for="pickup">
                            Retrait sur place (Gratuit)
                        </label>
                    </div>
        
                    <!-- Sélection de livraison -->
                    <select id="delivery-select" name="delivery" class="form-select mb-2" required>
                        <option value="" data-cost="0" disabled selected>Sélectionner un lieu de livraison</option>
                        <option value="1500" data-cost="1500" data-location="Yopougon">Livraison Yopougon - 1500 FCFA</option>
                        <option value="2000" data-cost="2000" data-location="Abobo">Livraison Abobo - 2000 FCFA</option>
                        <option value="2500" data-cost="2500" data-location="Port-Bouet">Livraison Port-Bouet - 2500 FCFA</option>
                        <option value="1000" data-cost="1000" data-location="Cocody">Livraison Cocody - 1000 FCFA</option>
                    </select>
                    
                    <input type="hidden" name="delivery_cost" id="delivery-cost-hidden">
                    <input type="hidden" name="delivery_location" id="delivery-location-hidden">
        
                    <hr class="my-4">
        
                    <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase">Total prix</h5>
                        <h5 id="final-total"> FCFA</h5> <!-- Total + frais de livraison -->
                    </div>
        
                    <button type="submit" class="btn btn-dark btn-block btn-lg">Valider</button>
                </form>
              </div>
  
            </div>
          </div>
  
          <div class="d-flex justify-content-end">
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg me-2">Continuer Votre Achat</button>
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Passer la Commande</button>
          </div>
  
        </div>
      </div>
    </div>
</section> --}}






<div style="margin-top:15rem;">
  <div class="container">
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
</div>




<section class="vh-100" style="background-color: #fdccbc;">
  <div class="container h-100">
      
      
      <!-- Contenu du panier -->
      <div class="row h-100 d-flex justify-content-center align-items-center">
          <div class="col-md-8">
              <!-- Carte du Panier -->
              <div class="card mb-4">
                  <div class="card-body p-4">
                      
                      @foreach($cart as $item)
                          <div class="row align-items-center mb-3">
                              <div class="col-md-2">
                                <img id="image" src="{{ asset('storage/' . $item['image']) }}" class="img-fluid rounded-circle" style="max-width: 100px;">
                              </div>
                              <div class="col-md-4">
                                  <h5>{{ $item['wording'] }}</h5>
                                  <p class="text-muted">{{ $item['category'] }}</p>
                              </div>
                              <div class="col-md-3">
                                  <p>Quantité : {{ $item['quantity'] }}</p>
                                  <p>Prix :
                                      @if ($isMarketDay)
                                          <span class="text-success">{{ number_format($item['price_to_display'], 2) }} FCFA</span>
                                      @else
                                          <span class="text-muted">{{ number_format($item['price_to_display'], 2) }} FCFA</span>
                                      @endif
                                  </p>
                              </div>
                              <div class="col-md-3">
                                  <p>Total : {{ number_format($item['total'], 2) }} FCFA</p>
                                  <a href="{{ route('Site-CartGetRemove', $item['id']) }}" class="text-danger">
                                      <i class="fas fa-trash fa-lg"></i>
                                  </a>
                              </div>
                          </div>
                      @endforeach

                      <!-- Affichage du total du panier -->
                      <h5 class="text-end">
                          Prix Total Panier : <strong>{{ number_format($total, 2) }} FCFA</strong>
                      </h5>


                  </div>
              </div>



              <!-- Bouton de retour -->
              <div class="row">
                <div class="col-12">
                    <a href="{{ route('Site-AboutGetShow') }}" class="btn btn-light mb-4">
                        <i class="fas fa-arrow-left"></i> Retour aux achats
                    </a>
                </div>
              </div>
          </div>
          {{-- <div class="col-md-4">
             
              <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="text-uppercase mb-3"><u>Coût de la livraison</u></h5>
                    <p>Choisissez retrait sur place pour éviter les frais de livraison, ou sélectionnez une adresse pour une livraison sécurisée.</p>
                    <form id="delivery-form" method="POST" action="{{ route('Site-DeliveryPostStore') }}">
                        @csrf
                        <!-- Option de retrait sur place -->
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery_option" id="pickup" value="pickup" data-cost="0" onchange="handleDeliveryOptionChange()">
                            <label class="form-check-label" for="pickup">
                                Retrait sur place (Gratuit)
                            </label>
                        </div>
                        <!-- Option de livraison -->
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery_option" id="delivery" value="delivery" data-cost="2000" onchange="handleDeliveryOptionChange()">
                            <label class="form-check-label" for="delivery">
                                Se Faire Livrer (2000 FCFA, payé à la livraison)
                            </label>
                        </div>
                        <!-- Sélection de livraison -->
                        <select id="delivery-select" name="delivery_location" class="form-select mb-3">
                            <option value="" disabled selected>Sélectionner un lieu de livraison</option>
                            <option value="Yopougon">Yopougon</option>
                            <option value="Abobo">Abobo</option>
                            <option value="Port-Bouet">Port-Bouet</option>
                            <option value="Cocody">Cocody</option>
                        </select>
                        <input type="hidden" name="delivery_cost" id="delivery-cost-hidden">
                        <hr class="my-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total :</h5>
                            <span id="total-display">{{ is_numeric($total) ? number_format($total, 2) : '0.00' }} FCFA</span>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block btn-lg">Valider</button>
                    </form>
                </div>
            </div>
            
          </div> --}}


          <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="text-uppercase mb-3"><u>Coût de la livraison</u></h5>
                    <p>Choisissez retrait sur place pour éviter les frais de livraison, ou sélectionnez une adresse pour une livraison sécurisée.</p>
                    <form id="delivery-form" method="POST" action="{{ route('Site-DeliveryPostStore') }}">
                        @csrf
                        <!-- Option de retrait sur place -->
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery_option" id="pickup" value="pickup" data-cost="0" onchange="handleDeliveryOptionChange()">
                            <label class="form-check-label" for="pickup">
                                Retrait sur place (Gratuit)
                            </label>
                        </div>
                        <!-- Option de livraison -->
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="delivery_option" id="delivery" value="delivery" data-cost="2000" onchange="handleDeliveryOptionChange()">
                            <label class="form-check-label" for="delivery">
                                Se Faire Livrer (2000 FCFA, payé à la livraison)
                            </label>
                        </div>
                        <!-- Sélection de livraison -->
                        <select id="delivery-select" name="delivery_location" class="form-select mb-3">
                            <option value="" disabled selected>Sélectionner un lieu de livraison</option>
                            <option value="Yopougon">Yopougon</option>
                            <option value="Abobo">Abobo</option>
                            <option value="Port-Bouet">Port-Bouet</option>
                            <option value="Cocody">Cocody</option>
                        </select>
                        <input type="hidden" name="delivery_cost" id="delivery-cost-hidden">
                        <hr class="my-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total :</h5>
                            <span id="total-display">{{ is_numeric($total) ? number_format($total, 2) : '0.00' }} FCFA</span>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block btn-lg">Valider</button>
                    </form>
                </div>
            </div>
          </div>
      </div>
    
  </div>
</section>


















{{-- <script>
  function updateTotal() {
      // Récupérer le total de base
      let baseTotal = {{ is_numeric($total) ? $total : 0 }};
      
      // Initialiser le coût de livraison
      let deliveryCost = 0;

      // Vérifier quelle option de livraison est sélectionnée
      const deliveryOption = document.querySelector('input[name="delivery_option"]:checked');
      const deliverySelect = document.getElementById("delivery-select");

      // Si l'option "Se faire livrer" est sélectionnée
      if (deliveryOption && deliveryOption.value === 'delivery') {
          // Récupérer le lieu sélectionné et ajuster le coût de livraison
          switch (deliverySelect.value) {
              case 'Yopougon':
                  deliveryCost = 2000;
                  break;
              case 'Abobo':
                  deliveryCost = 2000;
                  break;
              case 'Port-Bouet':
                  deliveryCost = 2000;
                  break;
              case 'Cocody':
                  deliveryCost = 2000;
                  break;
              default:
                  deliveryCost = 0;
          }
      }

      // Calculer le total avec les frais de livraison
      const totalWithDelivery = baseTotal + deliveryCost;

      // Mettre à jour l'affichage du total
      document.getElementById("total-display").innerText = totalWithDelivery.toFixed(2) + " FCFA";

      // Mettre à jour les champs cachés
      document.getElementById("delivery-cost-hidden").value = deliveryCost;
      document.getElementById("delivery-location-hidden").value = deliverySelect.value || '';
  }

  // Initialisation du calcul du total au chargement de la page
  window.onload = updateTotal;
</script> --}}



<script>
  // Initialiser le total de base depuis le backend
  const baseTotal = parseFloat('{{ is_numeric($total) ? $total : 0 }}');

  function handleDeliveryOptionChange() {
      const deliveryOption = document.querySelector('input[name="delivery_option"]:checked');
      const deliveryCost = deliveryOption ? parseFloat(deliveryOption.dataset.cost) : 0;
      
      // Mettre à jour le champ caché pour les frais de livraison
      document.getElementById('delivery-cost-hidden').value = deliveryCost;

      // Calculer le nouveau total
      const updatedTotal = baseTotal + deliveryCost;

      // Mettre à jour l'affichage du total
      document.getElementById('total-display').textContent = updatedTotal.toLocaleString('fr-FR', {
          minimumFractionDigits: 2,
      }) + ' FCFA';
  }
</script>






@endsection
