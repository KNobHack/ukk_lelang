@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="card-title">{{ __('home.welcome') }}</h5>
                    <p class="card-text">{{ __('home.app_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
