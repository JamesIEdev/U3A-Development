
<head>
  <title>
    <?php echo "The University of The Third Age - "; ?> 
    <?php echo "Login"; ?>
  </title>
    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="jquery.slidertron-1.3.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
</head>

<?php echo $this->Html->css('loginu3a');?>

<body>
<div id="shadowcont" class="container">
  <div id="header" class="container">
      <div id="logo" class="container">
		<h1><?php echo $this->Html->link('U3A', '/ '); ?></h1>
          	<span>Melbourne City</span>
      </div>
  </div>

<div id="banner-wrapper">
	<div id="banner" class="container">
		<h3><?php echo $this->Session->flash();?></h3>
	</div>
</div>

     <div id="featured-wrapper" class="container">
        <div id="login" class="container" align ='center'>
            <?php echo $this->Session->flash(); echo$content_for_layout; ?>
        </div>
     </div>

<div id="footer-wrapper">
        <div id="footer" class="container">
            <p>Review Version of <b>Build 3</b> | Team 19 - Monash Industrial Experience</a>.</p>
        </div>
</div>

</shadowcont>
</body>
</html>
