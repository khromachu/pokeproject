@extends('layouts.master')
@section('title')
    {{$pokemon->name}} | Pokeproject
@endsection
@section('content')
    <div class="btn-group btn-group-lg btn-block" role="group" aria-label="..." style="background-color: #cbd3da; width: 100%">
        @if($prev != null)
        <a href="/pokemon/{{$prev->id}}" type="button" class="btn btn-outline-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            №{{$prev->id}} {{$prev->name}}
        </a>
        @endif
        @if($next != null)
        <a href="/pokemon/{{$next->id}}" type="button" class="btn btn-outline-secondary">
            {{$next->name}} №{{$next->id}}
            <i class="far fa-arrow-alt-circle-right"></i>
        </a>
            @endif
    </div>
    <article>
        <div class="row">
            <div class="col">
                <h2 style="text-align: right" class="mt-4 mb-4">№{{$pokemon->id}}</h2>
                <div class="ml-5">
                    <img class="img-thumbnail" alt="..." style="width: 100%"
                         src="{{$pokemon->image}}">
                </div>
            </div>

            <div class="col pr-5">
                <h2 class="mt-4 mb-4">{{$pokemon->name}}</h2>
                <h5>Type</h5>
                <span class="badge bg-primary" style="font-size: 1rem">{{$pokemon->type->name}}</span>
                <h5 class="mt-3">Weaknesses</h5>
                @foreach($weaknesses as $weakness)
                    <span class="badge bg-danger" style="font-size: 1rem">{{$weakness->a_type->name}}</span>
                @endforeach
                <section class="my-4 bg-secondary p-2 text-light rounded">
                    <h5>Stats</h5>
                    <div style="display: grid; grid-template-columns: 2fr 5fr">
                        <span>HP</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_hp}}/150)" aria-valuenow="{{$pokemon->base_hp}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_hp}}</div>
                        </div>
                        <span>Attack</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_attack}}/150)" aria-valuenow="{{$pokemon->base_attack}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_attack}}</div>
                        </div>
                        <span>Defense</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_defence}}/150)" aria-valuenow="{{$pokemon->base_defence}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_defence}}</div>
                        </div>
                        <span>Special Attack</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_special_attack}}/150)" aria-valuenow="{{$pokemon->base_special_attack}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_special_attack}}</div>
                        </div>
                        <span>Special Defense</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_special_defence}}/150)" aria-valuenow="{{$pokemon->base_special_defence}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_special_defence}}</div>
                        </div>
                        <span>Speed</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * {{$pokemon->base_speed}}/150)" aria-valuenow="{{$pokemon->base_speed}}" aria-valuemin="0" aria-valuemax="150">{{$pokemon->base_speed}}</div>
                        </div>
                    </div>
                </section>
                @if(Auth::user() != null)
                    @if(Auth::user()->role_id == 2)
                        <form class="d-flex flex-column" action="/pokemon/{{$pokemon->id}}/edit" method="post">
                            @csrf
                            <div style="display: grid; grid-template-columns: 0.8fr 2fr">
                                <label for="customRange2" class="form-label">HP</label>
                                <input name="base_hp" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_hp}}" step="1" id="customRange2">
                                <label for="customRange3" class="form-label">Attack</label>
                                <input name="base_attack" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_attack}}" step="1" id="customRange3">
                                <label for="customRange4" class="form-label">Defense</label>
                                <input name="base_defence" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_defence}}" step="1" id="customRange4">
                                <label for="customRange5" class="form-label">Special Attack</label>
                                <input name="base_special_attack" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_special_attack}}" step="1" id="customRange5">
                                <label for="customRange6" class="form-label">Special Defense</label>
                                <input name="base_special_defence" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_special_defence}}" step="1" id="customRange6">
                                <label for="customRange7" class="form-label">Speed</label>
                                <input name="base_speed" type="range" class="form-range" min="0" max="150" value="{{$pokemon->base_speed}}" step="1" id="customRange7">
                                <label for="type_select" class="form-label">Type</label>
                                <select id="type_select" name="type_id" required class="form-control">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" @if($pokemon->type_id == $type->id) selected @endif>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="my-2 align-self-end btn btn-outline-primary" style="width: 100px">Save</button>
                        </form>
                    @endif
                @endif

            </div>
        </div>

            <section class="my-5 bg-secondary p-2 rounded mx-auto"
                    style="max-width: 1000px; background-image: url('/images/back1.png')">
                <h3 class="text-light my-2 ml-3">Evolution Stages</h3>
                <div class="row no-gutters justify-content-center m-lg-2 align-items-center">

                    @foreach($evo_chain as $evo)
                            <a href="/pokemon/{{$evo->id}}" class="card jump--hover m-3" style="max-width: 160px">
                                <img src="{{$evo->image}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">№{{$evo->id}}</h6>
                                    <h6 class="card-title">{{$evo->name}}</h6>
                                    <span class="badge bg-primary">{{$evo->type->name}}</span>
                                </div>
                            </a>
                        @if(end($evo_chain)->id != $evo->id)
                            <i class="fas fa-angle-right text-light" style="max-width: 30px; font-size: 30px"></i>
                        @endif
                    @endforeach
                </div>
            </section>
    </article>
@endsection
