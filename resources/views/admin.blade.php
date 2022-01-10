@extends('layouts.master')
@section('title')
    AdminPage | Pokeproject
@endsection

@section('content')

    @if(Auth::user() != null)
        @if(Auth::user()->role_id == 1)
            <admin-panel></admin-panel>
        @endif
    @endif

@endsection
