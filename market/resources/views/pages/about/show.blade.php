@extends('layout.master')

@section('content')


<section>

  <br><br>
  <!-- Section Produits -->
  <div class="container my-5">

    <!-- Bulles animées -->
    <div>
      <div class="bubble bubble1">
        <img src="https://via.placeholder.com/60x60?text=Tomate" alt="Tomate">
      </div>
      <div class="bubble bubble2">
        <img src="https://via.placeholder.com/60x60?text=Carotte" alt="Carotte">
      </div>
      <div class="bubble bubble3">
        <img src="https://via.placeholder.com/60x60?text=Courgette" alt="Courgette">
      </div>
      <div class="bubble bubble4">
        <img src="https://via.placeholder.com/60x60?text=Oignon" alt="Oignon">
      </div>
      <div class="bubble bubble5">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble6">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble7">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble8">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble9">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble10">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble11">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble12">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble13">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble14">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble15">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble16">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble17">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble18">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble19">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
      <div class="bubble bubble20">
        <img src="https://via.placeholder.com/60x60?text=Poivron" alt="Poivron">
      </div>
    </div>



  {{-- <div class="row" style="margin-bottom:20rem;">
      @foreach ($product as $index => $item)
          @if ($index % 5 === 0 && $index !== 0)
              </div><div class="row" style="margin-bottom: 3rem;">
          @endif
        
          <div class="col-md-4 mt-4 product-card {{ $item->category ?? 'all' }}">
              <div class="card shadow" style="width: 18rem; margin-left:5rem;">
                  <img src="{{ asset('storage/' . $item->image ?? 'Non Renseigné') }}" class="card-img-top" style="width:18rem; height: 14rem;">
                  <div class="card-body">
                      <h5 class="card-title">{{ $item->wording ?? 'Non Renseigné' }}</h5>
                      <p class="card-text">{{ $item->description ?? 'Non Renseigné' }}</p>
                      <p class="card-text">Stock Disponible: <span class="text-danger">{{ $item->stock ?? 'Non Renseigné' }}</span> </p>
                      
                      <!-- Prix -->
                      <p class="card-text">
                          Prix :
                          @if ($isMarketDay)
                              <span class="text-decoration-line-through">
                                  {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                              </span>
                              <span class="text-success">
                                  {{ number_format($item->discounted_price ?? 0, 2) }} FCFA/kg
                              </span>
                              <small class="bg-danger text-white">(-20% Jour du marché)</small>
                          @else
                              {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                          @endif
                      </p>
  
                      <!-- Formulaire -->
                      <form class="d-flex flex-column add-to-cart-form" method="POST" action="{{ route('Site-CartPostAdd', $item->id) }}">
                          @csrf
                          <input type="hidden" name="id" value="{{ $item->id ?? 'Non Renseigné' }}">
                          <input type="hidden" name="image" value="{{ $item->image ?? 'Non Renseigné' }}">
                          <input type="hidden" name="wording" value="{{ $item->wording ?? 'Non Renseigné' }}">
                          <input type="hidden" name="category" value="{{ $item->category ?? 'Non Renseigné' }}">
                          <div class="d-flex align-items-center" style="gap: 10px; margin-bottom: 15px;">
                              <input type="number" name="quantity" min="1" max="{{ $item->stock ?? 'Non Renseigné' }}" value="1" class="form-control" style="width: 60px;">
                              <select name="type" class="form-select" style="width: 150px;">
                                  <option value="sec">Sec</option>
                                  <option value="frais">Frais</option>
                              </select>
                          </div>
                          <input type="hidden" name="price" value="{{ $item->price ?? 'Non Renseigné' }}">
                          <button type="submit" class="btn btn-buy w-100 add-to-cart-btn">Ajouter au panier</button>
                      </form>
                  </div>
              </div>
          </div>
      @endforeach  
  </div>


  <br><br>
  <div class="pagination">
    {{ $product->links() }}
  </div>  --}}




  {{-- <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($product as $index => $item)
            <div class="col product-card {{ $item->category ?? 'all' }}">
                <div class="card shadow h-100">
                    <img src="{{ asset('storage/' . $item->image ?? 'Non Renseigné') }}" class="card-img-top" style="height: 14rem; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->wording ?? 'Non Renseigné' }}</h5>
                        <p class="card-text">{{ $item->description ?? 'Non Renseigné' }}</p>
                        <p class="card-text">Stock Disponible: <span class="text-danger">{{ $item->stock ?? 'Non Renseigné' }}</span></p>
                        
                        <!-- Prix -->
                        <p class="card-text">
                            Prix :
                            @if ($isMarketDay)
                                <span class="text-decoration-line-through">
                                    {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                                </span>
                                <span class="text-success">
                                    {{ number_format($item->discounted_price ?? 0, 2) }} FCFA/kg
                                </span>
                                <small class="bg-danger text-white px-1 rounded">(-20% Jour du marché)</small>
                            @else
                                {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                            @endif
                        </p>
    
                        <!-- Formulaire -->
                        <form class="d-flex flex-column add-to-cart-form" method="POST" action="{{ route('Site-CartPostAdd', $item->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id ?? 'Non Renseigné' }}">
                            <input type="hidden" name="image" value="{{ $item->image ?? 'Non Renseigné' }}">
                            <input type="hidden" name="wording" value="{{ $item->wording ?? 'Non Renseigné' }}">
                            <input type="hidden" name="category" value="{{ $item->category ?? 'Non Renseigné' }}">
                            <div class="d-flex align-items-center" style="gap: 10px; margin-bottom: 15px;">
                                <input type="number" name="quantity" min="1" max="{{ $item->stock ?? 'Non Renseigné' }}" value="1" class="form-control" style="width: 60px;">
                                <select name="type" class="form-select" style="width: 150px;">
                                    <option value="sec">Sec</option>
                                    <option value="frais">Frais</option>
                                </select>
                            </div>
                            <input type="hidden" name="price" value="{{ $item->price ?? 'Non Renseigné' }}">
                            <button type="submit" class="btn btn-primary w-100 add-to-cart-btn">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach  
    </div>

    <!-- Pagination -->
    @if ($product->count() > 6)
      <div class="pagination" style="margin-top:80rem;">
        {{ $product->links() }}
      </div>
    @endif
  </div>

    
    <!-- Menu des filtres en bas -->
    <div class="filter-section d-flex justify-content-around">
      <button class="btn btn-outline-primary w-20" onclick="filterProducts('all')">Tous</button>
      <div class="divider"></div>
      <button class="btn btn-outline-success w-20" onclick="filterProducts('legume')">Légumes</button>
      <div class="divider"></div>
      <button class="btn btn-outline-warning w-20" onclick="filterProducts('epice')">Epices</button>
      <div class="divider"></div>
      <button class="btn btn-outline-warning w-20" onclick="filterProducts('fruit')">Fruits</button>
      <div class="divider"></div>
      <button class="btn btn-outline-warning w-20" onclick="filterProducts('viande')">Viandes</button>
    </div>
  </div> --}}









  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($product as $item)
            <div class="col product-card {{ $item->category ?? 'all' }}">
                <div class="card shadow h-100">
                    <!-- Image -->
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/img.jpg') }}" 
                    class="card-img-top" style="height: 14rem; object-fit: cover;">

                    <!-- Détails du produit -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->wording ?? 'Non Renseigné' }}</h5>
                        <p class="card-text">{{ $item->description ?? 'Non Renseigné' }}</p>
                        <p class="card-text"><span class="bg-warning text-white px-1 rounded">{{ $item->category ?? 'Non Renseigné' }}</span></p>
                        
                        <!-- Prix -->
                        <p class="card-text">
                            Prix :
                            @if ($isMarketDay)
                                <span class="text-decoration-line-through">
                                    {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                                </span>
                                <span class="text-success">
                                    {{ number_format($item->discounted_price ?? 0, 2) }} FCFA/kg
                                </span>
                                <small class="bg-danger text-white px-1 rounded">(-50% Jour du marché)</small>
                            @else
                                {{ number_format($item->price ?? 0, 2) }} FCFA/kg
                            @endif
                        </p>

                        <!-- Formulaire -->
                        <form class="d-flex flex-column add-to-cart-form" method="POST" action="{{ route('Site-CartPostAdd', $item->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id ?? 'Non Renseigné' }}">
                            <input type="hidden" name="image" value="{{ $item->image ?? 'Non Renseigné' }}">
                            <input type="hidden" name="wording" value="{{ $item->wording ?? 'Non Renseigné' }}">
                            <input type="hidden" name="category" value="{{ $item->category ?? 'Non Renseigné' }}">
                            <div class="d-flex align-items-center" style="gap: 10px; margin-bottom: 15px;">
                                <input type="number" name="quantity" min="1" max="{{ $item->stock ?? 'Non Renseigné' }}" value="1" class="form-control" style="width: 60px;">
                                <select name="type" class="form-select" style="width: 150px;">
                                    <option value="sec">Sec</option>
                                    <option value="frais">Frais</option>
                                </select>
                            </div>
                            <input type="hidden" name="price" value="{{ $item->price ?? 'Non Renseigné' }}">
                            <button type="submit" class="btn btn-primary w-100 add-to-cart-btn">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit disponible dans cette catégorie.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pagination" style="margin-top:80rem;">
        {{ $product->links() }}
    </div>
  </div>



<!-- Menu des filtres -->
<div class="filter-section d-flex justify-content-around">
    <button class="btn btn-outline-primary w-20" onclick="filterProducts('all')">Tous</button>
    <div class="divider"></div>
    <button class="btn btn-outline-success w-20" onclick="filterProducts('legume')">Légumes</button>
    <div class="divider"></div>
    <button class="btn btn-outline-warning w-20" onclick="filterProducts('epice')">Epices</button>
    <div class="divider"></div>
    <button class="btn btn-outline-warning w-20" onclick="filterProducts('fruit')">Fruits</button>
    <div class="divider"></div>
    <button class="btn btn-outline-warning w-20" onclick="filterProducts('viande')">Viandes</button>
</div>


  
</section>















<script>
  function filterProducts(category) {
      const url = new URL(window.location.href);
      url.searchParams.set('category', category);
      window.location.href = url;
  }
</script>















@endsection