<?php

	define('CARD_W', 418);
	define('CARD_H', 300);
	define('CARD_ART_W', 238);
	define('CARD_ART_H', 120);
	
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

	// ----------------------------------- 

	$publish = isset($_POST['publish']) && $_POST['publish'] != '' && $_POST['publish'] != 'false'? true : false;
	$userName = isset($_POST['userName']) && $_POST['userName'] != '' ? $_POST['userName'] : '';

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));

	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : getImDir().'blank-image.png');
	$cardType = isset($_POST['card-type']) && $_POST['card-type'] != '' ? $_POST['card-type'] : 'ept';
	$arcType = isset($_POST['arc-type']) && $_POST['arc-type'] != '' ? $_POST['arc-type'] : 'classic';

	$grantAttack = isset($_POST['grant-attack']) && $_POST['grant-attack'] != '' && $_POST['grant-attack'] != 'false'? true : false;

	$grantAction = isset($_POST['grant-action']) && $_POST['grant-action'] != '' && $_POST['grant-action'] != ''? $_POST['grant-action'] : 'none';
	$grantActionRed = isset($_POST['grant-action-red']) && $_POST['grant-action-red'] != '' && $_POST['grant-action-red'] != 'false'? true : false;

	$diceNumber = isset($_POST['dice-number']) && $_POST['dice-number'] != '' ? $_POST['dice-number'] : '';
	$diceNumber = checkMinMax($diceNumber, 0, 9);

	$rangeBonus = isset($_POST['range-bonus']) && $_POST['range-bonus'] != '' && $_POST['range-bonus'] != 'false'? true : false;

	$minRange = isset($_POST['min-range']) && $_POST['min-range'] != '' ? $_POST['min-range'] : '';
	$minRange = checkMinMax($minRange, 0, 5);
	$maxRange = isset($_POST['max-range']) && $_POST['max-range'] != '' ? $_POST['max-range'] : '';
	$maxRange = checkMinMax($maxRange, 0, 5);

	$chargeNumber = isset($_POST['charge-number']) && $_POST['charge-number'] != '' ? $_POST['charge-number'] : '';
	$chargeNumber = checkMinMax($chargeNumber, 0, 9);
	$chargeRegen = isset($_POST['charge-regenerate']) && $_POST['charge-regenerate'] != '' && $_POST['charge-regenerate'] != 'false' ? true : false;

	$forceNumber = isset($_POST['force-number']) && $_POST['force-number'] != '' ? $_POST['force-number'] : '';
	$forceNumber = checkMinMax($forceNumber, 0, 9);
	$forceRegen = isset($_POST['force-regenerate']) && $_POST['force-regenerate'] != '' && $_POST['force-regenerate'] != 'false' ? true : false;

	$hullNumber = isset($_POST['hull-number']) && $_POST['hull-number'] != '' ? $_POST['hull-number'] : '';
	$hullNumber = checkMinMax($hullNumber, 0, 6);

	$shieldNumber = isset($_POST['shield-number']) && $_POST['shield-number'] != '' ? $_POST['shield-number'] : '';
	$shieldNumber = checkMinMax($shieldNumber, 0, 6);

	$cardText = (isset($_POST['card-text']) && $_POST['card-text'] != '' ? $_POST['card-text'] : '');

	$restrictionsText = (isset($_POST['restrictions-text']) && $_POST['restrictions-text'] != '' ? $_POST['restrictions-text'] : '');

	if($grantAttack || $chargeNumber > 0 || $forceNumber > 0 || $grantAction !='none' || $hullNumber > 0 || $shieldNumber > 0 ){
		$textSize = 'small';
	}else{
		$textSize = 'large';
	}

	// ----------------------------------- Image loading
	$im = loadImagePng('base.png');
	$imTextBackground = loadImagePng($textSize .'_text.png');

	if(isset($_FILES['image']['type']) && $_FILES['image']['type'] == 'image/jpeg'){
		$imCardArt = @imagecreatefromjpeg($imgArt) or usr_error('Error card art image');
	}else{
		$imCardArt = @imagecreatefrompng($imgArt) or usr_error('Error card art image');
	}

	$imCardType = loadImagePng('upgrade-' . $cardType .'.png');
	
	$imSecondaryWeapondBackground = loadImagePng('secondary-weapon-background.png');
	$imSecondaryWeapondArc = loadImagePng('secondary-arc-' . $arcType . '.png');
	$imSecondaryWeapondRange = loadImagePng('secondary-range-bonus.png');

	$imGrantAction = loadImagePng('grantAction.png');
	
	$imCharges = loadImagePng('bonus-charges.png');
	$imChargesRegen =  loadImagePng('charge-regen.png');
	$imForces = loadImagePng('bonus-forces.png');
	$imForcesRegen =  loadImagePng('force-regen.png');
	$imHull = loadImagePng('bonus-hull.png');
	$imShield = loadImagePng('bonus-shield.png');

	$imRestrictionsText = loadImagePng('restrictions_text.png');

	// ----------------------------------- Color creation
	
	$background_color = imagecolorallocate($im, 0, 0, 0);
	$color_white = imagecolorallocate($im, 255, 255, 255);
	$color_darkGrey = imagecolorallocate($im, 70, 70, 70);
	$color_black = imagecolorallocate($im, 46, 46, 46);
	$color_red = imagecolorallocate($im, 238, 32, 36);
	

	// ----------------------------------- Card name

	$processedText = processTextSymbols($cardName, 10, $titleFont);
	$offsets = writeTextBlockCenter($im, 166, 403, 123, 144, $processedText, $color_white);

	// ----------------------------------- Card art

	$src_w = imagesx($imCardArt);
	$src_h = imagesy($imCardArt);

	if(imagesx($imCardArt)/imagesy($imCardArt) < CARD_ART_W/CARD_ART_H){
		$src_h = $src_h/ ((CARD_ART_W/CARD_ART_H) / (imagesx($imCardArt)/imagesy($imCardArt)));
	}else{
		$src_w = $src_w* ((CARD_ART_W/CARD_ART_H) / (imagesx($imCardArt)/imagesy($imCardArt)));
	}

	imagecopyresampled($im, $imCardArt, 167, 1, 0, 0, CARD_ART_W, CARD_ART_H,  $src_w, $src_h);

	// ----------------------------------- Secondary weapons (right part)

	if($grantAttack){
		imagecopyresampled($im, $imSecondaryWeapondBackground, 342, 147, 0, 0, 58, 52, 58, 52);
		imagecopyresampled($im, $imSecondaryWeapondArc, 349, 153, 0, 0, 19, 19, 19, 19);

		imagettftext($im, 17, 0, 374, 171, $color_red, $titleFont, $diceNumber);

		if(!$rangeBonus){
			imagecopyresampled($im, $imSecondaryWeapondRange, 345, 182, 0, 0, 18, 8, 18, 8);
		}

		$text_color = imagecolorallocate($im, 255, 255, 255);
		if($minRange!=$maxRange){
			imagettftext($im, 10, 0, 365, 191, $text_color, $titleFont, $minRange.'-'.$maxRange);
		}else{
			imagettftext($im, 10, 0, 375, 191, $text_color, $titleFont, $minRange);
		}
	}

	// ----------------------------------- Main text

	imagecopyresampled($im, $imTextBackground, 0, 0, 0, 0, CARD_W, CARD_H, CARD_W, CARD_H);

	$x_left = 180;
	$x_right = $textSize == 'large' ? 390 : 328;

	$y_line = 151;
	$y_max = 283;

	$cardText_fontSize = 10;

	$content = processTextSymbols($cardText, $cardText_fontSize);
	writeTextBlockCenter($im, $x_left, $x_right, $y_line, $y_max, $content, $color_black);
	//340, 199

	// ----------------------------------- Grant action

	if($grantAction != 'none'){

		imagecopyresampled($im, $imGrantAction, 338, 199, 0, 0, 67, 36, 67, 36);

		$content = processTextSymbols($grantAction , 13, $fontMainText);
		$color = $grantActionRed ? $color_red : $color_white;

		//writeTextBlockCenter($im, 344, 407, 216, 243, $content, $color);
		writeTextBlockCenter($im, 348, 404, 202, 231, $content, $color);
	}

	// ----------------------------------- Charges

	if($chargeNumber != 0){
		if($grantAttack){
			$y_charge = 220;
		}else{
			$y_charge = 147;
		}
		imagecopyresampled($im, $imCharges, 343, $y_charge, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 229, 185, 34);
		imagettftext($im, 17, 0, 375, $y_charge+25, $text_color, $titleFont, $chargeNumber);
		if($chargeRegen){
			imagecopyresampled($im, $imChargesRegen, 395, $y_charge+5, 0, 0, 7, 8, 7, 8);
		}
	}

	// ----------------------------------- Force

	if($forceNumber != 0){
		if($grantAttack){
			$y_force = 220;
		}else{
			if($chargeNumber != 0){
				$y_force = 190;
			}else{
				$y_force = 147;
			}
		}
		imagecopyresampled($im, $imForces, 343, $y_force, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 186, 150, 185);
		imagettftext($im, 17, 0, 375, $y_force+25, $text_color, $titleFont, $forceNumber);
		if($forceRegen){
			imagecopyresampled($im, $imForcesRegen, 395, $y_force+5, 0, 0, 7, 8, 7, 8);
		}
	}

	// ----------------------------------- Hull

	if($hullNumber != 0){
		$y_hull = 147;
		imagecopyresampled($im, $imHull, 343, $y_hull, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 240, 233, 29);
		imagettftext($im, 17, 0, 375, $y_hull+25, $text_color, $titleFont, $hullNumber);
	}

	// ----------------------------------- Shield

	if($shieldNumber != 0){
		if($hullNumber != 0){
			$y_shield = 190;
		}else{
			$y_shield = 147;
		}
		imagecopyresampled($im, $imShield, 343, $y_shield, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 125, 209, 226);
		imagettftext($im, 17, 0, 375, $y_shield+25, $text_color, $titleFont, $shieldNumber);
	}


	// ----------------------------------- Rstrictions text

	if($restrictionsText !=''){
		imagecopyresampled($im, $imRestrictionsText, 17, 246, 0, 0, 129, 53, 129, 53);

		// $x_left = 25;
		// $x_right = 135;

		// $y_line = 268;
		// $y_max = 296;

		$x_left = 22;
		$x_right = 139;

		$y_line = 251;
		$y_max = 298;

		$processedText = processTextSymbols($restrictionsText, 9, $italicFont);
		writeTextBlockCenter($im, $x_left, $x_right, $y_line, $y_max, $processedText, $color_black);

	}

	// ----------------------------------- Output

	imagecopyresampled($im, $imCardType, 30, 28, 0, 0, 102, 103, 102, 103);
		
	ob_start();
		imagepng($im);
		$contents = ob_get_contents();
	ob_end_clean();

	if($publish){
		$cardName = str_replace('!LIM', '', $cardName);
		$outPutData['imFullPath'] = saveImageOnDisk($cardName, $userName, $contents);
		echo json_encode($outPutData);
	}else{

		$dataUri = "data:image/png;base64," . base64_encode($contents);

		$outPutData['dataUri'] = $dataUri;

		echo json_encode($outPutData);
	}
	
	

?>