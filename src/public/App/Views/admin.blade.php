@extends('layout')

@section('content')
<div class="py-5 bg-light">
    <div class="row py-lg-5">
        <div class="col-lg-12 col-md-8 mx-auto">
            <div class="container pt-1">
                <h1 class="fw-light text-center">Microblog Admin Panel</h1>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-dark" tabindex="-1" role="button" aria-disabled="true" data-toggle="modal" data-target="#createPostModal">
                        <i class="fas fa-plus"></i> New Post
                    </a>
                </div>
            </div>
            <div class="ml-5 mr-5 pt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text text-center">Published Posts</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Post №</th>
                                            <th scope="col">Post Title</th>
                                            <th scope="col">Post Text</th>
                                            <th scope="col">Post Image</th>
                                            <th scope="col">Posted At</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyResults">
                                        @for ($i = 0; $i < count($posts); $i++)
                                            <tr>
                                                <th scope="row">{{$i+1}}</th>
                                                <td>{{$posts[$i]->title}}</td>
                                                <td>{{$posts[$i]->text}}</td>
                                                <td><img class="card-img-top" src="uploads\images\{{$posts[$i]->image}}"></td>
                                                <td>{{$posts[$i]->created_at}}</td>
                                                <td>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text btn btn-primary" onclick="editPost(this)" data-toggle="modal" data-target="#editPostModal" data-postid="{{$posts[$i]->id}}">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Modals.newPost')
@include('Modals.editPost')

<div hidden id="allPosts">{{$posts}}</div>

@endsection

@section('javascript')
<script type="text/javascript" src="Js/admin.js"></script>
@endsection