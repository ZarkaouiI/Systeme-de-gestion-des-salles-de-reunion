@component('mail::message')
# RĂ©initialisation du mot de passe

Vous avez demander un lien de rĂ©initialisation de mot de passe de votre compte

@component('mail::button', ['url' => route('resetpassword')])
    RĂ©initialiser votre mot de passe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
