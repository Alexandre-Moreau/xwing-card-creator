<?php
	$shipsStats = [
		'tiefighter' => [
			'attack_front' => 2,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 3,
			'shield' => 0,
			'actions' => [
				['foc', ''],
				['eva', ''],
				['bar', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => ''
		],
		'tieinterceptor' => [
			'attack_front' => 3,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 3,
			'shield' => 0,
			'actions' => [
				['foc', ''],
				['eva', ''],
				['bar', ''],
				['boo', ''],
				['', '']
			],
			'shipAbility' => 'Autothrusters'
		],
		'tieadvanced' => [
			'attack_front' => 2,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 3,
			'shield' => 2,
			'actions' => [
				['foc', 'bar'],
				['tlk', ''],
				['bar', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => 'Advanced targetting computer'
		],
		'xwing' => [
			'attack_front' => 3,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 4,
			'shield' => 2,
			'actions' => [
				['foc', ''],
				['tlk', ''],
				['bar', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => ''
		],
		'ywing' => [
			'attack_front' => 2,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 6,
			'shield' => 2,
			'actions' => [
				['foc', ''],
				['tlk', ''],
				['', 'bar'],
				['', 'rel'],
				['', '']
			],
			'shipAbility' => ''
		],
		'protectoratestarfighter' => [
			'attack_front' => 3,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 4,
			'shield' => 0,
			'actions' => [
				['foc', ''],
				['tlk', ''],
				['bar', 'foc'],
				['boo', 'foc'],
				['', '']
			],
			'shipAbility' => 'Concordia Faceoff'
		],
		'firespray31' => [
			'attack_front' => 3,
			'attack_rear' => 3,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 6,
			'shield' => 4,
			'actions' => [
				['foc', ''],
				['tlk', ''],
				['', 'rei'],
				['boo', ''],
				['', '']
			],
			'shipAbility' => ''
		],
		'tiefofighter' => [
			'attack_front' => 2,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 3,
			'shield' => 1,
			'actions' => [
				['foc', ''],
				['eva', ''],
				['tlk', ''],
				['bar', ''],
				['', '']
			],
			'shipAbility' => ''
		],
		't70xwing' => [
			'attack_front' => 3,
			'attack_rear' => 0,
			'attack_singleMobile' => 0,
			'attack_doubleMobile' => 0,
			'agility' => 3,
			'hull' => 4,
			'shield' => 3,
			'actions' => [
				['foc', ''],
				['tlk', ''],
				['boo', ''],
				['', ''],
				['', '']
			],
			'shipAbility' => 'Weapon hardpoint'
		]
	];
	if( isset($_GET['ship']) && isset($shipsStats[$_GET['ship']]) ){
		echo json_encode($shipsStats[$_GET['ship']]);
	}else{
		echo json_encode('error');
	}
?>