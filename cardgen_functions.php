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
	

	function writeTextCenter($image, $areaLeftLimit, $areaRightLimit, $areaTopLimit, $areaBottomLimit, $fontSize, $color, $font, $text){

		$x_offsetCenter = ( $areaRightLimit - ($areaLeftLimit + imagettfbbox($fontSize, 0, $font, $text)[2] ) )/2;
		$y_offsetCenter = ( $areaBottomLimit - ($areaTopLimit + imagettfbbox($fontSize, 0, $font, $text)[5] ) )/2;

		$offsets = [$x_offsetCenter, $y_offsetCenter];

		imagettftext($image, $fontSize, 0, $areaLeftLimit + $x_offsetCenter, $areaTopLimit + $y_offsetCenter, $color, $font, $text );

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