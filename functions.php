<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);
define('INITIAL_VERSION_NUMBER', '2.5.3');
if (Helper::options()->GravatarUrl) define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->GravatarUrl);

function themeConfig($form) {
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
	
	$bannerUrl = new Typecho_Widget_Helper_Form_Element_Text('bannerUrl', NULL, NULL, _t('顶部大图地址'), _t('在这里填入一个图片 URL 地址, 显示顶部大图'));
	$form->addInput($bannerUrl);
	
	$bannera = new Typecho_Widget_Helper_Form_Element_Text('bannera', NULL, NULL, _t('顶部大图标题'), _t('在这里填写顶部大图内显示的标题'));
	$form->addInput($bannera);
	
	$bannerb = new Typecho_Widget_Helper_Form_Element_Text('bannerb', NULL, NULL, _t('顶部大图副标题'), _t('在这里填写顶部大图内标题下方描述文字'));
	$form->addInput($bannerb);

	$archiveUrl = new Typecho_Widget_Helper_Form_Element_Text('archiveUrl', NULL, NULL, _t('文章列表顶图地址'), _t('在这里填入一个图片 URL 地址, 显示列表文章页面顶图【此处必须填写】'));
	$form->addInput($archiveUrl);
	
	$img_arr = new Typecho_Widget_Helper_Form_Element_Text('随机图', NULL, NULL, _t('随机缩略图地址'), _t('在这里填入一个图片 URL 地址, 将为全站无图文章提供缩略图，也可以使用随机图片API'));
	$form->addInput($img_arr);

	$subTitle = new Typecho_Widget_Helper_Form_Element_Text('subTitle', NULL, NULL, _t('自定义站点副标题'), _t('浏览器副标题，仅在当前页面为首页时显示，显示格式为：<b>标题 - 副标题</b>，留空则不显示副标题'));
	$form->addInput($subTitle);

	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon 地址'), _t('在这里填入一个图片 URL 地址, 以添加一个Favicon，留空则不单独设置Favicon'));
	$form->addInput($favicon);

	$CustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义CSS样式'), _t('在这里填入你的自定义样式（直接填入css，无需&lt;style&gt;标签）'));
	$form->addInput($CustomCSS);

	$LicenseInfo = new Typecho_Widget_Helper_Form_Element_Text('LicenseInfo', NULL, NULL, _t('文章版权信息'), _t('填入后将在文章底部显示你填入的版权信息（支持HTML标签，输入数字“0”可关闭显示），留空则默认使用 (CC BY-SA 4.0)国际许可协议。'));
	$form->addInput($LicenseInfo);
	
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
	
	$loading = new Typecho_Widget_Helper_Form_Element_Radio('loading', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('延时加载功能'), _t('默认关闭，启用则会禁用F12和右键'));
	$form->addInput($loading);
	
	$node = new Typecho_Widget_Helper_Form_Element_Radio('node', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('防扒站功能'), _t('默认关闭，启用则会延时加载loading...'));
	$form->addInput($node);

	$InsideLinksIcon = new Typecho_Widget_Helper_Form_Element_Radio('InsideLinksIcon', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('显示友链图标（内页）'), _t('默认关闭，启用后友链页面链接将显示链接图标'));
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

function createCatalog($obj) {
	global $catalog;
	global $catalog_count;
	$catalog = array();
	$catalog_count = 0;
	$obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
		global $catalog;
		global $catalog_count;
		$catalog_count ++;
		$catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
		return '<h'.$obj[1].$obj[2].'><a class="cl-offset" name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
	}, $obj);
	return $obj.PHP_EOL .getCatalog();
}

