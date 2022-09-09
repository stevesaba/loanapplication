@component('mail::message')

Hello {{$body['name']}},<br><br>
{{$body['mailcontent']}}

@component('mail::button', ['url' => 'https://adomestic.com/loanapp/customerlogin'])
Click Here To View
@endcomponent

<br><br>
Thank & Regards<br>
Team Loan Connect


@endcomponent
