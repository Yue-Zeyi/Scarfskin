<?php
/**
* 一款基于Typecho拥有漂亮外表的自适应简洁主题。
* <ul><li>自适应三端，完美适配Typecho1.2.0版本</li></ul>
*
* @package Scarfskin Theme
* @author 岳泽以
* @version 1.0.1
* @link https://www.yuezeyi.com/
*/
/*顶部*/
if ( !defined( '__TYPECHO_ROOT_DIR__' ) ) exit;
$this->need( 'header.php' );
?>
<?php  if ( $this->options->Dbanner ):?>
<div class="father" style=" background-image: url('<?php $this->options->bannerUrl() ?>');">
        <div class="lvjing"></div>
        <div class="son">
            <h1 class="blog-title"><?php $this->options->bannera() ?></h1>
            <h2 class="blog-description"><?php $this->options->bannerb() ?></h2>
        </div>
    </div>
<?php endif;
?>
<article style="padding:10px">
<?php while( $this->next() ): ?>
<div class = 'containers'>
<a class="fontstyle" href = "<?php $this->permalink() ?>">    
<div class = 'card'>
<div class = 'bg' style ="background: url('<?php postThumb($this); ?>');no-repeat; background-size:100% 100%;">
<div class="frosted-glass"></div>
<div class = 'postheader'>
<h2 style = 'padding-bottom: 1em;font-size:1.8em;line-height:1.5em;'><?php $this->title() ?></h2>
 <p style = 'font-size:1.4em;line-height:1.4em;'><?php $this->date();?> · <?php $this->category( ',', false );?> · <?php Postviews( $this);?> · <?php $this->commentsNum('暂无评论', '%d 评论'); ?></p>
</div>
</div> 
</div>
</div>
</div>
</a>
<?php endwhile;?>
</article>

<section class = 'btn-xy list-pager'>
<?php $this->pageLink( '上一页' );
?>
<?php $this->pageLink( '下一页', 'next' );
?>
<div class = 'clear'>
</section>

<?php $this->need( 'footer.php' );?>