@component('mail::message')
# {{$title}}

{{-- <img src="https://www.mediafire.com/convkey/7ce1/9qep4gdrsrr27u5zg.jpg"  width="50%" height="90%"  alt="..."> --}}
{{$pragra}}

@component('mail::button', ['url' => 'https://mail.google.com/mail/u/0/#inbox'])
الرجوع للموقع
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
