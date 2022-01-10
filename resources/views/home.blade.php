@extends('layouts.master')
@section('title')
    Profile | Pokeproject
@endsection

@section('content')
    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
        <div class="card-body" style="max-height: 60px">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
            @endif
            <strong style="font-size: 16px">Pika-pika! You are logged in!</strong>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="mt-3">
    @if(Auth::user() != null)
        <div class="container" style="max-width: 800px; border-color: #95999c">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #cbd3da; font-size:16px">Your profile</div>
                        <div class="card-body" style="background-image: url('/images/back1.png'); border-color: grey">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row mx-auto" style="max-width: 35%;">
                                    <img src="https://avatars.dicebear.com/api/adventurer-neutral/{{ __('E-Mail Address') }}.svg"
                                         class="img-thumbnail" style="border-radius: 5px">
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" disabled class="form-control " name="name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" disabled class="form-control" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                    <div class="col-md-6">
                                        <input id="role" disabled class="form-control" value="{{$user_role->name}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
