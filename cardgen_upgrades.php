<?php

	define('CARD_W', 418);
	define('CARD_H', 300);
	define('CARD_ART_W', 238);
	define('CARD_ART_H', 120);

	include_once 'symbol_conversion.php';
	include_once 'cardgen_functions.php';

	global $outPutData;
	$outPutData['errors'] = [];
	$outPutData['post'] = $_POST;
	$outPutData['log'] = [];

	$mainFont = loadRessource('arial.ttf');
	$titleFont = loadRessource('Orbitron-Bold.ttf');
	$boldFont = loadRessource('arialbd.ttf');
	$italicFont = loadRessource('ariali.ttf');
	$symbolFont1 = loadRessource('xwing-miniatures-modified.ttf');

	//Ajouter controle de saisie type d'upgrade

	// ----------------------------------- 

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$limited = isset($_POST['limited']) && $_POST['limited'] != '' && $_POST['limited'] != 'false' ? true : false;

	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : ROOT_DIR.'img/blank-image.png');
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
	$italicText = isset($_POST['italic-text']) && $_POST['italic-text'] != '' && $_POST['italic-text'] != 'false' ? true : false;

	$restrictionsText = (isset($_POST['restrictions-text']) && $_POST['restrictions-text'] != '' ? $_POST['restrictions-text'] : '');

	if($grantAttack || $chargeNumber > 0 || $forceNumber > 0 || $grantAction !='none' || $hullNumber > 0 || $shieldNumber > 0 ){
		$textSize = 'small';
	}else{
		$textSize = 'large';
	}

	// ----------------------------------- Image loading
	$im = loadImagePng('base.png');
	$imLimited = loadImagePng('limited.png');
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

	if($limited){
		//imagecopyresampled($im, $imLimited, 182, 129, 0, 0, 8, 8, 8, 8);
	}

	//imagettftext($im, 10, 0, 193, 139, $color_white, $titleFont, $cardName);

	$offsets = writeTextCenter($im, 167, 404, 124, 142, 10, $color_white, $titleFont, $cardName);
	if($limited){
		writeTextCenter($im, 167+$offsets[0]-10, 167+$offsets[0], 126, 144, 12, $color_white, $symbolFont1, $_symbolConversion[ 'LIMITED' ]);
	}

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
	$x_right = $textSize == 'large' ? 390 : 329;

	$y_line = 164;
	$y_max = 284;
	$y_newLine = 14;

	$cardText_fontSize = 9;

	$cardTextArray = explode(' ', $cardText);

	$fontMainText = $italicText ? $italicFont : $mainFont;
	
	while($cardTextArray != []){

		$x_current = $x_left;
		$lineTextProcessed = '';
		// [ [name, y], [name, y], [name, y] ]
		$symbols = [];

		// Tests if the text is too long
		if($y_line > $y_max){
			array_push($outPutData['errors'], 'The text is too long');
			break;
		}

		// First word is larger than the line
		if($x_left + imagettfbbox($cardText_fontSize, 0, $fontMainText, $cardTextArray[0])[2] > $x_right){
			array_push($outPutData['errors'], 'One of the words is larger than the line');
			break;
		}
		// Tests if text + next world will fit
		// If the word is a symbol ( /![^\s]{3}/ ), tests if the spaces will fit
		while($cardTextArray != [] && $x_left + imagettfbbox($cardText_fontSize, 0, $fontMainText, $lineTextProcessed.' '.preg_replace("/![^\s]{3}/", "     ", $cardTextArray[0]))[2] < $x_right){
			// Tests if line contains a symbol and store position
			$match;
			if(preg_match("/![^\s]{3}/", $cardTextArray[0], $match, PREG_OFFSET_CAPTURE)){
				$x_offset = $x_left + imagettfbbox($cardText_fontSize, 0, $fontMainText, $lineTextProcessed)[2] + 2;
				// $match[0][1] : number of characters before the symbol
				$x_offset += imagettfbbox( $cardText_fontSize, 0, $fontMainText, substr($cardTextArray[0], 0, $match[0][1]) )[2];
				
				array_push($symbols, [$match[0][0], $x_offset]);
			}
			preg_match("/![^\s]{3}/", $cardTextArray[0], $a);
			$lineTextProcessed .= ' '.preg_replace("/![^\s]{3}/", '     ', array_shift($cardTextArray));
		}

		
		$x_offsetCenter = ( $x_right - ($x_left + imagettfbbox($cardText_fontSize, 0, $fontMainText, $lineTextProcessed)[2] ) )/2;

		foreach($symbols as $s){
			$symbName = substr($s[0], 1);
			//$x_offsetCenter = ($x_right - ($x_left + $s[1]) ) / 2;
			//$x_offsetCenter = $s[1]-$x_left;




			imagettftext($im, $cardText_fontSize, 0, $s[1]+$x_offsetCenter+1, $y_line, $color_black, $symbolFont1, $_symbolConversion[$symbName]);
		}



		// Write the largest line possible

		imagettftext($im, $cardText_fontSize, 0, $x_left+$x_offsetCenter, $y_line, $color_black, $fontMainText, $lineTextProcessed);
		$y_line += $y_newLine;
	}

	// ----------------------------------- Granted actions

	//340, 199

	if($grantAction != 'none'){
		imagecopyresampled($im, $imGrantAction, 338, 199, 0, 0, 67, 36, 67, 36);
		$color = $grantActionRed ? $color_red : $color_white;

		//344, 407

		// writeTextCenter($im, 344, 407, 203, 230, 13, $color, $symbolFont1, $_symbolConversion[strtoupper($grantAction)] );
		writeTextCenter($im, 344, 407, 203, 230, 13, $color, $symbolFont1, $_symbolConversion[strtoupper($grantAction)] );
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

		$x_left = 25;
		$x_right = 135;

		$y_line = 262;
		$y_max = 290;
		$y_newLine = 14;

		$restrictionText_fontSize = 9;

		$restrictionsTextArray = explode(' ', trim($restrictionsText));

		if( ( isset($_symbolConversion[$restrictionsTextArray[0]]) && count($restrictionsTextArray) == 1 ) ){
			// Action restriction

			imagettftext($im, $restrictionText_fontSize+4, 0, 71, 276, $color_black, $symbolFont1, $_symbolConversion[$restrictionsTextArray[0]]);

		}else if( ($restrictionsTextArray[0] == 'RED' && isset($_symbolConversion[$restrictionsTextArray[1]]) && count($restrictionsTextArray) == 2 ) ){
			// Red action restriction

			imagettftext($im, $restrictionText_fontSize+4, 0, 71, 276, $color_red, $symbolFont1, $_symbolConversion[$restrictionsTextArray[1]]);

		}else{
			// Classic text

			while($restrictionsTextArray != []){

				$x_current = $x_left;
				$lineTextProcessed = '';

				// Tests if the text is too long
				if($y_line > $y_max){
					array_push($outPutData['errors'], 'The text is too long');
					break;
				}

				// First word is larger than the line
				if($x_left + imagettfbbox($restrictionText_fontSize, 0, $italicFont, $restrictionsTextArray[0])[2] > $x_right){
					array_push($outPutData['errors'], 'One of the words is larger than the line');
					break;
				}

				while($restrictionsTextArray != [] && $x_left + imagettfbbox($restrictionText_fontSize, 0, $italicFont, $lineTextProcessed.' '.$restrictionsTextArray[0])[2] < $x_right){

					$lineTextProcessed .= ' '.array_shift($restrictionsTextArray);

				}

				$x_offsetCenter = ( $x_right - ($x_left + imagettfbbox($restrictionText_fontSize, 0, $italicFont, $lineTextProcessed)[2] ) )/2;

				imagettftext($im, $restrictionText_fontSize, 0, $x_left+$x_offsetCenter, $y_line, $color_darkGrey, $italicFont, $lineTextProcessed);

				$y_line += $y_newLine;
			}

		}

	}

	// ----------------------------------- Output

	imagecopyresampled($im, $imCardType, 30, 28, 0, 0, 102, 103, 102, 103);
	
	ob_start();
		imagejpeg($im);
		$contents = ob_get_contents();
	ob_end_clean();

	$dataUri = "data:image/png;base64," . base64_encode($contents);

	$outPutData['dataUri'] = $dataUri;

	echo json_encode($outPutData);

?>