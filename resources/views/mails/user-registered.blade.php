@component('mail::message')
Gentile {{ $user->name }}

Siamo lieti che ti sia iscritto a questo sito di merda.

Pigia sul link

@component('mail::button', ['url' => route('login')])
Accedi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
