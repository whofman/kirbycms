<?php snippet('header') ?>

<div class="row" id="main-content">
	
    <?php if(param('tag')): 						// show tag results ?>
		<section class="eight columns" id="content-area">
		<?php $tag = urldecode(param('tag'));
		      $articles = $pages->find('blog')
		                        ->children()
		                        ->visible()
		                        ->filterBy('tags', $tag, ',')
		                        ->sortBy('date', 'desc')
		                        ->paginate(10);
			  

		      echo '<h1 class="result">Posts met tag '.$tag.'</h1><hr>';
		?>

		<ul class="results">
		  <?php foreach($articles as $article): ?>
		  <li>
		    <h3><a href="<?php echo $article->url() ?>"><?php echo html($article->title()) ?></a></h3>
		    <div class="meta">
		      <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d F Y'); ?></time>
		      <?php if ($article->tags() != ''): ?> 
		      <ul class="tags">|
		        <?php foreach(str::split($article->tags()) as $tag): ?>
		        <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
		        <?php endforeach ?>
		      </ul>
		      <?php endif ?>
		    </div>
		  </li>
		  <?php endforeach ?>
		</ul>
		
    <?php elseif(param('cat')): 						// show tag results ?>
		<section class="eight columns" id="content-area">
		<?php $cat = urldecode(param('cat'));
		      $articles = $pages->find('blog')
		                        ->children()
		                        ->visible()
		                        ->filterBy('categories', $cat, ',')
		                        ->sortBy('date', 'desc')
		                        ->paginate(10);
			  

		      echo '<h1 class="result">Posts in Categorie '.$cat.'</h1><hr>';
		?>

		<ul class="results">
		  <?php foreach($articles as $article): ?>
		  <li>
		    <h3><a href="<?php echo $article->url() ?>"><?php echo html($article->title()) ?></a></h3>
		    <div class="meta">
		      <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d F Y'); ?></time>
		      <?php if ($article->categories() != ''): ?> 
		      <ul class="tags">|
		        <?php foreach(str::split($article->categories()) as $cat): ?>
		        <li><a href="<?php echo url('cat:' . urlencode($cat)) ?>">#<?php echo $cat; ?></a></li>
		        <?php endforeach ?>
		      </ul>
		      <?php endif ?>
		    </div>
		  </li>
		  <?php endforeach ?>
		</ul>

 
  <?php else: // show latest articles ?>
		<section class="eight columns" id="content-area">
	
		<h2><?= $page->description() ?></h2>
		<?= kirbytext($page->text()) ?>
		<?php
			$articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(4);
			$pagination = $articles->pagination;
			$range = 3;
		?>
 	    <?php foreach($articles as $article): ?>
  
  		  <article>
    		  <a href="<?= $article->url() ?>"><?= html($article->title()) ?></a><br /><em>Gepost op <?=$article->date('d M Y') ?></em>
		      <?php if ($article->categories() != ''): ?> in
			      <ul class="tags">
			        <?php foreach(str::split($article->categories()) as $cat): ?>
			           <li><a href="<?php echo url('categorie:' . urlencode($cat)) ?>">#<?php echo $cat; ?></a></li>
			        <?php endforeach ?>
			      </ul>
			  <?php else: ?>
			       <p>
			  <?endif ?>
		      <?php if ($article->tags() != ''): ?> <em>met tag</em>
			      <ul class="tags">
			        <?php foreach(str::split($article->tags()) as $tag): ?>
			           <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
			        <?php endforeach ?>
			      </ul>
			  <?php else: ?>
			       <p>
			  <?endif ?>

    		  <p><?= excerpt($article->text(), 200) ?></p>
    		  <a href="<?= $article->url() ?>">Meer …</a>
			 
  		  </article>
		  <hr />
  		<?php endforeach ?>
		
    <?php if($articles->pagination()->hasPages()): // pagination ?>
	    <nav class="pagination cf">
	      <?php if($articles->pagination()->hasPrevPage()): ?>
	      <a class="button prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">&lsaquo;&lsaquo; jonger</a>
	      <?php endif ?>
	      <?php if($articles->pagination()->hasNextPage()): ?>
	      <a class="button next" href="<?php echo $articles->pagination()->nextPageURL() ?>">ouder &rsaquo;&rsaquo;</a>
	      <?php endif ?>
        </nav>
    <?php endif ?>
	
 
 <?php endif ?> 
 
 
   </section>

 <aside class="four columns" id="sidebar">
   <?= snippet('sidebar') ?>
 </aside>

</div>

<?php snippet('footer') ?>