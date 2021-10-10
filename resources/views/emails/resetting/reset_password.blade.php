@component('mail::message')
# Réinitialisation du mot de passe

Vous avez demander un lien de réinitialisation de mot de passe de votre compte

@component('mail::button', ['url' => route('resetpassword')])
    Réinitialiser votre mot de passe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
