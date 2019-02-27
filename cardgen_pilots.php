<?php

	define('CARD_W', 298);
	define('CARD_H', 417);
	define('CARD_ART_W', -1);
	define('CARD_ART_H', -1);
	
	include_once 'cardgen_functions.php';

	global $outPutData;
	$outPutData['errors'] = [];
	$outPutData['post'] = $_POST;
	$outPutData['log'] = [];

	$mainFont = loadRessource('arial.ttf');
	$titleFont = loadRessource('Orbitron-Bold.ttf');
	$boldFont = loadRessource('arialbd.ttf');
	$italicFont = loadRessource('ariali.ttf');
	$symbolFont = loadRessource('xwing-miniatures-modified.ttf');
	$shipFont = loadRessource('xwing-miniatures-ships.ttf');

	// ----------------------------------- 

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$pilotTitle = isset($_POST['pilot-title']) && $_POST['pilot-title'] != '' ? $_POST['pilot-title'] : '';

	$pilotAbility = (isset($_POST['pilot-ability']) && $_POST['pilot-ability'] != '' ? $_POST['pilot-ability'] : '');
	$shipAbility = (isset($_POST['ship-ability']) && $_POST['ship-ability'] != '' ? $_POST['ship-ability'] : '');

	$faction = isset($_POST['faction']) && $_POST['faction'] != '' ? $_POST['faction'] : 'empire';
	$ship = isset($_POST['ship']) && $_POST['ship'] != '' ? $_POST['ship'] : '';

	$stats = [];

	$stats['attackFront'] = isset($_POST['attack-front']) && $_POST['attack-front'] != '' ? $_POST['attack-front'] : '';
	$stats['attackFront'] = checkMinMax($stats['attackFront'], 0, 5);
	$stats['attackRear'] = isset($_POST['attack-rear']) && $_POST['attack-rear'] != '' ? $_POST['attack-rear'] : '';
	$stats['attackRear'] = checkMinMax($stats['attackRear'], 0, 5);
	$stats['attackSingleMobile'] = isset($_POST['attack-singleMobile']) && $_POST['attack-singleMobile'] != '' ? $_POST['attack-singleMobile'] : '';
	$stats['attackSingleMobile'] = checkMinMax($stats['attackSingleMobile'], 0, 5);
	$stats['attackDoubleMobile'] = isset($_POST['attack-doubleMobile']) && $_POST['attack-doubleMobile'] != '' ? $_POST['attack-doubleMobile'] : '';
	$stats['attackDoubleMobile'] = checkMinMax($stats['attackDoubleMobile'], 0, 5);

	$stats['agility'] = isset($_POST['agility']) && $_POST['agility'] != '' ? $_POST['agility'] : '';
	$stats['agility'] = checkMinMax($stats['agility'], 0, 5);
	$stats['hull'] = isset($_POST['hull']) && $_POST['hull'] != '' ? $_POST['hull'] : '';
	$stats['hull'] = checkMinMax($stats['hull'], 1, 15);
	$stats['shield'] = isset($_POST['shield']) && $_POST['shield'] != '' ? $_POST['shield'] : '';
	$stats['shield'] = checkMinMax($stats['shield'], 0, 10);
	$stats['force'] = isset($_POST['force']) && $_POST['force'] != '' ? $_POST['force'] : '';
	$stats['force'] = checkMinMax($stats['force'], 0, 6);
	$stats['charges'] = isset($_POST['charges']) && $_POST['charges'] != '' ? $_POST['charges'] : '';
	$stats['charges'] = checkMinMax($stats['charges'], 0, 6);

	$actions = isset($_POST['actions']) && $_POST['actions'] != '' ? $_POST['actions'] : 'focus,none,none,none,none';
	$actionsRed = isset($_POST['actions-red']) && $_POST['actions-red'] != '' ? $_POST['actions-red'] : 'none,none,none,none,none';
	$actions = explode(',', $actions);
	$actionsRed = explode(',', $actionsRed);

	$initiative = isset($_POST['initiative']) && $_POST['initiative'] != '' ? $_POST['initiative'] : 1;
	$initiative = checkMinMax($initiative, 1, 6);

	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : IM_DIR.'blank-image.png');

	// ----------------------------------- Image loading

	$im = loadImagePng('base-pilots-'.$faction.'.png');
	$imSeparator = loadImagePng('pilot-action-separator-'.$faction.'.png');
	$imBaseLinkedActions = loadImagePng('base-linked-actions-'.$faction.'.png');

	$im_attackFront = loadImagePng('s_frontArc.png');
	$im_attackRear = loadImagePng('s_rearArc.png');
	$im_attackSingleMobile = loadImagePng('s_mobileArc.png');
	$im_attackDoubleMobile = loadImagePng('s_dualMobileArc.png');
	$im_agility = loadImagePng('s_agility.png');
	$im_hull = loadImagePng('s_hull.png');;
	$im_shield = loadImagePng('s_shield.png');
	$im_force = loadImagePng('s_force.png');
	$im_charges = loadImagePng('s_charge.png');

	// ----------------------------------- Color creation

	$background_color = imagecolorallocate($im, 0, 0, 0);
	$color_black = imagecolorallocate($im, 46, 46, 46);
	$color_greyDark = imagecolorallocate($im, 70, 70, 70);
	$color_orange = imagecolorallocate($im, 230, 118, 43);
	$color_white = imagecolorallocate($im, 255, 255, 255);

	$color_agility = imagecolorallocate($im, 106, 189, 69);
	$color_attack = imagecolorallocate($im, 238, 32, 36);
	$color_charges = imagecolorallocate($im, 253, 192, 16);
	$color_force = imagecolorallocate($im, 195, 157, 201);
	$color_hull = imagecolorallocate($im, 247, 236, 20);
	$color_shield = imagecolorallocate($im, 125, 208, 226);

	// ----------------------------------- Card name and pilot title
	$processedText = processTextSymbols($cardName, 10, $titleFont);
	writeTextBlockCenter($im, 57, 240, 131, 158, $processedText, $color_white);

	$processedText = processTextSymbols($pilotTitle, 8, $italicFont);
	writeTextBlockCenter($im, 79, 219, 161, 178, $processedText, $color_white);

	// ----------------------------------- Initiative

	$processedText = processTextSymbols($initiative, 18, $titleFont);
	writeTextBlockCenter($im, 8, 35, 133, 167, $processedText, $color_orange);

	// ----------------------------------- Ship image and name

	//writeTextCenter($im, 57, 243, 390, 406, 7, $color_white, $titleFont, strtoupper($_shipNames[ $ship ]));
	//writeTextCenter($im, 8, 37, 388, 413, 19, $color_white, $shipFont, $_shipSymbols[ $ship ]);

	// ----------------------------------- Actions

	$actionsRow = 0;
	$linkedActions = false;
	for($i=0; $i<5; $i++){
		if ($actions[$i] != 'none' || $actionsRed[$i] != 'none'){
			$actionsRow ++;
		}
		if ($actions[$i] != 'none' && $actionsRed[$i] != 'none'){
			$linkedActions = true;
		}
	}

	if($linkedActions == true){
		imagecopyresampled($im, $imBaseLinkedActions, 203, 177, 0, 0, 95, 203, 95, 203);
	}

	$y_top = 180;
	$y_bottom = 380;

	for($i=1; $i<$actionsRow; $i++){
		$y = $y_top + $i*($y_bottom-$y_top)/$actionsRow;
		if($linkedActions == true){
			imagecopyresampled($im, $imSeparator, 220, $y, 0, 0, 78, 4, 78, 4);
		}else{
			imagecopyresampled($im, $imSeparator, 253, $y, 0, 0, 45, 4, 45, 4);
		}
	}

	$j = 0;
	$x_left = $linkedActions ? 220 : 253;
	for($i=0; $i<5; $i++){

		$y = $y_top + $j*($y_bottom-$y_top)/$actionsRow;

		if ($actions[$i] != 'none' && $actionsRed[$i] == 'none'){

			$processedText = processTextSymbols($actions[$i], 14);
			writeTextBlockCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, $processedText, $color_white);

			$j ++;

		}else if ($actions[$i] == 'none' && $actionsRed[$i] != 'none'){

			$processedText = processTextSymbols($actionsRed[$i], 14);
			writeTextBlockCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, $processedText, $color_attack);

			$j ++;

		}else if($actions[$i] != 'none' && $actionsRed[$i] != 'none'){

			$x_mid = (300+$x_left)/2;

			$y_bottom_row = $y + ($y_bottom-$y_top)/$actionsRow;

			$processedText = processTextSymbols($actions[$i], 13);
			writeTextBlockCenter($im, $x_left, $x_mid, $y, $y_bottom_row, $processedText, $color_white);

			$processedText = processTextSymbols('!lnk', 11);
			writeTextBlockCenter($im, $x_left, 300, $y, $y_bottom_row, $processedText, $color_white);

			$processedText = processTextSymbols($actionsRed[$i], 13);
			writeTextBlockCenter($im, $x_mid, 300, $y, $y_bottom_row, $processedText, $color_attack);

			$j ++;
		}
	}

	// ----------------------------------- Abilities

	$x_left = $linkedActions ? 200 : 400;

	$processedText = processTextSymbols($pilotAbility, 10);
	//writeTextBlockCenter($im, 15, $x_left, 315, 415, $processedText, $color_shield);
	$processedText = processTextSymbols($shipAbility, 12);
	//writeTextBlockCenter($im, 15, $x_left, 415, 530, $processedText, $color_black);

	// ----------------------------------- Stats

	$numberOfStats = 0;

	foreach($stats as $key => $value){
		if($value != 0 || $key == 'agility' ){
			$numberOfStats++;
		}
	}


	$x_left = 0;
	$x_right = $linkedActions ? 217 : 250;
	// Reduction
	$x_left += (9-$numberOfStats)*0.04*$x_right;
	$x_right -= (9-$numberOfStats)*0.04*$x_right;

	$width = ($x_right-$x_left)/$numberOfStats;

	$i = 0;
	foreach($stats as $key => $value){
		if($value != 0 || $key == 'agility' ){
			$imageName = 'im_'.$key;
			$offset = $i*$width;
			if (strpos($key, 'attack') !== false) {
				$color = 'color_attack';
			}else{
				$color = 'color_'.$key;
			}

			drawImageCenter($im, $x_left+$offset, $x_left+$offset+(1*$width), 325, 380, 32, 32, $$imageName);

			$processedText = processTextSymbols($stats[$key], 16, $titleFont);
			writeTextBlockCenter($im, $x_left+$offset, $x_left+$offset+(1*$width), 338, 393, $processedText, $$color);

			$i++;
		}
	}

	// ----------------------------------- Output

	ob_start();
		imagejpeg($im);
		$contents = ob_get_contents();
	ob_end_clean();

	$dataUri = "data:image/png;base64," . base64_encode($contents);

	$outPutData['dataUri'] = $dataUri;

	echo json_encode($outPutData);

?>