const posts = JSON.parse(document.querySelector('div[id=allPosts]').textContent);

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