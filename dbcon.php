<?php
 $database_username = 'root';
 $database_password = '';
 $database = "practice";
 $pdo_conn = new PDO( "mysql:host=localhost;dbname=$database", $database_username, $database_password );

//  try{
//     $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     // echo "Connected Sucessfully";
//  }catch(PDOException $e){
//     echo "Connection Failed" .$e->getMessage();
//  }