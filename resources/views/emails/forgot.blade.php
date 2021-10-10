<h1>
    Bonjour {{ $user->name }}
</h1>
<p>
    Vous avez demander un lien de réinitialisation de votre mot de passe.
    Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe:
    <br>
    <a href="{{ url('reset_password/'.$user->email) }}" class="font-bold text-blue-500">Reset password</a>
</p>
