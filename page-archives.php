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
<article id="page_achives" class="container">
    <div class="postcc">
<div class="tags_culd">
        <h3>统计</h3>
    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
    <div class="tags_culd_list">
<li>文章总数：<?php $stat->publishedPostsNum() ?>篇</li>
<li>分类总数：<?php $stat->categoriesNum() ?>个</li>
<li>评论总数：<?php $stat->publishedCommentsNum() ?>条</li>
<li>页面总数：<?php $stat->publishedPagesNum() ?>个</li>
    </div>
    <h3>标签云</h3>
    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
    <div class="tags_culd_list">
        <?php if($tags->have()): ?>
        <?php while ($tags->next()): ?>
        <li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
    <h3 style="margin-bottom:.5em;">文章归档</h3>
    <div class="page-ach">
<?php  if ($this->options->zhaikai):?>
	<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
				$year=0; $mon=0; $i=0; $j=0;
				$output = '<details  open>';
				while($archives->next()):
					$year_tmp = date('Y',$archives->created);
					$mon_tmp = date('m',$archives->created);
					$y=$year; $m=$mon;
					if ($mon != $mon_tmp && $mon > 0) $output .= '</div>';
					if ($year != $year_tmp && $year > 0) $output .= '</div>';
					if ($year != $year_tmp) {
						$year = $year_tmp;
					}
					if ($mon != $mon_tmp) {
						$mon = $mon_tmp;
						$output .= '<summary style="font-size:1.8em;font-weight: 700;">'.date('Y 年 m 月',$archives->created).'</summary><ul>';
					}
				$output .= '<li>'.date('m-d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
				endwhile;
			echo $output .= '</ul></details>';
	?>
<?php else: ?>  			
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
				$year=0; $mon=0; $i=0; $j=0;
				$output = '<details>';
				while($archives->next()):
					$year_tmp = date('Y',$archives->created);
					$mon_tmp = date('m',$archives->created);
					$y=$year; $m=$mon;
					if ($mon != $mon_tmp && $mon > 0) $output .= '</div>';
					if ($year != $year_tmp && $year > 0) $output .= '</div>';
					if ($year != $year_tmp) {
						$year = $year_tmp;
					}
					if ($mon != $mon_tmp) {
						$mon = $mon_tmp;
						$output .= '<summary style="font-size:1.8em;font-weight: 700;">'.date('Y 年 m 月',$archives->created).'</summary><ul>';
					}
				$output .= '<li>'.date('m-d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
				endwhile;
			echo $output .= '</ul></details>';
	?>
	<?php endif; ?>    
</div>
</div>
</article>
<?php $this->need('footer.php'); ?>