@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <blockquote>
<p class="blockquote blockquote-primary">
You have been successfully registered!   <small>
  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </small>


</p>
</blockquote>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
