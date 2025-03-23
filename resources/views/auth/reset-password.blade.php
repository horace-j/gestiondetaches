<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
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

        .card-header {
            background-color: #f8f9fa;
            text-align: center;
            font-weight: bold;
            font-size: 1.25rem;
            border-bottom: 2px solid #ccc;
            padding: 20px;
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

        /* Alerte erreur */
        .alert {
            margin-bottom: 20px;
            border-radius: 8px;
        }

        /* Espacement */
        .mb-3 {
            margin-bottom: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- Titre -->
                    <p style="text-align: center;">
                        <img src="/images/LOGO.png" height="160px" alt="Logo de l'entreprise"> <!-- Remplacez "path/to/logo.png" par le chemin réel de votre logo -->

                    </p>
                    <div style="font-family: 'Times New Roman', Times, serif; font-size:30px;" class="card-header">
                        {{ __('Réinitialisation du mot de passe') }}
                    </div>

                    <div class="card-body">
                        <!-- Affichage d'une alerte en cas d'erreur -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">{{ __('Réinitialiser le mot de passe') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>