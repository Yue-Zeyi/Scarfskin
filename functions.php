<?php
error_reporting(0);
define('INITIAL_VERSION_NUMBER', '2.5.3');
if (Helper::options()->GravatarUrl) define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->GravatarUrl);
function themeConfig($form) {
	//备份开始
	$db = Typecho_Db::get();
	$sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Scarfskin'));
	$ysj = $sjdq['value'];
	if(isset($_POST['type'])) {
		if($_POST["type"]=="备份模板数据") {
			if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Scarfskinbf'))) {
				$update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:Scarfskinbf');
				$updateRows= $db->query($update);
				echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
				?>    
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">立即刷新</a></div>
				<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
				</script>
				<?php
			} else {
				if($ysj) {
					$insert = $db->insert('table.options')
					    ->rows(array('name' => 'theme:Scarfskinbf','user' => '0','value' => $ysj));
					$insertId = $db->query($insert);
					echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
					?>    
					<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">立即刷新</a></div>
					<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
					</script>
					<?php
				}
			}
		}
		if($_POST["type"]=="还原模板数据") {
			if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Scarfskinbf'))) {
				$sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Scarfskinbf'));
				$bsj = $sjdub['value'];
				$update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:Scarfskin');
				$updateRows= $db->query($update);
				echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
				?>    
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">立即刷新</a></div>
				<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);
				</script>
				<?php
			} else {
				echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
			}
		}
		if($_POST["type"]=="删除备份数据") {
			if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Scarfskinbf'))) {
				$delete = $db->delete('table.options')->where ('name = ?', 'theme:Scarfskinbf');
				$deletedRows = $db->query($delete);
				echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
				?>    
				<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
				<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);
				</script>
				<?php
			} else {
				echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
			}
		}
	}
	echo '<form class="protected" action="?Scarfskinbf" method="post">
