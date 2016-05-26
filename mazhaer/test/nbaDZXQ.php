<?php 
	$itemInfoHupu = require './data/nbaTeam.php';
	$year = date('Y', $_SERVER['REQUEST_TIME']) - 1;
	if (isset($_REQUEST['home_team']) && isset($_REQUEST['away_team']))
	{
		$team_schedule_api = 'http://api.hupu.com/gamespace/team_schedule/';

		$home_team = $_REQUEST['home_team'];
		$away_team = $_REQUEST['away_team'];
		$home_team_name = isset($itemInfoHupu[$home_team]) ? $itemInfoHupu[$home_team] : '';
		$away_team_name = isset($itemInfoHupu[$away_team]) ? $itemInfoHupu[$away_team] : '';

		$season = isset($_REQUEST['season']) && ($_REQUEST['season'] > 2010 && $_REQUEST['season'] <= $year) ? $_REQUEST['season'] : $year;

		if ($home_team_name && $away_team_name)
		{
			$team_schedule_api .= $home_team;
			$team_schedule_api .= '?season=' . $season;

			$apiData = file_get_contents($team_schedule_api);
			$apiData = json_decode($apiData, true);

			$result = array(
			    'home'=>0, 
			    'home_all'=>0, 
			    'away'=>0, 
			    'away_all'=>0,
			    'home_score'=>array(),
			    'away_score'=>array()
			);

			if (!empty($apiData['data']))
			{
				foreach ($apiData['data'] as $value)
				{
				    if ($value['home_team_name_zh'] == $away_team_name || $value['away_team_name_zh'] == $away_team_name)
				    {
				        if ($value['home_team_name_zh'] == $away_team_name)
				        {
				            $result['away'] += ($value['away_score'] > $value['home_score']) ? 1 : 0;
				            $result['away_all'] += 1;
				            $result['away_score'][] = $value['home_score'] .':'. $value['away_score'];
				        }
				        else
				        {
				            $result['home'] += ($value['away_score'] > $value['home_score']) ? 0 : 1;
				            $result['home_all'] += 1;
				            $result['home_score'][] = $value['home_score'] .':'. $value['away_score'];
				        }
				    }
				}
			}
			else
			{
				exit();
			}
		}
		else
		{
			exit();
		}

		exit(json_encode($result));
	}
?>
<html lang="zh-CN">
	<head>
	<meta charset="UTF-8">

	<meta name="keywords" content="马扎网,马扎音乐,马扎儿,马扎">
	<title>马扎网 | nba 对阵查询</title>    
	<link rel="shortcut icon" type="image/x-icon" href="http://mazhaer.com/mazhaer-logo.ico">
	<meta name="description" content="听冷门, 听热荐, 听小众, 听大街, 听尘世繁杂, 听的乱七八糟； 听轻音, 听嘶吼, 听低吟, 听咆哮, 听人生百味, 听得繁花落尽。">
	<script type="text/javascript" src="http://mazhaer.com/wp-content/themes/presscore-lite/js/jquery-1.10.2.min.js?ver=1.10.2"></script>
	<link type="text/css" rel="stylesheet" href="./css/common.css">
	</head>

	<body style="text-align:center">

	<div id="blackDiv" class="blackdiv" style="position:absolute;z-index:999999999;width:100%;height:100%;display:none">
			<div id="loader_container">
				<div id="loader">
					<div>
						<img src="./img/loading.gif">数据加载中...
					</div>
				</div>
			</div>
		</div>

		<div id="select_div">
		<br />
		主队：
		<select id="home_team" class="select-style">
			<?php foreach ($itemInfoHupu as $key => $value) { ?>
				<option <?php if($key == 29) echo 'selected="selected"'; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>	
			<?php } ?>
		</select>
		<br />
		<br />
		客队：
		<select id="away_team" class="select-style">
			<?php foreach ($itemInfoHupu as $k => $v) { ?>
				<option <?php if($k == 21) echo 'selected="selected"'; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option>	
			<?php } ?>
		</select>
		<br />
		<br />
		赛季：
		<select id="season" class="select-style">
			<?php for ($i = 2011; $i <= $year; $i++){ ?>
				<option <?php if($i == $year) echo 'selected="selected"'; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>	
			<?php } ?>
		</select>
		<br />
		<br />

		<input type="button" onclick="getData();" value="查询" class="select-style" />

		</div>

		<div>
		<br />
		<br />
			<table class="hovertable" id ="home_table">
				<tr>
					<th>Info Header 1</th><th>Info Header 2</th><th>Info Header 3</th>
				</tr>
				<tr id="clone_tr">
					<td>Item 1A</td><td>Item 1B</td><td>Item 1C</td>
				</tr>
				<tr>
					<td>Item 2A</td><td>Item 2B</td><td>Item 2C</td>
				</tr>
				<tr>
					<td>Item 3A</td><td>Item 3B</td><td>Item 3C</td>
				</tr>
				<tr>
					<td>Item 4A</td><td>Item 4B</td><td>Item 4C</td>
				</tr>
				<tr>
					<td>Item 5A</td><td>Item 5B</td><td>Item 5C</td>
				</tr>
			</table>
		<br />
			<table class="hovertable" id="away_table">
				<tr>
					<th>Info Header 1</th><th>Info Header 2</th><th>Info Header 3</th>
				</tr>
				<tr>
					<td>Item 1A</td><td>Item 1B</td><td>Item 1C</td>
				</tr>
				<tr>
					<td>Item 2A</td><td>Item 2B</td><td>Item 2C</td>
				</tr>
				<tr>
					<td>Item 3A</td><td>Item 3B</td><td>Item 3C</td>
				</tr>
				<tr>
					<td>Item 4A</td><td>Item 4B</td><td>Item 4C</td>
				</tr>
				<tr>
					<td>Item 5A</td><td>Item 5B</td><td>Item 5C</td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">

			function getData()
			{
				var datas = {
					'home_team' : $('#home_team').val(),
					'away_team' : $('#away_team').val(),
				 	'season' : $('#season').val()
				};

				$.ajax({
			        url: './nbaDZXQ.php',
			        data: datas,
			        type: 'POST',
			        dataType: 'json',
			        beforeSend : function()
			        {
			        	$('#blackDiv').show();
			    	},
			        success: function(data)
			        {
			            console.log(data);
			            cloneOneTr('home_table');
			            changeTbaleStyle();
			            $('#blackDiv').hide();
			        }
			    });
			}

			function cloneOneTr(table_id)
			{
				$("#"+table_id).append($("#clone_tr").clone());
			}

			function changeTbaleStyle()
			{
				$(".hovertable tr").hover(
		        	function() { 
						$(this).css({"background-color":"#ffff66", "color":"#000000"});
					},
					function () { 
						$(this).css({"background-color":"#444444", "color":"#fff"}); 
					}
				);
			}

			$(function ()
			{
		       
		    });
		</script>
	</body>
</html>


<?php
	
?>