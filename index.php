<?php
	
	$parts = array('AP-12-3507', 'ap-99-X109' ,'SG-05-ab20', 'ab-22-N250', 'SG-xx-N250' , 'SG-22-250', 'SG-22-250*');

	function validPart($part)
	{
		list($category, $warehouseCode, $code) = explode('-', $part);
		$category = strtoupper($category);

		if($category != 'HW' && $category != 'SG' && $category != 'AP') {
			return false;
		}

		if(strlen($warehouseCode) != 2 || !is_numeric($warehouseCode)) {
			return false;
		}

		if(strlen($code) != 4 || !ctype_alnum($code)) {
			return false;
		}

		return true;
	}

	function validPartRx($part)
	{
		if(preg_match('/((HG)|(SG)|(AP))-\d{2}-[A-Z0-9]{4}/i', $part))
			return true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>No Regular Expression Matching</h1>
	<?php
		foreach ($parts as $part) {
			if(validPart($part))
				echo "<p>$part is valid!</p>";
			else
				echo "<p>$part is NOT valid!</p>";
		}
	?>
	<h1>Regular Expression Matching</h1>
	<?php
		foreach ($parts as $part) {
			if(validPartRx($part))
				echo "<p>$part is valid!</p>";
			else
				echo "<p>$part is NOT valid!</p>";
		}
	?>
</body>
</html>