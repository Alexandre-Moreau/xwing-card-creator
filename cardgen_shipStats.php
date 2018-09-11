<?php
	$shipsStats = [
		'tiefighter' => [
			'attack' => 2,
			'agility' => 3,
			'hull' => 3,
			'shield' => 0,
			'actions' => [
				['focus', ''],
				['evade', ''],
				['barrelroll', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => ''
		],
		'tieinterceptor' => [
			'attack' => 3,
			'agility' => 3,
			'hull' => 3,
			'shield' => 0,
			'actions' => [
				['focus', ''],
				['evade', ''],
				['barrelroll', ''],
				['boost', ''],
				['', '']
			],
			'shipAbility' => 'Autothrusters'
		],
		'tieadvancedx1' => [
			'attack' => 2,
			'agility' => 3,
			'hull' => 3,
			'shield' => 2,
			'actions' => [
				['focus', 'barellroll'],
				['targetlock', ''],
				['barellroll', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => 'Advanced targetting computer'
		]
	];
	if( isset($_GET['ship']) && isset($shipsStats[$_GET['ship']]) ){
		echo json_encode($shipsStats[$_GET['ship']]);
	}else{
		echo json_encode('error');
	}
?>