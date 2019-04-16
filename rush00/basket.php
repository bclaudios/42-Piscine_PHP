<?php
	include 'header.php';
	$basket = $_SESSION['basket'];
?>

<main>
	<div class="defaultContainer">
		<h2>Mon panier</h2>
	<?php if ($basket) { ?>
		<table>
		<tr>
			<th>Titre</th>
			<th>Artiste</th>
			<th>Prix unitaire</th>
			<th>Quantite</th>
			<th>Prix du lot</th>
		</tr>
		<?php
			foreach ($basket as $k => $v)
			{ if (!empty($v['title'])) {?>
				<tr>
					<td><?php echo $v['title']; ?></td>
					<td><?php echo $v['artist']; ?></td>
					<td><?php echo $v['price']; ?></td>
					<td><?php echo $v['quantity']; ?></td>
					<td><?php echo $v['total_price']; ?></td>
				</tr>
	<?php	} }
		?>
		<tr>
			<th colspan=3 style="visibility:hidden;"></th>
			<th>TOTAL</th>
			<th><?php echo $basket['full_price'];?></th>
		</tr>
		</table>
		<form action="valid_basket.php" method='POST'>
			<input class="submitButton" type=submit name=submit value="PASSER LA COMMANDE">
			<input class="submitButton" type=submit name=submit value="SUPPRIMER LA COMMANDE">
		</form>
	<?php } else { ?>
		<p style="text-align:center;">Votre panier est vide.</p>
	<?php } ?>
	</div>
</main>
	</body>
	</html>