<div id="kestat">
<?php
define("IN_MYBB", 1);
define("NO_ONLINE", 1);
define('THIS_SCRIPT', 'laststats.php');
require_once "./global.php";
$query = $db->query("SELECT * FROM ".TABLE_PREFIX."threads t LEFT JOIN ".TABLE_PREFIX."users u on(t.uid= u.uid) WHERE t.visible = '1' ORDER BY t.lastpost DESC LIMIT 0, 15");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="/stylesheets/stats.css" />
<script type="text/javascript" language="javascript" src="/jscripts/stats.js"></script>
<div class="kestat">
<marquee id="scroller" height="200" onmouseover="this.stop()" onmouseout="this.start()" direction="up" scrollAmount="2" scrolldelay="1" >
<table dir="ltr" border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
while($threads = $db->fetch_array($query))
{	
$querylastpost = $db->query("SELECT * FROM ".TABLE_PREFIX."users u WHERE u.username = '".$threads['lastposter']."' LIMIT 1");
$lastpost  = $db->fetch_array($querylastpost);
$queryforum = $db->query("SELECT * FROM ".TABLE_PREFIX."forums f WHERE f.fid = '".$threads['fid']."' LIMIT 1");
$forum  = $db->fetch_array($queryforum);$forumlink = get_forum_link($forum['fid']);$lastposter = format_name($lastpost['username'], $lastpost['usergroup'], $lastpost['displaygroup']);$poster = format_name($threads['username'], $threads['usergroup'], $threads['displaygroup']);$threadlink = get_thread_link($threads['tid'],0, "lastpost");?>
<tr dir="rtl"><td dir="ltr" align="left" onMouseOver=this.style.backgroundColor="#fafafa" onMouseOut=this.style.backgroundColor="">
<font size="2" face="utf-8"><a target=_blank href="<?php echo $threadlink;?>"><FONT style="font-size:12px;line-height:20px;" COLOR="#00416b" face="tahoma"><b>» <?php echo htmlspecialchars_uni($threads['subject'])?></b></FONT></a></font><br> <font color="#466f89" face="tahoma" style="font-size:11px;line-height:18px;">Starter: <a target="_blank" href="member.php?action=profile&uid=<?php echo $threads['uid'];?>"><b><font color="#8a2be2"><b><?php echo $poster;?></b></font></b></a>  | Last Poster: <a target="_blank" href="member.php?action=profile&uid=<?php echo $lastpost['uid'];?>"><b><font color="#8a2be2"><b><?php echo $lastposter;?></b></font></b></a>  |  Views:  <font color="#2783bd"><b><?php echo $threads['views'];?></b></font> |  Replies:  <font color="#2783bd"><b><?php echo $threads['replies'];?></b></font> |  Forum:  <font color="#2783bd"><b><a href="<?php echo $forumlink;?>" target="_blank"><?php echo $forum['name'];?></a></b></font></FONT></td></tr>
<tr><td><div style="height:10px;background:#fafafa url(/images/ks.png);margin:5px 0 5px 0;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;"></div></td></tr><?php } ?></table></marquee>
<a href="javascript:Speed('up','msie');" title="Speed up last threads" class="lastposts_toolbar">Speed up</a> <font color="#064173" size="2"><b>\</b> </font>
<a href="javascript:Speed('down','msie');" title="Speed down last threads" class="lastposts_toolbar">Speed down</a> <font color="#064173" size="2"><b>\</b> </font>
<a href="javascript:st_st();" id="a_st_st" title="Stop last threads" class="lastposts_toolbar"><b id="b_st_st">Stop</b></a> <font color="#064173" size="2"><b>\</b> </font>
<a href="javascript:Reverse();" title="Reserve last threads" class="lastposts_toolbar">Reserve</a>
</div>	
</div>