function getCatalog() {
	global $catalog;
	$index = '';
	if ($catalog) {
		$index = '<ul>'.PHP_EOL;
		$prev_depth = '';
		$to_depth = 0;
		foreach($catalog as $catalog_item) {
			$catalog_depth = $catalog_item['depth'];
			if ($prev_depth) {
				if ($catalog_depth == $prev_depth) {
					$index .= '</li>'.PHP_EOL;
				} elseif ($catalog_depth > $prev_depth) {
					$to_depth++;
					$index .= PHP_EOL .'<ul>'.PHP_EOL;
				} else {
					$to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
					if ($to_depth2) {
						for ($i=0; $i<$to_depth2; $i++) {
							$index .= '</li>'.PHP_EOL .'</ul>'.PHP_EOL;
							$to_depth--;
						}
					}
					$index .= '</li>'.PHP_EOL;
				}
			}
			$index .= '<li><a href="#cl-'.$catalog_item['count'].'" onclick="Catalogswith()">'.$catalog_item['text'].'</a>';
			$prev_depth = $catalog_item['depth'];
		}
		for ($i=0; $i<=$to_depth; $i++) {
			$index .= '</li>'.PHP_EOL .'</ul>'.PHP_EOL;
		}
	$index = '<div id="catalog-col">'.PHP_EOL .'<b>文章目录</b>'.PHP_EOL .$index.'<script>function Catalogswith(){document.getElementById("catalog-col").classList.toggle("catalog");document.getElementById("catalog").classList.toggle("catalog")}</script>'.PHP_EOL .'</div>'.PHP_EOL;
	}
	return $index;
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

function CommentAt($coid){
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

class Initial_Widget_Comments_Recent extends Widget_Abstract_Comments
{
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
    // 当文章无图片时的默认缩略图
    //$rand = rand(1,99); // 随机 1-99 张缩略图
    //$random = $widget->widget('Widget_Options')->themeUrl . '/img/sj/' . $rand . '.jpg'; // 随机缩略图路径
    $random = 'https://pic.zeyiwl.cn/yunimg/20220217173400.png'; // 若只想要一张默认缩略图请删除本行开头的"//",需要在img文件夹下放个mr.jpg图片
    $thumb = $widget->fields->thumb;
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    //自定义缩略图
    if ($thumb){
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
    } else    
    //标签图
    if ($widget -> tags) {
        foreach($widget -> tags as $tag) {
            if ($tag['slug'] == daima || $tag['slug'] == anzhuo) { //if语句判断标签缩略名，如果是则输出下面文件夹内的图片
                $a = $widget -> widget('Widget_Options') -> themeUrl.
                '/img/tag/'.$tag['slug'].
                '.jpg';
                echo $a;
            } else {
                echo $random; //没有匹配的标签图片，则随机输出图片
            }
            break;
        }
    } else {
        echo $random;
    }
}

function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
	$obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\" rel=\"nofollow\">", $obj->content); 
    echo trim($obj->content);
}

function theme_random_posts(){
$defaults = array(
'number' => 12,
'before' => '<ul>',
'after' => '</ul>',
'xformat' => '<li style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" title="{title}"><a href="{permalink}">{title}</a>
 </li>'
);
$db = Typecho_Db::get();
$adapterName = $db->getAdapterName();
if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite'){
   $order_by = 'RANDOM()';
   }else{
   $order_by = 'RAND()';
 }
$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->limit($defaults['number'])
->order($order_by);
$result = $db->fetchAll($sql);
echo $defaults['before'];

foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
}
echo $defaults['after'];
}

function getCommentAt($coid){
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


function showCommentContent($coid)
{
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

function commentAtContent($coid)
{
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

function getBrowser($agent)
{ $outputer = false;
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
    }else if (preg_match('/OPR/i', $agent)) {
              $str1 = explode('OPR/',  $agent);
$opr_vern = explode('.', $str1[1]);
        $outputer = 'Open Browser '.$opr_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
        $outputer = 'Weixin Browser';
    }  else if (preg_match('/WeiBo/i', $agent, $regs)) {
        $outputer = 'WeiBo Browser';
    }  else if (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQ Browser\/([^\s]+)/i', $agent, $regs)) {
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
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $outputer = 'Opera Browser';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $outputer = 'MZ Browser';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $outputer = 'Vivo Browser';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $outputer = 'Quark Browser';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $outputer = 'Mixia Browser';
    }else if (preg_match('/fusion/i', $agent, $regs)) {
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
    } else{
        return false;
    }
   return $outputer;
}

function getOs($agent)
{
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
        } else{
            $os = 'Windows';
        }
    } else if (preg_match('/android/i', $agent)) {
if (preg_match('/android 9/i', $agent)) {
        $os = 'Android P';
    }
else if (preg_match('/android 8/i', $agent)) {
        $os = 'Android O';
    }
else if (preg_match('/android 7/i', $agent)) {
        $os = 'Android N';
    }
else if (preg_match('/android 6/i', $agent)) {
        $os = 'Android M';
    }
else if (preg_match('/android 5/i', $agent)) {
        $os = 'Android L';
    }
else{
        $os = 'Android';
}
    }
 else if (preg_match('/ubuntu/i', $agent)) {
        $os = 'Linux';
    } else if (preg_match('/linux/i', $agent)) {
        $os = 'Linux';
    } else if (preg_match('/iPhone/i', $agent)) {
        $os = 'iPhone';
    } else if (preg_match('/iPad/i', $agent)) {
        $os = 'iPad';
    } else if (preg_match('/mac/i', $agent)) {
        $os = 'OSX';
    }else if (preg_match('/cros/i', $agent)) {
        $os = 'Chrome os';
    }else {
 return false;
    }
   return $os;
}

