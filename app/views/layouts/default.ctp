<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
        echo $this->Html->meta('/img/favicon.ico',
                               '/img/favicon.ico',
                               array('type' => 'icon'));
		echo $this->Html->css('style');
		echo $scripts_for_layout;
        echo $this->Html->script('jquery');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
          powered by <a href="http://techstars.com">techstars</a>
		</div>
	</div>
</body>
</html>