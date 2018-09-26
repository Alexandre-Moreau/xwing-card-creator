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
								<label for="limited">Limited</label>
								<div class="switch">
									<label>No<input type="checkbox" name="limited"><span class="lever"></span>Yes</label>
								</div>
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
							<div class="btn download" title="Download">
								<a download="" href="" style="color: #ffffff;"><i class="material-icons">file_download</i></a>
							</div>

							<div class="btn reset" title="Clear">
								<i class="material-icons">clear</i>
							</div>

							<div class="btn publish" title="Publish">
								<i class="material-icons">publish</i>
							</div>
						</div>
					</div>
				</div>

				<div class="col s12 l4">
					<label>Actions</label>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect01">
							<select>
								<option value="foc" selected>f</option>
								<option value="cal">a</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect01">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect02">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect02">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect03">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect03">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect04">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>						
						</div>
						<div class="input-field col s5" id="red-actionSelect04">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
					</div>
					<div class="col s12 actionSelectRow">
						<div class="input-field col s5" id="actionSelect05">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
							</select>
						</div>
						<div class="col s2">
							<span><i class="material-icons">chevron_right</i></span>
						</div>
						<div class="input-field col s5" id="red-actionSelect05">
							<select>
								<option value="none" selected></option>
								<option value="foc">f</option>
								<option value="cal">a</option>
								<option value="tlk">l</option>
								<option value="boo">b</option>
								<option value="bar">r</option>
								<option value="eva">e</option>
								<option value="rei">i</option>
								<option value="rel">=</option>
								<option value="rot">R</option>
								<option value="jam">j</option>
								<option value="clk">k</option>
								<option value="coo">o</option>
								<option value="sla">s</option>
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

				for (var i = 0; i < 5; i++) {
					actionRow = stats.actions[i];
					$('#actionSelect0'+(i+1)+' option').attr('selected', false);
					$('#red-actionSelect0'+(i+1)+' option').attr('selected', false);
					if(actionRow[0]!=''){
						$('#actionSelect0'+(i+1)+' option[value='+actionRow[0]+']').attr('selected', true);
					}else{
						$('#actionSelect0'+(i+1)+' option[value=none]').attr('selected', true);
					}
					if(actionRow[1]!=''){
						$('#red-actionSelect0'+(i+1)+' option[value='+actionRow[1]+']').attr('selected', true);
					}else{
						$('#red-actionSelect0'+(i+1)+' option[value=none]').attr('selected', true);
					}
				}

				reloadSelect();
				reloadVisualisers();
				form.trigger('change');
			});
		}

		// ----------------------------------- Visualisers

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

			formData.append('card-name', $('form#form-main input[name=card-name]').val());
			formData.append('pilot-title', $('form#form-main input[name=pilot-title]').val());
			formData.append('limited', $('input[type=checkbox][name=limited]').prop('checked'));

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

					data = JSON.parse(data);

					cardgenOutput = data;

					data.log.forEach(function(element) {
					  console.log(element);
					});

					data.errors.forEach(function(element) {
					  console.log('Error: ' + element);
					});

					var dataUri = data.dataUri;
					$("div#outputImageContainer img").attr('src', dataUri);
					$("div#outputImageContainer a").attr('href', dataUri);
					$("div#outputImageContainer a").attr('download', $('form#form-main input[name=card-name]').val().replace(/ /g,"_")+'-'+ship);
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