<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="father" style=" background-image: url('<?php postThumb($this); ?>');">
        <div class="lvjing"></div>
        <div class="son">
            <h1 style="margin-top:2em;font-size:3em;line-height:2.4em;"><?php $this->title() ?></h1>
            <p style = 'font-size:1.5em;line-height:1.5em;'><?php $this->date(); ?> · <?php Postviews($this); ?> · <?php $this->commentsNum('暂无评论', '%d 评论'); ?></p>
        </div>
</div>

<article class="container">
<div class="postcc">
<?php $this->content(); ?>
<?php if ($this->options->LicenseInfo !== '0'): ?>
<?php endif; ?>
</div>
</article>
<div class="container commentsdd">
<?php $this->need('comment.php'); ?>
</div>
<?php $this->need('footer.php'); ?>