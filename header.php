<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset();?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"/>
    <?php if ($this->options->favicon): ?>
    <link rel="shortcut icon" href="<?php $this->options->favicon();?>" />
    <?php endif;?>
    <title><?php $this->archiveTitle(array(
	'category' => _t('分类 %s 下的文章'),
	'search' => _t('包含关键字 %s 的文章'),
	'tag' => _t('标签 %s 下的文章'),
	'date' => _t('在 %s 发布的文章'),
	'author' => _t('作者 %s 发布的文章'),), '', ' - ');?><?php $this->options->title();if ($this->is('index') && $this->options->subTitle): ?> - <?php $this->options->subTitle();endif;?></title>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css');?>">
    <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom=');?>
    <?php if ($this->options->CustomCSS): ?>
    <style type="text/css"><?php $this->options->CustomCSS();?></style>
    <?php endif;?>
    <?php $this->header();?>
    </head>
    <header id="headerTop" style="position: sticky;">
    <nav class="navbar">
        <a id="nava" href="<?php $this->options->siteUrl();?>" class="nav-logo">
            <?php if ($this->options->logoUrl && ($this->options->titleForm == 'logo' || $this->options->titleForm == 'all')): ?><img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" /><?php endif; ($this->options->titleForm == 'logo' && $this->options->logoUrl) ? '' : ($this->options->customTitle ? $this->options->customTitle() : $this->options->title()) ?>
        </a>
        <ul class="nav-menu" style="z-index:999">
            <li class="nav-item"><a class="nav-link" href="<?php $this->options->siteUrl();?>"><?php _e('首页');?></a></li>
            <?php $this->widget('Widget_Metas_Category_List')
	->parse('<li class="nav-item"><a class="nav-link" href="{permalink}">{name}</a></li>');?>
            <?php if (!empty($this->options->sidebarCategory) && in_array('onTopNav', $this->options->sidebarCategory)): ?>
            <?php $this->widget('Widget_Metas_Category_List')->to($categorys);?>
            <?php while ($categorys->next()): ?>
            <li class="nav-item"><a class="nav-link" href="<?php $categorys->permalink();?>" title="<?php $categorys->description();?>"><?php $categorys->name();?></a></li>
            <?php endwhile;?><?php endif;?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages);?>
            <?php while ($pages->next()): ?><?php if (!($pages->template == 'page-status.php')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php $pages->permalink();?>" title="<?php $pages->title();?>"><?php $pages->title();?></a></li>
            <?php endif;?><?php endwhile;?>
            </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </header>
        <?php  if ($this->options->loading):?>
        <div class="loading-div">
        <img src="<?php $this->options->themeUrl('loading.gif');?>"/>
        </div>
        <?php endif; ?>
        <body>    