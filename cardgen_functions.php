<?php

	function usr_error($error){
		$outPutData;
		$outPutData['errors'] = [];
		$outPutData['post'] = $_POST;
		$outPutData['log'] = [];
		array_push($outPutData['errors'], $error);
		echo json_encode($outPutData);
		die();
	}
	

	function writeTextCenter($backGroundImage, $areaLeftLimit, $areaRightLimit, $areaTopLimit, $areaBottomLimit, $fontSize, $color, $font, $text){

		$x_offsetCenter = ( $areaRightLimit - ($areaLeftLimit + imagettfbbox($fontSize, 0, $font, $text)[2] ) )/2;
		$y_offsetCenter = ( $areaBottomLimit - ($areaTopLimit + imagettfbbox($fontSize, 0, $font, $text)[5] ) )/2;

		$offsets = [$x_offsetCenter, $y_offsetCenter];

		imagettftext($backGroundImage, $fontSize, 0, $areaLeftLimit + $x_offsetCenter, $areaTopLimit + $y_offsetCenter, $color, $font, $text );

		return $offsets;

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
	
?>