<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #1e4c72;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .navbar-nav .nav-link:hover {
            color: #007F01;
        }
        .badge-custom {
            background-color: #dc3545;
        }
        .btn-custom {
            background-color: #1e4c72;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #164a58;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        .footer .logo-img {
            width: 100px;
        }
        .table {
            background-color: white;
        }
    </style>
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
                            <a class="nav-link active" aria-current="page" href="/profil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mesCommandes">Commande</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/deconnexionClient">{{ session('status') }}Deconnexion</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge badge-custom">{{ count(session('panier', [])) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (session('panier'))
                                    @foreach (session('panier') as $item)
                                        <li class="dropdown-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['designation'] }}"
                                                    style="width: 50px; height: 50px;">
                                                <span>{{ $item['designation'] }}</span>
                                            </div>
                                            <span>{{ $item['quantity'] }} x {{ $item['prix_unitaire'] }} CFA</span>
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

    <div class="container mt-5">
        <h2>Récapitulatif de votre commande</h2>
        @if (session('panier') && count(session('panier')) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Désignation</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panier as $item)
                            <tr>
                                <td><img src="{{ $item['image'] }}" alt="{{ $item['designation'] }}"
                                        style="width: 100px; height: 100px;"></td>
                                <td>{{ $item['designation'] }}</td>
                                <td>{{ $item['prix_unitaire'] }} CFA</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ $item['prix_unitaire'] * $item['quantity'] }} CFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end m-3">
                <form action="/traiterCommande" method="post">
                    @csrf
                    <button type="submit" class="btn btn-custom">Valider la commande</button>
                </form>
            </div>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>

    <footer class="footer mt-auto py-3">
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
