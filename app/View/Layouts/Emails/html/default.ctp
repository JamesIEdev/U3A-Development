<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title></title>
</head>

<body>
    <?php echo $this->Html->image('header.png', array('style'=>'width:100%'));?>
    <div style="clear: both">&nbsp;</div>

	<?php echo $this->fetch('content'); ?>

    /// Footer goes here
    <?php /*echo $this->Html->image('header.png', array('style'=>'width:100%'));*/?>
</body>
</html>