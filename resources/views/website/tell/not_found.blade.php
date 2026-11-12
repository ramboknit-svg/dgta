@extends('website.app_new')
 @section('content')
    

<style nonce="{{ app('cspNonce') }}">

.flex.items-center.justify-center.min-h-screen {
    height: 80vh;
    display: flex
;
    justify-content: center;
    align-items: center;
}
    </style>
   

<div class="flex items-center justify-center min-h-screen">
 
    <div class="text-center">
        <h1 class="text-4xl font-bold">404</h1>
        <p class="mt-4">Sorry, the page you are looking for could not be found.</p>

        <a href="{{ url('/') }}" class="mt-6 inline-block text-blue-500">
            Go back home
        </a>
    </div>
</div>

 @endsection
