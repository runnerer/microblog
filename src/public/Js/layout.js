function showFormAlert(allertMessage) {
    const displayErrorModalAlert = document.querySelector('#displayErrorModalAlert');

    $(document).ready(function() {
        $("#displayErrorModal").modal("show");

        $("#displayErrorModal").on('hide.bs.modal', function() {
            displayErrorModalAlert.innerHTML = '';
        });
    });

    displayErrorModalAlert.insertAdjacentHTML('afterbegin', allertMessage);
}