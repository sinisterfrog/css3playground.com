<?
$title = 'Mosaic';
include('_header.php');
?>

	<style type="text/css">
		#container {
			width: 960px;
		}
		.row {
			
		}
		.panel {
			float: left;
			width: 100px;
			height: 100px;
			margin: 10px;
			position: relative;
		}
		
		/* -- make sure to declare a default for every property that you want animated -- */
		.panel .hover {
			float: none;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 100;
			width: 100px;
			height: 100px;
			border: 0px solid #ccc;
			background: url('images/blues-brothers.jpg') no-repeat -100px 100px fixed;

			box-shadow: 0 1px 5px rgba(0,0,0,0.9);
			-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.9);
			-webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.9);

			/* -- transition is the magic sauce for animation -- */
			transition: all .3s ease-out;
			-moz-transition: all .3s ease-out;
			-webkit-transition: all .3s ease-out;
		}
		.row:hover .panel .hover {
			top: -35px;
			left: -35px;
			z-index: 200;
			width: 170px;
			height: 170px;
			border: 0;

			border-radius: 85px;
			-moz-border-radius: 85px;
			-webkit-border-radius: 85px;

			box-shadow: 0 15px 0 rgba(0,0,0,0);
			-moz-box-shadow: 0 15px 0 rgba(0,0,0,0);
			-webkit-box-shadow: 0 15px 0 rgba(0,0,0,0);
		}
		
		.row > *:nth-child(8n+1) .hover {-webkit-transition-delay: .00s; }
		.row > *:nth-child(8n+2) .hover {-webkit-transition-delay: .05s; }
		.row > *:nth-child(8n+3) .hover {-webkit-transition-delay: .10s; }
		.row > *:nth-child(8n+4) .hover {-webkit-transition-delay: .15s; }
		.row > *:nth-child(8n+5) .hover {-webkit-transition-delay: .20s; }
		.row > *:nth-child(8n+6) .hover {-webkit-transition-delay: .25s; }
		.row > *:nth-child(8n+7) .hover {-webkit-transition-delay: .30s; }
		.row > *:nth-child(8n+8) .hover {-webkit-transition-delay: .35s; }
		
	
	</style>
</head>

<body>

<div id="container">
	<h1><a href="http://css3playground.com">css3</a> // <?= $title ?></h1>
	<div class="row">
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
	</div>
	<div class="row">
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
	</div>
	<div class="row">
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
		<div class="panel"><div class="hover"></div></div>
	</div>
</div>

<? include('_footer.php') ?>