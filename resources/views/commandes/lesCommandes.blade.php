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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #1e4c72;
        }

        .navbar-brand {
            color: white;
        }

        .nav-link {
            color: white;
        }

        .nav-link.active {
            background-color: #007F01;
            border-radius: 5px;
        }

        .dropdown-item {
            color: #007F01;
        }

        .btn-custom {
            background-color: #1e4c72;
            color: white;
        }

        .btn-custom:hover {
            background-color: #164a58;
        }

        .footer {
            background-color: #1e4c72;
            color: white;
            text-align: center;
        }

        .footer .logo-img {
            width: 100px;
        }

        .table {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">E-commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="/deconnexionClient">{{ session('status') }}Déconnexion</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-cart"></i>
                                <span class="badge bg-danger">{{ count(session('panier', [])) }}</span>
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
        <h2>Mes Commandes</h2>
        @if ($commandes->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>État</th>
                            <th>Montant Total</th>
                            <th>Date</th>
                            <th>Détails</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->reference }}</td>
                                <td>{{ $commande->etat_commande }}</td>
                                <td>{{ $commande->montant_total }} CFA</td>
                                <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                                <td><a href="/commande/{{ $commande->id }}" class="btn btn-custom">Voir Détails</a>
                                </td>
                                <td><a href="{{ route('commande.edit', $commande->id) }}"
                                        class="btn btn-custom">Modifier</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Vous n'avez pas encore passé de commandes.</p>
        @endif
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <img src="{{ asset('images/logo1.png') }}" alt="logo" class="logo-img">
            <p>© {{ date('Y') }} Kane & frère. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var currentLocation = window.location.pathname;
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function (link) {
                if (link.getAttribute('href') === currentLocation) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
