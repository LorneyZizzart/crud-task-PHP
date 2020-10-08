<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    // reciviendo la data a traves de POST
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id=$id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = '<strong>Task</strong> updated successfully';
        $_SESSION['message_type'] = 'info';

        header("Location: index.php");
    }
?>
<?php include('includes/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $id?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" rows="2"><?php echo $description?></textarea>
                    </div>
                    <button class="btn btn-success btn-block" name="update">Update</button>
                </form>
            </div>        
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>