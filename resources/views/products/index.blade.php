@extends('layouts.app')

@role('Admin')
@section('title', 'Manage Products')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ $loop->iteration }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ str_limit($product->detail, 80, ' ...') }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}

    @endsection

@else
@section('title', 'Products')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center mt-4 mb-4">
                <h2>Products</h2>
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

{!! $products->links() !!}

@endsection
@endrole