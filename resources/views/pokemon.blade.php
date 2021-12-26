@extends('layouts.master')
@section('title')
    Pokemon | Pokeproject
@endsection
@section('content')
    <div class="btn-group btn-group-lg btn-block" role="group" aria-label="..." style="background-color: #cbd3da">
        <a href="" type="button" class="btn btn-outline-secondary">
            <i class="far fa-arrow-alt-circle-left"></i>
            №131 Lapras
        </a>
        <a href="" type="button" class="btn btn-outline-secondary">
            Eevee №133
            <i class="far fa-arrow-alt-circle-right"></i>
        </a>
    </div>
    <article>
        <div class="row">
            <div class="col">
                <h2 style="text-align: right" class="mt-4 mb-4">№132</h2>
                <div class="ml-5">
                    <img class="img-thumbnail" alt="..." style="width: 100%"
                         src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/132.png">
                </div>
            </div>

            <div class="col pr-5">
                <h2 class="mt-4 mb-4">Ditto</h2>
                <p>It can reconstitute its entire cellular structure to change into what it sees, but it returns to normal when it relaxes.</p>
                <h5>Type</h5>
                <span class="badge bg-primary" style="font-size: 1rem">Normal</span>
                <h5 class="mt-3">Weaknesses</h5>
                <span class="badge bg-danger" style="font-size: 1rem">Fighting</span>
                <section class="my-4 bg-secondary p-2 text-light rounded">
                    <h5>Stats</h5>
                    <div style="display: grid; grid-template-columns: 2fr 5fr">
                        <span>HP</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                        <span>Attack</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                        <span>Defense</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                        <span>Special Attack</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                        <span>Special Defense</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                        <span>Speed</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: calc(100% * 3/15)" aria-valuenow="3" aria-valuemin="0" aria-valuemax="15">3</div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

            <section class="my-5 bg-secondary p-2 rounded mx-auto"
                    style="max-width: 1000px; background-image: url('./images/back1.png')">
                <h3 class="text-light my-2 ml-3">Evolution Stages</h3>
                <div class="row no-gutters justify-content-center m-lg-2 align-items-center">
                    <div class="card jump--hover m-3" style="max-width: 160px">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/132.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">№132</h6>
                            <h5 class="card-title">Ditto</h5>
                            <span class="badge bg-primary">Normal</span>
                        </div>
                    </div>
                   <i class="fas fa-angle-right text-light" style="max-width: 30px; font-size: 30px"></i>
                    <div class="card jump--hover m-3" style="max-width: 160px">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/132.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">№132</h6>
                            <h5 class="card-title">Ditto</h5>
                            <span class="badge bg-primary">Normal</span>
                        </div>
                    </div>
                    <i class="fas fa-angle-right text-light" style="max-width: 30px; font-size: 30px"></i>
                    <div class="card jump--hover m-3" style="max-width: 160px">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/132.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">№132</h6>
                            <h5 class="card-title">Ditto</h5>
                            <span class="badge bg-primary">Normal</span>
                        </div>
                    </div>
                </div>
            </section>
    </article>
@endsection
