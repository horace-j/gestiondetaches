   @if (Route::has('login'))
   <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
       @auth
       <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
       @else
       <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

       @if (Route::has('register'))
       <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
       @endif
       @endauth
   </div> @endif

   <style>
       /* Fond blanc pour le body */
       body {
           background-color: #FFFFFF;
           color: #333333;
       }

       /* Couleur grise pour les boutons */
       .btn-custom {
           background-color: #808080;
           color: #FFFFFF;
           border: none;
           padding: 10px 20px;
           border-radius: 5px;
           transition: all 0.3s ease-in-out;
       }

       .btn-custom:hover {
           background-color: #606060;
           transform: scale(1.05);
       }

       /* Couleur grise pour les liens */
       a {
           color: #808080;
           text-decoration: none;
           transition: all 0.3s ease-in-out;
       }

       a:hover {
           color: black !important;
           font-weight: bold !important;
           text-decoration: underline;
       }

       /* En-tête gris */
       header {
           background-color: #808080;
           color: #FFFFFF;
           padding: 15px;
           text-align: center;
           font-size: 24px;
           font-weight: bold;
       }

       /* Pied de page gris foncé */
       footer {
           background-color: #202020;
           color: #D3D3D3;
           text-align: center;
           padding: 10px;
           margin-top: 20px;
       }

       /* Sidebar avec fond blanc et texte gris */
       aside#sidebar {
           background-color: #FFFFFF;
           color: #808080;
       }

       /* Éléments interactifs dans la sidebar */
       aside#sidebar .nav-link {
           color: #808080;
       }

       aside#sidebar .nav-link:hover {
           background-color: #F0F0F0;
           color: #606060;
       }

       /* Boutons dans le header */
       .header .btn {
           background-color: #808080;
           color: #FFFFFF;
           border: none;
       }

       .header .btn:hover {
           background-color: #606060;
       }

       /* Badges */
       .badge {
           background-color: #808080;
           color: #FFFFFF;
       }

       /* Dropdowns */
       .dropdown-menu {
           background-color: #FFFFFF;
           border: 1px solid #808080;
       }

       .dropdown-item {
           color: #808080;
       }

       .dropdown-item:hover {
           background-color: #F0F0F0;
           color: #606060;
       }

       /* Styles pour le formulaire de déconnexion */
       #logout-form {
           display: none;
           position: absolute;
           top: 25px;
           left: 0;
           background: white;
           border: 1px solid #ddd;
           padding: 5px;
           border-radius: 5px;
           z-index: 10;
       }

       #logout-form button {
           font-size: 16px;
           font-weight: bold;
           text-decoration: none;
           color: black;
           background: none;
           border: none;
           cursor: pointer;
       }

       #logout-form button:hover {
           color: #606060;
       }

       .actived {
           color: white !important;
           /* Texte en blanc */
           background-color: grey;
           /* Fond en gris */
           padding: 5px 10px;
           /* Ajouter un peu d'espace autour du texte */
           border-radius: 4px;
           /* Arrondir les coins */
           text-decoration: none !important;
           /* Supprimer le soulignement du lien */
       }

       li a:hover {
           color: white;
           /* Texte en blanc au survol */
           background-color: darkgrey;
           /* Fond en gris foncé au survol */
       }
   </style>