<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo1.png') }}" alt="logo"
                        class="logo-img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/profil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/shop">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mesCommandes">Commande</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/deconnexionClient">Deconnexion</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge bg-danger">{{ count(session('panier', [])) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (session('panier') && count(session('panier')) > 0)
                                    @foreach (session('panier') as $item)
                                        <li class="dropdown-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['designation'] }}"
                                                    style="width: 50px; height: 50px;">
                                                <span style=" color: #007F01">{{ $item['designation'] }}</span>
                                            </div>
                                            <span style=" color: #007F01">{{ $item['quantity'] }} x
                                                {{ $item['prix_unitaire'] }}CFA</span>
                                        </li>
                                    @endforeach
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="dropdown-item text-end">
                                        <a href="/voirPanier" class="btn btn-custom">Voir Panier</a>
                                    </li>
                                @else
                                    <li class="dropdown-item text-center">Votre panier est vide</li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner">
        <div class="banner-content">
            <div class="banner-text">
                <h1>Les Produits de la Catégorie <span
                        style="color: #ffb624; font-weight:bold">{{ $categorie->libelle }}</span></< /h1>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <button type="button" class="btn btn-custom" onclick="window.history.back();">Retour à l'accueil</button>
    </div>
    <div class="container produits row row-cols-1 row-cols-md-3 g-4" style="margin-left: auto; margin-right:auto;">
        @foreach ($produits as $produit)
            <div class="col">
                <div class="card">
                    <div class="position-relative">
                        <img src="{{ $produit->image }}" class="card-img-top img-fluid"
                            alt="{{ $produit->designation }}" style="height: 300px;">
                        <div class="overlay"></div>
                        <div class="details-icon-container">
                            <!-- Bouton pour ouvrir le modal -->
                            <button type="button" class="btn details-icon" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $produit->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->designation }}</h5>
                        <div class="infos">
                            <p class="card-text">Prix: {{ $produit->prix_unitaire }}Cfa</p>
                            <p class="card-text">
                                @if ($produit->etat == 'disponible')
                                    <span class="badge " style="background: #007F01">Disponible</span>
                                @elseif($produit->etat == 'en_rupture')
                                    <span class="badge bg-danger">En rupture</span>
                                @else
                                    <span class="badge bg-warning">En stock</span>
                                @endif
                            </p>
                        </div>
                        <form action="/ajoutPanier/{{ $produit->id }}" method="post">
                            @csrf
                            <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                            <button type="submit" class="btn btn-sm" data-bs-toggle="tooltip"
                                title="Ajouter au panier" style="color: #ffb624; font-size:30px">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal pour afficher les détails du produit -->
            <div class="modal fade" id="detailModal{{ $produit->id }}" tabindex="-1"
                aria-labelledby="detailModalLabel{{ $produit->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="detailModalLabel{{ $produit->id }}">Details
                                {{ $produit->designation }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-3" style="height: 250px">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        @if ($produit->image)
                                            <img src="{{ $produit->image }}" alt="{{ $produit->designation }}"
                                                class="img-fluid" style="width: 100%;height:250px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produit->designation }}</h5>
                                            <p class="card-text"><strong>Référence:</strong> {{ $produit->reference }}
                                            </p>
                                            <p class="card-text"><strong>Prix Unitaire:</strong>
                                                {{ $produit->prix_unitaire }} Cfa</p>
                                            <p class="card-text"><strong>État:</strong>
                                                @if ($produit->etat == 'disponible')
                                                    Disponible
                                                @elseif ($produit->etat == 'en_rupture')
                                                    En rupture
                                                @else
                                                    En stock
                                                @endif
                                            </p>
                                            <p class="card-text"><strong>Catégorie:</strong>
                                                {{ $produit->categorie->libelle }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="footer mt-auto py-3 ">
        <div class="container">
            <img src="{{ asset('images/logo1.png') }}" alt="logo" class="logo-img">
            <p>© {{ date('Y') }} Kane & frère. Tous droits réservés.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>