<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?php
$input = [
		'phone_code' => '+38', // -
		'phone_number' => '(000) 111-2233',
		'first_name' => 'John',
		'middle_name' => 'Malcolm', // -
		'last_name' => 'Doe'
];

$output = [
		'phone' => [ /* Тут два поля: код и номер */ ],
		'name' => [ /* Тут три поля: имя, отчество и фамилия */ ]
];

foreach ($input as $key => $value){
	if ($key == 'phone_number' && $value == ''){
		die('Введите номер телефона');
	}
	if ($key == 'phone_code' || $key == 'phone_number'){
		$output['phone'][$key]= $value;
	}
}

foreach ($input as $key => $value){
	if ($key == 'phone_number' || $key == 'phone_code') continue;

	if ($key == 'first_name' && $value == ''){
		die('Введите имя');
	}else $output['name'][$key]= $value;

	if ($key == 'last_name' && $value == ''){
		die('Введите фамилию');
	}else $output['name'][$key]= $value;

	if ($key == 'middle_name' && $value == ''){
		continue;
	}else $output['name'][$key]= $value;

}

?>

<ul>
	<li><a href="tel:<?php echo implode($output['phone']);?>"><?php echo implode($output['phone']); ?></a></li>
	<li><?php echo ($output['name']['first_name']); ?></li>
	<li><?php echo ($output['name']['middle_name']); ?></li>
	<li><?php echo ($output['name']['last_name']); ?></li>
</ul>
</body>
</html>

