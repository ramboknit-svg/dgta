@extends('website.app_new')
 @section('content')
   
    <style nonce="{{ app('cspNonce') }}">
    .org-test-image {
        width: 100%;
        height: 80vh;
       
    }
</style>
    <div class="og-section">
        
      <img src="{{asset('/public/website/orgn.png')}}" class="org-test-image">
       
  </div>
   @endsection
