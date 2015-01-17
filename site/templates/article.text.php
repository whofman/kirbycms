<?php snippet('header') ?>

<div class="row" id="main-content">
  <section class="eight columns" id="content-area">
	    <article>
		    <h2><?= $page->title() ?></h2>
			<h5 class="subheader"><?= $page->date('d M Y') ?></h5>
		    <?= kirbytext($page->text()) ?>
			<p>
			<ul class="tags">
			    <?php if($page->categories() != ''): ?>
					Gepost in
			        <?php foreach(str::split($page->categories()) as $cat): ?>
			    	    <li><a href="<?php echo url('cat:' . urlencode($cat)) ?>"><?php echo $cat; ?></a></li>
			        <?php endforeach ?>
			    <?php endif?>
			    <?php if($page->tags() != ''): ?> 
				    <li>met tags</li> 
			        <?php foreach(str::split($page->tags()) as $tag): ?>
			    	   <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
			        <?php endforeach ?>
				<?php endif?>
			</ul>
	    </article>
		
	     <nav class="nextprev cf" role="navigation">
	            <?php if($next = $page->nextVisible()): ?> 
	            <a class="next" href="<?php echo $next->url() ?>">volgende&rarr;</a>
	         <?php endif ?>
	         <?php if($prev = $page->prevVisible()): ?> 
	            <a class="prev" href="<?php echo $prev->url() ?>">&larr; vorige</a>
	         <?php endif ?>
	     </nav>           
  </section>
  
  <aside class="four columns" id="sidebar">
    <?= snippet('sidebar') ?>
  </aside>
  
</div>

<?php snippet('footer') ?>