<?
$title = '3D Slinky';
include('_header.php');
?>

	<style type="text/css">
    body {overflow: hidden; }
		#container {width: 720px; }

    #add {
      text-decoration: underline;
      margin-left: 2em;
      cursor: pointer;

      -webkit-transition: all .04s ease-in-out;
    }
    #add:active {
      color: #456;
    }

		/* Base for the slinky */
		.panel {
			float: left;
			width: 200px;
			height: 200px;
			margin: 20px;
			position: relative;
			top:  100px;
			left:  200px;
			font-size: .8em;
			
			-o-transform: rotate(0deg);
			-moz-transform: rotate(0deg);
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);

			-webkit-perspective: 500px;
			-moz-perspective: 500px;
		}

		/* -- make sure to declare a default for every property that you want animated -- */
		.panel .segment {
			float: none;
			position: absolute;
			top: -5px;
			left: -5px;
			z-index: 900;
			width: 100px;
			height: 100px;
			border: 5px solid #bbb;
/* 			border-image: url('/images/slinky-border.png') 20 20 20 20 stretch stretch; */

			-o-transform-origin: 0 80%;
			-moz-transform-origin: 0 80%;
			-webkit-transform-origin: 0 80%;
			transform-origin: 0 80%;

			-moz-border-radius: 60px;
			-webkit-border-radius: 60px;
			border-radius: 60px;
			
			-webkit-transform-style: preserve-3d;
			-webkit-backface-visibility: visible;

			-moz-transform-style: preserve-3d;

			/* initial slinky position */
			-webkit-transform:
				rotateX(-105deg) rotateY(0) rotateZ(50deg)
				translateX(0) translateY(0) translateZ(0);
			-moz-transform:
				rotateX(-105deg) rotateY(0) rotateZ(50deg)
				translateX(0) translateY(0) translateZ(0);
				
			/* shadows really help define the layers */
			-webkit-box-shadow: 0 0 1px 1px rgba(0,0,0,1);
			-moz-box-shadow: 0 0 1px 1px rgba(0,0,0,1);
			-ms-box-shadow: 0 0 1px 1px rgba(0,0,0,1);
			-o-box-shadow: 0 0 1px 1px rgba(0,0,0,1);
			box-shadow: 0 0 1px 1px rgba(0,0,0,1);
			
			/* -- transition is the magic sauce for animation -- */
			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;
		}

		/* This is the slinky at rest */
		.panel .segment .segment {
			-webkit-transform:
				rotateX(0) rotateY(0) rotateZ(0)
				translateX(0) translateY(0) translateZ(-1px);
			-moz-transform:
				rotateX(0) rotateY(0) rotateZ(0)
				translateX(0) translateY(0) translateZ(-1px);
		}

		/* This is the slinky extended
		 * A .hover class is used with jQuery instead of a plain :hover
		 */
		.panel.hover .segment .segment {
			transform: rotate(6.5deg) skew(-1deg) rotate(4deg);
			-o-transform: rotate(6.5deg) skew(-1deg) rotate(4deg);
			-moz-transform:
				rotateX(0) rotateY(5deg) rotateZ(0)
				translateX(0px) translateY(0px) translateZ(-1px);
			-webkit-transform:
				rotateX(0) rotateY(5deg) rotateZ(0)
				translateX(0px) translateY(0px) translateZ(-1px);
		}
		
		/* Auto-rotate control for slinky */
		#rotate .slider {
			display: inline-block;
			width: 200px;
			margin-right: 16px;
			position: relative;
			top: 3px;
			left: 12px;
		}
		
		/* Rotate the sliny automatically */
		.panel > .segment.rotate {
			-webkit-animation-name: rotate;
			-webkit-animation-duration: 4s;
			-webkit-animation-iteration-count: infinite;
			-webkit-animation-direction: normal;
			-webkit-animation-timing-function: linear;

			-moz-animation-name: rotate;
			-moz-animation-duration: 4s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-direction: normal;
			-moz-animation-timing-function: linear;
		}

		/* Animation keyframes */
		@-webkit-keyframes rotate {
			0% {
				-webkit-transform: rotateX(-105deg) rotateY(0) rotateZ(0deg) translateX(0) translateY(0) translateZ(2px);
			}
			100% {
				-webkit-transform: rotateX(-105deg) rotateY(0) rotateZ(360deg) translateX(0) translateY(0) translateZ(2px);
			}
		}
		@-moz-keyframes rotate {
			0% {
				-moz-transform: rotateX(-105deg) rotateY(0) rotateZ(0deg) translateX(0) translateY(0) translateZ(2px);
			}
			100% {
				-moz-transform: rotateX(-105deg) rotateY(0) rotateZ(360deg) translateX(0) translateY(0) translateZ(2px);
			}
		}
	</style>
	<script>
    // This can be done using the :hover pseudo-class,
    // but using jQuery allows the effect to appear on
    // touch devices.
    $(document).ready(function(){
      $('.panel').hover(
        function(){
          $(this).addClass('hover');
        },
        function(){
          $(this).removeClass('hover');
        }
      );
    });
	</script>
