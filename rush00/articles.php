<?php
$css = "login.css";
include "header.php";
$product_DB = GetDatabase("product");
if ($product_DB)
{
?>
	<main>
		<div class="defaultContainer productContainer">
	<?php
	foreach ($product_DB as $k => $v)
	{
		if ($v['quantity'] > 0) {
		?>
		<div class="product">
			<img src="<?=$v['image']?>" alt="">
			<div class="productInfo">
			<h3><?php echo ucwords($v['title']); ?></h3>
			<h3><?php echo ucwords($v['artist']); ?></h3>
		<form action=get_command.php method=POST>
			<input type=hidden name='title' value="<?php echo $v['title']; ?>" >
			<input type=hidden name='artist' value="<?php echo $v['artist']; ?>" >
			<input type=number name='quantity' value=0 min=0 max=<?php echo $v['quantity']; ?> class="quantity" required >
			<input type=hidden name='price' value=<?php echo $v['price'];?> >
			<input class="submitButton" style="margin-top:10px;" type=submit name='submit' value="COMMANDER" class="buyButton">
		</form>
		<p class="price"><?php echo number_format($v['price'], 2); ?>$ / unité</p>
		</div>
		</div>
		<?php
	}}
	?>
	</div>
	</main>
<?php
} ?>
</body>
</html>
