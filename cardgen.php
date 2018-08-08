<?php
	// print_r($_POST);
	// print_r($_FILES);

	define('CARD_W', 418);
	define('CARD_H', 300);
	define('CARD_ART_W', 238);
	define('CARD_ART_H', 120);

	$outPutData;
	$outPutData['errors'] = [];
	$outPutData['post'] = $_POST;
	$outPutData['log'] = [];


	foreach($_POST as $key => $value){
		if($_POST[$key] == ''){
			//array_push($outPutData['log'], '$_POST[\''.$key.'\']==\'\'');
		}
	}

	$mainFont = 'src/xwing-miniatures-ships.ttf';
	$boldFont = 'src/Orbitron-Bold.ttf';


	//Ajouter controle de saisie type d'upgrade

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$limited = isset($_POST['limited']) && $_POST['limited'] != '' && $_POST['limited'] != 'false' ? true : false;

	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : './img/blank-image.png');
	$cardType = isset($_POST['card-type']) && $_POST['card-type'] != '' ? $_POST['card-type'] : 'ept';
	$arcType = isset($_POST['arc-type']) && $_POST['arc-type'] != '' ? $_POST['arc-type'] : 'classic';

	$grantAttack = isset($_POST['grant-attack']) && $_POST['grant-attack'] != '' && $_POST['grant-attack'] != 'false'? true : false;
	
	$diceNumber = isset($_POST['dice-number']) && $_POST['dice-number'] != '' ? $_POST['dice-number'] : '';
	$diceNumber = $diceNumber < 9 ? $diceNumber : 9;
	$diceNumber = $diceNumber > 0  ? $diceNumber : 0;
	
	$rangeBonus = isset($_POST['range-bonus']) && $_POST['range-bonus'] != '' && $_POST['range-bonus'] != 'false'? true : false;
	
	$minRange = isset($_POST['min-range']) && $_POST['min-range'] != '' ? $_POST['min-range'] : '';
	$minRange = $minRange < 5 ? $minRange : 5;
	$minRange = $minRange >= 0  ? $minRange : 0;
	$maxRange = isset($_POST['max-range']) && $_POST['max-range'] != '' ? $_POST['max-range'] : '';
	$maxRange = $maxRange < 5 ? $maxRange : 5;
	$maxRange = $maxRange >= 0  ? $maxRange : 0;
	
	$chargeNumber = isset($_POST['charge-number']) && $_POST['charge-number'] != '' ? $_POST['charge-number'] : '';
	$chargeNumber = $chargeNumber < 9 ? $chargeNumber : 9;
	$chargeNumber = $chargeNumber > 0  ? $chargeNumber : 0;
	$chargeRegen = isset($_POST['charge-regenerate']) && $_POST['charge-regenerate'] != '' && $_POST['charge-regenerate'] != 'false' ? true : false;


	$cardText = (isset($_POST['card-text']) && $_POST['card-text'] != '' ? $_POST['card-text'] : '');

	$restrictionsText = (isset($_POST['restrictions-text']) && $_POST['restrictions-text'] != '' ? $_POST['restrictions-text'] : '');

	if($grantAttack || $chargeNumber > 0){
		$textSize = 'small';
	}else{
		$textSize = 'large';
	}

	$im = @imagecreatefrompng('img/base.png') or die("Error base image");
	$imLimited = @imagecreatefrompng('img/limited.png') or die("Error limited image");
	$imTextBackground = @imagecreatefrompng('img/' . $textSize .'_text.png') or die("Error text background image");

	if(isset($_FILES['image']['type']) && $_FILES['image']['type'] == 'image/jpeg'){
		$imCardArt = @imagecreatefromjpeg($imgArt) or die("Error card art image");
	}else{
		$imCardArt = @imagecreatefrompng($imgArt) or die("Error card art image");
	}

	$imCardType = @imagecreatefrompng('img/upgrade-' . $cardType .'.png') or die('Error type image');
	$imSecondaryWeapondBackground = @imagecreatefrompng('img/secondary-weapon-background.png') or die('Error SecWeapBackground image');
	$imSecondaryWeapondArc = @imagecreatefrompng('img/secondary-arc-' . $arcType . '.png') or die('Error SecWeapArc image');
	$imSecondaryWeapondRange = @imagecreatefrompng('img/secondary-range-bonus.png') or die('Error SecWeapRange image');
	$imCharges = @imagecreatefrompng('img/charges.png') or die('Error charges image');
	$imChargesRegen =  @imagecreatefrompng('img/charge-regen.png') or die('Error charges image regenerate');
	
	$imTextBoost = @imagecreatefrompng('img/text-boost.png') or die('Error text charge image');
	$imTextCharge = @imagecreatefrompng('img/text-charge.png') or die('Error text charge image');
	$imTextCriticalHit = @imagecreatefrompng('img/text-criticalHit.png') or die('Error text focus image');
	$imTextDevice = @imagecreatefrompng('img/text-device.png') or die('Error text device image');
	$imTextEvade = @imagecreatefrompng('img/text-evade.png') or die('Error text focus image');
	$imTextFocus = @imagecreatefrompng('img/text-focus.png') or die('Error text focus image');
	$imTextHit = @imagecreatefrompng('img/text-hit.png') or die('Error text focus image');
	$imTextTargetLock = @imagecreatefrompng('img/text-targetLock.png') or die('Error text target lock image');

	$imRestrictionsText = @imagecreatefrompng('img/restrictions_text.png') or die('Error restrictions background image');
	
	$background_color = imagecolorallocate($im, 0, 0, 0);
	$color_white = imagecolorallocate($im, 255, 255, 255);
	$color_darkGrey = imagecolorallocate($im, 70, 70, 70);
	$color_black = imagecolorallocate($im, 46, 46, 46);

	

	// ----------------------------------- Card name

	if($limited){
		imagecopyresampled($im, $imLimited, 182, 129, 0, 0, 8, 8, 8, 8);
	}

	imagettftext($im, 10, 0, 193, 139, $color_white, $boldFont, $cardName);

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

		$text_color = imagecolorallocate($im, 238, 32, 36);
		imagettftext($im, 17, 0, 374, 171, $text_color, $boldFont, $diceNumber);

		if(!$rangeBonus){
			imagecopyresampled($im, $imSecondaryWeapondRange, 345, 182, 0, 0, 18, 8, 18, 8);
		}

		$text_color = imagecolorallocate($im, 255, 255, 255);
		if($minRange!=$maxRange){
			imagettftext($im, 10, 0, 365, 191, $text_color, $boldFont, $minRange.'-'.$maxRange);
		}else{
			imagettftext($im, 10, 0, 375, 191, $text_color, $boldFont, $minRange);
		}
	}

	// ----------------------------------- Main text

	imagecopyresampled($im, $imTextBackground, 0, 0, 0, 0, CARD_W, CARD_H, CARD_W, CARD_H);

	$x_left = 183;
	$x_right = $textSize == 'large' ? 392 : 331;

	$y_line = 164;
	$y_max = 284;
	$y_newLine = 14;

	$cardText_fontSize = 9;

	$cardTextArray = explode(' ', $cardText);
	
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
		if($x_left + imagettfbbox($cardText_fontSize, 0, $mainFont, $cardTextArray[0])[2] > $x_right){
			array_push($outPutData['errors'], 'One of the words is larger than the line');
			break;
		}
		// Tests if text + next world will fit
		// If the word is a symbol ( /![^\s]{3}/ ), tests if the spaces will fit
		while($cardTextArray != [] && $x_left + imagettfbbox($cardText_fontSize, 0, $mainFont, $lineTextProcessed.' '.preg_replace("/![^\s]{3}/", "     ", $cardTextArray[0]))[2] < $x_right){
			// Tests if line contains a symbol and store position
			$match;
			// TODO Gerer les symboles collés
			if(preg_match("/![^\s]{3}/", $cardTextArray[0], $match)){
				$x_offset = $x_left + imagettfbbox($cardText_fontSize, 0, $mainFont, $lineTextProcessed)[2] + 2;
				array_push($symbols, [$match[0], $x_offset+0]);
			}
			preg_match("/![^\s]{3}/", $cardTextArray[0], $a);
			$lineTextProcessed .= ' '.preg_replace("/![^\s]{3}/", '     ', array_shift($cardTextArray));
		}

		// Draw symbols
		foreach($symbols as $s){
			switch($s[0]){
				case '!boo':
					imagecopyresampled($im, $imTextBoost, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!cha':
					imagecopyresampled($im, $imTextCharge, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!crh':
					imagecopyresampled($im, $imTextCriticalHit, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!dev':
					imagecopyresampled($im, $imTextDevice, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!eva':
					imagecopyresampled($im, $imTextEvade, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!foc':
					imagecopyresampled($im, $imTextFocus, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!hit':
					imagecopyresampled($im, $imTextHit, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				case '!tlk':
					imagecopyresampled($im, $imTextTargetLock, $s[1], $y_line-$cardText_fontSize-2, 0, 0, 18, 13, 18, 13);
					break;
				default:
			}
		}


		// Write the largest line possibleee
		imagettftext($im, $cardText_fontSize, 0, $x_left, $y_line, $color_black, $mainFont, $lineTextProcessed);
		$y_line += $y_newLine;
	}

	// ----------------------------------- Granted actions

	//340, 199

	// ----------------------------------- Charges

	//392,152

	if($chargeNumber != 0){
		if($grantAttack){
			$y_charge = 220;
		}else{
			$y_charge = 147;
		}
		imagecopyresampled($im, $imCharges, 343, $y_charge, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 229, 185, 34);
		imagettftext($im, 17, 0, 375, $y_charge+25, $text_color, $boldFont, $chargeNumber);
		if($chargeRegen){
			imagecopyresampled($im, $imChargesRegen, 395, $y_charge+5, 0, 0, 7, 8, 7, 8);
		}
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

		$restrictionsTextArray = explode(' ', $restrictionsText);

		while($restrictionsTextArray != []){

			$x_current = $x_left;
			$lineTextProcessed = '';

			// Tests if the text is too long
			if($y_line > $y_max){
				array_push($outPutData['errors'], 'The text is too long');
				break;
			}

			// First word is larger than the line
			if($x_left + imagettfbbox($restrictionText_fontSize, 0, $mainFont, $restrictionsTextArray[0])[2] > $x_right){
				array_push($outPutData['errors'], 'One of the words is larger than the line');
				break;
			}

			while($restrictionsTextArray != [] && $x_left + imagettfbbox($restrictionText_fontSize, 0, $mainFont, $lineTextProcessed.' '.$restrictionsTextArray[0])[2] < $x_right){

				$lineTextProcessed .= ' '.array_shift($restrictionsTextArray);

			}

			imagettftext($im, $restrictionText_fontSize, 0, $x_left, $y_line, $color_darkGrey, $mainFont, $lineTextProcessed);
		$y_line += $y_newLine;
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