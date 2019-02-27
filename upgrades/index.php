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

					<label for="card-type">Card type</label>

					<div class="row" id="selectCardType">
						<div class="col s12">
							<div class="col s1" symbolText="ept"><i class="xwing-miniatures-font xwing-miniatures-font-talent" symbolText="ept"></i></div>
							<div class="col s1" symbolText="force"><i class="xwing-miniatures-font xwing-miniatures-font-forcepower" symbolText="force"></i></div>
							<div class="col s1" symbolText="astromech"><i class="xwing-miniatures-font xwing-miniatures-font-astromech" symbolText="astromech"></i></div>
							<div class="col s1" symbolText="torpedoes"><i class="xwing-miniatures-font xwing-miniatures-font-torpedo" symbolText="torpedoes"></i></div>
							<div class="col s1" symbolText="missiles"><i class="xwing-miniatures-font xwing-miniatures-font-missile" symbolText="missiles"></i></div>
							<div class="col s1" symbolText="cannon"><i class="xwing-miniatures-font xwing-miniatures-font-cannon" symbolText="cannon"></i></div>
							<div class="col s1" symbolText="turret"><i class="xwing-miniatures-font xwing-miniatures-font-turret" symbolText="turret"></i></div>
							<div class="col s1" symbolText="device"><i class="xwing-miniatures-font xwing-miniatures-font-device" symbolText="device"></i></div>
							<div class="col s1" symbolText="crew"><i class="xwing-miniatures-font xwing-miniatures-font-crew" symbolText="crew"></i></div>
							<div class="col s1" symbolText="gunner"><i class="xwing-miniatures-font xwing-miniatures-font-gunner" symbolText="gunner"></i></div>
							<div class="col s1" symbolText="system"><i class="xwing-miniatures-font xwing-miniatures-font-sensor" symbolText="system"></i></div>
							<div class="col s1" symbolText="illicit"><i class="xwing-miniatures-font xwing-miniatures-font-illicit" symbolText="illicit"></i></div></div>
						<div class="col s12">
							<div class="col s1" symbolText="title"><i class="xwing-miniatures-font xwing-miniatures-font-title" symbolText="title"></i></div>
							<div class="col s1" symbolText="modification"><i class="xwing-miniatures-font xwing-miniatures-font-modification" symbolText="modification"></i></div>
							<div class="col s1" symbolText="modification"><i class="xwing-miniatures-font xwing-miniatures-font-config" symbolText="modification"></i></div>
						</div>
					</div>

					<br/>

					<div>
						<label for="card-text">Card text</label>
						<textarea rows="4" cols="50" name="card-text"></textarea>
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
					<div>
						<div class="row">
							<div class="col s8">
								<label for="charge-number">Charges <span id="charge-number-visualizer" class="badge" title="Charges"></span></label>
								<input type="range" id="charge-number" name="charge-number" min="0" max="6" value="0"/>
							</div>
							<div class="col s4">
								<label for="charge-regenerate">Regenerate</label>
								<div class="switch">
									<label>No<input type="checkbox" name="charge-regenerate"><span class="lever"></span>Yes</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col s8">
								<label for="force-number">Force <span id="force-number-visualizer" class="badge" title="Charges"></span></label>
								<input type="range" id="force-number" name="force-number" min="0" max="6" value="0"/>
							</div>
							<div class="col s4">
								<label for="force-regenerate">Regenerate</label>
								<div class="switch">
									<label>No<input type="checkbox" name="force-regenerate"><span class="lever"></span>Yes</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col s12 l4">
					<div id="outputImageContainer" class="center">
						<div class="center">
							<img src="/img/card-example-upgrade-0.png" style="width: 100%; max-width: 418px;">
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

					<div>
						<label for="grant-attack">Grant attack</label>
						<div class="switch">
							<label>No<input type="checkbox" name="grant-attack"><span class="lever"></span>Yes</label>
						</div>
						<div id="secondary-weapon-stats">
							<div class="inputAttackColor">
								<label for="require">Require</label>						
								<div class="inputContainer">
									<label><input type="radio" name="require" value="" checked><span>nothing</span></label>
									<label><input type="radio" name="require" value="!tlk"><span>target lock</span></label>
									<label><input type="radio" name="require" value="!foc"><span>focus</span></label>
								</div>
								<label for="arc-type">Firing arc type</label>
								<div class="inputContainer">
									<label><input type="radio" name="arc-type" value="classic" checked><span><i class="xwing-miniatures-font xwing-miniatures-font-frontarc"></i></span></label>
									<label><input type="radio" name="arc-type" value="rear-classic"><span><i class="xwing-miniatures-font xwing-miniatures-font-reararc"></i></span></label>
									<label><input type="radio" name="arc-type" value="bullseye"><span><i class="xwing-miniatures-font xwing-miniatures-font-bullseyearc"></i></span></label>
									<label><input type="radio" name="arc-type" value="rear-bullseye"><span><i class="xwing-miniatures-font xwing-miniatures-font-rearbullseyearc"></i></span></label>
									<label><input type="radio" name="arc-type" value="single-rotating"><span><i class="xwing-miniatures-font xwing-miniatures-font-singleturretarc"></i></span></label>
									<label><input type="radio" name="arc-type" value="double-rotating"><span><i class="xwing-miniatures-font xwing-miniatures-font-doubleturretarc"></i></span></label>
								</div>
								<br/>
								<div class="row">
									<div class="col s12 m6">
										<label for="dice-number">Number of dices <span id="dice-number-visualizer" class="badge" title="Number of dices"></span></label>
										<input type="range" id="dice-number" name="min-range" min="1" max="9" value="3"/>
									</div>
									<div class="col s12 m6">
										<label for="range-bonus">Range bonus</label>
										<div class="switch">
											<label>No<input type="checkbox" name="range-bonus"><span class="lever"></span>Yes</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col s12 m6">
										<label for="min-range">Minimum range <span id="min-range-visualizer" class="badge" title="Minimum range"></span></label>
										<input type="range" id="min-range" name="min-range" min="0" max="5" value="1"/>
									</div>
									<div class="col s12 m6">
										<label for="max-range">Maximum range <span id="max-range-visualizer" class="badge" title="Maximum range"></span></label>
										<input type="range" id="max-range" name="max-range" min="0" max="5" value="3"/>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br/>

					<label for="grant-action">Grant action</label>
					<div class="input-field">

						<div class="inputContainer">
							<label><input type="checkbox" name="grant-action" value="red" class="filled-in"><span>red</span></label><br/>

							<div class="row">
								<div class="col s2 m3">
									<label>
										<input value="!foc" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-focus"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!cal" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-calculate"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!tlk" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-lock"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!boo" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-boost"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!eva" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-evade"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!bar" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-barrelroll"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!rei" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-reinforce"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!rel" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-reload"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!rot" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-rotatearc"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!jam" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-jam"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!clk" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-cloak"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!coo" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-coordinate"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="!sla" name="grant-action" type="radio"/>
										<span><span><i class="xwing-miniatures-font xwing-miniatures-font-slam"></i></span>
									</label>
								</div>
								<div class="col s2 m3">
									<label>
										<input value="none" name="grant-action" type="radio" checked/>
										<span><span>none</span>
									</label>
								</div>
							</div>
						</div>

					</div>

					<br/>


					<div class="row">
						<div class="col s6">
							<label for="hull-number">Hull <span id="hull-number-visualizer" class="badge" title="Charges"></span></label>
							<input type="range" name="hull-number" min="0" max="6" value="0"/>
						</div>
						<div class="col s6">
							<label for="shield-number">Shield <span id="shield-number-visualizer" class="badge" title="Shield"></span></label>
							<input type="range" name="shield-number" min="0" max="6" value="0"/>
						</div>
					</div>

					<div>
						<label for="card-text">Restriction text</label>
						<textarea rows="4" cols="50" name="restrictions-text"></textarea>
						<div id="restrictionsInput">
							<label for="restrictions-faction">Faction</label>
							<div class="inputContainer">
								<label><input type="checkbox" name="restrictions-faction" value="imperial" class="filled-in"><span><i class="xwing-miniatures-font xwing-miniatures-font-empire"></i></span></label>
								<label><input type="checkbox" name="restrictions-faction" value="rebel" class="filled-in"><span><i class="xwing-miniatures-font xwing-miniatures-font-rebel"></i></span></label></i>
								<label><input type="checkbox" name="restrictions-faction" value="scum" class="filled-in"><span><i class="xwing-miniatures-font xwing-miniatures-font-scum"></i></span></label>
								<label><input type="checkbox" name="restrictions-faction" value="first order" class="filled-in"><span><i class="xwing-miniatures-font xwing-miniatures-font-firstorder"></i></span></label>
								<label><input type="checkbox" name="restrictions-faction" value="resistance" class="filled-in"><span><i class="xwing-miniatures-font xwing-miniatures-font-rebel-outline"></i></span></label>
							</div>
							<label for="restrictions-ship-size">Ship size</label>
							<div class="inputContainer">
								<label><input type="checkbox" name="restrictions-ship-size" value="small" class="filled-in"><span>small</span></label>
								<label><input type="checkbox" name="restrictions-ship-size" value="medium" class="filled-in"><span>medium</span></label>
								<label><input type="checkbox" name="restrictions-ship-size" value="large" class="filled-in"><span>large</span></label>
								<label><input type="checkbox" name="restrictions-ship-size" value="huge" class="filled-in"><span>huge</span></label>
							</div>
							<label for="restrictions-action">Actions</label>
							<div class="inputContainer">
								<label><input type="checkbox" name="restrictions-action" value="RED" class="filled-in"><span>red</span></label><br/>

								<div class="row">
									<div class="col s2 m3">
										<label>
											<input value="foc" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-focus"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="cal" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-calculate"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="tlk" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-lock"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="boo" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-boost"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="eva" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-evade"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="bar" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-barrelroll"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="rei" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-reinforce"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="rel" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-reload"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="rot" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-rotatearc"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="jam" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-jam"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="clk" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-cloak"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="coo" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-coordinate"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="sla" name="restrictions-action" type="radio"/>
											<span><i class="xwing-miniatures-font xwing-miniatures-font-slam"></i></span>
										</label>
									</div>
									<div class="col s2 m3">
										<label>
											<input value="none" name="restrictions-action" type="radio" checked/>
											<span>none</span>
										</label>
									</div>
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
		var selectedcardType = 'ept';

		$(document).ready(function(){

			// Materialiez loaders
			$('.tooltipped').tooltip();

			//$('select').formSelect();
			reloadVisualisers();
			autoSubmit = true;
			formSubmit(false);

		});

		$('div.btn.confirmSubmit').click(function(e){
			formSubmit(true);
			$('#cardSubmitForm').hide();
		});

		$('div.btn.askSubmit').click(function(e){
			if($("#cardSubmitForm").is(":visible")){
				$('#cardSubmitForm').hide();
			}else{
				$('#cardSubmitForm').show();
			}
		});

		$('div.btn.create').click(function(e){
			formSubmit(false);
		});

		$('div.btn.reset').click(function(e){
			form.trigger('reset');
			formSubmit(false);
			reloadVisualisers();
		});

		form.change(function(e){
			if(autoSubmit){
				formSubmit(false);
			}
		});

		form.on('reset', function(){
			selectedcardType = 'ept';
		});

		// ----------------------------------- Input utofocus

		//$('img').click(function(){$('textarea[name=card-text]').focus();});


		// ----------------------------------- Write symbols on click

		$('div#selectIcons div div').click(function(e){

			$('textarea[name=card-text]').val( $('textarea[name=card-text]').val() + '!'  + $(e.target).attr('symbolText') + ' ' );
			$('form#form-main').trigger('change');

		});

		
		// ----------------------------------- Enable or disable secondary weeapons div

		$('div#selectCardType div div').click(function(e){
			selectedcardType = $(e.target).attr('symbolText');

			if(selectedcardType == 'torpedoes' || selectedcardType == 'missiles' || selectedcardType == 'cannon' || selectedcardType == 'turret'){
				$('input[type=checkbox][name=grant-attack]').prop('checked', true);
				// Erase text if ^ changed
			}else{
				$('input[type=checkbox][name=grant-attack]').prop('checked', false);
				// Erase text if ^ changed
			}

			form.trigger('change');

		});


		$('input[name=require], input[type=checkbox][name=grant-attack]').change(function(e){

			var grantAttack = $('input[type=checkbox][name=grant-attack]').prop('checked');
			var attackRequire = $('input[name=require]:checked').val();
			if(grantAttack){
				$('form#form-main textarea[name=card-text]').val('**ATTACK [ ' + attackRequire + ' ]: **');
			}else{
				$('form#form-main textarea[name=card-text]').val('');
			}



		/*	var cardType = $('select[name=card-type] option:selected').val();
			var grantAttack = $('input[type=checkbox][name=grant-attack]').prop('checked');

			//$('input[type=checkbox][name=grant-attack]').prop('checked', true);

			$('form#form-main input').prop('disabled', false);

			console.log();

			if(e.target.name == 'card-type'){
				if(cardType == 'torpedoes' || cardType == 'missiles' || cardType == 'cannon' || cardType == 'turret'){
					$('input[type=checkbox][name=grant-attack]').prop('checked', true);
					$('div#secondary-weapon-stats').show();
				}else{
					$('input[type=checkbox][name=grant-attack]').prop('checked', false);
					$('div#secondary-weapon-stats').hide();
				}
			}else if(e.target.name == 'grant-attack'){
				if(grantAttack == true){
				//	$('div#secondary-weapon-stats').show();
				}else{
				//	$('div#secondary-weapon-stats').hide();
				}
			}

			// ------------------------------- Automatically changes "grant action" input

			if(cardType == 'turret'){

				$('select[name=grant-action] option[value=rotate-arc]').prop('selected', true);
				$('select[name=grant-action]').formSelect();

			}else if(cardType == 'torpedoes' || cardType == 'missiles' || cardType == 'cannon'){

				if($('select[name=grant-action] option:selected').val() == 'rotate-arc' && $('select[name=grant-action] option:selected').val() == 'reload'){
					$('select[name=grant-action] option[value=none]').prop('selected', true);
					$('select[name=grant-action]').formSelect();
				}

			}else if(cardType == 'device'){

				$('select[name=grant-action] option[value=reload]').prop('selected', true);
				$('select[name=grant-action]').formSelect();

			}

			/*
			
			if(cardType == 'torpedoes' || cardType == 'missiles' || cardType == 'cannon' || cardType == 'turret'){

				

				if(cardType == 'torpedoes' || cardType == 'missiles'){
					$('form#form-main input[name=charge-regenerate][value=yes]').prop('disabled', true);
					$('form#form-main input[name=charge-regenerate][value=no]').prop('checked', true);
				}

				var selectedArc = $('form#form-main input[name=arc-type]:checked').val();

				if(cardType == 'turret'){
					$('form#form-main input[name=arc-type][value=classic]').prop('disabled', true);
					$('form#form-main input[name=arc-type][value=rear-classic]').prop('disabled', true);
					$('form#form-main input[name=arc-type][value=bullseye]').prop('disabled', true);
					$('form#form-main input[name=arc-type][value=rear-bullseye]').prop('disabled', true);
					if(selectedArc == 'classic' || selectedArc == 'bullseye' || selectedArc == 'rear-classic' || selectedArc == 'rear-bullseye'){
						$('form#form-main input[name=arc-type][value=single-rotating]').prop('checked', true);
					}
				}else if(cardType == 'torpedoes' || cardType == 'missiles' || cardType == 'cannon'){
					$('form#form-main input[name=arc-type][value=single-rotating]').prop('disabled', true);
					$('form#form-main input[name=arc-type][value=double-rotating]').prop('disabled', true);
					if(selectedArc == 'single-rotating' || selectedArc == 'double-rotating'){
						$('form#form-main input[name=arc-type][value=classic]').prop('checked', true);
					}
				}

			}else if(grantAttack == true){

				$('div#secondary-weapon-stats').show();
				$('form#form-main input[name=arc-type][value=classic]').prop('checked', true);

			}else{

				$('div#secondary-weapon-stats').hide();
				$('div#grant-attack').show();
				$('form#form-main input[name=card-text_size][value=large').prop('disabled', false);

			}
			*/
		});

		// ----------------------------------- Create attack text

		$('select[name=card-type], form#form-main input[name=require], form#form-main input[type=range]#charge-number').change(function(e){
			var cardType = $('select[name=card-type] option:selected').val();
			if(cardType == 'torpedoes' || cardType == 'missiles' || cardType == 'cannon' || cardType == 'turret'){
				var oldText = $('textarea[name=card-text]').html();
				var text = '';
				var require = $('form#form-main input[name=require]:checked').val();
				var charges = $('form#form-main input[type=range]#charge-number').val()

				text += 'Attack';
				if(require != 'nothing'){
					if(require == 'target-lock'){
						text += ' (!tlk)';
					}else{
						text += ' (!foc)';
					}
				}
				text += ': ';

				if(charges != '0'){
					text += 'Spend 1 !cha'
				}

				//$('textarea[name=card-text]').val(text);
			}
		});

		// ----------------------------------- Create restrictions text

		$('div#restrictionsInput div label input').change(function(){
			restrictionText = '';

			if( $('div#restrictionsInput input[name=restrictions-action]:checked').length > 0  && $('div#restrictionsInput input[name=restrictions-action][value=none]').prop('checked') != true ){

				$('div#restrictionsInput input[name=restrictions-action]:checked').each(function(i, e){
					if(e.value == 'RED'){
						restrictionText += e.value + ' ';
					}else{
						restrictionText += '!' + e.value + ' ';
					}
				});

			}else{

				$('div#restrictionsInput input[name=restrictions-faction]:checked').each(function(i, e){
					// Last element
					if(i == $('div#restrictionsInput input[name=restrictions-faction]:checked').length-1){
						// If there are restriction on ship size
						if($('div#restrictionsInput input[name=restrictions-ship-size]:checked').length > 0){
							restrictionText += e.value.toUpperCase() + ', ';
						}else{
							restrictionText += e.value.toUpperCase();
						}
					// Not last element
					}else{
						restrictionText += e.value.toUpperCase() + ' OR ';
					}
				});

				$('div#restrictionsInput input[name=restrictions-ship-size]:checked').each(function(i, e){
					if(i == $('div#restrictionsInput input[name=restrictions-ship-size]:checked').length-1){
						restrictionText += e.value.toUpperCase() + ' SHIP';
					}else{
						restrictionText += e.value.toUpperCase() + ' OR ';
					}
				});

			}

			$('form#form-main textarea[name=restrictions-text]').val(restrictionText);

		});

		// ----------------------------------- Visualisers

		$('input[type=range]#limited').change(function(e){
			var limited = $('input[type=range]#limited').val();
			if(limited > 3){
				limited = 'no';
			}
			$('span#limited-visualizer').html( limited );
		});

		$('input[type=range]#dice-number').change(function(e){
			$('span#dice-number-visualizer').html( $('input[type=range]#dice-number').val() );
		});

		$('input[type=range]#min-range').change(function(e){
			$('span#min-range-visualizer').html( $('input[type=range]#min-range').val() );
			if( $('input[type=range]#min-range').val() > $('input[type=range]#max-range').val() ){
				$('input[type=range]#max-range').val( $('input[type=range]#min-range').val() );
				$('input[type=range]#max-range').trigger('change');
			}
		});

		$('input[type=range]#max-range').change(function(e){
			$('span#max-range-visualizer').html( $('input[type=range]#max-range').val() );
			if( $('input[type=range]#min-range').val() > $('input[type=range]#max-range').val() ){
				$('input[type=range]#min-range').val( $('input[type=range]#max-range').val() );
				$('input[type=range]#min-range').trigger('change');
			}
		});

		$('input[type=range]#charge-number').change(function(e){
			$('span#charge-number-visualizer').html( $('input[type=range]#charge-number').val() );
		});

		$('input[type=range]#force-number').change(function(e){
			$('span#force-number-visualizer').html( $('input[type=range]#force-number').val() );
		});

		$('input[type=range][name=hull-number]').change(function(e){
			$('span#hull-number-visualizer').html( $('input[type=range][name=hull-number]').val() );
		});

		$('input[type=range][name=shield-number]').change(function(e){
			$('span#shield-number-visualizer').html( $('input[type=range][name=shield-number]').val() );
		});

		function reloadVisualisers(){
			$('span#limited-visualizer').html('no');
			$('span#dice-number-visualizer').html( $('input[type=range]#dice-number').val() );
			$('span#min-range-visualizer').html( $('input[type=range]#min-range').val() );
			if( $('input[type=range]#min-range').val() > $('input[type=range]#max-range').val() ){
				$('input[type=range]#max-range').val( $('input[type=range]#min-range').val() );
				$('input[type=range]#max-range').trigger('change');
			}
			$('span#max-range-visualizer').html( $('input[type=range]#max-range').val() );
			if( $('input[type=range]#min-range').val() > $('input[type=range]#max-range').val() ){
				$('input[type=range]#min-range').val( $('input[type=range]#max-range').val() );
				$('input[type=range]#min-range').trigger('change');
			}
			$('span#charge-number-visualizer').html( $('input[type=range]#charge-number').val() );
			$('span#force-number-visualizer').html( $('input[type=range]#force-number').val() );
			$('span#hull-number-visualizer').html( $('input[type=range][name=hull-number]').val() );
			$('span#shield-number-visualizer').html( $('input[type=range][name=shield-number]').val() );
		}

		// ----------------------------------- Form submit

		function formSubmit(publish){

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

			formData.append('publish', publish);
			formData.append('userName', $('form#form-main input[name=user-name]').val())

			formData.append('card-name', cardName);

			formData.append('image', $('form#form-main input[type=file]')[0].files[0]);

			formData.append('card-type', selectedcardType);

			formData.append('grant-attack', $('form#form-main input[type=checkbox][name=grant-attack]').prop('checked'));

			formData.append('grant-action', $('form#form-main input[type=radio][name=grant-action]:checked').val());

			formData.append('grant-action-red', $('form#form-main input[type=checkbox][name=grant-action]').prop('checked'));

			formData.append('arc-type', $('form#form-main input[name=arc-type]:checked').val());
			formData.append('dice-number', $('form#form-main input#dice-number').val());
			formData.append('range-bonus', $('form#form-main input[type=checkbox][name=range-bonus]').prop('checked'));
			formData.append('min-range', $('form#form-main input#min-range').val());
			formData.append('max-range', $('form#form-main input#max-range').val());

			formData.append('charge-number', $('form#form-main input[type=range]#charge-number').val());
			formData.append('charge-regenerate', $('input[type=checkbox][name=charge-regenerate]').prop('checked'));
			formData.append('force-number', $('form#form-main input[type=range]#force-number').val());
			formData.append('force-regenerate', $('input[type=checkbox][name=force-regenerate]').prop('checked'));
			formData.append('hull-number', $('form#form-main input[type=range][name=hull-number]').val());
			formData.append('shield-number', $('form#form-main input[type=range][name=shield-number]').val());

			formData.append('card-text', $('form#form-main textarea[name=card-text]').val());

			formData.append('restrictions-text', $('form#form-main textarea[name=restrictions-text]').val());

			$.ajax({
				url: '/cardgen_upgrades.php',
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
						data = data.slice(data.indexOf("{"), data.length);
					}

					try {
						jData = JSON.parse(data);					

						cardgenOutput = data;

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

						if(publish){
							var imFullPath =  jData.imFullPath;
							console.log('Card saved to ' + imFullPath);
							M.toast({html: 'Card published !'})
						}

						console.log('success');
					}catch(err) {
						console.log(data);
					}
				},
				cache: false,
				contentType: false,
				processData: false
			});	
		}
		</script>
</html>