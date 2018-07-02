<?php
/**
 * Template Name: Preloader Demo
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */
get_header(); ?>
		<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
		<style>
			#pageloading{
				background:#fff;
				position:fixed;
				z-index:99999;
				left:0;
				top:0;
				visibility:hidden;
				right:0;
				bottom:0;
				width:100%;
				height:100%;
			}
			#loading-logo{
				margin:5% 0 2% 0;
				text-align:center;
			}
			#loading-box{
				display:flax;
				position:relative;
				text-align:center;
			}
			#pageloading #loading-box .loading-text{
				text-align:center;
				color:#0071bc;
				position:absolute;
				margin:0;
				padding-left: 38%;
				text-transform: uppercase;
				font-family: atrament-web,sans-serif;
				vertical-align:middle;
				line-height: 6rem;
				font-size: 7rem;
			}
			#pageloading #loading-box .loading-text1{
				text-align: left;
				color: #0071bc;
				padding-left: 38%;
				vertical-align: middle;
				margin: 5% 0 0 0;
				line-height: 6rem;
				font-family: atrament-web,sans-serif;
				font-size: 7rem;
				text-transform: uppercase;
			}
			#pageloading #loading-box .loading-pera{
				text-align: left;
				color: #0071bc;
				padding-left: 38%;
				text-transform: uppercase;
				vertical-align: middle;
				font-family: atrament-web,sans-serif;
				margin:0;
				line-height: 2rem;
				font-size: 2rem;
			}
		</style>
		<div id="pageloading">
			<div id="loading-logo"><img src="http://blahworks.in/mea/wp-content/uploads/2017/08/logo1.jpg" /></div>
			<div id="loading-box">
				<h1 id="loading-text1" class="loading-text">Hello</h1>
				<h1 id="loading-text2" class="loading-text">Hello1</h1>
				<h1 id="loading-text3" class="loading-text">Hello2</h1>
				<h1 id="loading-text4" class="loading-text1">INDIA</h1>
				<p id="loading-text5" class="loading-pera">A world of opportunities</p>
			</div>
			<!-- <div class="loading-last-box">
				<h1 class="loading-text"></h1>
			</div> -->
		</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>	
	<script src='http://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/jquery.ui.touch-punch.js'></script>
    <script>
	
	
	//var loadingimg=['Hello', 'Hello2', 'Hello3', 'Hello4', 'Hello5', 'Hello6'];
		var i=1;
		/* while(i <= 3){
			var randomnumber = Math.ceil(Math.random()*100)
			console.log(randomnumber);
			if(loadingimg.indexOf(randomnumber) > -1) continue;
			console.log(loadingimg);
			i++;
		} */
		var nums = ['Hello', 'Hello2', 'Hello3', 'Hello4', 'Hello5', 'Hello6'],
		ranNums = [],
		i = Number(nums.length)-(Number(nums.length)-3),
		j = 0;

		while (i--) {
			j = Math.floor(Math.random() * (i+1));
			ranNums.push(nums[j]);
			nums.splice(j,i);
		}
		document.getElementById("loading-text1").innerHTML= nums[ranNums[0]];
		document.getElementById("loading-text2").innerHTML= nums[ranNums[1]];
		document.getElementById("loading-text3").innerHTML= nums[ranNums[2]];
		
		/* setInterval(function(){ 
			if(i<=3){
				var number=Math.floor(Math.random() * 6) + 1;
				console.log(number);
				var div= '<h1 class="loading-text">'+loadingimg[number]+'</h1>';
				document.getElementById("pageloading").innerHTML=div;
				i++;
			}
			
		}, 1000); */
	
	
		var pageloading = $("#pageloading"),
		loadinglogo= $("#loading-logo"),
		boxcontent = $("#loading-box"),
		loadingicon = $("#loading-icon"),
		loadingtext1 = $("#loading-text1");
		loadingtext2 = $("#loading-text2");
		loadingtext3 = $("#loading-text3");
		loadingtext4 = $("#loading-text4");
		loadingtext5 = $("#loading-text5");
		
	TweenLite.set(pageloading, {visibility:"visible"})

	//instantiate a TimelineLite    
	var tl = new TimelineLite();
	tl.from(loadinglogo, 0.3, {scale:.5, autoAlpha:0}, "+=0.5");
	tl.from(loadingtext1, 1.3, {left:300, opacity:0});
	tl.to(loadingtext1, 1.3, {left:-600, opacity:0});
	tl.from(loadingtext2, 1.3, {left:300, opacity:0});
	tl.to(loadingtext2, 1.3, {left:-600, opacity:0});
	tl.from(loadingtext3, 1.3, {left:300, opacity:0});
	tl.to(loadingtext3, 1.3, {left:-600, opacity:0});
	tl.from(loadingtext4, 1.3, {left:-300, opacity:0});
	tl.from(loadingtext5, 0.3, {left:300, opacity:0});

	</script>
