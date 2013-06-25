---
title: Blur filter
layout: default

features:
- cssfilters

permalink: /blur-filter/
original: /blur-filter.php
---

<style type="text/css">
  body {
    padding: 0;
    overflow: hidden;
  }
  #container {
    padding: 0 2em;
    position: relative;
  }

  div.layer {
    background: #fff;
    color: #000;
    position: absolute;
    border: 10px solid #333;
    border-radius: 20px;

    -webkit-transform: rotateY(.5deg) transformZ(1px);
    -moz-transform: rotateY(.5deg) transformZ(1px);
	}
  div.layer span {
    display: block;
    width: 100px;
    margin: 20px auto 0;
    font-size: 2em;
  }

  div.back {
    width: 400px;
    height: 200px;
    top: 180px;
    left: 300px;
    z-index: 1;
  }
  div.middle {
    width: 580px;
    height: 240px;
    top: 280px;
    left: 200px;
    z-index: 2;
  }
  div.front {
    width: 720px;
    height: 280px;
    top: 380px;
    left: 100px;
    z-index: 3;
  }
</style>
<script>

  $(document).ready(function(){

    var back = 180;
    var middle = 300;
    var front = 500;
    var YY,
        offset,
        sizeBack,
        sizeMiddle,
        sizeFront;

    // For mouse users
    $('html').mousemove(function(e){

      // calculate the shadow
      offset = $('html').offset();
      YY = e.clientY - offset.top;

      sizeBack   = Math.abs(back-YY)/40;
      sizeMiddle = Math.abs(middle-YY)/40;
      sizeFront  = Math.abs(front-YY)/40;

      // apply blur
      $('.back').css('-webkit-filter',   'blur('+ (sizeBack) +'px)');
      $('.middle').css('-webkit-filter', 'blur('+ (sizeMiddle) +'px)');
      $('.front').css('-webkit-filter',  'blur('+ (sizeFront) +'px)');
    });
  });
</script>

<h1><a href="http://css3playground.com">css3</a> // {{ page.title }}</h1>

<p class="instructions">
	Move your cursor up and down to watch the depth of field change.<br>
	This demo uses <code>-webkit-filter: blur()</code> and a dash of JS to track your cursor.
</p>

<div class="back layer"><span>Back</span></div>
<div class="middle layer"><span>Middle</span></div>
<div class="front layer"><span>Front</span></div>