<input type="submit" name="type" class="btn btn-s btn-warn" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s primary" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';
	//备份结束
	$logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点标题 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以显示网站标题 LOGO'));
	$form->addInput($logoUrl);
	$customTitle = new Typecho_Widget_Helper_Form_Element_Text('customTitle', NULL, NULL, _t('自定义文字LOGO'), _t('仅用于替换页面头部位置的“标题”显示，和Typecho后台设置的站点名称不冲突，留空则显示默认站点名称'));
	$form->addInput($customTitle);
	$titleForm = new Typecho_Widget_Helper_Form_Element_Radio('titleForm', 
		array('title' => _t('显示文字LOGO'),
		'logo' => _t('显示图片LOGO')),
		'title', _t('站点标题显示形式'), _t('默认显示文字标题，若要显示LOGO，请在上方添加 LOGO 地址并开启'));
	$form->addInput($titleForm);
	$Dbanner = new Typecho_Widget_Helper_Form_Element_Radio('Dbanner', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('顶部Banner图'), _t('默认关闭，启用则会显示顶部大图且须填写下方标题信息'));
	$form->addInput($Dbanner);
	$bannerUrl = new Typecho_Widget_Helper_Form_Element_Text('bannerUrl', NULL, NULL, _t('首页顶图地址'), _t('在这里填入一个图片 URL 地址, 显示顶部大图'));
	$form->addInput($bannerUrl);
	$bannera = new Typecho_Widget_Helper_Form_Element_Text('bannera', NULL, NULL, _t('首页顶图标题'), _t('在这里填写顶部大图内显示的标题'));
	$form->addInput($bannera);
	$bannerb = new Typecho_Widget_Helper_Form_Element_Text('bannerb', NULL, NULL, _t('首页顶图副标题'), _t('在这里填写顶部大图内标题下方描述文字'));
	$form->addInput($bannerb);
	$archiveUrl = new Typecho_Widget_Helper_Form_Element_Text('archiveUrl', NULL, NULL, _t('*全站顶图地址'), _t('在这里填入一个图片 URL 地址, 显示全站列表文章页面顶图【此处必须填写】'));
	$form->addInput($archiveUrl);
	$img_arr = new Typecho_Widget_Helper_Form_Element_Text('随机图', NULL, NULL, _t('*随机缩略图地址'), _t('在这里填入一个图片 URL 地址, 将为全站无图文章提供缩略图，此项建议必须填写，否则显示主题预览图'));
	$form->addInput($img_arr);
	$subTitle = new Typecho_Widget_Helper_Form_Element_Text('subTitle', NULL, NULL, _t('自定义站点副标题'), _t('浏览器副标题，仅在当前页面为首页时显示，显示格式为：<b>标题 - 副标题</b>，留空则不显示副标题'));
	$form->addInput($subTitle);
	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon 地址'), _t('在这里填入一个图片 URL 地址, 以添加一个Favicon，留空则不单独设置Favicon'));
	$form->addInput($favicon);
	$Searchd = new Typecho_Widget_Helper_Form_Element_Radio('Searchd', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('顶部搜索框显示'), _t('默认不显示，启用则会在导航栏显示搜索框(如分类较多且未合并显示开启后会错乱不建议开启)'));
	$form->addInput($Searchd);	
	$Navset = new Typecho_Widget_Helper_Form_Element_Checkbox('Navset', 
	array('ShowCategory' => _t('是否显示分类（关闭则导航栏不显示所有分类）'),
	'AggCategory' => _t('▶ 分类是否合并显示'),
	'ShowPage' => _t('是否显示页面（关闭则导航栏不显示所有页面）'),
	'AggPage' => _t('▶ 页面是否合并显示')),
	array('ShowCategory', 'AggCategory', 'ShowPage'), _t('导航栏显示'), _t('注：默认会显示合并的分类，且显示未合并页面'));
	$form->addInput($Navset->multiMode());

	$CategoryText = new Typecho_Widget_Helper_Form_Element_Text('CategoryText', NULL, NULL, _t('分类合并后显示的唯一名称'), _t('在这里输入导航栏<b>分类</b>下拉菜单的显示名称,留空则默认显示为“分类”'));
	$form->addInput($CategoryText);

	$PageText = new Typecho_Widget_Helper_Form_Element_Text('PageText', NULL, NULL, _t('页面合并后显示的唯一名称'), _t('在这里输入导航栏<b>页面</b>下拉菜单的显示名称,留空则默认显示为“其他”'));
	$form->addInput($PageText);
	$CustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义CSS样式'), _t('在这里填入你的自定义样式（直接填入css，无需&lt;style&gt;标签）'));
	$form->addInput($CustomCSS);
	$LicenseInfo = new Typecho_Widget_Helper_Form_Element_Text('LicenseInfo', NULL, NULL, _t('文章版权信息'), _t('填入后将在文章底部显示你填入的版权信息（支持HTML标签，输入数字“0”可关闭显示），留空则默认使用 (CC BY-SA 4.0)国际许可协议。'));
	$form->addInput($LicenseInfo);
	
	$dianzan = new Typecho_Widget_Helper_Form_Element_Radio('dianzan', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('赞赏功能'), _t('默认关闭，启用则会添加点赞和打赏按钮'));
	$form->addInput($dianzan);	
	$WxUrl = new Typecho_Widget_Helper_Form_Element_Text('WxUrl', NULL, NULL, _t('微信打赏二维码'), _t('打赏中使用的微信二维码图片URL,建议尺寸小于250×250,且为正方形,开启赞赏功能后生效。'));
	$form->addInput($WxUrl);
	$ZfbUrl = new Typecho_Widget_Helper_Form_Element_Text('ZfbUrl', NULL, NULL, _t('支付宝打赏二维码'), _t('打赏中使用的支付宝二维码图片URL,建议尺寸小于250×250,且为正方形,开启赞赏功能后生效。'));
	$form->addInput($ZfbUrl);		
	$Highlight = new Typecho_Widget_Helper_Form_Element_Radio('Highlight', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('代码高亮'), _t('默认关闭，启用则会渲染页面内代码块'));
	$form->addInput($Highlight);
	$Totop = new Typecho_Widget_Helper_Form_Element_Radio('Totop', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('返回顶部'), _t('默认关闭，启用则会显示返回顶部按钮'));
	$form->addInput($Totop);
	$zhaikai = new Typecho_Widget_Helper_Form_Element_Radio('zhaikai', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('归档展开'), _t('默认关闭，启用则会展开文章归档列表'));
	$form->addInput($zhaikai);	
	$Pjax = new Typecho_Widget_Helper_Form_Element_Radio('Pjax', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('Pjax预加速'), _t('默认关闭，启用则会开启主体内容预加载'));
	$form->addInput($Pjax);	
	$loading = new Typecho_Widget_Helper_Form_Element_Radio('loading', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('延时加载功能'), _t('默认关闭，启用则会显示页面加载动态图'));
	$form->addInput($loading);
	$loadingUrl = new Typecho_Widget_Helper_Form_Element_Text('loadingUrl', NULL, NULL, _t('自定义loading图'), _t('开启延时加载功能生效，在这里填入一个图片 URL 地址（gif格式）, 即可自定义加载loading动画,留空默认使用主题内置。'));
	$form->addInput($loadingUrl);	
	$node = new Typecho_Widget_Helper_Form_Element_Radio('node', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('强防扒站功能'), _t('默认关闭，启用则会禁用右键且无法修改窗口'));
	$form->addInput($node);
	$InsideLinksIcon = new Typecho_Widget_Helper_Form_Element_Radio('InsideLinksIcon', 
		array(1 => _t('启用'),
		0 => _t('关闭')),
		0, _t('显示内页友链图标'), _t('默认关闭，启用后友链页面链接将显示链接图标'));
	$form->addInput($InsideLinksIcon);
	$Emoji = new Typecho_Widget_Helper_Form_Element_Radio('Emoji',
	        array('able' => _t('启用'),
	            'disable' => _t('禁止'),
	        ),
	        'disable', _t('Emoji表情设置'), _t('默认显示Emoji表情，如果你的数据库charset配置不是utf8mb4请禁用'));
	$form->addInput($Emoji);
	$ICPbeian = new Typecho_Widget_Helper_Form_Element_Text('ICPbeian', NULL, NULL, _t('ICP备案号'), _t('在这里输入ICP备案号,留空则不显示'));
	$form->addInput($ICPbeian);
	$CustomContent = new Typecho_Widget_Helper_Form_Element_Textarea('CustomContent', NULL, NULL, _t('底部自定义内容'), _t('位于底部，footer之后body之前，适合放置一些JS内容，如网站统计代码等（若开启全站Pjax，目前支持Google和百度统计的回调，其余统计代码可能会不准确）'));
	$form->addInput($CustomContent);
}

