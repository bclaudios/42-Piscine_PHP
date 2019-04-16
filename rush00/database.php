<?php
	function GetDatabase($DB_name)
	{
		if (!file_exists("database/".$DB_name))
			return null;
		$database = unserialize(file_get_contents("database/".$DB_name));
		return $database;
	}
	function UpdateDatabase($DB_name, $new_DB)
	{
		$new_DB = serialize($new_DB);
		file_put_contents("database/".$DB_name, $new_DB, LOCK_EX);
	}
	function NewUser($newUser)
	{
		$newUser['passwd'] = hash("sha256", $newUser['passwd']);
		$user_DB = GetDatabase("user");
		$newUser['rank'] = "user";
		$newUser['basket'] = "";
		$user_DB[$newUser['login']] = $newUser;
		UpdateDatabase("user", $user_DB);
	}
	function UpdateUser($login, $newInfos)
	{
		$database = GetDatabase("user");
		foreach ($database[$login] as $key => &$value)
		{
			if (!empty($newInfos[$key]))
				$value = $newInfos[$key];
		}
		UpdateDatabase("user", $database);
	}
	function DisplayDatabase($DB_name)
	{
		$database = GetDatabase($DB_name);
		foreach ($database as $key => $data)
		{
			echo $key."<br>";
			foreach ($data as $key => $info)
				echo "--->".$key." : ".$info."<br>";
			echo "<br>";	
		}
	}
	function GetUser($login)
	{
		$database = GetDatabase('user');
		return ($database[$login]); 
	}
	function CheckEmailExist($email)
	{
		$database = GetDatabase("user");
		if (empty($database))
			return false;
		foreach ($database as $user)
		{
			if ($user['email'] === $email)
				return (true);
		}
		return (false);
	}
	function DeleteUser($login)
	{
		$database = GetDatabase("user");
		unset($database[$login]);
		UpdateDatabase("user", $database);
	}
	function GetCategories()
	{
		$categories = array();
		$product_DB = GetDatabase("product");
		if ($product_DB === NULL)
			return null;
		foreach ($product_DB as $k => $v)
		{
			if ($v['category'])
			{
				foreach ($v['category'] as $cat)
				{
					if (!in_array($cat, $categories))
					{
						$categories[] = $cat;
					}
				}
			}
		}
		return ($categories);
	}
	function DecreaseQuantity($title, $quantity)
	{
		$product_DB = GetDatabase("product");
		$product_DB[$title]['quantity'] -= $quantity;
		if ($product_DB[$title]['quantity'] < 0)
			return (FALSE);
		UpdateDatabase("product", $product_DB);
		return (TRUE);
	}
	function IncreaseQuantity($title, $quantity)
	{
		$product_DB = GetDatabase("product");
		$product_DB[$title]['quantity'] += $quantity;
		UpdateDatabase("product", $product_DB);
	}
?>