<?php 

//model koneksi versi1
// $koneksi = mysqli_connect("localhost","root","","dodolan");
 
// // Check connection
// if (mysqli_connect_errno()){
// 	echo "Koneksi database gagal : " . mysqli_connect_error();
// }
 

//model koneksi versi2
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'dodolan';

$koneksi = mysqli_connect($hostname, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());

?>