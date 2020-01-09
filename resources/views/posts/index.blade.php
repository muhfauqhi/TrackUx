@extends('layouts.app')

@role('Admin')
@section('title', 'Manage Posts')
@else
@section('title', 'Posts')
@endrole

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Events</h2>
            </div>
            <div class="pull-right">
                @can('post-create')
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    @foreach($posts as $p)
        <div class="card card-primary mb-4">
            <div class="card-header">
                <a href="{{ route('posts.show', $p) }}">
                {{ $p->title }} | {{ $p->category->name }}
                </a>
                @role('Admin')
                <h6 class="text-muted">
                    Last updated {{ $p->updated_at->diffForHumans() }}
                </h6>
                @role('User')
                <h6 class="text-muted float-right">
                    Last updated {{ $p->updated_at->diffForHumans() }}
                </h6>
                @endrole
                @else
                <h6 class="text-muted">
                    Last updated {{ $p->updated_at->diffForHumans() }}
                </h6>
                @endrole
                @can('post-edit')
                <div class="float-right">
                    @if(Route::has('login'))
                        @auth
                        <a class="btn btn-sm btn-info" href="{{ route('posts.show', $p) }}">Show</a>
                        <a href="{{ route('posts.edit', $p) }}" class="btn btn-sm btn-primary">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $p],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}                            
                    @endif
                    @endauth
                </div>
                @endcan

            </div>
            <div class="card-body">
                <p style="white-space: pre-line"> {{ str_limit($p->content, 80, ' ...') }}</p>
            </div>
        </div>                                    
    @endforeach


    {!! $posts->links() !!}



@endsection
