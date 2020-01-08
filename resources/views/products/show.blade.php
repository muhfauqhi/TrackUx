@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index', $product) }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        @if($product->image !=null)
        <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="" style="width: 9rem; height: auto; vertical-align: middle">
        @else
        <img class="card-img-top" src="{{url('/images/Skateboard.jpeg')}}" alt="" style="width: 9rem; height: auto; vertical-align: middle">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }} | Category {{ $product->category->name }}</h5>
            <p class="card-text" style="white-space: pre-line">{{ $product->detail }}</p>
            @can('product-edit')
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
            @endcan
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated {{ $product->updated_at->diffForHumans() }}</small>
        </div>        
    </div>
@endsection
