<?php
	// print_r($_POST);
	// print_r($_FILES);

	define('CARD_W', 418);
	define('CARD_H', 300);
	define('CARD_ART_W', 238);
	define('CARD_ART_H', 120);

	$outPutData;
	$outPutData['errors'] = [];

	//Ajouter controle de saisie type d'upgrade

	$cardName = strtoupper((isset($_POST['card-name']) && $_POST['card-name'] != '' ? $_POST['card-name'] : ''));
	$limited = isset($_POST['limited']) && $_POST['limited'] != '' && $_POST['limited'] != 'no'? true : false;
	$imgArt = (isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : './img/blank-image.png');
	$cardType = isset($_POST['card-type']) && $_POST['card-type'] != '' ? $_POST['card-type'] : 'ept';
	$arcType = isset($_POST['arc-type']) && $_POST['arc-type'] != '' ? $_POST['arc-type'] : 'classic';
	
	$diceNumber = isset($_POST['dice-number']) && $_POST['dice-number'] != '' ? $_POST['dice-number'] : '';
	$diceNumber = $diceNumber < 9 ? $diceNumber : 9;
	$diceNumber = $diceNumber > 0  ? $diceNumber : 0;
	
	$rangeBonus = isset($_POST['range-bonus']) && $_POST['range-bonus'] != '' && $_POST['range-bonus'] != 'no'? true : false;
	
	$minRange = isset($_POST['min-range']) && $_POST['min-range'] != '' ? $_POST['min-range'] : '';
	$minRange = $minRange < 9 ? $minRange : 9;
	$minRange = $minRange > 0  ? $minRange : 0;
	$maxRange = isset($_POST['max-range']) && $_POST['max-range'] != '' ? $_POST['max-range'] : '';
	$maxRange = $maxRange < 9 ? $maxRange : 9;
	$maxRange = $maxRange > 0  ? $maxRange : 0;
	
	$chargeNumber = isset($_POST['charge-number']) && $_POST['charge-number'] != '' ? $_POST['charge-number'] : '';
	$chargeNumber = $chargeNumber < 9 ? $chargeNumber : 9;
	$chargeNumber = $chargeNumber > 0  ? $chargeNumber : 0;

	$cardText = strtoupper((isset($_POST['card-text']) && $_POST['card-text'] != '' ? $_POST['card-text'] : ''));



	$mainFont = 'src/Orbitron-Regular.ttf';
	$boldFont = 'src/Orbitron-Bold.ttf';

	if($cardType == 'cannon' || $cardType == 'torpedoes' || $cardType == 'missiles' || $cardType == 'turret' || $cardType == 'device' || $chargeNumber > 0){
		$textSize = 'small';
	}else{
		$textSize = 'large';
	}

	$im = @imagecreatefrompng('img/base.png') or die("Error base image");
	$imLimited = @imagecreatefrompng('img/limited.png') or die("Error limited image");
	$imTextBackground = @imagecreatefrompng('img/' . $textSize .'_text.png') or die("Error text image");
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

	$background_color = imagecolorallocate($im, 0, 0, 0);
	$color_white = imagecolorallocate($im, 255, 255, 255);
	$color_black = imagecolorallocate($im, 46, 46, 46);

	imagettftext($im, 12, 0, 194, 139, $color_white, $mainFont, $cardName);

	imagecopyresampled($im, $imTextBackground, 0, 0, 0, 0, CARD_W, CARD_H, CARD_W, CARD_H);

	$resizeW = CARD_ART_W;
	$resizeH = CARD_ART_H;

	/*if( imagesx($imCardArt)>=CARD_ART_W && imagesy($imCardArt)>=CARD_ART_H ){

		if( imagesx($imCardArt)/imagesy($imCardArt) > CARD_ART_W/CARD_ART_H ){
			$resizeW = (imagesx($imCardArt)-CARD_ART_W)/2;
		}else{
			$resizeH = (imagesy($imCardArt)-CARD_ART_H)/2;
		}

	}*/

	//changer les 2 premiers 0 plutot que les derniers chiffres? -> oui vu que c'est la taille les 2 derniers chiffres et pas des positions

	//imagecopyresampled ($dst_image, $src_image, $dst_x, $dst_y, $src_x , $src_y, $dst_w, $dst_h, $src_w, $src_h)
	imagecopyresampled($im, $imCardArt, 167, 1, 0, 0, CARD_ART_W, CARD_ART_H, $resizeW, $resizeH);

	if($limited){
		imagecopyresampled($im, $imLimited, 182, 129, 0, 0, 8, 8, 8, 8);
	}

	// ----------------------------------- Secondary weapons (right part)

	if($cardType == 'cannon' || $cardType == 'torpedoes' || $cardType == 'missiles' || $cardType == 'turret'){
		imagecopyresampled($im, $imSecondaryWeapondBackground, 342, 147, 0, 0, 58, 52, 58, 52);
		imagecopyresampled($im, $imSecondaryWeapondArc, 349, 153, 0, 0, 19, 19, 19, 19);

		$text_color = imagecolorallocate($im, 238, 32, 36);
		imagettftext($im, 17, 0, 374, 171, $text_color, $boldFont, $diceNumber);

		if($rangeBonus){
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

	$x_left = 186;
	$y_line = 159;
	$y_max = 285;
	$y_newLine = 14;
	$cardText_fontSize = 9;

	$i = 0;
	$cardTextArray = explode(' ', $cardText);
	$textProccessed = '';

	if($textSize == 'large'){
		$x_right = 392;
	}else{
		// less
		$x_right = 331;
	}

	while($cardTextArray != []){

		// Tests if the text is too long
		if($y_line > $y_max){
			array_push($outPutData['errors'], 'The text is too long');
			break;
		}

		// First word is larger than the line
		if($x_left + imagettfbbox($cardText_fontSize, 0, $mainFont, $textProccessed.' '.$cardTextArray[0])[2] > $x_right){
			array_push($outPutData['errors'], 'A word is larger than the line');
			break;
		}

		// Tests if text + next world will fit
		while($cardTextArray != [] && $x_left + imagettfbbox($cardText_fontSize, 0, $mainFont, $textProccessed.' '.$cardTextArray[0])[2] < $x_right){
			$textProccessed .= ' '.array_shift($cardTextArray);
		}

		// Write the largest line possibleee
		imagettftext($im, $cardText_fontSize, 0, $x_left, $y_line, $color_black, $mainFont, $textProccessed);
		$textProccessed = '';
		$y_line += $y_newLine;
	}

	// ----------------------------------- Charges

	if($chargeNumber != 0){
		imagecopyresampled($im, $imCharges, 343, 220, 0, 0, 29, 33, 29, 33);
		$text_color = imagecolorallocate($im, 229, 185, 34);
		imagettftext($im, 17, 0, 375, 245, $text_color, $boldFont, $chargeNumber);
	}

	imagecopyresampled($im, $imCardType, 30, 28, 0, 0, 102, 103, 102, 103);
	
	ob_start();
		imagejpeg($im);
		$contents = ob_get_contents();
	ob_end_clean();

	$dataUri = "data:image/png;base64," . base64_encode($contents);

	$outPutData['dataUri'] = $dataUri;

	echo json_encode($outPutData);

?>