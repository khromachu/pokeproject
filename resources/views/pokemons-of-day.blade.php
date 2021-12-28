@extends('layouts.master')
@section('title')
    Pokemons of Day | Pokeproject
@endsection
@section('content')
    <h2 class="mb-3" style="text-align: center">Ваши Покемоны дня</h2>
    <div class="mx-5">
        <p style="font-size: 18px; text-align: center">Нажмите на кнопку "Испытать удачу!" и получите команду из пяти Покемонов, подобранных для Вас случайным образом! Испытать удачу можно неограниченное количество раз :)</p>
    </div>
    <div class="row justify-content-center">
        <a href="/pokemons-of-day" type="button" class="btn btn-primary my-3" style="font-size: 18px; max-width: 400px;">
            Испытать удачу!
        </a>
    </div>
    <section class="mb-2 py-2" >
        <div style="display: grid; grid-template-columns: repeat(5, 1fr); grid-gap: 10px">
            @foreach($pokemons as $pokemon)
                <a href="/pokemon/{{$pokemon->id}}">
                    <div class="card jump--hover">
                        <img src="{{$pokemon->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">№{{$pokemon->id}}</h6>
                            <h4 class="card-title">{{$pokemon->name}}</h4>
                            <span class="badge bg-primary" style="font-size: 1rem">{{$pokemon->type->name}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
