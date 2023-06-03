<?php include_once('dbcon.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert the data into database using PHP PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
     <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Insert the data into database using PHP PDO
                            <a href="index.php" class="btn btn-danger" >Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php 
                        if(isset($_GET['id'])){
                            $student_id = $_GET['id'];
                            $query = "SELECT * FROM students WHERE id =:students_id LIMIT 1";
                            $statement =$pdo_conn->prepare($query);
                            $data = [
                                ":students_id"=>$student_id
                            ];
                            $statement->execute($data);
                            $result = $statement->fetch(PDO::FETCH_OBJ);
                        }
                        ?>
                        <form action="code.php" method="post" >
                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input type="text" name="fullname" class="form-control" value="<?=$result->fullname?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control"value="<?=$result->email?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="phone" class="form-control" value="<?=$result->phone?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input type="text" name="course" class="form-control" value="<?=$result->course?>">
                            </div>
                            <div class="mb-3">
                               <button type="submit" name="save_student_btn" class="btn btn-primary" >Save Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>