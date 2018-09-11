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

	// ----------------------------------- 

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$pilotTitle = isset($_POST['pilot-title']) && $_POST['pilot-title'] != '' ? $_POST['pilot-title'] : '';
	$limited = isset($_POST['limited']) && $_POST['limited'] != '' && $_POST['limited'] != 'false' ? true : false;
	$faction = isset($_POST['faction']) && $_POST['faction'] != '' ? $_POST['faction'] : '';
	$ship = isset($_POST['ship']) && $_POST['ship'] != '' ? $_POST['ship'] : '';

	$actions = isset($_POST['actions']) && $_POST['actions'] != '' ? $_POST['actions'] : 'focus,none,none,none,none';
	$actionsRed = isset($_POST['actions-red']) && $_POST['actions-red'] != '' ? $_POST['actions-red'] : 'none,none,none,none,none';
	$actions = explode(',', $actions);
	$actionsRed = explode(',', $actionsRed);

	$initiative = isset($_POST['initiative']) && $_POST['initiative'] != '' ? $_POST['initiative'] : 1;
	$initiative = checkMinMax($initiative, 1, 6);

	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : IM_DIR.'blank-image.png');

	// ----------------------------------- Image loading

	$im = @imagecreatefrompng(IM_DIR.'base-pilots-'.$faction.'.png') or usr_error("Error base image ".$faction);
	$imSeparator = @imagecreatefrompng(IM_DIR.'pilot-action-separator-'.$faction.'.png') or usr_error("Error separator image ".$faction);
	$imbaseLinkedActions = @imagecreatefrompng(IM_DIR.'base-linked-actions-'.$faction.'.png') or usr_error("Error baseLinkedActions image ".$faction);

	// ----------------------------------- Color creation

	$background_color = imagecolorallocate($im, 0, 0, 0);
	$color_white = imagecolorallocate($im, 255, 255, 255);
	$color_darkGrey = imagecolorallocate($im, 70, 70, 70);
	$color_black = imagecolorallocate($im, 46, 46, 46);
	$color_red = imagecolorallocate($im, 238, 32, 36);
	$color_orange = imagecolorallocate($im, 230, 118, 43);

	// ----------------------------------- Card name

	$offsets = writeTextCenter($im, 57, 240, 131, 158, 10, $color_white, $titleFont, $cardName);
	if($limited){
		writeTextCenter($im, 57+$offsets[0]-10, 57+$offsets[0], 133, 160, 12, $color_white, $symbolFont1, $_symbolConversion[ 'LIMITED' ]);
	}
	writeTextCenter($im, 79, 219, 161, 178, 8, $color_white, $italicFont, $pilotTitle);

	// ----------------------------------- Initiative

	writeTextCenter($im, 8, 35, 133, 167, 18, $color_orange, $titleFont, $initiative);

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
		imagecopyresampled($im, $imbaseLinkedActions, 203, 177, 0, 0, 95, 203, 95, 203);
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

			writeTextCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 14, $color_red, $symbolFont1, $_symbolConversion[ $actionsRed[$i] ]);
			$j ++;

		}else if($actions[$i] != 'none' && $actionsRed[$i] != 'none'){

			$x_mid = (300+$x_left)/2;
			writeTextCenter($im, $x_left, $x_mid, $y, $y + ($y_bottom-$y_top)/$actionsRow, 13, $color_white, $symbolFont1, $_symbolConversion[ $actions[$i] ]);
			writeTextCenter($im, $x_left, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 11, $color_white, $symbolFont1, $_symbolConversion[ 'LINK' ]);
			writeTextCenter($im, $x_mid, 300, $y, $y + ($y_bottom-$y_top)/$actionsRow, 13, $color_red, $symbolFont1, $_symbolConversion[ $actionsRed[$i] ]);
			$j ++;
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