<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
	exit;
}
?>
<!DOCTYPE HTML>
<html xml:lang="zh-CN" lang="zh-CN">

<head>
<meta http-equiv="Content-Type" content="text/html;"/>
<meta charset="<?php $this->options->charset();?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<!-- 强制Chromium内核，作用于360浏览器、QQ浏览器等国产双核浏览器 -->
<meta name="renderer" content="webkit" />
<!-- 强制Chromium内核，作用于其他双核浏览器 -->
<meta name="force-rendering" content="webkit" />
<!-- 如果有安装 Google Chrome Frame 插件则强制为Chromium内核，否则强制本机支持的最高版本IE内核，作用于IE浏览器 -->
<?php if ($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon();?>" />
<?php endif;?>
<title><?php $this->archiveTitle(array(
'category' => _t('分类 %s 下的文章'),
'search' => _t('包含关键字 %s 的文章'),
'tag' => _t('标签 %s 下的文章'),
'date' => _t('在 %s 发布的文章'),
'author' => _t('作者 %s 发布的文章'),), '', ' - ');?>
<?php $this->options->title();if ($this->is('index') && $this->options->subTitle): ?> - <?php $this->options->subTitle();endif;?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css');?>">
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom=');?>
<?php if ($this->options->CustomCSS): ?>
<style type="text/css"><?php $this->options->CustomCSS();?></style>
<?php endif;?>
</head>
<header id="headerTop" style="position: sticky;">
    <script>function Navswith(){document.getElementById("header").classList.toggle("on")}</script>
    <nav class="navbar">
            <a id="nava" href="<?php $this->options->siteUrl();?>" class="nav-logo">
            <?php if ($this->options->logoUrl && ($this->options->titleForm == 'logo' || $this->options->titleForm == 'all')): ?><img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" /><?php endif; ($this->options->titleForm == 'logo' && $this->options->logoUrl) ? '' : ($this->options->customTitle ? $this->options->customTitle() : $this->options->title()) ?>
         </a>
        <div class="menu topnav" >
            <ul class="nav-menu" style="z-index:999">
                <li class="nav-item"><a class="nav-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <?php if (!empty($this->options->Navset) && in_array('ShowCategory', $this->options->Navset)): if (in_array('AggCategory', $this->options->Navset)): ?>
                <li class="nav-item menu-parent"><a class="nav-link"><?php echo $this->options->CategoryText ? $this->options->CategoryText : '分类' ?></a>
            <ul>
<?php
endif;
$this->widget('Widget_Metas_Category_List')->to($categorys);
while($categorys->next()):
if ($categorys->levels == 0):
$children = $categorys->getAllChildren($categorys->mid);
if (empty($children)):
?>
                <li class="nav-item"><a class="nav-link" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
<?php else: ?>
                <li class="menu-parent"><a class="nav-link" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
            <ul class="menu-child">
<?php foreach ($children as $mid) {
$child = $categorys->getCategory($mid); ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a></li>
<?php } ?>
            </ul>
                </li>
<?php
endif;
endif;
endwhile;
?>
<?php if (in_array('AggCategory', $this->options->Navset)): ?>
            </ul>
                </li>
<?php
endif;
endif;
if (!empty($this->options->Navset) && in_array('ShowPage', $this->options->Navset)):
if (in_array('AggPage', $this->options->Navset)):
?>
                <li class="nav-item menu-parent"><a class="nav-link"><?php echo $this->options->PageText ? $this->options->PageText : '其他' ?></a>
            <ul>
<?php
endif;
$this->widget('Widget_Contents_Page_List')->to($pages);
while($pages->next()):
?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                </li>
<?php endwhile;
if (in_array('AggPage', $this->options->Navset)): ?>
            </ul>
                </li>
<?php endif;
endif; ?>
        <?php  if ($this->options->Searchd):?>
            <li class="nav-item">
<div class="search d3">
    <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
        <input type="text" id="s" name="s" placeholder="请输入内容..." required />
        <button type="submit"></button>
    </form>
</div>
                </li>
        <?php endif; ?>
            </ul>
            <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
            </div>
        </div>
    </nav>                
</header>
<?php  if ($this->options->loading):?>
<div class="loading-div">
    <img src="<?php echo $this->options->loadingUrl ? $this->options->loadingUrl : 'https://pic.zeyiwl.cn/yunimg/20220418204145.gif' ?>"/>
    </div>
<?php endif; ?>
<body>
     
