document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('exampleModalDelete');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const modalId = deleteModal.querySelector('#delete-id');
        modalId.value = id;
        alert("hello")
    });
});
