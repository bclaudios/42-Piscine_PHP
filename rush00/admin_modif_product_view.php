<?php
	include 'product_functions.php';
	$css = "login.css";
	include "header.php";
	//CHECK ADMIN
	function ModifProduct($product)
	{
		$product_DB = GetDatabase("product");
		$product_DB[$product['title']] = $product;
		UpdateDatabase("product", $product_DB);
	}
	function DeleteProduct($product_name)
	{
		$product_DB = GetDatabase("product");
		unset($product_DB[$product_name]);
		UpdateDatabase("product", $product_DB);
	}
	$redirection	= "admin_stock.php";
	$retour_modif	= "admin_modif_product_form.php";
	if ($_POST['submit'] !== "Edit Product" && $_POST['submit'] !== "Delete Product")
		echo '<script>window.location = "'.$redirection.'"</script>';
	$product['title']	= strtolower($_POST['title']);
	$product['artist']	= strtolower($_POST['artist']);
	if ($_POST['submit'] === "Delete Product")
		DeleteProduct($product['title']);
	$product['price']	= $_POST['price'];
	$product['quantity']= $_POST['quantity'];
	$product['category'] = format_array_category($_POST['category']);
	if ($_POST['path'])
		$product['image']= $_POST['path'];
	if ($_POST['submit'] === "Edit Product")
		ModifProduct($product);
?>
<main>
		<div class="defaultContainer">
		<?php if ($_POST['submit'] === "Edit Product") { ?>	
		<h2>Product Edited</h2>
		<table>
				<tr>
					<th>Product</th>
					<td><?php echo ucwords(strtolower($product['title'])); ?></td>
				</tr>
				<tr>
					<th>Price</th>
					<td><?php echo number_format($product['price'], 2); ?>$</td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td><?php echo $product['quantity']; ?></td>
				</tr>
				<tr>
					<th>Category<?php if (count($product['category']) > 1){echo "s";}?></th>
					<td>
						<ul>
							<?php
								foreach ($product['category'] as $ep)
									echo "<li>" . ucfirst($ep) . "</li>";
							?>
						</ul>
					</td>
				</tr>
				<tr>
					<th>Image</th>
					<td><img src=<?php echo $product['image']; ?>/></td>
				</tr>
			</table>
		<?php } else { ?>
			<h2>Product has been deleted.</h2>
		<?php } ?>
		</div>
		<a href="<?php echo $redirection; ?>"><button class="submitButton">Retour a la gestion des produits</button></a>
			</main>
		</body>
		</html>
