<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
    <p class="footerb">&copy; <?php echo date('Y'); ?>  <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> Theme By <a href="https://www.yuezeyi.com/scarfskin.html" target="_blank">Scarfskin</a></p>
	<p class="footerb"><a href="http://beian.miit.gov.cn" class="icp" target="_blank" rel="noreferrer"><?php $this->options->ICPbeian(); ?></a></p>
</footer>
<?php  if ($this->options->Pjax):?>    
<script src="<?php $this->options->themeUrl('js/instantclick.min.js'); ?>" data-no-instant></script>
<script data-no-instant>InstantClick.on('receive', function(url, body, title) {
  var dont_display = body.querySelector('#dont_display_me_when_loaded_with_instantclick')
  if (dont_display) {
    dont_display.setAttribute('hidden', '');
  }
  title += ' (loaded with InstantClick)';
  
  return {
    body: body,
    title: title
  };
});
</script>
<?php endif; ?>
<script>
window.addEventListener('scroll', function() {
    var header = document.querySelector("header"); 
    header.classList.toggle("sticky", window.scrollY > 0 )
});
</script>
<script language=javascript>document.write(unescape('%3C%73%63%72%69%70%74%20%6C%61%6E%67%75%61%67%65%3D%22%6A%61%76%61%73%63%72%69%70%74%22%3E%66%75%6E%63%74%69%6F%6E%20%64%46%28%73%29%7B%76%61%72%20%73%31%3D%75%6E%65%73%63%61%70%65%28%73%2E%73%75%62%73%74%72%28%30%2C%73%2E%6C%65%6E%67%74%68%2D%31%29%29%3B%20%76%61%72%20%74%3D%27%27%3B%66%6F%72%28%69%3D%30%3B%69%3C%73%31%2E%6C%65%6E%67%74%68%3B%69%2B%2B%29%74%2B%3D%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%73%31%2E%63%68%61%72%43%6F%64%65%41%74%28%69%29%2D%73%2E%73%75%62%73%74%72%28%73%2E%6C%65%6E%67%74%68%2D%31%2C%31%29%29%3B%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%75%6E%65%73%63%61%70%65%28%74%29%29%3B%7D%3C%2F%73%63%72%69%70%74%3E'));dF('%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%264Dtdsjqu%264Fdpotu%2631ibncvshfs%2631%264E%2631epdvnfou/rvfszTfmfdups%2639%2638/ibncvshfs%2638%263%3A%261Bdpotu%2631obwNfov%2631%264E%2631epdvnfou/rvfszTfmfdups%2639%2638/obw.nfov%2638%263%3A%261Bdpotu%2631obwMjol%2631%264E%2631epdvnfou/rvfszTfmfdupsBmm%2639%2638/obw.mjol%2638%263%3A%261B%261Bdpotu%2631npcjmfNfov%2631%264E%2631%2639%263%3A%2631%264E%264F%2631%268C%261B%2631%2631%2631%2631ibncvshfs/dmbttMjtu/uphhmf%2639%2638bdujwf%2638%263%3A%261B%2631%2631%2631%2631obwNfov/dmbttMjtu/uphhmf%2639%2638bdujwf%2638%263%3A%261B%268E%261B%261Bdpotu%2631dmptfNfov%2631%264E%2631%2639%263%3A%2631%264E%264F%2631%268C%261B%2631%2631%2631%2631ibncvshfs/dmbttMjtu/sfnpwf%2639%2638bdujwf%2638%263%3A%261B%2631%2631%2631%2631obwNfov/dmbttMjtu/sfnpwf%2639%2638bdujwf%2638%263%3A%261B%268E%261Bibncvshfs/beeFwfouMjtufofs%2639%2638dmjdl%2638%263D%2631npcjmfNfov%263%3A%261BobwMjol/gpsFbdi%2639%2639m%263%3A%2631%264E%264F%2631m/beeFwfouMjtufofs%2639%2638dmjdl%2638%263D%2631dmptfNfov%263%3A%263%3A%261B%264D0tdsjqu%264F1')</script>

