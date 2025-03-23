<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="{{ asset('/images/LOGO.png') }}" rel="icon">
    <link href="{{ asset('/images/LOGO.png') }}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style global */
        body {
            background-color: #f5f5f5;
            /* Fond gris clair */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background: #fff;
        }

        /* Titre */
        .card h3 {
            color: #333;
            font-weight: bold;
            text-align: center;
        }

        /* Champs de saisie */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            border-color: #6c757d;
            box-shadow: 0 0 5px rgba(108, 117, 125, 0.3);
            background-color: #fff;
        }

        /* Bouton */
        .btn-primary {
            background-color: #6c757d;
            /* Gris foncé */
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #5a6268;
            /* Gris légèrement plus foncé */
            transform: scale(1.03);
        }

        /* Espace du logo */
        .logo {
            text-align: center;
            margin-bottom: 15px;

        }

        .logo img {
            width: 160px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="logo">
                        <img src="images/LOGO.png" alt="Logo">
                    </div>

                    <!-- Titre -->
                    <h3 style="font-family: 'Times New Roman', Times, serif; font-size:30px;" class="mb-4">{{ __('Inscription') }}</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">{{ __('Nom') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">{{ __('Mot de passe') }}</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirmer le mot de passe') }}</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('S’inscrire') }}
                        </button>
                    </form>
                </div> <br>
                <a href="/login" style="text-align: end;" class="btn btn-primary "> Retour </a>

            </div>
        </div>
    </div>

</body>

</html>