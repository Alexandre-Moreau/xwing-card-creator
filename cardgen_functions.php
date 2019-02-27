<?php

	define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/');
	define('IM_DIR', ROOT_DIR.'img/');
	define('PUBIM_DIR', IM_DIR.'published/');
	define('MISC_DIR', ROOT_DIR.'src/');
	define('FONT_DIR', MISC_DIR.'fonts/');

	include_once 'symbol_conversion.php';

	function getImDir(){
		return IM_DIR;
	}

	function usr_log($log){
		global $outPutData;
		array_push($outPutData['log'], $log);
	}

	function usr_error($error){
		global $outPutData;
		$outPutData['errors'] = [];
		array_push($outPutData['errors'], $error);
		echo json_encode($outPutData);
		die();
	}

	/*
		Process text
	*/
	function processTextSymbols($textArray, $fontSize, $baseFont=null){
		$processedOutput = [];
		global $_symbolConversion;
		global $mainFont;
		global $italicFont;
		global $boldFont;
		global $symbolFont;

		$bold = false;
		$italic = false;

		$cardTextArray = explode(' ', $textArray);

		$i = 0;

		foreach($cardTextArray as $word){

			$word = $cardTextArray[$i];

			$currentWord = [];

			// ----------------------------------- Bold/Italic text processing

			if(strlen($word)>0 && substr($word, 0, 1)=='*'){
				if(strlen($word)>1 && substr($word, 0, 2)=='**'){
					$bold = !$bold;
					$word = substr($word, 2);
				}else{
					$italic = !$italic;
					$word = substr($word, 1);
				}
			}

			// ----------------------------------- 

			if($word == ''){
				
			}else{
				if(preg_match("/![^\s]{3}$/", $word)){
					$symbName = substr($word, 1);
					$currentWord = ['text' => $_symbolConversion[$symbName], 'font' => $symbolFont, 'fontSize' => $fontSize];
				}else{
					if($baseFont == null || $baseFont == $mainFont){

						if($bold){
							$currentWord = ['text' => $word, 'font' => $boldFont, 'fontSize' => $fontSize];
						}else if($italic){
							$currentWord = ['text' => $word, 'font' => $italicFont, 'fontSize' => $fontSize];
						}else{
							$currentWord = ['text' => $word, 'font' => $mainFont, 'fontSize' => $fontSize];
						}
					}else{
						$currentWord = ['text' => $word, 'font' => $baseFont, 'fontSize' => $fontSize];
					}
				}
				/*
					- no space after [ before !xxx
					- no space after !xxx before ( ] | ]: | . | , )
					- after LIMITED, half space
				*/
				if($word == '[' && $i+1<sizeof($cardTextArray) && preg_match("/![^\s]{3}$/", $cardTextArray[$i+1]) ){
					$currentWord['spaceAfter'] = 0;
				}else if(preg_match("/![^\s]{3}$/", $word) && $i+1<sizeof($cardTextArray) && in_array($cardTextArray[$i+1], [']', ']:', '.', ','])){
					$currentWord['spaceAfter'] = 0;
				}else if($word == '!LIM'){
					$currentWord['spaceAfter'] = 0.5;
				}else{
					$currentWord['spaceAfter'] = 1;
				}
				/*
					carriage return after the word
				*/
				if(false){
					$currentWord['cReturnAfter'] = true;
				}else{
					$currentWord['cReturnAfter'] = false;
				}
				array_push($processedOutput, $currentWord);
			}

			$i++;
		}

		return $processedOutput;
	}

	function writeTextBlockCenter($backGroundImage, $areaLeftLimit, $areaRightLimit, $areaTopLimit, $areaBottomLimit, $content, $color){
		
		$y_newLine = 14;
		$x_space = 6;

		$lines = [];

		// ----------------------------------- Line by line splitting

		$currentLine = [];
		$currentWidthOfLine = 0;

		foreach($content as $word){

			$widhtOfNewWord = imagettfbbox($word['fontSize'], 0, $word['font'], $word['text'] )[2] + $x_space;

			if($currentWidthOfLine+$widhtOfNewWord >= $areaRightLimit-$areaLeftLimit){
				array_push($lines, $currentLine);
				$currentLine = [];
				$currentWidthOfLine = 0;
			}

			array_push($currentLine, $word);
			$currentWidthOfLine += $widhtOfNewWord;

		}

		if($currentLine != []){
			array_push($lines, $currentLine);
		}



		// ----------------------------------- Calculating the top offset for vertical alignment

		$topOffset = ($areaBottomLimit - $areaTopLimit-sizeof($lines)*$y_newLine)/2+$y_newLine;

		// ----------------------------------- Writing text line by line

		foreach($lines as $line){
			writeLignCenter($backGroundImage, $areaLeftLimit, $areaRightLimit, $areaTopLimit + $topOffset, $areaBottomLimit, $line, $color);
			$topOffset += $y_newLine;
		}

	}
	

	function writeLignCenter($backGroundImage, $areaLeftLimit, $areaRightLimit, $areaTopLimit, $areaBottomLimit, $line, $color){

		$x_space = 6;
		
		// ----------------------------------- Left offset calculation

		$totalWidth = 0;
		foreach($line as $word){
			$totalWidth += imagettfbbox($word['fontSize'], 0, $word['font'], $word['text'] )[2] + $x_space;
		}
		$totalWidth -= $x_space;
		$x_offset = ($areaRightLimit-$areaLeftLimit-$totalWidth)/2;

		// ----------------------------------- Word by word drawing

		foreach($line as $word){
			// Draw word and return corners
			$corners = imagettftext($backGroundImage, $word['fontSize'], 0, $areaLeftLimit + $x_offset, $areaTopLimit, $color, $word['font'], $word['text'] );
			$x_offset = $corners[2] - $areaLeftLimit;
			$x_offset += $word['spaceAfter']*$x_space;
		}

	}

	function drawImageCenter($backGroundImage, $areaLeftLimit, $areaRightLimit, $areaTopLimit, $areaBottomLimit, $size_h, $size_w, $newImage){

		$x_image = imagesx($newImage);
		$y_image = imagesy($newImage);

		$x_offset = ($areaRightLimit-$areaLeftLimit-$size_w)/2;

		//$y_offsetCenter = ( $areaBottomLimit - ($areaTopLimit + imagettfbbox($fontSize, 0, $font, $text)[5] ) )/2;
		$y_offset = 0;

		$offsets = [$x_offset, $y_offset];
		
		imagecopyresampled($backGroundImage, $newImage, $areaLeftLimit+$x_offset, $areaTopLimit+$y_offset, 0, 0, $size_h, $size_w, $x_image, $y_image);

		return $offsets;
	}

	function checkMinMax($val, $min, $max){
		if(!is_numeric($val)){
			$val = 0;
		}
		$v = $val < $max ? $val : $max;
		$v = $v > $min  ? $v : $min;
		return $v;
	}

	function loadImagePng($fileName){
		try {
			$im = imagecreatefrompng(IM_DIR.$fileName);
			return $im;
		} catch (Exception $e) {
			usr_error(IM_DIR.$fileName.' : error '.$e->getCode());
		}
		
		return $im;
	}

	function loadRessource($name){
		switch (explode('.', $name)[1]) {
			case 'ttf':
				$dir = FONT_DIR;
				break;
			default:
				$dir = MISC_DIR;
				break;
		}
		if(file_exists($dir.$name)){
			return $dir.$name;
		}else{
			usr_error('Ressource "'.$dir.$name.'" not found');
		}
	}

	function getCardMaxIndex(){
		$files = glob(PUBIM_DIR.'*.{png}', GLOB_BRACE);
		$index = 0;
		foreach ($files as $file) {
			$temp = explode('/', $file);
			$cardName = array_pop($temp);
			$cardName = explode('.', $cardName)[0];
			$currentIndex = explode('_', $cardName)[2];
			if($currentIndex > $index){
				$index = $currentIndex;
			}
		}
		return $index+1;
	}

	function saveImageOnDisk($cardName, $user, $content){
		// cardName_user_index.png
		$index = getCardMaxIndex();
		$fullName = PUBIM_DIR.$cardName.'_'.$user.'_'.$index.'.png';
		file_put_contents($fullName, $content);
		return $fullName;
	}

	function getPublishedCardsPath(){
		$files = glob(PUBIM_DIR.'*.{png}', GLOB_BRACE);
		$relPath = [];
		foreach ($files as $file) {
			$temp = explode('/', $file);
			$cardName = array_pop($temp);
			array_push($relPath, $cardName);
		}
		return $relPath;
	}

	function maintainNumberOfImages(){

	}
	
?>