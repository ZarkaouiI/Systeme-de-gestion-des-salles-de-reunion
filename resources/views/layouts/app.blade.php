<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Système de gestion des salles de réunion</title>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-3">Accueil</a>
                </li>
                <li>
                    <a href="" class="p-3">Salles</a>
                </li>
                <li>
                    <a href="{{ route('reservations') }}" class="p-3">Réservations</a>
                </li>
            </ul>
            <ul class="flex items-center">
                @auth
                    @if (auth()->user()->isadmin)
                        <li>
                            <a href="{{ route('adminpage') }}" class="p-3">{{ auth()->user()->name }}</a>
                        </li>
                    @else
                        <li>
                            <p>{{ auth()->user()->name }}</p>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Se-Déconnecter</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Se-Connecter</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">S'inscrire</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
