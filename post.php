<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="father" style="background-image: url('<?php postThumb($this); ?>');">
        <div class="lvjing"></div>
        <div class="son">
            <h1 class="post_title"><?php $this->title() ?></h1>
            <p class="post_p"><?php $this->date();?> · <?php $this->category( ',', false );?> · <?php Postviews( $this);?> · <?php $this->commentsNum('暂无评论', '%d 评论'); ?></p>
        </div>
</div>
<article class="container">
<div class="postcc">
<?php
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$this->title.'" title="点击放大图片"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
?>
    </div>
<div class="father_tags">
      <div class="keywords"><?php $this->tags(' ', true, ''); ?></div>
      <div class="right_tags">最后更新：<?php echo date('Y/m/d H:i:s' , $this->modified); ?></div>
    </div>
</article>

<div class="license">
<?php if ($this->options->LicenseInfo !== '0'): ?>
             <ul class="post-copyright">
                <li class="post-copyright-author"><strong>本文作者：</strong><?php $this->author(); ?></li>
                <li class="post-copyright-link"><strong>本文链接：</strong><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->permalink() ?></a></li>
                <li class="post-copyright-license"><strong>版权声明：</strong><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本作品采用 <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank" rel="license nofollow">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></li>
            </ul>
<?php endif; ?>
</div>
<div class="fix">
<ul class="m-news-opt">
    <li class="opt-item">
            <p>&lt; 上一篇</p>
            <p class="ellipsis"><?php $this->thePrev('%s','没有了'); ?></p>
    </li>
    <li class="ta-r">
            <p>下一篇 &gt;</p>
            <p class="ellipsis"><?php $this->theNext('%s','没有了'); ?></p>
    </li>
</ul>
</div>
<div class="container commentsdd">
<?php $this->need('comment.php'); ?>
</div>
<?php $this->need('footer.php'); ?>