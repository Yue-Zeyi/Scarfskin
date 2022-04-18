<?php
/**
 * 归档
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
<article id="page_achives" class="container postcc">
<div class="tags_culd">
    <h2>标签云</h2>
    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
    <div class="tags_culd_list">
        <?php if($tags->have()): ?>
        <?php while ($tags->next()): ?>
        <li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<div class="page-ach">
<?php
$this->widget('Widget_Contents_Post_Recent', 'pageSize='.Typecho_Widget::widget('Widget_Stat')->publishedPostsNum)->to($archives);
$year=0;
$output = '<div id="archives">';
while($archives->next()){
    $year_tmp = date('Y',$archives->created);
	if ($year > $year_tmp) {
		$output .= '</ul>';
	}
	if ($year != $year_tmp) {
		$year = $year_tmp;
		$output .= '<h3>'.date('Y 年 m 月',$archives->created).'</h3><ul>';
	}
	else {
		$output .= '<li>'.date('m-d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
	}
}
$output .= '</ul></div>';
echo $output;
?>
</div>


</article>
</div>
<?php $this->need('footer.php'); ?>