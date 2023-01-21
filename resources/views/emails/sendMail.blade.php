@component('mail::message')
Ad= {{ $maildata['name'] }} <br>
Email= {{ $maildata['email'] }} <br>
Konu= <br>
{{ $maildata['body'] }}<br>

@component('mail::button', ['url' => $maildata['url']])
Doğrulayın
@endcomponent
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent