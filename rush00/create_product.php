<?php
	include 'product_functions.php';
	include 'header.php';
	$_SESSION['error'] = "";
	if (empty($user) || $user['rank'] !== 'admin')
	{
		echo '<script>window.location = "index.php"</script>';
		exit;
	}

	function NewProduct($newProduct)
	{
		$product_DB = GetDatabase("product");
		if (!empty($product_DB))
		{
			if (isset($product_DB[$newProduct['title']]))
				return (False);
		}
		$product_DB[$newProduct['title']] = $newProduct;
		UpdateDatabase("product", $product_DB);
		return (True);
	}

	$_SESSION['error'] = "";
	$redirection = "admin_stock.php";
	if ($_POST['submit'] !== "Creer") {
		header('Location: ' . $redirection);
		exit("ERROR\n");
	}
	$product['title'] = strtolower($_POST['title']);
	$product['artist'] = strtolower($_POST['artist']);
	$product['price'] = number_format(intval(ltrim($_POST['price'], '0')), 2);
	$product['quantity'] = $_POST['quantity'];
	$product['category'] = format_category($_POST['category']);
	$product['image'] = $_POST['path'];
	if (!(NewProduct($product))) 
	{
		$_SESSION['error'] .= "PRODUCT ALREADY EXISTS<br />";
		echo '<script>window.location = "admin_stock.php"</script>';
		exit;
	}
?>
<main>
	<div class="defaultContainer">
			<h2>Product successfully created.</h2>
			<table>
				<tr>
					<th>Titre</th>
					<td><?php echo ucwords(strtolower($product['title'])); ?></td>
				</tr>
				<tr>
					<th>Artiste</th>
					<td><?php echo ucwords(strtolower($product['artist'])); ?></td>
				</tr>
				<tr>
					<th>Prix</th>
					<td><?php echo number_format($product['price'], 2); ?>$</td>
				</tr>
				<tr>
					<th>Categorie<?php if (count($product['category']) > 1){echo "s";}?></th>
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
		</div>
		<a href="<?php echo $redirection; ?>"><button class="submitButton">Retour a la gestion des produits</button></a>
			</main>
		</body>
		</html>