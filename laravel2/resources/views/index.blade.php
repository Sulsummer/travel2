<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>Travel!</title>

<link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css">
<link rel="stylesheet" type="text/css" href="css/self.css">
<link rel="stylesheet" type="text/css" href="css/extra.css">

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js"></script>
<script src="js/jquery.fullPage.min.js"></script>

<script>
$(document).ready(function() {
	$.fn.fullpage({
		slidesColor: ['#232326', '#8041E5', '#36C639', '#f90'],
		anchors: ['page1', 'page2', 'page3', 'page4'],
		loopBottom: true
	});
});
</script>
</head>

<body>

<div class="section">
	
	<div class="title navbar">
		<a href="{{ URL('home') }}"><h1>Travel</h1></a>
	</div>
	<div class="flasher">
		<section class="mod model-1">
 			<a href=""><div class="spinner"></div></a>
		</section>
	</div>



</div>




<div class="section">
  	
  	<h2>Travel Group</h2>
  	<p>Introduction of travel group.</p>
  	<p>Balabala balabala</p>
  	<p><a href="{{ URL('group') }}" class="explore-default">Explore</a></p>

</div>





<div class="section">

	<h2>Travel Note</h2>
  	<p>Introduction of travel note.</p>
  	<p>Balabala balabala</p>
  	<p><a href="{{ URL('note') }}" class="explore-primary">Explore</a></p>

</div>
<div class="section">
	<p>@Travel</p>
</div>







</body>
</html>
