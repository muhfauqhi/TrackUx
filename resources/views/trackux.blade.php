@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="row row-padding">
        <div class="col-lg-12 homepage text-center">
            <h1 class="homepage"><b>Track Ux</b> community for extreme sports</h1>
            <div class="showcase">
                <img src="{{ url('/images/homepage.jpeg')}}" alt="">
            </div>
        </div>
        </div>    

    <div class="row row-padding">
        <div class="col-lg-12 homepage">
            <div class="text-center mt-4 mb-4">
                <h2>Recent Posts</h2>
            </div>
        </div>
    </div>
    @foreach($posts as $p)
        <div class="card card-primary mb-4">
            <div class="card-header">
                <a href="{{ route('posts.show', $p) }}">
                {{ $p->title }} | {{ $p->category->name }}
                </a>
                <h6 class="float-right text-muted">
                    Last updated {{ $p->updated_at->diffForHumans() }}
                </h6>
            </div>
            <div class="card-body">
                <p style="white-space: pre-line"> {{ str_limit($p->content, 80, ' ...') }}</p>
            </div>
        </div>                                    
    @endforeach
    <div class="row row-padding">
        <div class="col-lg-12 homepage">
            <div class="text-center mt-4 mb-4">
                <h2>Recent Products</h2>
            </div>
        </div>
    </div>
    <div class="card-columns">
    @foreach($products as $product)
        <div class="card">
            @if($product->image != null)
            <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="" style="width: 30%; height: auto; vertical-align: middle">
            @else
            <img class="card-img-top" src="{{ url('/images/Skateboard.jpeg')}}" alt="" style="width: 30%; height: auto; vertical-align: middle">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }} | Category {{ $product->category->name }}</h5>
                <p class="card-text">{{ str_limit($product->detail, 80, ' ...') }}</p>
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated {{ $product->updated_at->diffForHumans() }}</small>
            </div>        
        </div>
    @endforeach
    </div>
@endsection
