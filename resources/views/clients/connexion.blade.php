<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            align-items: center;
        }
        .container{
            margin-top: 200px;

        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #1e4c72;
        }

        .form-group label {
            display: flex;
            flex-direction: column;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #1e4c72;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #1e4c72;
            color: #fff;
            border-radius: 5px;
            padding: 12px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #0d2a3a;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        .signup-link p {
            margin-bottom: 0;
        }

        .signup-link a {
            color: #1e4c72;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #0d2a3a;
        }
        input{
            width: 95%;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1 class="form-title">Connexion</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="/traitementConnexionClient">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror"
                        id="mot_de_passe" name="mot_de_passe" required>
                    @error('mot_de_passe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-custom">Connexion</button>
            </form>
            <div class="signup-link">
                <p>Vous êtes nouveau?</p>
                <p><a href="/inscriptionClient">S'inscrire</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
