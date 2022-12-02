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