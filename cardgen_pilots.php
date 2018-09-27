<?php

	define('ROOT_DIR', './');
	define('IM_DIR', './img/');

	include_once 'symbol_conversion.php';
	include_once 'cardgen_functions.php';

	global $outPutData;
	$outPutData['errors'] = [];
	$outPutData['post'] = $_POST;
	$outPutData['log'] = [];

	$mainFont = ROOT_DIR.'src/arial.ttf';
	$titleFont = ROOT_DIR.'src/Orbitron-Bold.ttf';
	$boldFont = ROOT_DIR.'src/arialbd.ttf';
	$italicFont = ROOT_DIR.'src/ariali.ttf';
	$symbolFont1 = ROOT_DIR.'src/xwing-miniatures-modified.ttf';
	$shipFont = ROOT_DIR.'src/xwing-miniatures-ships.ttf';

	// ----------------------------------- 

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$pilotTitle = isset($_POST['pilot-title']) && $_POST['pilot-title'] != '' ? $_POST['pilot-title'] : '';
	$limited = isset($_POST['limited']) && $_POST['limited'] != '' && $_POST['limited'] != 'false' ? true : false;
	$faction = isset($_POST['faction']) && $_POST['faction'] != '' ? $_POST['faction'] : '';
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

	$im = @imagecreatefrompng(IM_DIR.'base-pilots-'.$faction.'.png') or usr_error('Error base image '.$faction);
	$imSeparator = @imagecreatefrompng(IM_DIR.'pilot-action-separator-'.$faction.'.png') or usr_error('Error separator image '.$faction);
	$imBaseLinkedActions = @imagecreatefrompng(IM_DIR.'base-linked-actions-'.$faction.'.png') or usr_error('Error baseLinkedActions image '.$faction);

	$im_attackFront = @imagecreatefrompng(IM_DIR.'s_frontArc.png') or usr_error('Error frontArc image');
	$im_attackRear = @imagecreatefrompng(IM_DIR.'s_rearArc.png') or usr_error('Error rearArc image');
	$im_attackSingleMobile = @imagecreatefrompng(IM_DIR.'s_mobileArc.png') or usr_error('Error singleMobileArc image');
	$im_attackDoubleMobile = @imagecreatefrompng(IM_DIR.'s_dualMobileArc.png') or usr_error('Error doubleMobileARc image');
	$im_agility = @imagecreatefrompng(IM_DIR.'s_agility.png') or usr_error('Error agility image');
	$im_hull = @imagecreatefrompng(IM_DIR.'s_hull.png') or usr_error('Error hull image');
	$im_shield = @imagecreatefrompng(IM_DIR.'s_shield.png') or usr_error('Error shield image');
	$im_force = @imagecreatefrompng(IM_DIR.'s_force.png') or usr_error('Error force image');
	$im_charges = @imagecreatefrompng(IM_DIR.'s_charge.png') or usr_error('Error charge image');

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

	// ----------------------------------- Card name

	$offsets = writeTextCenter($im, 57, 240, 131, 158, 10, $color_white, $titleFont, $cardName);
	if($limited){
		writeTextCenter($im, 57+$offsets[0]-10, 57+$offsets[0], 133, 160, 12, $color_white, $symbolFont1, $_symbolConversion[ 'LIMITED' ]);
	}
	writeTextCenter($im, 79, 219, 161, 178, 8, $color_white, $italicFont, $pilotTitle);

	// ----------------------------------- Initiative

	writeTextCenter($im, 8, 35, 133, 167, 18, $color_orange, $titleFont, $initiative);

	// ----------------------------------- Ship image and name

	writeTextCenter($im, 57, 243, 390, 406, 7, $color_white, $titleFont, strtoupper($_shipNames[ $ship ]));
	writeTextCenter($im, 8, 37, 388, 413, 19, $color_white, $shipFont, $_shipSymbols[ $ship ]);



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

			writeTextCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 14, $color_white, $symbolFont1, $_symbolConversion[ $actions[$i] ]);
			$j ++;

		}else if ($actions[$i] == 'none' && $actionsRed[$i] != 'none'){

			writeTextCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 14, $color_attack, $symbolFont1, $_symbolConversion[ $actionsRed[$i] ]);
			$j ++;

		}else if($actions[$i] != 'none' && $actionsRed[$i] != 'none'){

			$x_mid = (300+$x_left)/2;
			writeTextCenter($im, $x_left, $x_mid, $y, $y + ($y_bottom-$y_top)/$actionsRow, 13, $color_white, $symbolFont1, $_symbolConversion[ $actions[$i] ]);
			writeTextCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 11, $color_white, $symbolFont1, $_symbolConversion[ 'LINK' ]);
			writeTextCenter($im, $x_mid, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 13, $color_attack, $symbolFont1, $_symbolConversion[ $actionsRed[$i] ]);
			$j ++;
		}
	}

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
			writeTextCenter($im, $x_left+$offset, $x_left+$offset+(1*$width), 338, 393, 16, $$color, $titleFont, $stats[$key]);
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