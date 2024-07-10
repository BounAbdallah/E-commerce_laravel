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
    <style>
        body {
            background-color: #ffffff;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #4CAF50;
        }

        .navbar .nav-link {
            color: #fff !important;
        }

        .carousel-item img {
            height: 300px;
            object-fit: cover;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin: 20px;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.9rem;
            border-radius: 5px;
        }

        .badge-disponible {
            background-color: #28a745;
            color: #fff;
        }

        .badge-rupture {
            background-color: #dc3545;
            color: #fff;
        }

        .badge-stock {
            background-color: #ffc107;
            color: #333;
        }

        .footer {
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .card-title {
            color: #1e4c72;
        }
        .card-text {
            color: #6c757d;
        }
        .btn-primary-custom {
            background-color: #1e4c72;
            border-color: #1e4c72;
        }
        .btn-secondary-custom {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .container{
            margin-bottom: 30px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .card-categorie{
            width: 250px;
            border:1px solid #1e4c72;
        }
    </style>
</head>

<body>
    <header>
       
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1e4c72;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/">E-commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mesCommandes">Commande</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/deconnexionClient">{{ session('status') }}Deconnexion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-cart"></i>
                        <span class="badge bg-danger">{{ count(session('panier', [])) }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (session('panier'))
                            @foreach (session('panier') as $item)
                                <li class="dropdown-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="{{ $item['image'] }}" alt="{{ $item['designation'] }}" style="width: 50px; height: 50px;">
                                        <span style="color: #007F01">{{ $item['designation'] }}</span>
                                    </div>
                                    <span style="color: #007F01">{{ $item['quantity'] }} x {{ $item['prix_unitaire'] }} CFA</span>
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

    <main>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </main>
    <div class="container">
        <div class="row categorie">
            <div class="col-md-6">
                <div class="image">
                    <img src="{{ asset('images/categorie.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="category-list">
                    <h2>Catégories</h2>
                    <div id="categoryButtons" class="row">
                        @foreach ($categories as $categorie)
                            <div class="col-md-6">
                                <a href="/categories/{{ $categorie->id }}" class="btn btn-custom">
                                    {{ $categorie->libelle }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2>Nos Produits</h2>

    <div class="container produits row row-cols-1 row-cols-md-3 g-4" style="margin-left: auto; margin-right:auto;">
    <?php foreach ($produits as $produit) : ?>
    <div class="card" style="width: 24rem;">
    <img src="<?= $produit->image ?>" alt="<?= $produit->designation ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $produit->designation ?></h5>
            <p class="card-text">Description du produit. Ce produit est très utile et de haute qualité.</p>
            <?php if ($produit->etat == 'disponible') : ?>
                    <p><span class="badge badge-disponible">Disponible</span></p>
                    <?php elseif ($produit->etat == 'en_rupture') : ?>
                    <p><span class="badge badge-rupture">En rupture</span></p>
                    <?php else : ?>
                    <p><span class="badge badge-stock">En stock</span></p>
                    <?php endif; ?>
            <p class="card-text"><strong>Prix :</strong> <?= $produit->prix_unitaire ?> Cfa</p>
            <div class="d-flex justify-content-between">
               
                <form action="/connexionClient" method="get">
                <button type="submit" class="btn btn-warning">Ajouter au panier</button>
                    </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

           

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>