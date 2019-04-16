<?php
	$css = "login.css";
	include "header.php";
	$_SESSION['error'] = "";
	function getProduct($product_DB)
	{
		foreach ($product_DB as $k => $v)
		{ 
			if ($v['title'] == $_GET['title'])
				return ($v);
		}
		return (NULL);
	}
	$redirection = "admin_stock.php";
	if ($_GET['submit'] !== "Selectionner") {
		echo '<script>window.location = "'.$redirection.'"</script>';
		exit("ERROR\n");
	}
	$product_DB = GetDatabase("product");
	if (!$product_DB) {
		echo '<script>window.location = "'.$redirection.'"</script>';
		exit("ERROR\n");
	}
	$product = getProduct($product_DB);
	if (!$product) {
		echo '<script>window.location = "'.$redirection.'"</script>';
		exit("ERROR\n");
	}
?>
<main>
	<div class="defaultContainer" style="width:100%;">
		<?="<h2>Modification : " . ucwords($product['title']) . "</h2>";?>
		<form action="admin_modif_product_view.php" method=POST>
			<p>New title : </p>
			<input class="input" type="text" name="title" value="<?php echo $product['title'];?>" required/>
			<p>New artist : </p>
			<input class="input" type="text" name="artist" value="<?php echo $product['artist'];?>" required/>
			<p>New unit price : </p>
			<input class="input" type="number" name="price" value="<?php echo $product['price'];?>" step="0.01" min="0" required/>
			<p>New quantity : </p>
			<input class="input" type="number" name="quantity" value="<?php echo $product['quantity'];?>" min="0" required/> 
			<?php 
				if ($product['category'])
				{
			?>
			<p>Category : </p>
				<div class="infoCont check">
					<?php
						foreach ($product['category'] as $cat)
						{
							echo "<div class='checkCont'>";
							echo "<p>".ucwords($cat)."</p>";
							echo "<input class='input' type='checkbox' name='category[]' value='" . $cat . "' checked>";
							echo "</div>";
						}
					?>
				</div>
			<?php
				}
			?>
			<p>Add category : </p>
			<input class="input" type="text" name="category[]" placeholder=Jazz value=""/>
			<p>Change picture : </p>
			<input class="input" type="text" name="path" value="<?php echo $product['image']; ?>" placeholder="ex: img/example.png" />
			<input type="hidden" name='title' value="<?php echo ucwords($product['title']); ?>" />
			<input type="submit" name="submit" value="Edit Product" class="submitButton">
			<input type="submit" name="submit" value="Delete Product" class="submitButton">
		</form>
	</div>
	<a href="<?php echo $redirection; ?>"><button class="submitButton">Back to stock management</button></a>
</main>
			</body>
			</html>