<html>
<head>
<title>answerlist</title>
<meta http-equiv="content-type" content="text/html;charset=gb2312">
<style type="text/css">
.word{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
    font-size: 45px;
    color: #000000;
    vertical-align:middle;
    }
.word1{
	margin: 0;
    padding: 0;
    line-height: 1.5em;
    font-family: "幼圆","Times New Roman", Times, serif;
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
.btn1{
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
    border-radius: 10px;
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
	text-align:center;
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

<script type="text/javascript">
    function $(id) {
             return document.getElementById(id);
          }
   var xmlhttp=null;
   <!-- 创建ajax引擎-->
   function getXMLHttpRequest(){
   	    try{
   	    	xmlhttp=new XMLHttpRequest();
   	    }catch(e){
   	    	try{
   	    		xmlhttp=new ActiveXObject("Msxm112.XMLHTTP");
   	    	}catch(e){
   	    		try{
   	    			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   	    		}catch(e){
   	    			return false;
   	    		}
   	    	}
   	    }
   	    return xmlhttp;
   }
   <!--ajax请求 -->
   function addzan(){
   	      xmlhttp=getXMLHttpRequest();
   	      
   	      if(xmlhttp){
   	      	var url="http://localhost:81/ci/index.php/answer/add/";
   	      	var data="questionid="+<?php echo $questionid ;?>;
   	      	xmlhttp.open("post",url,true);
   	      	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   	        xmlhttp.onreadystatechange=change;
   	      	xmlhttp.send(data);
   	      }
   }
   
   function change(){
          if(xmlhttp.readyState==4){
          	  document.getElementById("askzan").innerHTML=xmlhttp.responseText;
          }   	
   }
 
   function addanswerzan(t){
   	     xmlhttp=getXMLHttpRequest();
   	     var answerid=t.id;
   	    
   	     if(xmlhttp){
   	     	var url="http://localhost:81/ci/index.php/answer/answeradd/";
   	     	var data="answerid="+answerid;
   	     	xmlhttp.open("post",url,true);
   	     	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   	     	xmlhttp.onreadystatechange=deal;
   	     	xmlhttp.send(data);
   	     }
   }
   
   function deal(){
   	  if(xmlhttp.readyState==4){
          	 var ret=xmlhttp.responseText;
          	 var answerzan_info=eval(ret);
          	 //alert(answerzan_info[0].idtoupdate+"lab");
          	 //alert(document.getElementById(answerzan_info[0].idtoupdate+"lab").innerHTML);
          	 document.getElementById(answerzan_info[0].idtoupdate+"lab").innerHTML="+"+answerzan_info[0].zannum;
          } 
   }
</script>
</head>
<body>

<div style="background:url('/ci/application/views/image/background3.png');width:1200px; height:500px;">
<img src="/ci/application/views/image/background3.png">	
</div>
<div style="position:fixed;width:500px;height:60px;left:230px;top:40px;"><p class="word">相关的解答有</p></div>
<div style="position:fixed;width:650px;height:400px;left:230px;top:120px;">
<table border="0" cellspacing="10" style="table-layout:fixed;width:650px;height:400px">

<div style="position:fixed;width:120px;height:120px;left:800px;top:25px;">
<label id="askzan" style="position:fixed;width:20px;height:20px;left:900px;top:75px;">+<?php echo $askzannum; ?></label> 
<img style="cursor:hand" onclick="addzan()" src= "/ci/application/views/image/点赞大.png">   <!-- 大赞-->
</div>

<tr>
   <td width="400px" class="td1">
      <p class="word1">解答</p>
   </td>
   <td width="150px" class="td1">
      <p class="word1">解答者</p>
   </td>
   <td width="100px" class="td1">
      <p class="word1">点赞</p>
   </td>
</tr>
<?php if($perpage==3): ?>
<?php for($i=0;$i<$perpage;$i++): ?>
<tr>
   <td style="width:400px" class="td1">
      <p><?php echo $infostr['answer'][$i]; ?></p>
   </td>
   <td style="width:250px" class="td1">
      <p><?php echo $infostr['usernameforanswer'][$i] ?></p>
   </td>
   <td style="width:100px">
   
   <img style="cursor:hand" id="<?php echo $infostr['answerid'][$i] ;?>" onclick="addanswerzan(this)" src="/ci/application/views/image/点赞1.png"></img>
   <label id=<?php $str=$infostr['answerid'][$i] ;echo "$str"."lab"?>>+<?php echo $infostr['answerzan'][$i] ;?></label>
   </td>
</tr>

<?php endfor; ?>
<?php else: ?>
<?php for($j=0;$j<$perpage;$j++): ?>
<tr>
   <td style="width:400px" class="td1">
      <p><?php echo $infostr['answer'][$j]; ?></p>
   </td>
   <td style="width:250px" class="td1">
      <p><?php echo $infostr['usernameforanswer'][$j] ?></p>
   </td>
   <td style="width:100px">
    <img style="cursor:hand" id="<?php echo $infostr['answerid'][$j] ;?>" onclick="addanswerzan(this)" src="/ci/application/views/image/点赞1.png"></img>
   <label id=<?php $str=$infostr['answerid'][$j] ;echo "$str"."lab"?>>+<?php echo $infostr['answerzan'][$j] ;?></label>
   </td>
</tr>

<?php endfor; ?>
<?php for($k=0;$k<(3-$perpage);$k++):?>
<tr>
   <td style="width:400px" class="td1"> 
       <p> </p>
   </td>
   <td style="width:250px" class="td1"> 
       <p> </p>
   </td>
   <td style="width:100px" class="td1">
       <p> </p>
   </td>
</tr>
<?php endfor;?>
<?php endif;?>

</table>
</div>
<div style="position:fixed;width:650px;height:100px;left:230px;top:490px;">
<div style="float:left; position:fixed;top:520px;"><span><?php echo $pagestr; ?></span></div>
<div style="float:right;"><a href="http://localhost:81/ci/index.php/answerit"><input type="button" class="btn1" value="我来解答"/></a></div>
</div>

<div style="position:fixed;width:100px;height:150px;left:1050px;top:150px;">
<a href="http://localhost:81/ci/index.php/searchcontroll"><input type="button" class="yuanxingbutton btn" value="返回首页" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1050px;top:300px;">
<a href="http://localhost:81/ci/index.php/myinfo"><input type="button" class="yuanxingbutton btn" value="个人中心" /></a>
</div>
<div style="position:fixed;width:100px;height:150px;left:1050px;top:450px;">
<a href="http://localhost:81/ci/index.php/searchuser"><input type="button" class="yuanxingbutton btn" value="查找用户" /></a>
</div>

</body>
</html>