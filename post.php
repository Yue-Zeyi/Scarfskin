<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if ($this->options->dianzan !== '0'): ?>  
<?php
if (isset($_POST['agree'])) {
    if ($_POST['agree'] == $this->cid) {
        exit(agree($this->cid));
    }
    exit('error');
}
?>
<?php endif; ?>
<?php $this->need('header.php'); ?>
<div class="father" style="background-image: url('<?php postThumb($this); ?>');">
        <div class="lvjing"></div>
        <div class="son">
            <h1 class="post_title"><?php $this->title() ?></h1>
            <p class="post_p"><?php $this->date();?> · <?php $this->category( ',', false );?> · <?php Postviews( $this);?> · <?php $this->commentsNum('暂无评论', '%d 评论'); ?></p>
        </div>
</div>

<?php if($this->hidden): ?>

        <article class="container">
        <div class="postcc">
        <?php
        $pattern = '/<\s*img[\s\S]+?(?:src=[\'"]([\S\s]*?)[\'"]\s*|alt=[\'"]([\S\s]*?)[\'"]\s*|[a-z]+=[\'"][\S\s]*?[\'"]\s*)+[\s\S]*?>/i';
        $replacement = '<a href="$1" data-fancybox="gallery" data-caption="$2"/><img src="$1" alt="$2" title="点击放大图片"></a>';
        $content = preg_replace($pattern, $replacement, $this->content);
        echo $content;
?>
</div>
<?php if ($this->options->dianzan !== '0'): ?>    
<?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>
<div class="post_praise"> 
<button class="post_praise_btn zan_btn" <?php echo $agree['recording']?'disabled':''; ?> type="button" id="agree-btn" data-cid="<?php echo $this->cid; ?>" data-url="<?php $this->permalink(); ?>">赞
<small class="smanll">(<span class="agree-num"><?php echo $agree['agree']; ?></span>)</small>
</button> 
</div>    
<?php endif; ?>
    
<div class="father_tags">
      <div class="keywords"><?php $this->tags(' ', true, ''); ?></div>
      <div class="right_tags">
         <details><summary>最后更新</summary>  <p><?php echo date('Y/m/d' , $this->modified); ?></p></details>
      
      </div>
</div>
</article>
		</div>
<?php else: ?>    
<article class="container">
<div class="postcc">
<?php
    $pattern = '/<\s*img[\s\S]+?(?:src=[\'"]([\S\s]*?)[\'"]\s*|alt=[\'"]([\S\s]*?)[\'"]\s*|[a-z]+=[\'"][\S\s]*?[\'"]\s*)+[\s\S]*?>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" data-caption="$2"/><img src="$1" alt="$2" title="点击放大图片"></a>';
    $content = preg_replace($pattern, $replacement, $this->content);
    echo $content;
?>
</div>
<?php if ($this->options->dianzan !== '0'): ?>    
<?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>
<div class="post_praise"> 
<button class="post_praise_btn zan_btn" style="display: inline-block;" <?php echo $agree['recording']?'disabled':''; ?> type="button" id="agree-btn" data-cid="<?php echo $this->cid; ?>" data-url="<?php $this->permalink(); ?>">赞
<small class="smanll"><span class="agree-num"><?php echo $agree['agree']; ?></span></small>
</button> 
<button id="rewardButton" style="display: inline-block;" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}">
    <span>打赏</span>
    </button>
    <div id="QR" style="display: none;">
        <div id="wechat" style="display: inline-block">
            <a class="fancybox" rel="group"><img id="wechat_qr" src="<?php $this->options->WxUrl() ?>" alt="WeChat Pay"></a>
            <p>
                微信打赏
            </p>
        </div>
        <div id="alipay" style="display: inline-block">
            <a class="fancybox" rel="group"><img id="alipay_qr" src="<?php $this->options->ZfbUrl() ?>" alt="Alipay"></a>
            <p>
                支付宝打赏
            </p>
        </div>
    </div>
</div>    
<?php endif; ?>
<div class="father_tags">
      <div class="keywords"><?php $this->tags(' ', true, ''); ?></div>
      <div class="right_tags">
         <details><summary>最后更新</summary>  <p><?php echo date('Y/m/d' , $this->modified); ?></p></details>
      
      </div>
</div>
</article>
<?php endif; ?>
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