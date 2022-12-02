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