<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="father" style=" background-image: url('<?php $this->options->archiveUrl() ?>'); ">
        <div class="lvjing"></div>
        <div class="son">
            <h1 class="blog-title" style=""><?php $this->archiveTitle(array(
'category'  =>  _t('%s'),
'search'    =>  _t('【%s】'),
'tag'       =>  _t('【%s】'),
'date'      =>  _t('【%s】'),
'author'    =>  _t('【%s】')
), '', ''); ?></h1>
            <h2 class="blog-description" style=""><?php echo $this->getDescription(); ?></h2>
        </div>
</div>
<article style="padding:10px">
<?php if ($this->have()): ?>
<?php while( $this->next() ): ?>
<div class = 'containers'>
<a class="fontstyle" href = "<?php $this->permalink() ?>">
<div class = 'card'>
<div class = 'bg' style = "background: url('<?php postThumb($this); ?>');no-repeat; background-size:100% 100%;">
<div class="frosted-glass"></div>
<div class = 'postheader'>
<h2 style = 'padding-bottom: 1em;font-size:1.8em;line-height:1.5em;'><?php $this->title() ?></h2>
<p style = 'font-size:1.4em;line-height:1.4em;'><span><?php $this->date();?></span> · <span><?php $this->category( ',', false );?></span> · <span><?php Postviews( $this);
?></span></p>
</div>
</div>
</div>
</div>
</div>
</a>
<?php endwhile;?>
<?php else: ?>
<div style="text-align:center;">
<h3 style="font-size: 2.5em;
    font-weight: 700;margin-top: 2em;margin-bottom:1em;
    color: #030749;" class="error-message">没有找到内容</h3>
<div class="search d3">
    <p style="font-size: 1.5em;
    font-weight: 700;margin: 1em;
    color: #030749;" class="error-message">你可以在下方尝试搜索...</p>
    <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
        <input type="text" id="s" name="s" placeholder="请输入内容..." required />
        <button type="submit"></button>
    </form>
</div>
</div>
</div>
</div>
<?php endif; ?>
</article>

<section class = 'btn-xy list-pager'>
<?php $this->pageLink( '上一页' );
?>
<?php $this->pageLink( '下一页', 'next' );
?>
<div class = 'clear'>
</section>


<?php $this->need('footer.php'); ?>