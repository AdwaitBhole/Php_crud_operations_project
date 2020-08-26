<?php
	session_start();

	$user = 'root' ;

	$pass = '' ;
	
	$db = 'crud' ;

	$db = new mysqli('localhost',$user,$pass,$db) or die("Unable to connect") ;

	// initialize variables
	$product_name = "";
	$product_type = "";
	$product_company = "" ;
	$price = null ;
	$update = false;

	if (isset($_POST['save'])) {

		$product_name = $_POST['product_name'] ;
		$product_type = $_POST['product_type'];
		$product_company = $_POST['product_company'];
		$price = $_POST['price']; ;


		mysqli_query($db, "INSERT INTO products_info ( product_name, product_type , product_company , price ) VALUES ('$product_name', '$product_type' , '$product_company', $price )"); 

		$_SESSION['message'] = "Products data saved"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];

		$product_name = $_POST['product_name'];
		$product_type = $_POST['product_type'];
		$product_company = $_POST['product_company'];
		$price = $_POST['price'];

	
		mysqli_query($db, "UPDATE products_info SET product_name='$product_name', product_type='$product_type' , product_company='$product_company' , price=$price  WHERE id=$id");
		$_SESSION['message'] = "Products data updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM products_info WHERE id=$id");
		$_SESSION['message'] = "Product data deleted!"; 
		header('location: index.php');
	}

?>