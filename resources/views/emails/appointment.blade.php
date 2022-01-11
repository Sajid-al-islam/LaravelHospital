@component('mail::message')
# Introduction

Your appointment time is {{ $apt }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
