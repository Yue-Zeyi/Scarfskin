<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
    <p class="footerb">&copy; <?php echo date('Y'); ?>  <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> Theme By <a href="https://www.yuezeyi.com/scarfskin.html" target="_blank">Scarfskin</a></p>
	<p class="footerb"><a href="http://beian.miit.gov.cn" class="icp" target="_blank" rel="noreferrer"><?php $this->options->ICPbeian(); ?></a></p>
</footer>
<script>
window.addEventListener('scroll', function() {
    var header = document.querySelector("header"); 
    header.classList.toggle("sticky", window.scrollY > 0 )
});
</script>
<script language=javascript>document.write(unescape('%3C%73%63%72%69%70%74%20%6C%61%6E%67%75%61%67%65%3D%22%6A%61%76%61%73%63%72%69%70%74%22%3E%66%75%6E%63%74%69%6F%6E%20%64%46%28%73%29%7B%76%61%72%20%73%31%3D%75%6E%65%73%63%61%70%65%28%73%2E%73%75%62%73%74%72%28%30%2C%73%2E%6C%65%6E%67%74%68%2D%31%29%29%3B%20%76%61%72%20%74%3D%27%27%3B%66%6F%72%28%69%3D%30%3B%69%3C%73%31%2E%6C%65%6E%67%74%68%3B%69%2B%2B%29%74%2B%3D%53%74%72%69%6E%67%2E%66%72%6F%6D%43%68%61%72%43%6F%64%65%28%73%31%2E%63%68%61%72%43%6F%64%65%41%74%28%69%29%2D%73%2E%73%75%62%73%74%72%28%73%2E%6C%65%6E%67%74%68%2D%31%2C%31%29%29%3B%64%6F%63%75%6D%65%6E%74%2E%77%72%69%74%65%28%75%6E%65%73%63%61%70%65%28%74%29%29%3B%7D%3C%2F%73%63%72%69%70%74%3E'));dF('%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%2631%264Dtdsjqu%264Fdpotu%2631ibncvshfs%2631%264E%2631epdvnfou/rvfszTfmfdups%2639%2638/ibncvshfs%2638%263%3A%261Bdpotu%2631obwNfov%2631%264E%2631epdvnfou/rvfszTfmfdups%2639%2638/obw.nfov%2638%263%3A%261Bdpotu%2631obwMjol%2631%264E%2631epdvnfou/rvfszTfmfdupsBmm%2639%2638/obw.mjol%2638%263%3A%261B%261Bdpotu%2631npcjmfNfov%2631%264E%2631%2639%263%3A%2631%264E%264F%2631%268C%261B%2631%2631%2631%2631ibncvshfs/dmbttMjtu/uphhmf%2639%2638bdujwf%2638%263%3A%261B%2631%2631%2631%2631obwNfov/dmbttMjtu/uphhmf%2639%2638bdujwf%2638%263%3A%261B%268E%261B%261Bdpotu%2631dmptfNfov%2631%264E%2631%2639%263%3A%2631%264E%264F%2631%268C%261B%2631%2631%2631%2631ibncvshfs/dmbttMjtu/sfnpwf%2639%2638bdujwf%2638%263%3A%261B%2631%2631%2631%2631obwNfov/dmbttMjtu/sfnpwf%2639%2638bdujwf%2638%263%3A%261B%268E%261Bibncvshfs/beeFwfouMjtufofs%2639%2638dmjdl%2638%263D%2631npcjmfNfov%263%3A%261BobwMjol/gpsFbdi%2639%2639m%263%3A%2631%264E%264F%2631m/beeFwfouMjtufofs%2639%2638dmjdl%2638%263D%2631dmptfNfov%263%3A%263%3A%261B%264D0tdsjqu%264F1')</script>

<script src="<?php $this->options->themeUrl('js/fancybox.umd.js'); ?>"></script>    
<script type="text/javascript">
    Fancybox.bind("[data-fancybox]", {
        Image: {
            Panzoom: {
                zoomFriction: 0.7,
                maxScale: function() {
                    return 5;
                },
            },
        },
    });
</script>
<?php $this->footer(); ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>
<?php endif; ?>
    <script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<?php  if ($this->options->node):?>    
<script language="JavaScript">
//禁止页面选择以及鼠标右键
document.οncοntextmenu=function(){return false;};
document.onselectstart=function(){return false;};
let h = window.innerHeight;
let w = window.innerWidth;
//禁用右键
document.oncontextmenu = function () { return false; };
//在本网页的任何键盘敲击事件都是无效操作 （防止F12和shift+ctrl+i调起开发者工具）
window.onkeydown = window.onkeyup = window.onkeypress = function () {
window.event.returnValue = false;
return false;
}
//禁用开发者工具F12
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
<script src="<?php $this->options->themeUrl('js/jquery.toTop.min.js'); ?>"></script>
<a class="to-top">▲</a>
<script>
$(function() {
	$('.to-top').toTop();
});
</script>
<?php endif; ?>
<?php  if ($this->options->Highlight):?>
<script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>"></script>
<script>hljs.initHighlightingOnLoad();</script>
<?php endif; ?>
</body>
</html>