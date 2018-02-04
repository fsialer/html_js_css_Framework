<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor(base_url().'library_uploading', 'Upload Another File!'); ?></p>
</body>
</html>