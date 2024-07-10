<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site E-commerce Alimentaire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #1e4c72;
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
            background-color: #1e4c72;
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
    <nav class="navbar navbar-expand-lg navbar-light">
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
                        <a class="nav-link" href="/boutique">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/connexionClient">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://imgs.search.brave.com/I9wSO9AQhXCQsk-E4MYdnsEQmQYclKz8LAW3H9z3SOk/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ1/NDA0NzExMy9mci9w/aG90by9sJUMzJUE5/Z3VtZXMtZGFucy11/bi1tYXJjaCVDMyVB/OS1mZXJtaWVyLmpw/Zz9zPTYxMng2MTIm/dz0wJms9MjAmYz1n/OVZWY3MzX3l4a3BJ/RWdPcjU2dDdxOVRZ/Mm5sQVdkMTRVNkFs/cFlFN0g4PQ" class="d-block w-100" alt="Fruits">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fruits frais</h5>
                    <p>Découvrez notre sélection de fruits frais et savoureux.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://imgs.search.brave.com/_KGE_4l48NE09E_Y2Z7cQ25R0QbBNt0hkV50lY0qpAc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAwLzY1LzcwLzY1/LzM2MF9GXzY1NzA2/NTk3X3VObTJTd2xQ/SXVOVUR1TXdvNnN0/QmQ4MWUyNVk4Szhz/LmpwZw" class="d-block w-100" alt="Légumes">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Légumes frais</h5>
                    <p>Des légumes frais pour une alimentation saine.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://imgs.search.brave.com/tsXHUMpOsBw1a6BEBf3Xc2wNiXYsfUY25dsN4ZOiKjU/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cGhvdG9zLXByZW1p/dW0vcmVnaW1lLW1l/ZGl0ZXJyYW5lZW4t/ZHUtcG9pc3Nvbi12/aWFuZGUtbGVndW1l/c185NTQxOS02Mjky/LmpwZz9zaXplPTYy/NiZleHQ9anBn" class="d-block w-100" alt="Produits laitiers">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Produits laitiers</h5>
                    <p>Produits laitiers de qualité pour toute la famille.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <section id="categories" class="mb-5">
            <h2>Catégories</h2>
            <div class="row">
    <?php foreach ($categories as $categorie) : ?>
               
                <div class="col-md-4">
                    <div class="card card-categorie">

                        <div class="card-body">
                            <h5 class="card-title">{{ $categorie->libelle }}</h5>
                           
                        </div>
                    </div>
                </div>
                <?php endforeach  ?>
            </div>
        </section>

       
          
           

  
    <div class="container mt-5">

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
</div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
