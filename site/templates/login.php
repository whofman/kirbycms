<!DOCTYPE html>
<html lang="en">
<head>

    <title><?= html($page->title()) ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?= css('/assets/stylesheets/foundation.css') ?> 
	<?= css('/assets/stylesheets/site.css') ?>
 	
<!---    <link rel="alternate" type="application/rss+xml" href="<?php echo url('rss') ?>" title="Blog Feed" />  -->
	
</head>

<body class="grey">

<div class="modal-content">
	<form method="post" class="form">
	  <div>
	    <label for="username"><?php echo $page->username()->html() ?></label>
	    <input type="text" id="username" name="username">
	  </div>
	  <div>
	    <label for="password"><?php echo $page->password()->html() ?></label>
	    <input type="password" id="password" name="password">
	  </div>
	  <div>      
	    <input type="submit" name="login" value="<?php echo $page->button()->html() ?>">
	  </div>
	</form>
</div>
