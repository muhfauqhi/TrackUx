@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-primary mb-4">
                    <div class="card-header">
                        {{ $post->title }} | {{ $post->category->name }}
                        <div class="float-right text-muted">
                            Last updated {{ $post->updated_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="white-space: pre-line"> {{$post->content}}</p>
                    </div>
                </div>

                <div class="card card-primary mb-4">
                    <div class="card-header">
                        Reply post
                    </div>
                    
                    @foreach($post->comments()->get() as $comment)
                        <div class="card-body">
                            {{ $comment->user->name }}
                            <h6 class="float-right">
                                {{ $comment->created_at->diffForHumans() }}
                            </h6>
                            <p style="white-space: pre-line">{{ $comment->message }}</p>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @else
                        @endif
                    @endforeach
                    @hasanyrole('User|Admin')
                    <div class="card-body">
                        <form action="{{ route('posts.comment.store', $post) }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="container">
                                 <textarea name="message" cols="30" rows="5" placeholder="Add Comment" class="form-control"></textarea>
                            </div>
                            @if($errors->has('message'))
                                <span>
                                    <p class="alert alert-danger mt-2">{{ $errors->first('message') }}</p>
                                </span>
                            @endif
                            <div class="container mt-4">
                                <input type="submit" class="btn btn-primary" value="Comment">
                            </div>
                        </form>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection 