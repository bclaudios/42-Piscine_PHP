<?php
	include "header.php";
	$product_DB = GetDatabase("product");
	if ($product_DB !== NULL)
	{
		$cat = GetCategories();
		$selectedCat = $cat[rand(0, count($cat) - 1)];
	}
	$_SESSION['page'] = "index.php";
?>
<main>
	<div class="defaultContainer" style="margin-bottom:15px;">
		<h2 style="font-size:25px;">We do vinyl right !<br></h2>
		<h2 style="font-size:20px;">(but not websites)</h2>
	</div>
	<div class="productContainer defaultContainer">
<?php 
	if ($product_DB !== NULL)
	{
		foreach ($product_DB as $k => $v) {
		if ($v['category'][0] === $selectedCat && $v['quantity'] > 0)  {
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
<?php }}} ?>
	</body>
	</html>