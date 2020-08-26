<?php  include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
        $record = mysqli_query($db, "SELECT * FROM products_info WHERE id=$id");

		$n = mysqli_fetch_array($record);
		$product_name = $n['product_name'];
		$product_type = $n['product_type'];
		$product_company = $n['product_company'];
		$price = $n['price'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

        <h1 style="text-align: center;" > Please enter the product information. </h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <?php $results = mysqli_query($db, "SELECT * FROM products_info"); ?>

<table>

	<thead>
		<tr>
			<th>product_name</th>
			<th>product_type</th>
			<th>product_company</th>
			<th>price</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>


			<td><?php echo $row['product_name']; ?></td>
			<td><?php echo $row['product_type']; ?></td>

			<td><?php echo $row['product_company']; ?></td>
			<td><?php echo $row['price']; ?></td>
		
		
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>

</table>


	<form method="post" action="server.php" >
    
    <div class="input-group">
			<label></label>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>

		<div class="input-group">
			<label>Product_name</label>
			<input type="text" name="product_name" value="<?php echo $product_name; ?>">
		</div>


		<div class="input-group">
			<label>Product_type</label>
			<input type="text" name="product_type" value="<?php echo $product_type; ?>">
		</div>

		<div class="input-group">
			<label>Product_company</label>
			<input type="text" name="product_company" value="<?php echo $product_company; ?>">
		</div>

		<div class="input-group">
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $price; ?>">
		</div>


		<div class="input-group">
        	<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Submit</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>