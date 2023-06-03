<?php 
session_start();
// include('dbcon.php');
// echo   $_POST["fullname"];

if(!empty($_POST["fullname"])) {
	require_once("dbcon.php");
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];


	$sql = "INSERT INTO students (fullname,email,phone,course) VALUES (:fullname, :email, :phone, :course)";
	$pdo_statement = $pdo_conn->prepare( $sql );
    $data = [
                ':fullname'=>$fullname,
                ':email'=>$email,
                ':phone'=>$phone,
                ':course'=>$course,
            ];
	$result = $pdo_statement->execute($data);
	if (!empty($result) ){
	  header('location:index.php');
	}else{
        echo "Not Inserted";
    }
}









// if(isset($_POST['save_student_btn'])){
//     $fullname = $_POST['fullname'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $course = $_POST['course'];

//     $query = "INSERT INTO students (id	fullname	email	phone	course) VALUES (:fullname, :email, :phone, :course)";
//     $query_run = $conn->prepare($query);
//     $data = [
//         ':fullname'=>$fullname,
//         ':email'=>$email,
//         ':phone'=>$phone,
//         ':course'=>$course,
//     ];
//     $query_execute = $query_run->execute($data);
//     if($query_execute){
//         $_SESSION['message'] = "Inserted Sucessfully";
//         header('Location:index.php');
//         exit(0);
//     }else{
//         $_SESSION['message'] = "Not Inserted";
//         header('Location:index.php');
//         exit(0);
//     }
// }