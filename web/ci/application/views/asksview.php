<html>
<head>
<title>asks</title>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<style type="text/css">
.word{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "��Բ","Times New Roman", Times, serif;
    font-size: 45px;
    color: #000000;
    vertical-align:middle;
    font-weight:bold;
    }
.word1{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "��Բ","Times New Roman", Times, serif;
    font-size: 22px;
    color: #adcaea;
    vertical-align:middle;
    font-weight:bold;
    }
.tb1{
	table-layout:fixed;
	width:850px;
	height:400px;

}
.td1{
	white-space:nowrap;
	overflow:hidden;
	text-overflow:ellipsis;
	
}

a:link{                            /* ����������״̬�µ���ʽ */
    color:#000000;                /* ���� */
    text-decoration:none;        /* ���»��� */
}
a:visited{                        /* ���ʹ��ĳ����� */
    color:#000000;                /* ��ɫ */
    text-decoration:none;        /* ���»��� */
}
a:hover{                        /* ��꾭��ʱ�ĳ����� */
    color:#FFFF00;                /* ��ɫ */
    text-decoration:underline;    /* �»��� */
}
.yuanxingbutton{
	width:80px;
	height:80px;
	border-radius:40px;
	font-size:19px;
	font-family:"��Բ","Times New Roman", Times, serif;
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

<div style="background:url('/ci/application/views/image/background3.png');width:1200px; height:500px;">
<img src="/ci/application/views/image/background3.png">	
</div>
<div style="position:fixed;width:500px;height:60px;left:150px;top:40px;"><p class="word">��ص�������</p></div>
<div style="position:fixed;width:850px;height:400px;left:150px;top:120px;">
<table border="0" cellspacing="10" style="table-layout:fixed;width:850px;height:400px">
<p>
<p>
<tr>
  <td style="width:400px" class="td1">
     <p class="word1">��������</p>
  </td>
  <td style="width:225px" class="td1">
     <p class="word1">������</p>
  </td>
  <td style="width:224px" class="td1">
     <p class="word1">�����ǩ</p>
  </td>
</tr>
<?php if($perpage==5):?>
<?php for($i=0;$i<$perpage;$i++):?>
<tr>
  <td style="width:400px" class="td1">
     <p><a href="http://localhost:81/ci/index.php/answer?questionid=<?php echo $infostr['askidarr'][$i] ; ?>"><?php echo $infostr['questionarr'][$i] ?></a></p>
  </td>
  <td style="width:225px" class="td1">
     <p><?php echo $infostr['usernameforaskarr'][$i] ?></p>
  </td>
  <td style="width:224px" class="td1">
     <p><?php echo $infostr['labelarr'][$i] ?></p>
  </td>
</tr>
<?php endfor; ?>
<?php else: ?>
<?php for($k=0;$k<$perpage;$k++):?>
<tr>
  <td style="width:400px" class="td1">
     <p><a href="http://localhost:81/ci/index.php/answer?questionid=<?php echo $infostr['askidarr'][$k] ; ?>"><?php echo $infostr['questionarr'][$k] ?></a></p>
  </td>
  <td style="width:225px" class="td1">
     <p><?php echo $infostr['usernameforaskarr'][$k] ?></p>
  </td>
  <td style="width:224px" class="td1">
     <p><?php echo $infostr['labelarr'][$k] ?></p>
  </td>
</tr>
<?php endfor; ?>
<?php for($j=0;$j<(5-$perpage);$j++):?>
<tr>
  <td style="width:400px" class="td1">
     <p>  </p>
  </td>
  <td style="width:225px" class="td1">
     <p>  </p>
  </td>
  <td style="width:224px" class="td1">
     <p>  </p>
  </td>
</tr>
<?php endfor; ?>
<?php endif; ?>
</table>
</div>
<div style="position:fixed;width:200px;height:100px;left:530px;top:540px;">
<p><?php echo $pagestr ?></p>
</div>

<div style="position:fixed;width:100px;height:150px;left:1000px;top:200px;">
<a href="http://localhost:81/ci/index.php/searchcontroll"><input type="button" class="yuanxingbutton btn" value="������ҳ" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1000px;top:400px;">
<a href="http://localhost:81/ci/index.php/putask"><input type="button" class="yuanxingbutton btn" value="��Ҫ����" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1150px;top:200px;">
<a href="http://localhost:81/ci/index.php/myinfo"><input type="button" class="yuanxingbutton btn" value="��������" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1150px;top:400px;">
<a href="http://localhost:81/ci/index.php/searchuser"><input type="button" class="yuanxingbutton btn" value="�����û�" /></a>
</div>
</body>

</html>