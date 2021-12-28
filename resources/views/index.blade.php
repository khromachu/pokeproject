@extends('layouts.master')
@section('title')
    Home | Pokeproject
@endsection
@section('content')
<section class="mb-2 py-2" >
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item @if($page==1) disabled @endif ">
                    <a class="page-link" href="{{'/?page='.($page-1)}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item @if($page==1) active @endif "><a class="page-link" href="{{'/?page=1'}}">1</a></li>
                @if($page>3)
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                @endif
                @if($page>2)
                    <li class="page-item"><a class="page-link" href="{{'/?page='.($page-1)}}">{{$page-1}}</a></li>
                @endif
                @if($page>1 && $page<$pages_count)
                    <li class="page-item active"><a class="page-link" href="{{'/?page='.$page}}">{{$page}}</a></li>
                @endif
                @if($page<$pages_count-1)
                    <li class="page-item"><a class="page-link" href="{{'/?page='.($page+1)}}">{{$page+1}}</a></li>
                @endif
                @if($page<$pages_count-2)
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                @endif
                <li class="page-item @if($page==$pages_count) active @endif "><a class="page-link" href="{{'/?page='.$pages_count}}">{{$pages_count}}</a></li>
                <li class="page-item @if($page==$pages_count) disabled @endif ">
                    <a class="page-link" href="{{'/?page='.($page+1)}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); grid-gap: 10px">
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
    <div class="pt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item @if($page==1) disabled @endif ">
                    <a class="page-link" href="{{'/?page='.($page-1)}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item @if($page==1) active @endif "><a class="page-link" href="{{'/?page=1'}}">1</a></li>
                @if($page>3)
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                @endif
                @if($page>2)
                    <li class="page-item"><a class="page-link" href="{{'/?page='.($page-1)}}">{{$page-1}}</a></li>
                @endif
                @if($page>1 && $page<$pages_count)
                    <li class="page-item active"><a class="page-link" href="{{'/?page='.$page}}">{{$page}}</a></li>
                @endif
                @if($page<$pages_count-1)
                    <li class="page-item"><a class="page-link" href="{{'/?page='.($page+1)}}">{{$page+1}}</a></li>
                @endif
                @if($page<$pages_count-2)
                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                @endif
                <li class="page-item @if($page==$pages_count) active @endif "><a class="page-link" href="{{'/?page='.$pages_count}}">{{$pages_count}}</a></li>
                <li class="page-item @if($page==$pages_count) disabled @endif ">
                    <a class="page-link" href="{{'/?page='.($page+1)}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection

