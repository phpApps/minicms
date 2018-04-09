<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安装程序 - OS内容管理系统</title>
<link href="<?php echo base_url();?>template/default/assets/css/style.css" rel="stylesheet" />
<script src="<?php echo base_url();?>template/plugin/jquery/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
    function TestDb()
    {
		var dbhost = $('#dbhost').val();
        var dbname = $('#dbname').val();
        var dbuser = $('#dbuser').val();
        var dbpwd = $('#dbpwd').val();
		$('#havedbsta').show();
		$.ajax({
			dataType: "json",
			url: "<?php echo site_url('step10');?>",
			data: 'dbhost='+dbhost+'&dbuser='+dbuser+'&dbpwd='+dbpwd+'&dbname='+dbname,
			success:function(json){
				$('#dbpwdsta').html(json.conn);
				$('#havedbsta').html(json.condb);
    		}
		});
    }
</script>
</head>
<body>
<div class="top">
  <div class="top-logo"><h1>OS内容管理系统</h1></div>
  <div class="top-link">
    <ul>
      <li><a href="http://www.oscms.cn" target="_blank">官方网站</a></li>
      <li><a href="http://help.oscms.cn" target="_blank">帮助</a></li>
    </ul>
  </div>
  <div class="top-version"> 
    <h2><?php echo $ver_msg; ?></h2>
  </div>
</div>
<div class="main">
  <div class="pleft">
    <dl class="setpbox t1">
      <dt>安装步骤</dt>
      <dd>
        <ul>
          <li class="succeed">许可协议</li>
          <li class="succeed">环境检测</li>
          <li class="now">参数配置</li>
          <li>正在安装</li>
          <li>安装完成</li>
        </ul>
      </dd>
    </dl>
  </div>
  <form id="step4" action="<?php echo site_url('step4');?>" method="post">
    <div class="pright">
      <div class="pr-title">
        <h3>模块选择</h3>
      </div>
      <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
        <tr>
          <td class="onetd"><strong>可选安装的：</strong></td>
          <td><input type='checkbox' checked="checked"  onclick="return false;" name='modules[]' value='cms'  />
            CMS系统</td>
          <td><input type='checkbox' checked="checked"  onclick="return false;" name='modules[]' value='mem'/>
            会员中心</td>
        </tr>
      </table>
      <div class="pr-title">
        <h3>数据库设定</h3>
      </div>
      <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
        <tr>
          <td class="onetd"><strong>数据库主机：</strong></td>
          <td><input name="dbhost" id="dbhost" type="text" value="localhost" class="input-txt" />
            <small>一般为localhost</small></td>
        </tr>
        <tr>
          <td class="onetd"><strong>数据库用户：</strong></td>
          <td><input name="dbuser" id="dbuser" type="text" value="root" class="input-txt" /></td>
        </tr>
        <tr>
          <td class="onetd"><strong>数据库密码：</strong></td>
          <td><div style='float:left;margin-right:3px;'>
              <input name="dbpwd" id="dbpwd" type="text" class="input-txt" onChange="TestDb()" />
            </div>
            <div style='float:left' id='dbpwdsta'></div></td>
        </tr>
        <tr>
          <td class="onetd"><strong>数据表前缀：</strong></td>
          <td><input name="dbprefix" id="dbprefix" type="text" value="os_" class="input-txt" />
            <small>如无特殊需要,请不要修改</small></td>
        </tr>
        <tr>
          <td class="onetd"><strong>数据库名称：</strong></td>
          <td><div style='float:left;margin-right:3px;'>
              <input name="dbname" id="dbname" type="text" value="oscms" class="input-txt" onChange="TestDb()" />
            </div>
            <div style='float:left;display:none;' id='havedbsta'><img src="<?php echo base_url();?>template/default/assets/images/ajax-loader.gif"></div></td>
        </tr>
        <tr>
          <td class="onetd"><strong>数据库类型：</strong></td>
          <td><input type="radio" name="dbdriver" id="dbdriver" value="mysql" checked="checked" />
            <label for="dblang_latin1">MYSQL</label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="dblang" id="dblang_utf8" value="utf8" checked="checked" />
            <label for="dblang_latin1">UTF8</label></td>
        </tr>
      </table>
      <div class="pr-title">
        <h3>管理员初始密码</h3>
      </div>
      <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
        <tr>
          <td class="onetd"><strong>用户名：</strong></td>
          <td><input name="adminuser" type="text" value="admin" class="input-txt" />
            <p><small>只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符</small></p></td>
        </tr>
        <tr>
          <td class="onetd"><strong>密　码：</strong></td>
          <td><input name="adminpwd" type="text" value="admin888" class="input-txt" /></td>
        </tr>
      </table>
      <div class="pr-title">
        <h3>网站设置</h3>
      </div>
      <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
        <tr>
          <td class="onetd"><strong>网站名称：</strong></td>
          <td><input name="webname" type="text" value="我的网站" class="input-txt" /></td>
        </tr>
        <tr>
          <td class="onetd"><strong> 网站网址：</strong></td>
          <td><input name="baseurl" type="text" value="<?php echo base_url(); ?>" class="input-txt" /></td>
        </tr>
      </table>
      <div class="pr-title">
        <h3>安装测试体验数据</h3>
      </div>
      <table width="726" border="0" align="center" cellpadding="0" cellspacing="0" class="twbox">
        <tr>
          <td class="onetd"><strong> 初始化数据体验包</strong>：</td>
          <td><label for="installdemo">
              <input name="installdemo" type="checkbox" id="installdemo" value="1" />
              安装初始化数据进行体验</label></td>
        </tr>
      </table>
      <div class="btn-box">
        <input type="button" class="btn-back" value="后退" onclick="window.history.back(-1);" />
        <input type="button" class="btn-next" value="开始安装" onclick="document.getElementById('step4').submit();" />
      </div>
    </div>
  </form>
</div>
<div class="foot"> </div>
</body>
</html>
