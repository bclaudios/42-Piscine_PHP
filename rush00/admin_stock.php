<?php
include "header.php";
$css = "login.css";
if (empty($user) || $user['rank'] !== 'admin')
{
	echo '<script>window.location = "index.php"</script>';	
	exit;
}
?>
<main>
	<div class="defaultContainer" style="width:600px;">
		<h2>Nouveau produit</h2>
		<form action="create_product.php" method="POST">
			<p>Titre: </p>
			<input class="input" type="text" name="title" value="" placeholder="ex: Shaft" required />
			<p>Artiste: </p>
			<input class="input" type="text" name="artist" value="" placeholder="ex: Isaac Hayes" required />
			<p>Prix unitaire: </p>
			<input class="input" type="number" name="price" placeholder=10.99 value="" step="0.01" min="0" required />
			<p>Categorie(s) (Separees par des ';' si plusieurs): </p>
			<input class="input" type="text" name="category" value="" placeholder="ex: Jazz" required/>
			<p>Quantite disponible:  </p>
			<input class="input" type="number" name="quantity" value="1" min="0" required/>
			<p>Chemin vers l'image: </p>
			<input class="input" type="text" name="path" value="img/" placeholder="ex: img/example.png" required/>
			<input type="submit" name="submit" value="Creer" class="submitButton">		
		</form>
	<?php
		if ($_SESSION['error'] !== "") 
			echo "<b>" . $_SESSION['error'] . "</b>";
	?>

	<?php
		$product_DB = GetDatabase("product");
		if ($product_DB) {
	?>
	</div>
	<div class="defaultContainer" style="width:600px; margin-top:15px;">
		<form action="admin_modif_product_form.php" method="GET">
			<h2>Editer un produit existant</h2>
			<p>Selection du produit:</p>
			<select name="title">
				<?php
					foreach ($product_DB as $k => $v)
					{
						if ($v['title'])
							echo "<option value='" . $v['title'] . "'>" . ucwords($v['title']) . "</option>";
					}
				?>
			</select>
			<br />
			<input type="submit" name="submit" value="Selectionner" class="submitButton">		
		</form>
	</div>
	<?php
		}
	?>
</main>
	</body>
	</html>