function themeInit($archive) {
	$options = Helper::options();
	$options->commentsAntiSpam = false;
	if ($options->PjaxOption || FindContents('page-whisper.php', 'commentsNum', 'd')) {
		$options->commentsOrder = 'DESC';
		$options->commentsPageDisplay = 'first';
	}
	if ($archive->is('single')) {
		$archive->content = hrefOpen($archive->content);
		if ($options->AttUrlReplace) {
			$archive->content = UrlReplace($archive->content);
		}
		if ($archive->is('post') && (($options->catalog == 'post' && $archive->fields->catalog) || $options->catalog == 'open')) {
			$archive->content = createCatalog($archive->content);
		}
	}
}

function cjUrl($path) {
	$options = Helper::options();
	$ver = '?ver='.constant("INITIAL_VERSION_NUMBER");
	if ($options->cjcdnAddress) {
		echo rtrim($options->cjcdnAddress, '/').'/'.$path.$ver;
	} else {
		$options->themeUrl($path.$ver);
	}
}

function hrefOpen($obj) {
	return preg_replace('/<a\b([^>]+?)\bhref="((?!'.addcslashes(Helper::options()->index, '/._-+=#?&').'|\#).*?)"([^>]*?)>/i', '<a\1href="\2"\3 target="_blank">', $obj);
}

function UrlReplace($obj) {
	$list = explode(PHP_EOL, Helper::options()->AttUrlReplace);
	foreach ($list as $tmp) {
		list($old, $new) = explode('=', $tmp);
		$obj = str_replace($old, $new, $obj);
	}
	return $obj;
}

function Postviews($archive) {
	$db = Typecho_Db::get();
	$cid = $archive->cid;
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
	}
	$exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
	if ($archive->is('single')) {
		$cookie = Typecho_Cookie::get('contents_views');
		$cookie = $cookie ? explode(',', $cookie) : array();
		if (!in_array($cid, $cookie)) {
			$db->query($db->update('table.contents')
							->rows(array('views' => (int)$exist+1))
							->where('cid = ?', $cid));
			$exist = (int)$exist+1;
			array_push($cookie, $cid);
			$cookie = implode(',', $cookie);
			Typecho_Cookie::set('contents_views', $cookie);
		}
	}
	echo $exist == 0 ? '暂无阅读' : $exist.' 阅读';
}
function Breadcrumbs($archive) {
	$options = Helper::options();
	if (!empty($options->Breadcrumbs) && in_array('Pageshow', $options->Breadcrumbs)) {
		echo '<div class="breadcrumbs">'.PHP_EOL .'<a href="'.$options->siteUrl.'">首页</a> &raquo; '.$archive->title.PHP_EOL .'</div>'.PHP_EOL;
	}
}

