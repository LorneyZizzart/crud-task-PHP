<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mb-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();  /*elimina la sesión*/} ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="description" placeholder="Task description" autofocus></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Save task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <td scope="col">Title</td>
                        <td scope="col">Description</td>
                        <td scope="col">Created at</td>
                        <td scope="col">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                    <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_at']?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-info"> 
                                    <i class="fas fa-marker"></i> 
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"> 
                                    <i class="fas fa-trash"></i> 
                                </a>
                            </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
