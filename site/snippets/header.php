<!DOCTYPE html>
<html lang="en">
<head>

    <title><?= html($page->title()) ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <?= css('/assets/stylesheets/foundation.css') ?> 
	<?= css('/assets/stylesheets/site.css') ?>
 	
<!---    <link rel="alternate" type="application/rss+xml" href="<?php echo url('rss') ?>" title="Blog Feed" />  -->
	
	<?php date_default_timezone_set('Europe/Amsterdam'); ?>
	
</head>

<body>

<div class="contain-to-grid">
    <nav class="top-bar">
        <ul>
            <li class="name"><h1><a href="<?= url() ?>"><?= html($site->title()) ?></a></h1></li>
            <li class="toggle-topbar"><a href="#"></a></li>
        </ul>
        <section>
            <ul class="left">
                <li class="divider"></li>
                <?php foreach($pages->visible() AS $p): ?> 
                    <li><a href="<?php echo $p->url() ?>"><?php echo html($p->title()); ?></a></li>
                <?php endforeach; ?>
			
			  <li><form class="search" role="search" action="<?php echo url('search') ?>">
	<!--		    <label for="search">Zoek</label>  -->
			    <input type="search" class="searchword" name="q" id="search" placeholder="Zoek..."/>
			  </form></li>
              
		    </ul>
        </section>
    </nav>

</div>