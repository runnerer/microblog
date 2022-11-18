@extends('layout')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row py-lg-5 mb-5">
                <div class="col-lg-12 col-md-8 mx-auto">
                    <h1 class="fw-light text-center">Welcome to our Blog!</h1>
                </div>
            </div>

            @foreach ($posts as $post)
                <div class="row py-lg-5">
                    <div class="card mb-3">
                        <img class="card-img-top" src="uploads\images\{{ $post->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h1 class="card-title">{{ $post->title }}</h1>
                            <p class="card-text">{{ $post->text }}</p>
                            <p class="card-text"><small class="text-muted">Published at: {{ $post->created_at }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection