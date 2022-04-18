<?php
/**
 * 友链
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="father" style=" background-image: url('<?php postThumb($this); ?>');">
        <div class="lvjing"></div>
        <div class="son">
            <h1 class="blog-title"><?php $this->title() ?></h1>
        </div>
</div>
<?php Breadcrumbs($this); ?>
<article class="container postcc">
<?php $this->content(); ?>
</article>
<div class="postlink">
<ul class="links" >
<?php if ($this->options->InsideLinksIcon): ?>
<script>function erroricon(obj){var a=obj.parentNode,i=document.createElement("i");i.appendChild(document.createTextNode("null"));a.removeChild(obj);a.insertBefore(i,a.childNodes[0])} 
</script>
<?php endif; ?>
<?php Links($this->options->InsideLinksSort, $this->options->InsideLinksIcon ? 1 : 0); ?>
</ul>
</div>
</div>
</div>
<div class="container commentsdd">
<?php $this->need('comments.php'); ?></div> 
<?php $this->need('footer.php'); ?>