@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ $post->title }} by {{ $post->user->username }}
                        </div>
                        @can('owner', $post)
                            <div>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('posts.destroy', $post->slug) }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('delete-post').submit();">
                                                Delete
                                            </a>

                                            <form id="delete-post" action="{{ route('posts.destroy', $post->slug) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endcan
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <img src="{{ $post->thumbnail() }}" class="img-fluid img-thumbnail">
                                <p class="card-text">{{ $post->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
