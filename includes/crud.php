<?php 
session_start();
require_once('header.php');
require_once "dbcon.inc.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
} else {
    echo "Hello";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Edits</title>
    <!-- Add your CSS links here -->
</head>
<body class="container-fluid">
    <h1 class="row justify-content-center">Administrator Edits</h1>
    <a href="../news.php">News</a>

    <form action="logout.php" method="POST">
        <button class="btn btn-primary" name="logout">Logout</button>
    </form>
    <button class='btn btn-success m-4' data-bs-toggle='modal' data-bs-target='#exampleModal'>Add</button>
    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Bulletin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_bulletin.php" method="POST">
                        <label for="header" class="form-label">Heading</label>
                        <input class="form-control" type="text" name="header" placeholder="Header" required>
                        
                        <label for="date" class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" required>
                        
                        <label for="author" class="form-label">Author</label>
                        <input class="form-control" type="text" name="author" placeholder="Author" required>
                        
                        <label for="article" class="form-label">Article</label>
                        <textarea class="form-control" name="article" rows="3" placeholder="Article" required></textarea>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Heading</th>
                <th scope="col">Date</th>
                <th scope="col">Author</th>
                <th scope="col">Article</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $stmt = $db->query('SELECT * FROM bulletin');
                $bulletins = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($bulletins) {
                    foreach ($bulletins as $bulletin) {
                        echo "
                        <tr>
                           <th scope='row'>{$bulletin['id']}</th>
                        <td>{$bulletin['header']}</td>
                        <td>{$bulletin['date']}</td>
                        <td>{$bulletin['author']}</td>
                        <td>{$bulletin['article']}</td>
                        <td>
                            
                                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' data-id='{$bulletin['id']}' data-header='{$bulletin['header']}' data-date='{$bulletin['date']}' data-author='{$bulletin['author']}' data-article='{$bulletin['article']}'>Edit</button>
                                <button class='btn btn-danger m-4' data-bs-toggle='modal'  data-bs-target='#exampleModalDelete' data-id='{$bulletin['id']}'>Delete</button>
                                
                            </td>
                        </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='6'>No bulletins found.</td></tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='6'>Query failed: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Bulletin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit_bulletin.php" method="POST">
                        <input type="hidden" name="id" id="edit-id">
                        
                        <label for="header" class="form-label">Heading</label>
                        <input class="form-control" type="text" name="header" id="edit-header" placeholder="Header" required>
                        
                        <label for="date" class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" id="edit-date" required>
                        
                        <label for="author" class="form-label">Author</label>
                        <input class="form-control" type="text" name="author" id="edit-author" placeholder="Author" required>
                        
                        <label for="article" class="form-label">Article</label>
                        <textarea class="form-control" name="article" id="edit-article" rows="3" placeholder="Article" required></textarea>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Delete -->
<!-- Modal Delete -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Bulletin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="delete_bulletin.php" method="POST">
                    <p>Are you sure you want to delete this bulletin?</p>
                    <input type="hidden" name="id" id="delete-id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="delete">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
      document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('exampleModalDelete');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const modalId = deleteModal.querySelector('#delete-id');
        modalId.value = id;

       
    });
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const header = button.getAttribute('data-header');
        const date = button.getAttribute('data-date');
        const author = button.getAttribute('data-author');
        const article = button.getAttribute('data-article');

        const modalId = editModal.querySelector('#edit-id');
        const modalHeader = editModal.querySelector('#edit-header');
        const modalDate = editModal.querySelector('#edit-date');
        const modalAuthor = editModal.querySelector('#edit-author');
        const modalArticle = editModal.querySelector('#edit-article');

        modalId.value = id;
        modalHeader.value = header;
        modalDate.value = date;
        modalAuthor.value = author;
        modalArticle.value = article;});
});

</script>

</html>
