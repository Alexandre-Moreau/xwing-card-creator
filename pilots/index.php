<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once '../header.php';
			create_header('Card creator');
		?>
	</head>
	<body>
		<?php
			include_once '../nav.php';
		?>

		<form id="form-main">
			<div class="row">

				<div class="col s12 l4">

					<div>
						<div class="row">
							<div class="col s6">
								<label for="card-name">Card name</label>
								<input type="text" name="card-name">
							</div>
							<div class="col s6">
								<label for="limited">Limited <span id="limited-visualizer" class="badge" title="Limited"></span></label>
								<input type="range" id="limited" name="limited" min="1" max="4" value="4"/>
							</div>
						</div>
						
						<label for="pilot-title">Title</label>
						<input type="text" name="pilot-title">
					</div>
					<br/>

					<label for="faction">Faction</label>
					<div class="col s12" id="factionSelect">
						<div class="col s2" symbolText="empire" title="Empire"><i class="xwing-miniatures-font xwing-miniatures-font-empire" symbolText="empire"></i></div>
						<div class="col s2" symbolText="rebel" title="Rebel alliance"><i class="xwing-miniatures-font xwing-miniatures-font-rebel" symbolText="rebel"></i></div>
						<div class="col s2" symbolText="scum" title="Scum"><i class="xwing-miniatures-font xwing-miniatures-font-scum" symbolText="scum"></i></div>
						<div class="col s2" symbolText="firstorder" title="First order"><i class="xwing-miniatures-font xwing-miniatures-font-firstorder" symbolText="firstorder"></i></div>
						<div class="col s2" symbolText="resistance" title="Resistance"><i class="xwing-miniatures-font xwing-miniatures-font-rebel-outline" symbolText="resistance"></i></div>
					</div>
					<br/>

					<label for="card-image">Card image</label>
					<div class="file-field input-field">
						<div class="btn">
							<span>Browse</span>
							<input type="file" />
						</div>

						<div class="file-path-wrapper">
							<input name="card-image" class="file-path validate" type="text" placeholder="Upload file"/>
						</div>
					</div>
					<br/>

					<label for="initiative">Initiative <span id="initiative-visualizer" class="badge" title="Initiative"></span></label>
					<input type="range" name="initiative" min="1" max="6" value="1"/>

					<div>
						<div class="col s12">
							<label for="ability-select">Ability</label>
							<ul id="ability-select" class="tabs">
								<li class="tab col s3"><a class="active" href="#pilot-ability-div">Pilot</a></li>
								<li class="tab col s3"><a href="#ship-ability-div">Ship</a></li>
							</ul>
						</div>
						<div id="pilot-ability-div" class="col s12">
							<label for="pilot-ability">Pilot ability</label>
							<textarea rows="5" cols="50" name="pilot-ability"></textarea>
						</div>
						<div id="ship-ability-div" class="col s12">
							<label for="ship-ability">Ship ability</label>
							<textarea rows="5" cols="50" name="ship-ability"></textarea>
						</div>

						<p>** bold text **, * italic text *</p>
						<div class="row" id="selectIcons">
							<div class="col s12">
								<div class="col s1" symbolText="cha"><i class="xwing-miniatures-font xwing-miniatures-font-charge" symbolText="cha"></i></div>
								<div class="col s1" symbolText="for"><i class="xwing-miniatures-font xwing-miniatures-font-forcecharge" symbolText="for"></i></div>
								<div class="col s1" symbolText="hit"><i class="xwing-miniatures-font xwing-miniatures-font-hit" symbolText="hit"></i></div>
								<div class="col s1" symbolText="crh"><i class="xwing-miniatures-font xwing-miniatures-font-crit" symbolText="crh"></i></div>
							</div>
							<div class="col s12">
								<div class="col s1" symbolText="foc"><i class="xwing-miniatures-font xwing-miniatures-font-focus" symbolText="foc"></i></div>							
								<div class="col s1" symbolText="cal"><i class="xwing-miniatures-font xwing-miniatures-font-calculate" symbolText="cal"></i></div>
								<div class="col s1" symbolText="tlk"><i class="xwing-miniatures-font xwing-miniatures-font-lock" symbolText="tlk"></i></div>
								<div class="col s1" symbolText="boo"><i class="xwing-miniatures-font xwing-miniatures-font-boost" symbolText="boo"></i></div>
								<div class="col s1" symbolText="bar"><i class="xwing-miniatures-font xwing-miniatures-font-barrelroll" symbolText="bar"></i></div>
								<div class="col s1" symbolText="eva"><i class="xwing-miniatures-font xwing-miniatures-font-evade" symbolText="eva"></i></div>
								<div class="col s1" symbolText="rei"><i class="xwing-miniatures-font xwing-miniatures-font-reinforce" symbolText="rei"></i></div>
								<div class="col s1" symbolText="rel"><i class="xwing-miniatures-font xwing-miniatures-font-reload" symbolText="rel"></i></div>
								<div class="col s1" symbolText="rot"><i class="xwing-miniatures-font xwing-miniatures-font-rotatearc" symbolText="rot"></i></div>
								<div class="col s1" symbolText="jam"><i class="xwing-miniatures-font xwing-miniatures-font-jam" symbolText="jam"></i></div>
								<div class="col s1" symbolText="clk"><i class="xwing-miniatures-font xwing-miniatures-font-cloak" symbolText="clk"></i></div>
								<div class="col s1" symbolText="coo"><i class="xwing-miniatures-font xwing-miniatures-font-coordinate" symbolText="coo"></i></div>
								<div class="col s1" symbolText="sla"><i class="xwing-miniatures-font xwing-miniatures-font-slam" symbolText="sla"></i></div>
							</div>
							<div class="col s12">
								<div class="col s1" symbolText="m01"><i class="xwing-miniatures-font xwing-miniatures-font-straight" symbolText="m01"></i></div>
								<div class="col s1" symbolText="m02"><i class="xwing-miniatures-font xwing-miniatures-font-bankleft" symbolText="m02"></i></div>
								<div class="col s1" symbolText="m03"><i class="xwing-miniatures-font xwing-miniatures-font-bankright" symbolText="m03"></i></div>
								<div class="col s1" symbolText="m04"><i class="xwing-miniatures-font xwing-miniatures-font-turnleft" symbolText="m04"></i></div>
								<div class="col s1" symbolText="m05"><i class="xwing-miniatures-font xwing-miniatures-font-turnright" symbolText="m05"></i></div>
								<div class="col s1" symbolText="m06"><i class="xwing-miniatures-font xwing-miniatures-font-kturn" symbolText="m06"></i></div>
								<div class="col s1" symbolText="m07"><i class="xwing-miniatures-font xwing-miniatures-font-stop" symbolText="m07"></i></div>
								<div class="col s1" symbolText="m08"><i class="xwing-miniatures-font xwing-miniatures-font-sloopleft" symbolText="m08"></i></div>
								<div class="col s1" symbolText="m09"><i class="xwing-miniatures-font xwing-miniatures-font-sloopright" symbolText="m09"></i></div>
								<div class="col s1" symbolText="m10"><i class="xwing-miniatures-font xwing-miniatures-font-dalan-bankleft" symbolText="m10"></i></div>
								<div class="col s1" symbolText="m11"><i class="xwing-miniatures-font xwing-miniatures-font-dalan-bankright" symbolText="m11"></i></div>
							</div>
							<div class="col s12">
								<div class="col s1" symbolText="m12"><i class="xwing-miniatures-font xwing-miniatures-font-trollleft" symbolText="m12"></i></div>
								<div class="col s1" symbolText="m13"><i class="xwing-miniatures-font xwing-miniatures-font-trollright" symbolText="m13"></i></div>
								<div class="col s1" symbolText="m14"><i class="xwing-miniatures-font xwing-miniatures-font-ig88d-sloopleft" symbolText="m14"></i></div>
								<div class="col s1" symbolText="m15"><i class="xwing-miniatures-font xwing-miniatures-font-ig88d-sloopright" symbolText="m15"></i></div>
								<div class="col s1" symbolText="m16"><i class="xwing-miniatures-font xwing-miniatures-font-reversestraight" symbolText="m16"></i></div>
								<div class="col s1" symbolText="m17"><i class="xwing-miniatures-font xwing-miniatures-font-reversebankleft" symbolText="m17"></i></div>
								<div class="col s1" symbolText="m18"><i class="xwing-miniatures-font xwing-miniatures-font-reversebankright" symbolText="m18"></i></div>
							</div>
							<div class="col s12">
								<div class="col s1" symbolText="ept"><i class="xwing-miniatures-font xwing-miniatures-font-talent" symbolText="ept"></i></div>
								<div class="col s1" symbolText="for"><i class="xwing-miniatures-font xwing-miniatures-font-forcepower" symbolText="for"></i></div>
								<div class="col s1" symbolText="ast"><i class="xwing-miniatures-font xwing-miniatures-font-astromech" symbolText="ast"></i></div>
								<div class="col s1" symbolText="tor"><i class="xwing-miniatures-font xwing-miniatures-font-torpedo" symbolText="tor"></i></div>
								<div class="col s1" symbolText="mis"><i class="xwing-miniatures-font xwing-miniatures-font-missile" symbolText="mis"></i></div>
								<div class="col s1" symbolText="can"><i class="xwing-miniatures-font xwing-miniatures-font-cannon" symbolText="can"></i></div>
								<div class="col s1" symbolText="tur"><i class="xwing-miniatures-font xwing-miniatures-font-turret" symbolText="tur"></i></div>
								<div class="col s1" symbolText="dev"><i class="xwing-miniatures-font xwing-miniatures-font-device" symbolText="dev"></i></div>
								<div class="col s1" symbolText="cre"><i class="xwing-miniatures-font xwing-miniatures-font-crew" symbolText="cre"></i></div>
								<div class="col s1" symbolText="gun"><i class="xwing-miniatures-font xwing-miniatures-font-gunner" symbolText="gun"></i></div>
								<div class="col s1" symbolText="sen"><i class="xwing-miniatures-font xwing-miniatures-font-sensor" symbolText="sen"></i></div>
								<div class="col s1" symbolText="ill"><i class="xwing-miniatures-font xwing-miniatures-font-illicit" symbolText="ill"></i></div>
								<div class="col s1" symbolText="tit"><i class="xwing-miniatures-font xwing-miniatures-font-title" symbolText="tit"></i></div>
								<div class="col s1" symbolText="mod"><i class="xwing-miniatures-font xwing-miniatures-font-modification" symbolText="mod"></i></div>
								<div class="col s1" symbolText="con"><i class="xwing-miniatures-font xwing-miniatures-font-config" symbolText="con"></i></div>
							</div>
							<div class="col s12">
								<div class="col s1" symbolText="a01"><i class="xwing-miniatures-font xwing-miniatures-font-frontarc" symbolText="a01"></i></div>
								<div class="col s1" symbolText="a02"><i class="xwing-miniatures-font xwing-miniatures-font-reararc" symbolText="a02"></i></div>
								<div class="col s1" symbolText="a03"><i class="xwing-miniatures-font xwing-miniatures-font-fullfrontarc" symbolText="a03"></i></div>
								<div class="col s1" symbolText="a04"><i class="xwing-miniatures-font xwing-miniatures-font-fullreararc" symbolText="a04"></i></div>
								<div class="col s1" symbolText="a05"><i class="xwing-miniatures-font xwing-miniatures-font-bullseyearc" symbolText="a05"></i></div>
								<div class="col s1" symbolText="a06"><i class="xwing-miniatures-font xwing-miniatures-font-singleturretarc" symbolText="a06"></i></div>
								<div class="col s1" symbolText="a07"><i class="xwing-miniatures-font xwing-miniatures-font-doubleturretarc" symbolText="a07"></i></div>
								<div class="col s1" symbolText="a08"><i class="xwing-miniatures-font xwing-miniatures-font-leftarc" symbolText="a08"></i></div>
								<div class="col s1" symbolText="a09"><i class="xwing-miniatures-font xwing-miniatures-font-rightarc" symbolText="a09"></i></div>
								<div class="col s1" symbolText="a10"><i class="xwing-miniatures-font xwing-miniatures-font-rearbullseyearc" symbolText="a10"></i></div>
							</div>
						</div>
					</div>

					<br/>	

					<label for="faction">Ship</label>
					<div class="row col s12">
						<div class="row col s12">
							<ul class="tabs">
								<li class="tab col s2"><a href="#shipsEmpire"><i class="xwing-miniatures-font xwing-miniatures-font-empire"></i></a></li>
								<li class="tab col s2"><a href="#shipsRebel"><i class="xwing-miniatures-font xwing-miniatures-font-rebel"></i></a></li>
								<li class="tab col s2"><a href="#shipsScum"><i class="xwing-miniatures-font xwing-miniatures-font-scum"></i></a></li>
								<li class="tab col s2"><a href="#shipsFirstorder"><i class="xwing-miniatures-font xwing-miniatures-font-firstorder"></i></a></li>
								<li class="tab col s2"><a href="#shipsResistance"><i class="xwing-miniatures-font xwing-miniatures-font-rebel-outline"></i></a></li>
								<li class="tab col s2"><a href="#shipsCustom"><i class="material-icons dp48">edit</i></a></li>
							</ul>
						</div>

						
						<div id="shipSelect">
							<div id="shipsEmpire" class="row col s12">
								<div class="col s1 selectableClick" symbolText="tiefighter"><i class="xwing-miniatures-ship xwing-miniatures-ship-tiefighter" symbolText="tiefighter"></i></div>
								<div class="col s1 selectableClick" symbolText="tieinterceptor"><i class="xwing-miniatures-ship xwing-miniatures-ship-tieinterceptor" symbolText="tieinterceptor"></i></div>
								<div class="col s1 selectableClick" symbolText="tieadvanced"><i class="xwing-miniatures-ship xwing-miniatures-ship-tieadvanced" symbolText="tieadvanced"></i></div>
							</div>
							<div id="shipsRebel" class="row col s12">
								<div class="col s1 selectableClick" symbolText="xwing"><i class="xwing-miniatures-ship xwing-miniatures-ship-xwing" symbolText="xwing"></i></div>
								<div class="col s1 selectableClick" symbolText="ywing"><i class="xwing-miniatures-ship xwing-miniatures-ship-ywing" symbolText="ywing"></i></div>
							</div>
							<div id="shipsScum" class="row col s12">
								<div class="col s1 selectableClick" symbolText="firespray31"><i class="xwing-miniatures-ship xwing-miniatures-ship-firespray31" symbolText="firespray31"></i></div>
								<div class="col s1 selectableClick" symbolText="protectoratestarfighter"><i class="xwing-miniatures-ship xwing-miniatures-ship-protectoratestarfighter" symbolText="protectoratestarfighter"></i></div>
							</div>
							<div id="shipsFirstorder" class="row col s12">
								<div class="col s1 selectableClick" symbolText="tiefofighter"><i class="xwing-miniatures-ship xwing-miniatures-ship-tiefofighter" symbolText="tiefofighter"></i></div>
							</div>
							<div id="shipsResistance" class="row col s12">
								<div class="col s1 selectableClick" symbolText="t70xwing"><i class="xwing-miniatures-ship xwing-miniatures-ship-t70xwing" symbolText="t70xwing"></i></div>
							</div>
							<div id="shipsCustom" class="row col s12">
								<div class="col s12">
									<label for="ship-name-custom">Ship name</label>
									<input type="text" name="ship-name-custom">
								</div>
								<label for="ship-image-custom">Ship logo</label>
								<div class="col s12 file-field input-field">
									<div class="btn">
										<span>Browse</span>
										<input type="file" />
									</div>

									<div class="file-path-wrapper">
										<input name="ship-image-custom" class="file-path validate" type="text" placeholder="Upload file"/>
									</div>
								</div>
							</div>
						</div>
						
					</div>


				</div>

				<div class="col s12 l4">
					<div id="outputImageContainer">
						<div class="center">
							<img src="/img/card-example-pilot-0.png" style="width: 100%; max-width: 298px;">
							<br/>
						</div>
						<div class="center">
							<div class="btn tooltipped" data-position="bottom" data-delay="35" data-tooltip="Download">
								<a download="" href="" style="color: #ffffff;"><i class="material-icons">file_download</i></a>
							</div>

							<div class="btn reset tooltipped" data-position="bottom" data-delay="35" data-tooltip="Clear">
								<i class="material-icons">clear</i>
							</div>

							<div class="btn askSubmit tooltipped" data-position="bottom" data-delay="35" data-tooltip="Publish">
								<i class="material-icons">publish</i>
							</div>
						</div>
						<div id="cardSubmitForm" class="col s8 offset-s2" style="display: none;">
							<p>Enter your name to publish your card to the gallery</p>
							<label for="user-name">User name</label>
							<input type="text" name="user-name">
							<div class="btn confirmSubmit tooltipped" data-position="bottom" data-delay="35" data-tooltip="Confirm">
								<i class="material-icons">check</i>
							</div>
						</div>
					</div>
				</div>

				<div class="col s12 l4">
					<label>Actions</label>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect01">
							<select>
								<option value="!foc" selected>f</option>
								<option value="!cal">a</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect01">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect02">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect02">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect03">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect03">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect04">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect04">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect05">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>
						</div>
						<div class="input-field col s5" id="red-actionSelect05">
							<select>
								<option value="none" selected></option>
								<option value="!foc">f</option>
								<option value="!cal">a</option>
								<option value="!tlk">l</option>
								<option value="!boo">b</option>
								<option value="!bar">r</option>
								<option value="!eva">e</option>
								<option value="!rei">i</option>
								<option value="!rel">=</option>
								<option value="!rot">R</option>
								<option value="!jam">j</option>
								<option value="!clk">k</option>
								<option value="!coo">o</option>
								<option value="!sla">s</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<label for="attack">Primary attack <i class="xwing-miniatures-font xwing-miniatures-font-frontarc"></i><span id="attack-front-visualizer" class="badge" title="Primary front attack"></span></label>
							<input type="range" name="attack-front" id="attack-front" min="0" max="5" value="3"/>
						</div>
						<div class="col s6">
							<label for="attack">Primary attack <i class="xwing-miniatures-font xwing-miniatures-font-reararc"></i><span id="attack-rear-visualizer" class="badge" title="Primary rear attack"></span></label>
							<input type="range" name="attack-rear" id="attack-rear" min="0" max="5" value="0"/>
						</div>
						<div class="col s6">
							<label for="attack">Primary attack <i class="xwing-miniatures-font xwing-miniatures-font-singleturretarc"></i><span id="attack-singleMobile-visualizer" class="badge" title="Primary single turret attack"></span></label>
							<input type="range" name="attack-singleMobile" id="attack-singleMobile" min="0" max="5" value="0"/>
						</div>
						<div class="col s6">
							<label for="attack">Primary attack <i class="xwing-miniatures-font xwing-miniatures-font-doubleturretarc"></i><span id="attack-doubleMobile-visualizer" class="badge" title="Primary double turret attack"></span></label>
							<input type="range" name="attack-doubleMobile" id="attack-doubleMobile" min="0" max="5" value="0"/>
						</div>
						<div class="col s6">
							<label for="agility">Agility<span id="agility-visualizer" class="badge" title="Agility"></span></label>
							<input type="range" name="agility" id="agility" min="0" max="5" value="2"/>
						</div>
						<div class="col s6">
							<label for="hull">Hull<span id="hull-visualizer" class="badge" title="Hull"></span></label>
							<input type="range" name="hull" id="hull" min="1" max="15" value="4"/>
						</div>
						<div class="col s6">
							<label for="shield">Shield<span id="shield-visualizer" class="badge" title="Shield"></span></label>
							<input type="range" name="shield" id="shield" min="0" max="10" value="0"/>
						</div>
						<div class="col s6">
							<label for="force">Force<span id="force-visualizer" class="badge" title="Force"></span></label>
							<input type="range" id="force" name="force" min="0" max="6" value="0"/>
						</div>
						<div class="row col s12">
							<div class="col s8">
								<label for="charges">Charges<span id="charges-visualizer" class="badge" title="Charges"></span></label>
								<input type="range" id="charges" name="charges" min="0" max="6" value="0"/>
							</div>
							<div class="col s4">
								<label for="force-regenerate">Regenerate</label>
								<div class="switch">
									<label>No<input type="checkbox" name="charges-regenerate"><span class="lever"></span>Yes</label>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>

		<?php
			include_once '../footer.php';
		?>

	</body>
	<script>
		var form = $("form#form-main");
		var cardgenOutput;
		var logOutput = false;
		var autoSubmit = false;
		var faction = 'empire';
		var ship = 'tiefighter';
		var stats;

		// TODO reparer les selects

		$(document).ready(function(){
			reloadSelect();

			$('.tabs').tabs();
			//$('div[id^=actionSelect], div[id^=red-actionSelect]').formSelect();
			setShip('tiefighter');
			reloadVisualisers();
			autoSubmit = true;
			form.submit();

		});		

		$('div.btn.create').click(function(e){
			form.submit();
		});

		$('div.btn.reset').click(function(e){
			form.trigger('reset');
			form.submit();
			reloadVisualisers();
		});

		form.change(function(e){
			if(autoSubmit){
				form.submit();
			}
		});

		form.on('reset', function(){
			faction = 'empire';
		});



		// ----------------------------------- Action select initialisation
		
		// -> ici zone A

		// ----------------------------------- Faction select

		$('div#factionSelect div').click(function(e){
			faction = $(e.target).attr('symbolText');
			M.Tabs.getInstance($('.tabs')).select('ships' + faction.charAt(0).toUpperCase()+faction.slice(1) );
			form.trigger('change');
		});

		// ----------------------------------- Ship select

		$('div#shipSelect div div').click(function(e){
			ship = $(e.target).attr('symbolText');
			setShip(ship);
		});

		function setShip(){
			$.get('/cardgen_shipStats.php?ship='+ship, function( data ) {
				stats = JSON.parse(data);

				$('input[type=range][name=attack-front]').val(stats.attack_front);
				$('input[type=range][name=attack-rear]').val(stats.attack_rear);
				$('input[type=range][name=attack-singleMobile]').val(stats.attack_singleMobile);
				$('input[type=range][name=attack-doubleMobile]').val(stats.attack_doubleMobile);
				$('input[type=range][name=agility]').val(stats.agility);
				$('input[type=range][name=hull]').val(stats.hull);
				$('input[type=range][name=shield]').val(stats.shield);
				$('textarea[name=ship-ability]').val(stats.shipAbility);

				for (var i = 0; i < 5; i++) {
					actionRow = stats.actions[i];
					$('#actionSelect0'+(i+1)+' option').attr('selected', false);
					$('#red-actionSelect0'+(i+1)+' option').attr('selected', false);
					if(actionRow[0]!=''){
						$('#actionSelect0'+(i+1)+' option[value="!'+actionRow[0]+'"]').attr('selected', true);
					}else{
						$('#actionSelect0'+(i+1)+' option[value=none]').attr('selected', true);
					}
					if(actionRow[1]!=''){
						$('#red-actionSelect0'+(i+1)+' option[value="!'+actionRow[1]+'"]').attr('selected', true);
					}else{
						$('#red-actionSelect0'+(i+1)+' option[value=none]').attr('selected', true);
					}
				}

				reloadSelect();
				reloadVisualisers();
				form.trigger('change');
			});
		}

		// ----------------------------------- Visualizers

		$('input[type=range]#limited').change(function(e){
			var limited = $('input[type=range]#limited').val();
			if(limited > 3){
				limited = 'no';
			}
			$('span#limited-visualizer').html( limited );
		});

		$('input[type=range][name=initiative]').change(function(e){
			$('span#initiative-visualizer').html( $('input[type=range][name=initiative]').val() );
		});
		$('input[type=range][name=attack-front]').change(function(e){
			$('span#attack-front-visualizer').html( $('input[type=range][name=attack-front]').val() );
		});
		$('input[type=range][name=attack-rear]').change(function(e){
			$('span#attack-rear-visualizer').html( $('input[type=range][name=attack-rear]').val() );
		});
		$('input[type=range][name=attack-singleMobile]').change(function(e){
			$('span#attack-singleMobile-visualizer').html( $('input[type=range][name=attack-singleMobile]').val() );
		});
		$('input[type=range][name=attack-doubleMobile]').change(function(e){
			$('span#attack-doubleMobile-visualizer').html( $('input[type=range][name=attack-doubleMobile]').val() );
		});
		$('input[type=range][name=agility]').change(function(e){
			$('span#agility-visualizer').html( $('input[type=range][name=agility]').val() );
		});
		$('input[type=range][name=hull]').change(function(e){
			$('span#hull-visualizer').html( $('input[type=range][name=hull]').val() );
		});
		$('input[type=range][name=shield]').change(function(e){
			$('span#shield-visualizer').html( $('input[type=range][name=shield]').val() );
		});
		$('input[type=range][name=force]').change(function(e){
			$('span#force-visualizer').html( $('input[type=range][name=force]').val() );
		});
		$('input[type=range][name=charges]').change(function(e){
			$('span#charges-visualizer').html( $('input[type=range][name=charges]').val() );
		});

		function reloadSelect(){
			$('select').formSelect();
			$('div[id^=actionSelect] li span, div[id^=actionSelect] input, div[id^=red-actionSelect] li span, div[id^=red-actionSelect] input').addClass('xwingFont');
			$('div[id^=actionSelect] li span, div[id^=actionSelect] input, div[id^=red-actionSelect] li span, div[id^=red-actionSelect] input').css('text-align', 'center');
			$('div[id^=red-actionSelect] input').css('color', 'red');
		}

		function reloadVisualisers(){
			$('span#limited-visualizer').html('no');
			autoSubmit = false;
			$('input[type=range][name=initiative]').trigger('change');
			$('input[type=range][name=attack-front]').trigger('change');
			$('input[type=range][name=attack-rear]').trigger('change');
			$('input[type=range][name=attack-singleMobile]').trigger('change');
			$('input[type=range][name=attack-doubleMobile]').trigger('change');
			$('input[type=range][name=agility]').trigger('change');
			$('input[type=range][name=hull]').trigger('change');
			$('input[type=range][name=shield]').trigger('change');
			$('input[type=range][name=force]').trigger('change');
			$('input[type=range][name=charges]').trigger('change');
			autoSubmit = true;
		}

		// ----------------------------------- Form submit

		form.submit(function(e){
			e.preventDefault();

			var formData = new FormData();

			var cardName = '';
			var i = 0;

			if( $('form#form-main input#limited').val() < $('form#form-main input#limited').attr("max") ){
				while (i < $('form#form-main input#limited').val()) {
					cardName += '!lim ';
					i++;
				}
			}

			cardName += $('form#form-main input[name=card-name]').val();

			formData.append('card-name', cardName);
			formData.append('pilot-title', $('form#form-main input[name=pilot-title]').val());
			formData.append('limited', $('input[type=checkbox][name=limited]').prop('checked'));

			formData.append('pilot-ability', $('form#form-main textarea[name=pilot-ability]').val());
			formData.append('ship-ability', $('form#form-main textarea[name=ship-ability]').val());

			formData.append('image', $('form#form-main input[type=file]')[0].files[0]);

			formData.append('faction', faction);
			formData.append('ship', ship);

			formData.append('initiative', $('input[type=range][name=initiative]').val());
			formData.append('attack-front', $('input[type=range][name=attack-front]').val());
			formData.append('attack-rear', $('input[type=range][name=attack-rear]').val());
			formData.append('attack-singleMobile', $('input[type=range][name=attack-singleMobile]').val());
			formData.append('attack-doubleMobile', $('input[type=range][name=attack-doubleMobile]').val());

			formData.append('agility', $('input[type=range][name=agility]').val());
			formData.append('hull', $('input[type=range][name=hull]').val());
			formData.append('shield', $('input[type=range][name=shield]').val());
			formData.append('force', $('input[type=range][name=force]').val());
			formData.append('charges', $('input[type=range][name=charges]').val());

			var actions = '';
			var actionsRed = '';

			for (var i = 1; i <= 5; i++) { 
				actions += $('div#actionSelect0'+i+' select option:selected').val();
				actionsRed += $('div#red-actionSelect0'+i+' select option:selected').val();
				if(i<5){
					actions += ',';
					actionsRed += ',';
				}
			}

			formData.append('actions', actions);
			formData.append('actions-red', actionsRed);

			$.ajax({
				url: '/cardgen_pilots.php',
				type: 'POST',
				data: formData,
				success: function (data) {

					if(logOutput){
						console.log(data);
					}

					output = data;

					try {
						jData = JSON.parse(data);
					}catch(err) {
						//console.log('Trying to fix ');
						console.log(data.slice(0, data.indexOf("{")));
						data = data.slice(data.indexOf("{"), data.length);
					}

					try {
						jData = JSON.parse(data);

						cardgenOutput = jData;

						jQuery.each(jData.log, function(i, val) {
							console.log(i + ' : ' + val);
						});

						jQuery.each(jData.errors, function(i, val) {
							console.log('Error ' + i + ' : ' + val);
						});

						var dataUri = jData.dataUri;

						$("div#outputImageContainer img").attr('src', dataUri);
						$("div#outputImageContainer a").attr('href', dataUri);
						$("div#outputImageContainer a").attr('download', $('form#form-main input[name=card-name]').val().replace(/ /g,"_"));

						if(false){
							var imFullPath =  jData.imFullPath;
							console.log('Card saved to ' + imFullPath);
							M.toast({html: 'Card published !'})
						}

						console.log('success');
					}catch(err) {
						//console.log(err);
						console.log(data);
					}
				},
				cache: false,
				contentType: false,
				processData: false
			});	
		});
		function logOutput(){
			logOutput = true;
		}
	</script>
</html>