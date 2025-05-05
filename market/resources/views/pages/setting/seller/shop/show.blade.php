@extends('layout.master-2')


@section('content')


<div class="" style="background-image: url('images/accueil.jpg'); background-size: cover; background-position: center; padding: 5rem 2rem;">
    <!-- Barre de recherche -->
    <div class="search-bar" style="text-align: center; margin-bottom: 2rem;">
      <input 
        type="text" 
        placeholder="Recherchez vos légumes préférés..." 
        style="padding: 0.8rem; width: 50%; border-radius: 5px; border: 1px solid #ccc;">
      <button 
        style="padding: 0.8rem; background-color: #e76f51; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Rechercher
      </button>
    </div>
  
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
</div>

<div class="d-flex justify-content-center my-3">
    <ul class="list-unstyled d-flex">
        <li class="mx-2">
            <a href="#" class="button-name w-20" onclick="toggleSection('article')">Gestion d'Articles</a>
        </li>
        <li class="mx-2">
            <a href="#" class="button-name w-20" onclick="toggleSection('commande')">Commandes</a>
        </li>
        <li class="mx-2">
            <a href="#" class="button-name w-20" onclick="toggleSection('seller')">Gestion D'utilisateur</a>
        </li>
    </ul>
</div>

<div class="container my-5 d-flex justify-content-center">
    <!-- Section Articles -->
    <div class="product-card article-section" id="article-section" style="width:150rem;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Libéllé</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Nombre Kilo</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($product as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td><img src="{{ asset('storage/' . $item->image ?? 'Non Renseigné') }}" class="card-img-top" style="width:5rem; height: 5rem;"></td>
                    <td>{{ $item->wording ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->description ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->category ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->price ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->quantity ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->stock ?? 'Non Renseigné' }}</td>
                </tr>
              @endforeach  
            </tbody>
        </table>
    </div>

    <!-- Section Commandes -->
    <div class="product-card commande-section" id="commande-section" style="display: none; width:150rem;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Date de Commande</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Lieu de Livraison</th>
                    <th scope="col">Frais de Livraison</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td></td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="product-card seller-section" id="seller-section" style="display: none; width:150rem;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom & Prénom du Vendeur</th>
                    <th scope="col">Nom d’utilisateur</th>
                    <th scope="col">Adresse e-mail</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Localisation Geographique</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Entrez votre pays</th>
                    <th scope="col">Entrez votre ville</th>
                    <th scope="col">Entrez le nom de Votre Boutique</th>
                    <th scope="col">Type de Boutique</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  @foreach ($space as $item)
                    <th scope="row">{{ $item->id ?? 'Non Renseigné' }}</th>
                    <td>{{ $item->name ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->pseudo ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->email ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->phone ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->address ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->gender ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->country ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->city ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->shop ?? 'Non Renseigné' }}</td>
                    <td>{{ $item->category ?? 'Non Renseigné' }}</td>
                  @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>











@endsection








<script>
    // Fonction pour basculer la visibilité des sections
    function toggleSection(section) {
        // Sélection des sections
        const articleSection = document.getElementById('article-section');
        const commandeSection = document.getElementById('commande-section');
        const sellerSection = document.getElementById('seller-section');
        
        // Affiche uniquement la section sélectionnée
        if (section === 'article') {
            articleSection.style.display = 'block';
            commandeSection.style.display = 'none';
            sellerSection.style.display = 'none';
        } else if (section === 'commande') {
            articleSection.style.display = 'none';
            commandeSection.style.display = 'block';
            sellerSection.style.display = 'none';
        } else if (section === 'seller') {
            articleSection.style.display = 'none';
            commandeSection.style.display = 'none';
            sellerSection.style.display = 'block';
        }
    }
</script>
