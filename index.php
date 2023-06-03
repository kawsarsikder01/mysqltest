<?php session_start(); 
include_once('dbcon.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PDO CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
     <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

            <?php if(isset($_SESSION['message'])): ?>
                <h5 class="alert alert-success" ><?=$_SESSION['message'];?></h5>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD
                            <a href="student_add.php" class="btn btn-primary float-end" >Add Student</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $query = "SELECT * FROM students";
                                $statement = $pdo_conn->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                if($result){
                                    foreach($result as $item){
                                ?>
                                <tr>
                                    <td ><?=$item->id?></td>
                                    <td ><?=$item->fullname?></td>
                                    <td ><?=$item->email?></td>
                                    <td ><?=$item->phone?></td>
                                    <td ><?=$item->course?></td>
                                   <td> <a href="edit.php?id=<?=$item->id?>" class="btn btn-primary">Edit</a></td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>