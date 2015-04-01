<nav class="menu cf" role="navigation">
  <ul class="cf">
    <?php foreach($pages->visible() as $item): ?>
       <li><a<?php ecco($item->isOpen(), ' class="active"') ?> href="<?php echo $item->url() ?>">
		     <?php echo $item->title() ?></a></li>
    <?php endforeach ?>
	
    <?php if($user = $site->user()): ?>
       <li><a href="<?php echo url('logout') ?>">Logout</a></li>
    <?php endif ?>		
  </ul>
  
  <form class="search" role="search" action="<?php echo url('search') ?>">
    <label class="vh" for="search">Search</label>
    <input type="search" class="searchword" name="q" id="search" placeholder="Zoek..."/>
  </form>
</nav>
