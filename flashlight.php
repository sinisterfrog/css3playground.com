<?
$title = 'Flashlight Shadow';
include('_header.php');
?>

	<style type="text/css">
		body {
			width: 720px;
		}
		#sandbox {
			width: 720px;
			height: 300px;
			overflow: hidden;
			position: relative;
			border: 1px solid #888;
			background: rgb(36,36,36);
		}
		#text {
			width: 320px;
			font-size: 3em;
			margin: .5em 0;
			letter-spacing: 2px;
			text-transform: lowercase;
			position: relative;
			top: 55px;
			left: 200px;
		}
		#spot {
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
		}
		
		/* -- for debugging -- */
		#data {
			display: NONE;
			
			width: 1000px;
			font-size: .9em;
			position: absolute;
			bottom: 60px;
			right: 20px;
			
			background: rgba(0,0,0,0.3);
			border: 1px solid rgba(0,0,0,0.3);
		}
		
	</style>
	<script type="text/javascript">
		// thanks for the math, Zach!
		// http://www.zachstronaut.com/lab/text-shadow-box/text-shadow-box.html
		
		$(document).ready(function () {
		    $('body').mousemove(function(e){
		    
		    	// check to see if the text changed
		    	$('#text').text($('#textInput').val());
		    
		    	// calculate the shadow
		    	var offset = $('#text').offset();
			    var XX = e.clientX - offset.left - 150;
			    var YY = e.clientY - offset.top - 60;
			    var hyp = Math.sqrt(XX*XX+YY*YY)
			    var blur = hyp/4;
			    var fade = 60/hyp;
			    var shadows = '';
			    
		    	if ($('#lightType').val() == 'flashlight') {
		    		shadows += -XX +'px '+ -YY +'px '+ blur +'px rgba(0,0,0,'+ fade +')';
  			    } else {
  			    	shadows += -XX/90 +'px '+ -YY/90 +'px 0 #000, ';
  			    	shadows += -XX/70 +'px '+ -YY/70 +'px 0 #000, ';
  			    	shadows += -XX/55 +'px '+ -YY/55 +'px 0 #000, ';
  			    	shadows += -XX/45 +'px '+ -YY/45 +'px 0 #000 ';
  			    }
			    
			    // apply text shadow(s)
			    $('#text').css('text-shadow', shadows);

				/*
				// debug
	    		$('#data .xx .val').text(XX);
	    		$('#data .yy .val').text(YY);
	    		$('#data .hyp .val').text(hyp);
		    	$('#data .blur .val').text(blur);
	    		$('#data .fade .val').text(fade);
	    		$('#data .shadows .val').text(shadows);
				//*/
																				    
			    // calculate the spotlight
			    offset = $('#spot').offset();
				XX = e.clientX - offset.left;
				YY = e.clientY - offset.top;
				fade = .75 + 25/hyp;
				var spotSize = 36;
				
				if ($('#lightType').val() == 'flashlight') {
				  var spotlight;
				  spotlight = '-webkit-gradient(radial, 350 150, 110, '+ XX +' '+ YY +', '+ spotSize +', from(rgba(36,36,36,0)), to(rgba(255,255,255,'+fade+')))';
				} else {
				  spotlight = '';
				}
				
				// apply spotlight CSS
				$('#spot').css('background-image', spotlight);
				
				/*
				// debug
				$('#data .spotlight .val').text(spotlight);
				//*/
				
		    });
		    
		    // update text as it's typed
		    $('#textInput').keypress(function(){
		    	$('#text').text($(this).val());
		    });
		});
	</script>
</head>

<body>

	<h1><a href="http://css3playground.com">css3</a> // <?= $title ?></h1>
	<? include('_browsers.php') ?>
	
	<p>This demo uses a combination of <code>text-shadow</code> and <code>-webkit-gradient</code>.</p>
	
	<div id="sandbox">
		<h2 id="text">CSS3 Rocks!</h2>
		<div id="spot"></div>
	</div>
	<div id="controls">
		<select id="lightType" name="lightType">
			<option value="flashlight">Flashlight</option>
			<option value="bevel">Bevel</option>
		</select>
		<input id="textInput" name="textInput" value="CSS3 Rocks!" size="25" maxlength="23" />
	</div>
	
	<div id="data">
	  <ul>
	    <li class="xx">x: <span class="val"></span></li>
	    <li class="yy">y: <span class="val"></span></li>
	    <li class="hyp">hypotenuse: <span class="val"></span></li>
	    <li class="blur">blur: <span class="val"></span></li>
	    <li class="fade">fade: <span class="val"></span></li>
	    <li class="shadows">shadows: <span class="val"></span></li>
	    <li class="spotlight">spotlight: <span class="val"></span></li>
	  </ul>
	</div>

<? include('_footer.php') ?>