function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {
	$options = Helper::options();
	$autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;
	$noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;
	if ($obj->url && $autoLink) {
		echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
	} else {
		echo $obj->author;
	}
}
function CommentAt($coid) {
	$db = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')->from('table.comments')
			->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($prow && $parent != '0') {
		$arow = $db->fetchRow($db->select('author')->from('table.comments')
					->where('coid = ? AND status = ?', $parent, 'approved'));
		echo '<b class="comment-at">@'.$arow['author'].'</b>';
	}
}
function Contents_Post_Initial($limit = 10, $order = 'created') {
	$db = Typecho_Db::get();
	$options = Helper::options();
	$posts = $db->fetchAll($db->select()->from('table.contents')
			->where('type = ? AND status = ? AND created < ?', 'post', 'publish', $options->time)
			->order($order, Typecho_Db::SORT_DESC)
			->limit($limit), array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
	if ($posts) {
		foreach($posts as $post) {
			echo '<li><a'.($post['hidden'] && $options->PjaxOption ? '' : ' href="'.$post['permalink'].'"').'>'.htmlspecialchars($post['title']).'</a></li>'.PHP_EOL;
		}
	} else {
		echo '<li>暂无文章</li>'.PHP_EOL;
	}
}
class Initial_Widget_Comments_Recent extends Widget_Abstract_Comments {
	public function __construct($request, $response, $params = NULL) {
		parent::__construct($request, $response, $params);
		$this->parameter->setDefault(array('pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
	}
	public function execute() {
		$select  = $this->select()->limit($this->parameter->pageSize)
				->where('table.comments.status = ?', 'approved')
				->order('table.comments.coid', Typecho_Db::SORT_DESC);
		if ($this->parameter->parentId) {
			$select->where('cid = ?', $this->parameter->parentId);
		}
		if ($this->options->commentsShowCommentOnly) {
			$select->where('type = ?', 'comment');
		}
		if ($this->parameter->ignoreAuthor) {
			$select->where('ownerId <> authorId');
		}
		$page_whisper = FindContents('page-whisper.php', 'commentsNum', 'd');
		if ($page_whisper) {
			$select->where('cid <> ? OR (cid = ? AND parent <> ?)', $page_whisper[0]['cid'], $page_whisper[0]['cid'], '0');
		}
		$this->db->fetchAll($select, array($this, 'push'));
	}
}
function FindContent($cid) {
	$db = Typecho_Db::get();
	return $db->fetchRow($db->select()->from('table.contents')
		->where('cid = ?', $cid)
		->limit(1), array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
}
function FindContents($val = NULL, $order = 'order', $sort = 'a', $publish = NULL) {
	$db = Typecho_Db::get();
	$sort = ($sort == 'a') ? Typecho_Db::SORT_ASC : Typecho_Db::SORT_DESC;
	$select = $db->select()->from('table.contents')
			->where('created < ?', Helper::options()->time)
			->order($order, $sort);
	if ($val) {
		$select->where('template = ?', $val);
	}
	if ($publish) {
		$select->where('status = ?','publish');
	}
	$content = $db->fetchAll($select, array(Typecho_Widget::widget('Widget_Abstract_Contents'), 'filter'));
	return empty($content) ? NULL : $content;
}
function Links($sorts = NULL, $icon = 0) {
	$db = Typecho_Db::get();
	$link = NULL;
	$list = NULL;
	$page_links = FindContents('page-links.php', 'order', 'a');
	if ($page_links) {
		$exist = $db->fetchRow($db->select()->from('table.fields')
					->where('cid = ? AND name = ?', $page_links[0]['cid'], 'links'));
		if (empty($exist)) {
			$db->query($db->insert('table.fields')
							->rows(array(
								'cid'           =>  $page_links[0]['cid'],
								'name'          =>  'links',
								'type'          =>  'str',
								'str_value'     =>  NULL,
								'int_value'     =>  0,
								'float_value'   =>  0
							)));
			return NULL;
		}
		$list = $exist['str_value'];
	}
	if ($list) {
		$list = explode(PHP_EOL, $list);
		foreach ($list as $val) {
			list($name, $url, $description, $logo, $sort) = explode(',', $val);
			if ($sorts) {
				$arr = explode(',', $sorts);
				if ($sort && in_array($sort, $arr)) {
					$link .= '<li><a'.($url ? ' href="'.$url.'"' : '').($icon==1&&$url ? ' class="l_logo"' : '').' title="'.$description.'" target="_blank">'.($icon==1&&$url ? '<img src="'.($logo ? $logo : rtrim($url, '/').'/favicon.ico').'" onerror="erroricon(this)">' : '').'<span>'.($url ? $name : '<del>'.$name.'</del>').'</span></a></li>'.PHP_EOL;
				}
			} else {
				$link .= '<li><a'.($url ? ' href="'.$url.'"' : '').($icon==1&&$url ? ' class="l_logo"' : '').' title="'.$description.'" target="_blank">'.($icon==1&&$url ? '<img src="'.($logo ? $logo : rtrim($url, '/').'/favicon.ico').'" onerror="erroricon(this)">' : '').'<span>'.($url ? $name : '<del>'.$name.'</del>').'</span></a></li>'.PHP_EOL;
			}
		}
	}
	echo $link ? $link : '<li>暂无链接</li>'.PHP_EOL;
}
function compressHtml($html_source) {
	$chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
	$compress = '';
	foreach ($chunks as $c) {
		if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
			$c = substr($c, 19, strlen($c) - 19 - 20);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
			$c = substr($c, 12, strlen($c) - 12 - 13);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, PHP_EOL) !== false || strpos($c, PHP_EOL) !== false)) {
			$tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
			$c = '';
			foreach ($tmps as $tmp) {
				if (strpos($tmp, '//') !== false) {
					if (substr(trim($tmp), 0, 2) == '//') {
						continue;
					}
					$chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
					$is_quot = $is_apos = false;
					foreach ($chars as $key => $char) {
						if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
							$is_quot = !$is_quot;
						} else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
							$is_apos = !$is_apos;
						} else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
							$tmp = substr($tmp, 0, $key);
							break;
						}
					}
				}
				$c .= $tmp;
			}
		}
		$c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
		$c = preg_replace('/\\s{2,}/', ' ', $c);
		$c = preg_replace('/>\\s</', '> <', $c);
		$c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
		$c = preg_replace('/<!--[^!]*-->/', '', $c);
		$compress .= $c;
	}
	return $compress;
}
function themeFields($layout) {
	$thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('自定义缩略图'), _t('在这里填入一个图片 URL 地址, 设置为本文的缩略图，不设置则调用文章内第一张图片，若文章内无任何图片将调用后台自定义缩略图。'));
	$thumb->input->setAttribute('class', 'w-100');
	$layout->addItem($thumb);
}
/** 输出文章缩略图 */
function postThumb($widget) {
	$random = $widget->widget('Widget_Options')->themeUrl . '/screenshot.png';
	$thumb = $widget->fields->thumb;
	$attach = $widget->attachments(1)->attachment;
	$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
	//自定义缩略图
	if ($thumb) {
		echo $thumb;
	} else if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
		echo $thumbUrl[1][0];
	} else   
	    //文章首图
	if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
		echo $thumbUrl[1][0];
	} else if ($attach->isImage) {
		echo $attach -> url;
	} else    
	    //自定义随机图
	if (Helper::options()->随机图) {
		$text = Helper::options()->随机图;
		echo $text;
	} else if ($attach->isImage) {
		echo $attach -> url;
	} else {
		echo $random;
	}
}
function parseContent($obj) {
	$options = Typecho_Widget::widget('Widget_Options');
	if(!empty($options->src_add) && !empty($options->cdn_add)) {
		$obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
	}
	$obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\" rel=\"nofollow\">", $obj->content);
	echo trim($obj->content);
}
function theme_random_posts() {
	$defaults = array(
	'number' => 12,
	'before' => '<ul>',
	'after' => '</ul>',
	'xformat' => '<li style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" title="{title}"><a href="{permalink}">{title}</a>
 </li>'
	);
	$db = Typecho_Db::get();
	$adapterName = $db->getAdapterName();
	if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
		$order_by = 'RANDOM()';
	} else {
		$order_by = 'RAND()';
	}
	$sql = $db->select()->from('table.contents')
	->where('status = ?','publish')
	->where('type = ?', 'post')
	->limit($defaults['number'])
	->order($order_by);
	$result = $db->fetchAll($sql);
	echo $defaults['before'];
	foreach($result as $val) {
		$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
		echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
	}
	echo $defaults['after'];
}
function getCommentAt($coid) {
	$db   = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')
	        ->from('table.comments')
	        ->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($parent != "0") {
		$arow = $db->fetchRow($db->select('author')
		            ->from('table.comments')
		            ->where('coid = ? AND status = ?', $parent, 'approved'));
		$author = $arow['author'];
		$href   = '<a href="#comment-'.$parent.'">@'.$author.'</a>';
		echo $href;
	} else {
		echo '';
	}
}
function showCommentContent($coid) {
	$db = Typecho_Db::get();
	$result = $db->fetchRow($db->select('text')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	$text = $result['text'];
	$atStr = commentAtContent($coid);
	$_content = Markdown::convert($text);
	//<p>
	if ($atStr !== '') {
		$content = substr_replace($_content, $atStr, 0, 3);
	} else {
		$content = $_content;
	}
	echo $content;
}
function commentAtContent($coid) {
	$db = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($parent != "0") {
		$arow = $db->fetchRow($db->select('author')->from('table.comments')
		            ->where('coid = ? AND status = ?', $parent, 'approved'));
		$author = $arow['author'];
		$href = '<p><a  href="#comment-' . $parent . '">@' . $author . '</a> ';
		return $href;
	} else {
		return '';
	}
}
function getBrowser($agent) {
	$outputer = false;
	if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
		$outputer = 'IE Browser';
	} else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Firefox/', $regs[0]);
		$FireFox_vern = explode('.', $str1[1]);
		$outputer = 'Firefox Browser '. $FireFox_vern[0];
	} else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Maxthon/', $agent);
		$Maxthon_vern = explode('.', $str1[1]);
		$outputer = 'Maxthon Browser '.$Maxthon_vern[0];
	} else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
		$outputer = 'Sogo Browser';
	} else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
		$outputer = '360 Browser';
	} else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Edge/', $regs[0]);
		$Edge_vern = explode('.', $str1[1]);
		$outputer = 'Edge '.$Edge_vern[0];
	} else if (preg_match('/EdgiOS([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('EdgiOS/', $regs[0]);
		$outputer = 'Edge';
	} else if (preg_match('/UC/i', $agent)) {
		$str1 = explode('rowser/',  $agent);
		$UCBrowser_vern = explode('.', $str1[1]);
		$outputer = 'UC Browser '.$UCBrowser_vern[0];
	} else if (preg_match('/OPR/i', $agent)) {
		$str1 = explode('OPR/',  $agent);
		$opr_vern = explode('.', $str1[1]);
		$outputer = 'Open Browser '.$opr_vern[0];
	} else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
		$outputer = 'Weixin Browser';
	} else if (preg_match('/WeiBo/i', $agent, $regs)) {
		$outputer = 'WeiBo Browser';
	} else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQ Browser\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('rowser/',  $agent);
		$QQ_vern = explode('.', $str1[1]);
		$outputer = 'QQ Browser '.$QQ_vern[0];
	} else if (preg_match('/MQBHD/i', $agent, $regs)) {
		$str1 = explode('MQBHD/',  $agent);
		$QQ_vern = explode('.', $str1[1]);
		$outputer = 'QQ Browser '.$QQ_vern[0];
	} else if (preg_match('/BIDU/i', $agent, $regs)) {
		$outputer = 'Baidu Browser';
	} else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
		$outputer = 'KS Browser';
	} else if (preg_match('/TheWorld/i', $agent, $regs)) {
		$outputer = 'TheWorld Browser';
	} else if (preg_match('/XiaoMi/i', $agent, $regs)) {
		$outputer = 'XiaoMi Browser';
	} else if (preg_match('/UBrowser/i', $agent, $regs)) {
		$str1 = explode('rowser/',  $agent);
		$UCBrowser_vern = explode('.', $str1[1]);
		$outputer = 'UCBrowser '.$UCBrowser_vern[0];
	} else if (preg_match('/mailapp/i', $agent, $regs)) {
		$outputer = 'Email Browser';
	} else if (preg_match('/2345Explorer/i', $agent, $regs)) {
		$outputer = '2345 Browser';
	} else if (preg_match('/Sleipnir/i', $agent, $regs)) {
		$outputer = 'Sleipnir Browser';
	} else if (preg_match('/YaBrowser/i', $agent, $regs)) {
		$outputer = 'Yandex Browser';
	} else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
		$outputer = 'Opera Browser';
	} else if (preg_match('/MZBrowser/i', $agent, $regs)) {
		$outputer = 'MZ Browser';
	} else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
		$outputer = 'Vivo Browser';
	} else if (preg_match('/Quark/i', $agent, $regs)) {
		$outputer = 'Quark Browser';
	} else if (preg_match('/mixia/i', $agent, $regs)) {
		$outputer = 'Mixia Browser';
	} else if (preg_match('/fusion/i', $agent, $regs)) {
		$outputer = 'Fusion';
	} else if (preg_match('/CoolMarket/i', $agent, $regs)) {
		$outputer = 'CoolMarket Browser';
	} else if (preg_match('/Thunder/i', $agent, $regs)) {
		$outputer = 'Thunder Browser';
	} else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Chrome/', $agent);
		$chrome_vern = explode('.', $str1[1]);
		$outputer = 'Chrome '.$chrome_vern[0];
	} else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
		$str1 = explode('Version/',  $agent);
		$safari_vern = explode('.', $str1[1]);
		$outputer = 'Safari '.$safari_vern[0];
	} else {
		return false;
	}
	return $outputer;
}
function getOs($agent) {
	$os = false;
	if (preg_match('/win/i', $agent)) {
		if (preg_match('/nt 6.0/i', $agent)) {
			$os = 'Windows Vista';
		} else if (preg_match('/nt 6.1/i', $agent)) {
			$os = 'Windows 7';
		} else if (preg_match('/nt 6.2/i', $agent)) {
			$os = 'Windows 8';
		} else if(preg_match('/nt 6.3/i', $agent)) {
			$os = 'Windows 8.1';
		} else if(preg_match('/nt 5.1/i', $agent)) {
			$os = 'Windows XP';
		} else if (preg_match('/nt 10.0/i', $agent)) {
			$os = 'Windows 10';
		} else {
			$os = 'Windows';
		}
	} else if (preg_match('/android/i', $agent)) {
		if (preg_match('/android 9/i', $agent)) {
			$os = 'Android P';
		} else if (preg_match('/android 8/i', $agent)) {
			$os = 'Android O';
		} else if (preg_match('/android 7/i', $agent)) {
			$os = 'Android N';
		} else if (preg_match('/android 6/i', $agent)) {
			$os = 'Android M';
		} else if (preg_match('/android 5/i', $agent)) {
			$os = 'Android L';
		} else {
			$os = 'Android';
		}
	} else if (preg_match('/ubuntu/i', $agent)) {
		$os = 'Linux';
	} else if (preg_match('/linux/i', $agent)) {
		$os = 'Linux';
	} else if (preg_match('/iPhone/i', $agent)) {
		$os = 'iPhone';
	} else if (preg_match('/iPad/i', $agent)) {
		$os = 'iPad';
	} else if (preg_match('/mac/i', $agent)) {
		$os = 'OSX';
	} else if (preg_match('/cros/i', $agent)) {
		$os = 'Chrome os';
	} else {
		return false;
	}
	return $os;
}
function agreeNum($cid) {
	$db = Typecho_Db::get();
	$prefix = $db->getPrefix();
	if (!array_key_exists('agree', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 0;');
	}
	$agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
	$AgreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
	if (empty($AgreeRecording)) {
		Typecho_Cookie::set('typechoAgreeRecording', json_encode(array(0)));
	}
	return array(
	'agree' => $agree['agree'],
	'recording' => in_array($cid, json_decode(Typecho_Cookie::get('typechoAgreeRecording')))?true:false
	    );
}
function agree($cid) {
	$db = Typecho_Db::get();
	$agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
	$agreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
	if (empty($agreeRecording)) {
		Typecho_Cookie::set('typechoAgreeRecording', json_encode(array($cid)));
	} else {
		$agreeRecording = json_decode($agreeRecording);
		if (in_array($cid, $agreeRecording)) {
			return $agree['agree'];
		}
		array_push($agreeRecording, $cid);
		Typecho_Cookie::set('typechoAgreeRecording', json_encode($agreeRecording));
	}
	$db->query($db->update('table.contents')->rows(array('agree' => (int)$agree['agree'] + 1))->where('cid = ?', $cid));
	$agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
	return $agree['agree'];
}
/*短代码*/
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('myyodu', 'one');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('myyodu', 'one');
class myyodu {
    public static function one()
    {
    ?>
<style>
.field.is-grouped{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;  -ms-flex-wrap: wrap;flex-wrap: wrap;}.field.is-grouped>.control{-ms-flex-negative:0;flex-shrink:0}.field.is-grouped>.control:not(:last-child){margin-bottom:.5rem;margin-right:.75rem}.field.is-grouped>.control.is-expanded{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-negative:1;flex-shrink:1}.field.is-grouped.is-grouped-centered{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.field.is-grouped.is-grouped-right{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}.field.is-grouped.is-grouped-multiline{-ms-flex-wrap:wrap;flex-wrap:wrap}.field.is-grouped.is-grouped-multiline>.control:last-child,.field.is-grouped.is-grouped-multiline>.control:not(:last-child){margin-bottom:.75rem}.field.is-grouped.is-grouped-multiline:last-child{margin-bottom:-.75rem}.field.is-grouped.is-grouped-multiline:not(:last-child){margin-bottom:0}.tags{-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start}.tags .tag{margin-bottom:.5rem}.tags .tag:not(:last-child){margin-right:.5rem}.tags:last-child{margin-bottom:-.5rem}.tags:not(:last-child){margin-bottom:1rem}.tags.has-addons .tag{margin-right:0}.tags.has-addons .tag:not(:first-child){border-bottom-left-radius:0;border-top-left-radius:0}.tags.has-addons .tag:not(:last-child){border-bottom-right-radius:0;border-top-right-radius:0}.tag{-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#f5f5f5;border-radius:3px;color:#4a4a4a;display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;font-size:.75rem;height:2em;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;line-height:1.5;padding-left:.75em;padding-right:.75em;white-space:nowrap}.tag .delete{margin-left:.25em;margin-right:-.375em}.tag.is-white{background-color:#fff;color:#0a0a0a}.tag.is-black{background-color:#0a0a0a;color:#fff}.tag.is-light{background-color:#fff;color:#363636}.tag.is-dark{background-color:#363636;color:#f5f5f5}.tag.is-primary{background-color:#00d1b2;color:#fff}.tag.is-info{background-color:#3273dc;color:#fff}.tag.is-success{background-color:#23d160;color:#fff}.tag.is-warning{background-color:#ffdd57;color:rgba(0,0,0,.7)}.tag.is-danger{background-color:#ff3860;color:#fff}.tag.is-large{font-size:1.25rem}.tag.is-delete{margin-left:1px;padding:0;position:relative;width:2em}.tag.is-delete:after,.tag.is-delete:before{background-color:currentColor;content:"";display:block;left:50%;position:absolute;top:50%;-webkit-transform:translateX(-50%) translateY(-50%) rotate(45deg);transform:translateX(-50%) translateY(-50%) rotate(45deg);-webkit-transform-origin:center center;transform-origin:center center}.tag.is-delete:before{height:1px;width:50%}.tag.is-delete:after{height:50%;width:1px}.tag.is-delete:focus,.tag.is-delete:hover{background-color:#e8e8e8}.tag.is-delete:active{background-color:#dbdbdb}.tag.is-rounded{border-radius:290486px}
</style>
<script language="javascript">
    var EventUtil = function() {};
    EventUtil.addEventHandler = function(obj, EventType, Handler) {
        if (obj.addEventListener) {
            obj.addEventListener(EventType, Handler, false);
        }
        else if (obj.attachEvent) {
            obj.attachEvent('on' + EventType, Handler);
        } else {
            obj['on' + EventType] = Handler;
        }
    }
    if (document.getElementById("text")) {
        EventUtil.addEventHandler(document.getElementById('text'), 'propertychange', CountChineseCharacters);
        EventUtil.addEventHandler(document.getElementById('text'), 'input', CountChineseCharacters);
    }
    function showit(Word) {
        alert(Word);
    }
    function CountChineseCharacters() {
        Words = document.getElementById('text').value;
        var W = new Object();
        var Result = new Array();
        var iNumwords = 0;
        var sNumwords = 0;
        var sTotal = 0;
        var iTotal = 0;
        var eTotal = 0;
        var otherTotal = 0;
        var bTotal = 0;
        var inum = 0;
      var znum = 0;
      var gl = 0;
      var paichu = 0;
        for (i = 0; i < Words.length; i++) {
            var c = Words.charAt(i);
            if (c.match(/[\u4e00-\u9fa5]/) || c.match(/[\u0800-\u4e00]/) || c.match(/[\uac00-\ud7ff]/)) {
                if (isNaN(W[c])) {
                    iNumwords++;
                    W[c] = 1;
                }
                iTotal++;
            }
        }
        for (i = 0; i < Words.length; i++) {
            var c = Words.charAt(i);
            if (c.match(/[^\x00-\xff]/)) {
                if (isNaN(W[c])) {
                    sNumwords++;
                }
                sTotal++;
            } else {
                eTotal++;
            }
            if (c.match(/[0-9]/)) {
                inum++;
            }
           if (c.match(/[a-zA-Z]/)) {
                znum++;
            }
          if (c.match(/[\s]/)) {
               gl++;
            }
           if (c.match(/[　◕‿↑↓←→↖↗↘↙↔↕。《》、【】“”•‘’❝❞′……—―‐〈〉„╗╚┐└‖〃「」‹›『』〖〗〔〕∶〝〞″≌∽≦≧≒≠≤≥㏒≡≈✓✔◐◑◐◑✕✖★☆₸₹€₴₰₤₳र₨₲₪₵₣₱฿₡₮₭₩₢₧₥₫₦₠₯○㏄㎏㎎㏎㎞㎜㎝㏕㎡‰〒々℃℉ㄅㄆㄇㄈㄉㄊㄋㄌㄍㄎㄏㄐㄑㄒㄓㄔㄕㄖㄗㄘㄙㄚㄛㄜㄝㄞㄟㄠㄡㄢㄣㄤㄥㄦㄧㄨㄩ]/)) {
               paichu++;
            }
        }
        document.getElementById('hanzi').innerText = iTotal - paichu;
        document.getElementById('zishu').innerText = inum + iTotal - paichu;
        document.getElementById('biaodian').innerText = sTotal - iTotal + eTotal - inum - znum - gl + paichu;
        document.getElementById('zimu').innerText = znum;
        document.getElementById('shuzi').innerText = inum;
        document.getElementById("zifu").innerHTML = iTotal * 2 + (sTotal - iTotal) * 2 + eTotal;
    }
</script>
<script> 
$(document).ready(function(){
$("#wmd-editarea").append('<div class="field is-grouped"><span class="tag">共计：</span><div class="control"><div class="tags has-addons"><span class="tag is-dark" id="zishu">0</span> <span class="tag is-primary">个字数</span></div></div><div class="control"><div class="tags has-addons"><span class="tag is-dark" id="zifu">0</span> <span class="tag is-primary">个字符</span></div></div><span class="tag">包含：</span><div class="control"><div class="tags has-addons"><span class="tag is-light" id="hanzi">0</span> <span class="tag is-danger">个文字</span></div></div><div class="control"><div class="tags has-addons"><span class="tag is-light" id="biaodian">0</span> <span class="tag is-info">个符号</span></div></div><div class="control"><div class="tags has-addons"><span class="tag is-light" id="zimu">0</span> <span class="tag is-success">个字母</span></div></div><div class="control"><div class="tags has-addons"><span class="tag is-light" id="shuzi">0</span> <span class="tag is-warning">个数字</span></div></div></div>');
CountChineseCharacters();
});
</script>
<?php
    }
}