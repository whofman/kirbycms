<?php // see http://getkirby.com/forum/how-to/topic:638 ?>

<?php snippet('header') ?>

<div class="row" id="main-content">
  <section class="eight columns" id="content-area">

<h2><?php echo html($page->title());  ?></h2>

<?php
        $articles = $pages->find('blog')
                          ->children()
                          ->visible()
                          ->sortBy('date','desc');
        $i=1;
?>


<?php foreach ($articles as $article):
        $month_next = ($article->date('m'));
        $year_next = ($article->date('Y'));

        if($i == 1):
            $month_base = ($article->date('m'));
            $year_base = ($article->date('Y'));
            echo "<h2 style='margin-top:20px';>" . $article->date('Y') . "</h2>" ;
            echo "<h3>" . $article->date('F Y') . "</h3" ?>
            <ul>
            <li><?php echo $article->date('d-m-Y') ?> - <a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a> </li>
            <?php $i++;

        elseif ($month_next == $month_base && $year_next == $year_base ): ?>
            <li><?php echo $article->date('d-m-Y') ?> - <a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a> </li>      
                <?php $i++;

        elseif ($month_next != $month_base && $year_next == $year_base):  ?>
            </ul>
            <?php $month_base = $month_next;
                  $year_base = $year_next;
            echo "<h3" . $article->date('F Y') . "</h3"; ?>
            <ul>
            <li><?php echo $article->date('d-m-Y') ?> - <a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a> </li>      
            <?php $i++;

        elseif ($month_next != $month_base && $year_next != $year_base):  ?>
            </ul>
            <?php $month_base = $month_next;
                  $year_base = $year_next;
          echo "<h2 style='margin-top:20px';>" . $article->date('Y') . "</h2>" ;
          echo "<h3>" . $article->date('F Y') . "</h3" ?>
            <ul>
            <li><?php echo $article->date('d-m-Y') ?> - <a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a> </li>      
            <?php $i++;                                
        endif;         
   endforeach ;                
?>     
</ul>

<h4 style="text-align:left;"><a href="<?php echo url('blog') ?>"><em>Back…</em></a></h4>

  </section>
  <aside class="four columns" id="sidebar">
    <?= snippet('sidebar') ?>
  </aside>
</div>

<?php snippet('footer') ?>
