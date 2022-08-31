@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($posts as $post)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }} by {{ $post->user->username }}</h5>
                                <p class="card-text">{{ $post->body }}</p>
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    @empty
                        <p>No posts yet.</p>
                    @endforelse
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
