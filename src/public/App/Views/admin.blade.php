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


<!-- New Post Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create New Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <img class="card-img-top" src="" id="newModalImage">
                <div class="input-field mt-3 ml-4">
                    <span>Upload Image</span>
                    <input type="file" accept="image/*" id="newModalImageInput"/>
                </div>
                <div class="card-body">
                    <h1 class="card-title" id="newTitle">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            </div>
                            <input type="text" class="form-control" id="newTitleInput">
                          </div>
                    </h1>
                    <p class="card-text">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Text</span>
                            </div>
                            <textarea class="form-control" style="height: 250px;" aria-label="With textarea" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' id="newTextInput"></textarea>
                          </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer" id="newModalFooter">
          <button type="button" class="btn btn-primary" id="newPostSaveButton" onclick="createPost()">Save changes</button>
        </div>
      </div>
    </div>
  </div>


<!-- Edit Post Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <img class="card-img-top" src="uploads\images\" alt="Click the button below to update the image"  id="editModalImage">
                <div class="input-field mt-3 ml-4">
                    <span>Upload New Image</span>
                    <input type="file" accept="image/*" id="editModalImageInput"/>
                </div>
                <div class="card-body">
                    <h1 class="card-title" id="editTitle">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            </div>
                            <input type="text" class="form-control" id="editTitleInput">
                          </div>
                    </h1>
                    <p class="card-text">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Text</span>
                            </div>
                            <textarea class="form-control" style="height: 250px;" aria-label="With textarea" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' id="editTextInput"></textarea>
                          </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer" id="editModalFooter">
          <button type="button" class="btn btn-primary" id="editPostSaveButton" onclick="saveEditedPost(this)">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('javascript')
<script>
const posts = @json($posts);

const editModalImage = document.querySelector('#editModalImage');
const editModalImageInput = document.getElementById("editModalImageInput");
const editTitleInput = document.querySelector('#editTitleInput');
const editTextInput = document.querySelector('#editTextInput');
const editPostSaveButton = document.querySelector('#editPostSaveButton');

const newModalImage = document.querySelector('#newModalImage');
const newModalImageInput = document.getElementById("newModalImageInput");


function createPost() {
    const newTitleInput = document.querySelector('#newTitleInput');
    const newTextInput = document.querySelector('#newTextInput');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/posts", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        title: newTitleInput.value || '',
        text: newTextInput.value || '',
        image: newModalImage.getAttribute('src') || ''
    }));

    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            const jsonResponse = JSON.parse(xhr.responseText)

            if (xhr.status === 200) {
                location.reload();
            } else if (xhr.status === 400) {
                showFormAlert(jsonResponse.message);
            }
        }
    }
}

function editPost(button) {
    const postId = button.getAttribute('data-postid');
    const postData = posts.filter(post => post.id == postId);
    const imageUrl = `uploads\\images\\${postData[0].image}`;

    editTitleInput.value = postData[0].title;
    editTextInput.value = postData[0].text;
    editModalImage.setAttribute('src', imageUrl);
    editPostSaveButton.setAttribute('data-postid', postId);
}

function saveEditedPost(button) {
    const postId = button.getAttribute('data-postid');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/posts/" + postId, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        title: editTitleInput.value,
        text: editTextInput.value,
        image: editModalImage.src
    }));

    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            const jsonResponse = JSON.parse(xhr.responseText)

            if (xhr.status === 200) {
                location.reload();
            } else if (xhr.status === 400) {
                showFormAlert(jsonResponse.message);
            }
        }
    }
}

const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.onload = () => {
            resolve(fileReader.result);
        };

        fileReader.onerror = (error) => {
            reject(error);
        };
    });
};

const uploadImage = async (event, previewImageElement) => {
    const file = event.target.files[0];
    const base64 = await convertBase64(file);

    previewImageElement.setAttribute('src', base64);
};

newModalImageInput.onchange = function(e) {
    uploadImage(e, newModalImage);
};

editModalImageInput.onchange = function(e) {
    uploadImage(e, editModalImage);
};

</script>
@endsection