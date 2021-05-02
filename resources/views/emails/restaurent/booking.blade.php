@component('mail::message')
# Hello

This Message is for Booking for restaurent.

@component('mail::message')
You have a new booking for {{$people ?? ''}} people at {{$time ?? ''}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
