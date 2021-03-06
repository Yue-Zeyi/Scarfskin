# Scarfskin
![一款拥有漂亮外表的Typecho简洁主题](https://pic.zeyiwl.cn/yunimg/20220418134844.png)

## 前言
纠结了好久，最终我还是决定将这款主题免费开源。一个原因是她并不能满足我自己心里想要的主题，所以就当拿来练手了。另一个原因是这款主题我过于借鉴[Mirages](https://get233.com/archives/mirages-intro.html)主题，出于对作者的尊重，我甚至考虑好久是否要将她发布出来，但我又认为这款主题与Mirages主题比较相差甚远，所以我决定将她免费发布。

## 介绍

scarfskin译为外皮，如你所见，这是一款拥有漂亮外表的主题，没有繁杂的侧栏，更没有不知所措的功能，就是直接而又漂亮的外表和纯粹的文章展示。

她真的很适合一个对于多样性功能要求并不高而却想要很好看的个人博主，在图片的强烈装饰下，让仅仅有几篇内容的站点也显得如此美观。

我觉得在博客评论里面使用表情显得较为敷衍，有话说就评论没话说就不说，而不是用表情包来充数，所以我删除掉了泡泡和阿鲁表情包，这使得主题包更为小巧，当然，还有颜文字和Emoji表情供你选择。

## 预览

直接预览地址：[Scarfskin主题演示站](http://scarfskin.zeyiwl.cn/)

主题发布地址：[Scarfskin主题发布页](https://www.yuezeyi.com/scarfskin.html)

## 功能

* 基于 Typecho1.2.0版本，已完美适配
* 自适应，任何大小屏幕都可以正常显示
* 随机缩略图，当文章不指定缩略图时，显示随机缩略图
* 后台自定义随机缩略图、浏览器站点副标题
* 支持文字LOGO和图片LOGO，自行选择
* 代码高亮，Mac样式代码高亮，多语言支持，自定义启用
* 文章顶部大图，极致美观的顶部大图展示，自定义启用
* 友情链接独立页面，无插件要求，后台可直接添加友链
* 归档页面，展示标签云及历史文章
* 图片灯箱，文章内图片单击可放大，画廊般的体验
* QQ评论头像，优先匹配QQ头像，已内置国内Gravatar随机头像源
* 防扒站，后台一键启用即可禁用F12和右键
* 返回顶部按钮和友情链接图标显示后台可控
* 自定义CSS样式、底部内容、文章末版权信息
* 评论支持Emoji表情，需后台选择开启和禁用
* 网页延时加载loading动态图，后台自选开启
* ...

## 下载

**最新版本下载**：[点击直接下载](https://github.com/Yue-Zeyi/Scarfskin/releases/tag/v1.0.2)

**Github地址**：[https://github.com/Yue-Zeyi/Scarfskin](https://github.com/Yue-Zeyi/Scarfskin)

## 使用

上传到主题根目录解压，并保证文件夹名称为：**Scarfskin**，然后后台启用主题即可。

主题设置，必须设置 `文章列表顶图地址` 和 `随机缩略图地址` 不然显示效果很差！

**归档页面**：

管理->独立页面->新增独立页面，标题自定义，自定义模板选择 `归档` 然后直接发布。

![](https://pic.zeyiwl.cn/yunimg/20220418002937.png)

**友链页面**：

管理->独立页面->新增独立页面，标题自定义，自定义模板选择 `友链` 然后直接发布。

友情链接的添加方式：

在友链页面添加自定义字段，字段名称设置为 `links`，字段值请按照下方的格式输入。

```html
链接名称*,链接地址*,链接描述,链接图标,链接分类
//例:
岳泽以,http://www.yuezeyi.com/,我们历经苦难，我们生生不息,https://www.yuezeyi.com/logo.png,default
```

不同信息之间用英文逗号“`,`”分隔，若中间有暂时不想填的信息，直接留空即可，多个链接换行添加，一行一个。

![](https://pic.zeyiwl.cn/yunimg/20220418003443.png)

## 更新
* 2022/04/18：发布Scarfskin主题1.0版本
