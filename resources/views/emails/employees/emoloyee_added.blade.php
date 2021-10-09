@component('mail::message')
# Félécitations

Vous avez été ajouté comme salarié à notre entreprise

@component('mail::button', ['url' => route('reservations')])
    Se connecter à votre compte
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