</head>

<body>

<div id="container">
	<h1><a href="http://css3playground.com">css3</a> // <?= $title ?></h1>
	<p class="warning">
		As of <?= date("F jS, Y") ?> the 3D transforms in this demo only work using <a href="http://www.apple.com/safari/">Safari 5</a>, <a href="http://www.google.com/chrome">Chrome</a> 10+, the <a href="http://nightly.webkit.org/">WebKit Nightly build</a>, and <a href="http://www.mozilla.org/en-US/firefox/channel/">Firefox 10+</a>.
	</p>

	<p class="instructions">
	This slinky uses <code>-webkit-transform: rotateY() and rotateX();</code> with some of the 3D settings: <code>-webkit-transform-style: preserve3d;</code> and <code>-webkit-transform-perspective</code>. It also uses <code>-webkit-animation</code> and <code>-webkit-keyframe</code>.
	Gecko browsers use their <code>-moz</code> equivalents of course.<br><br>
	The number of segments starts small to accomodate the less performant browsers, but add as many segments as you want.
	</p>

  <div id="rotate">Rotate the slinky manually:
    <div class="slider"></div>
    <input type="checkbox" name="auto" id="auto-rotate" /> <label for="auto-rotate">Auto-rotate</label>
    <a id="add">Add 5 segments</a>
  </div>

	<div class="panel">
		<div class="segment">
			<div class="segment">
				<div class="segment">
					<div class="segment">
						<div class="segment">
							<div class="segment">
								<div class="segment">
									<div class="segment">
										<div class="segment">
											<div class="segment">
												<div class="segment">
													<div class="segment">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

    // initialize slider to rotate slinky
		$('#rotate .slider').slider({
			animate: 'fast',
			min: 0,
			max: 360,
			orientation: 'horizontal',
			value: 30,
			slide: function(e, ui){
				$('.panel > .segment')
				  .css('-webkit-transform','rotateX(-105deg) rotateY(0) rotateZ('+ui.value+'deg) translateX(0) translateY(0) translateZ(2px)')
				  .css('-moz-transform','rotateX(-105deg) rotateY(0) rotateZ('+ui.value+'deg) translateX(0) translateY(0) translateZ(2px)');
			}
		});

    // Toggle auto-rotation
		$('#rotate input[name=auto]').change(function(){
			if ($(this).is(':checked')){
				$('.panel > .segment').addClass('rotate');
			} else {
				$('.panel > .segment').removeClass('rotate');
			}
		});

    // Adds 5 segments
    $('#add').click(function(){
      // Deepest child selection came from https://gist.github.com/1014671
      var $target = $('.panel').children(),
          $last;

      while( $target.length ) {
        $target = $target.children();
      }
      $last = $target.end();

      $last.append('<div class="segment"><div class="segment"><div class="segment"><div class="segment"><div class="segment"></div></div></div></div></div>');
    });
	});
</script>

<? include('_footer.php') ?>
