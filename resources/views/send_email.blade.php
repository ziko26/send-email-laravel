@component('mail::layout')

        @component('mail::header', ['url' => ''])
            
        @endcomponent

    <h2 style="text-align:center;margin-top:50px">This E-mail Form : {{$data['name']}}</h2>

    <p style="margin-left:20px">{{$data['subject']}}</p>

        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('Tous droits réservés.')

@endcomponent