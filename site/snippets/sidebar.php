<div class="widget first-widget">
	<p><img src="http://localhost/kirbycms/assets/images/hans.jpg" class="author-image" width="50px"  height="50px" alt="Author Image">

	 <?= kirbytext($site->biography()) ?></p>
	 <hr />

	 <div class="widget">
		 <h3 class="subheader"><strong>Recente Artikelen</strong></h3>
 			<?php foreach($pages->find('blog')->children()->visible()->sortBy('date', 'desc')->limit(5) as $article): ?>
				<h6><a href="<?= $article->url() ?>"><?= html($article->title()) ?></a></h6>
			<?php endforeach ?>
	 </div>
	 <hr />

     <?php $cats = $pages->find('blog')->children()->visible()->sortBy('categories', 'asc')->pluck('categories', ',', true); ?>
	 <div class="widget">
		 <h3 class="subheader"><strong>Categorieën</strong></h3>
		 <ul class="tags">
	    <?php foreach($cats as $cat): ?>
	    <li>
	      <a href="<?php echo $site->url() . '/cat:' . $cat ?>">
	        <?php echo html($cat) ?>
	      </a>
	    </li>
	    <?php endforeach ?>
	    </ul>
	 </div>

     <?php $tags = $pages->find('blog')->children()->visible()->sortBy('tags', 'asc')->pluck('tags', ',', true); ?>
	 <div class="widget">
		 <h3 class="subheader"><strong>Tags</strong></h3>
		 <ul class="tags">
	    <?php foreach($tags as $tag): ?>
	    <li>
	      <a href="<?php echo $site->url() . '/tag:' . $tag ?>">
	        <?php echo html($tag) ?>
	      </a>
	    </li>
	    <?php endforeach ?>
	    </ul> 
	 </div>
	 <hr />
</div>
