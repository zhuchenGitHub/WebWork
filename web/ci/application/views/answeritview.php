<html>
<head>
<title>answerit</title>
<meta content="text/html;charset=gb2312">
<style type="text/css">
.word{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
    font-size: 26px;
    color: #000000;
    vertical-align:middle;
    }
.textareacss{
	width:410px;
	height:150px;
	border-radius:10px 10px 10px 10px;
	wrap:virtual;
	font-size:18px;
	font-family:"黑体","Times New Roman", Times, serif;
}
.textareacss1{
	width:410px;
	height:100px;
	border-radius:10px 10px 10px 10px;
	wrap:virtual;
	font-size:18px;
	font-family:"黑体","Times New Roman", Times, serif;
}
input[type=submit]{
	display: inline-block;
    position: relative;
    margin: 30px;
    padding: 0 18px;
    padding-top:1px;
    height:45px;
    text-align: center;
    text-decoration: none;
    font: bold 20px/30px "幼圆", Arial, sans-serif;
    text-shadow: 1px 1px 1px rgba(255,255,255, .22);
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 13px;
    -webkit-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    -moz-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    -webkit-transition: all 0.15s ease;
    -moz-transition: all 0.15s ease;
    -o-transition: all 0.15s ease;
    -ms-transition: all 0.15s ease;
    transition: all 0.15s ease;
      
}
.yuanxingbutton{
	width:80px;
	height:80px;
	border-radius:40px;
	font-size:19px;
	font-family:"幼圆","Times New Roman", Times, serif;
}

.btn{
	color:#515151;
    background:#d3d3d3;
    background: #d3d3d3; /* Old browsers */
    background: -moz-linear-gradient(top,  #d3d3d3 0%, #8a8a8a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d3d3d3), color-stop(100%,#8a8a8a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* IE10+ */
    background: linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* W3C */
    
}
</style>
</head>
<body>
<div style="background:url('/ci/application/views/image/background.jpg');width:1200px; height:500px;">
<img src="/ci/application/views/image/background.jpg">	
</div>


<div style="position:fixed;width:440px;height:450px;left:210px;top:80px;">
<form achtion="<?php echo site_url('answerit/index'); ?>" method="post" id="answerform">
<label class="word">问题描述：</label>
<p><textarea  readonly="readonly" class="textareacss1" name="showquestion"><?php echo $question; ?></textarea></p>
<!--<p><?php echo $question ;?></p>-->
<label class="word">问题解答：</label>
<p><textarea class="textareacss" name="answer" form="answerform"><?php echo set_value('answer') ;?></textarea></p>
<!--<input type="textarea" name="answer" value="<?php echo set_value('answer') ;?>"/>-->
<div style="float:right">
<input type="submit" value="提交"/>
</div>
</form>
</div>
<div style="position:fixed;width:100px;height:150px;left:950px;top:100px;">
<a href="http://localhost:81/ci/index.php/searchcontroll"><input type="button" class="yuanxingbutton btn" value="返回首页" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:950px;top:250px;">
<a href="http://localhost:81/ci/index.php/myinfo"><input type="button" class="yuanxingbutton btn" value="个人中心" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:950px;top:400px;">
<a href="http://localhost:81/ci/index.php/searchuser"><input type="button" class="yuanxingbutton btn" value="查找用户" /></a>
</div>
</body>
</html>