<script src="<?php $this->options->themeUrl('js/fancybox.umd.js'); ?>"></script>    
<script type="text/javascript">
    Fancybox.bind('[data-fancybox="gallery"]', {
  caption: function (fancybox, carousel, slide) {
    return (
      `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
    );
  },
});
</script>
<?php $this->footer(); ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>
<?php endif; ?>
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<?php  if ($this->options->node):?>    
<script language="JavaScript">
document.οncοntextmenu=function(){return false;};
document.onselectstart=function(){return false;};
let h = window.innerHeight;
let w = window.innerWidth;
document.oncontextmenu = function () { return false; };
window.onkeydown = window.onkeyup = window.onkeypress = function () {
window.event.returnValue = false;
return false;
}
document.onkeydown = function () {
if (window.event && window.event.keyCode == 123) {
event.keyCode = 0;
event.returnValue = false;
return false;
}
};
//如果用户在工具栏调起开发者工具，那么判断浏览器的可视高度和可视宽度是否有改变，如有改变则关闭本页面
window.onresize = function () {
if (h != window.innerHeight || w != window.innerWidth) {
window.close();
window.location = "about:blank";
}
}
</script>
<?php endif; ?>
<?php  if ($this->options->Totop):?>
<script>
!function(o){"use strict";o.fn.toTop=function(t){var i=this,e=o(window),s=o("html, body"),n=o.extend({autohide:!0,offset:420,speed:500,position:!0,right:15,bottom:30},t);i.css({cursor:"pointer"}),n.autohide&&i.css("display","none"),n.position&&i.css({position:"fixed",right:n.right,bottom:n.bottom}),i.click(function(){s.animate({scrollTop:0},n.speed)}),e.scroll(function(){var o=e.scrollTop();n.autohide&&(o>n.offset?i.fadeIn(n.speed):i.fadeOut(n.speed))})}}(jQuery);    
</script>
<a class="to-top">
<svg t="1650538117627" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2540" width="25" height="25"><path d="M728.807811 523.67425c3.335505-253.498363-203.465791-366.905526-220.143315-373.576535l0 0c0 0 0 0 0 0 0 0 0 0 0 0l0 0c-13.342019 6.67101-223.47882 123.413677-220.143315 373.576535C245.159618 550.358288 201.798056 600.39086 208.469065 683.778479c6.67101 83.387619 90.058629 140.091201 120.078172 136.755696 30.019543-3.335505 23.348533-26.684038 23.348533-26.684038l10.006514-43.361562c0 0 46.697067 70.0456 60.039086 70.0456 13.342019 0 76.71661 0 83.387619 0l0 0c0 0 0 0 0 0 0 0 0 0 0 0l0 0c6.67101 0 70.0456 0 83.387619 0 13.342019 0 60.039086-70.0456 60.039086-70.0456l10.006514 43.361562c0 0-10.006514 23.348533 23.348533 26.684038 30.019543 3.335505 113.407162-53.368076 120.078172-136.755696C815.530935 600.39086 772.169373 550.358288 728.807811 523.67425L728.807811 523.67425zM508.664495 520.338745c-6.67101 0-83.387619-3.335505-90.058629-93.394134C421.941371 340.221487 501.993486 333.550478 508.664495 333.550478c6.67101 0 86.723124 6.67101 90.058629 93.394134C592.052115 517.00324 515.335505 520.338745 508.664495 520.338745L508.664495 520.338745zM461.967428 957.289871c0 10.006514-6.67101 20.013029-20.013029 20.013029l0 0c-10.006514 0-20.013029-6.67101-20.013029-20.013029l0-93.394134c0-10.006514 6.67101-20.013029 20.013029-20.013029l0 0c10.006514 0 20.013029 6.67101 20.013029 20.013029L461.967428 957.289871 461.967428 957.289871zM532.013029 1003.986938c0 10.006514-10.006514 20.013029-20.013029 20.013029l0 0c-10.006514 0-20.013029-10.006514-20.013029-20.013029L491.986971 867.231242c0-10.006514 10.006514-20.013029 20.013029-20.013029l0 0c10.006514 0 20.013029 10.006514 20.013029 20.013029L532.013029 1003.986938 532.013029 1003.986938zM595.387619 933.941338c0 10.006514-6.67101 20.013029-20.013029 20.013029l0 0c-10.006514 0-20.013029-6.67101-20.013029-20.013029l0-66.710096c0-10.006514 6.67101-20.013029 20.013029-20.013029l0 0c10.006514 0 20.013029 6.67101 20.013029 20.013029L595.387619 933.941338 595.387619 933.941338zM595.387619 933.941338" p-id="2541"></path><path d="M865.563506 0C865.563506 0 865.563506 0 865.563506 0L151.765484 0l0 0C145.094474 0 141.75897 6.67101 141.75897 13.342019c0 6.67101 3.335505 13.342019 10.006514 13.342019l0 0 713.798022 0c0 0 0 0 0 0 6.67101 0 10.006514-6.67101 10.006514-13.342019C875.570021 6.67101 872.234516 0 865.563506 0z" p-id="2542"></path></svg></a>
<script>
$(function() {
	$('.to-top').toTop();
});
</script>
<?php endif; ?>
<?php  if ($this->options->Highlight):?>
<script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/highlightjs-line-numbers.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/highlightjs-copy-button.min.js'); ?>"></script>
<script>hljs.initHighlightingOnLoad();
hljs.initLineNumbersOnLoad();
hljs.initCopyButtonOnLoad();
	</script>
<?php endif; ?>
</body>
<?php  if ($this->options->dianzan):?>
<script>
 //  点赞按钮点击
$('#agree-btn').on('click', function () {
  $('#agree-btn').get(0).disabled = true;  //  禁用点赞按钮
  //  发送 AJAX 请求
  $.ajax({
    //  请求方式 post
    type: 'post',
    //  url 获取点赞按钮的自定义 url 属性
    url: $('#agree-btn').attr('data-url'),
    //  发送的数据 cid，直接获取点赞按钮的 cid 属性
    data: 'agree=' + $('#agree-btn').attr('data-cid'),
    async: true,
    timeout: 30000,
    cache: false,
    //  请求成功的函数
    success: function (data) {
      var re = /\d/;  //  匹配数字的正则表达式
      //  匹配数字
      if (re.test(data)) {
        //  把点赞按钮中的点赞数量设置为传回的点赞数量
        $('#agree-btn .agree-num').html(data);
      }
    },
    error: function () {
      //  如果请求出错就恢复点赞按钮
      $('#agree-btn').get(0).disabled = false;
    },
  });
});
</script>
<?php endif; ?>
<script>
document.onreadystatechange = function () {
    if (document.readyState == "complete") {    
        $(".loading-div").hide();
        $('body').css('overflow','scroll');
    }
  }
</script>
</html>