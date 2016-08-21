<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/js-TA.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(function(){});

		var apiKey="&apikey=e245944e-ed5b-4676-87d5-7dd87fffd55b";

		function newsArticle(title,link)
		{
			this.title=title;
			this.link=link;
		}
		newsArticle.prototype.display = function() 
		{
			$('#newsItems').append("<a href='"+this.link+"'><div class='newsItem'>"+this.title+"</div></a>");
		};
	</script>
	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<style type="text/css">
	body{
		font-family: 'Raleway';
	}

	#newsItems a{
		color: initial;
		text-decoration: none;
		background: rgba(0,0,0,0.1);
		display: block;
		border-bottom: 5px solid white;
		border-top: 5px solid white;
		margin-left: 2px;	
		font-size: 16px;
		transition: all 0.3s ease;
	}
	#newsItems a:hover{
		font-size: 26px;
		border: 0px solid transparent;
	}

	.newsItem
	{
		padding: 5px;		
	}

	#sentiment {
		font-size: 25px;
	}

	#stockData{
		display: none;
	}
	</style>
</head>
<body>
<div class="row center">
	<h2>Quant<span style="color: blue;">Edge</span></h2>
	<h4>The Ultimate Stock Market Toolbox</h4>
	<hr width="50%">
</div>
<div class="row center">
	<div class="col s4 center">
		<div class="row">
		<div class="input-field col s12">
			<select class="browser-default">
		      <option value="" disabled selected>Stocks in your portfolio</option>
		      <option value="1">Option 1</option>
		      <option value="2">Option 2</option>
		      <option value="3">Option 3</option>
		    </select>	
	   	</div>
	   	</div>
	   	<button type="submit" class="btn waves-effect waves-light" href="javascript:portfolio()">Use this stock</button>
	</div>
	<div class="input-field col s4 center">
		<form action="javascript:query()">
		<input type="text" id="input" value="General Motors"></input>
		<label class="active" for="input">Company name, and keywords if any</label>
		<button type="submit" class="btn waves-effect waves-light">News and Sentiment</button>
		</form>
	</div>
	<div class="input-field col s4 center">
		<form action="javascript:stockInfo()">
		<input type="text" id="symbol" value="YHOO"></input>
		<label class="active" for="symbol">Stock Symbol (NASDAQ/Yahoo Finance)</label>
		<button type="submit" class="btn waves-effect waves-light">Technical Analysis</button>
		</form>	
	</div>	
</div>
<div id="stockData" class="row center">
	<div class="row">
		<h5>Technical Analysis</h5>
	</div>
	<div class="row">
		<div id="simMovAvg" class="col s6" style="border-right: 2px solid teal">
			<div class="row">
				Simple Moving Averages
			</div>
			<div class="row">
				<div class="col s3">
					<span>5 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>10 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>20 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>50 Day: </span><span></span>
				</div>
			</div>	
			<div class="row">
				<a class="waves-effect waves-light btn" href="javascript:drawSMAchart()">View Graph</a>
			</div>	
		</div>
		<div id="expMovAvg" class="col s6 center">
			<div class="row">
				Exponential Moving Averages
			</div>
			<div class="row">
				<div class="col s3">
					<span>5 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>10 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>20 Day: </span><span></span>
				</div>
				<div class="col s3">
					<span>50 Day: </span><span></span>
				</div>
			</div>
			<div class="row">
				<a class="waves-effect waves-light btn" href="javascript:drawEMAchart()">View Graph</a>
			</div>			
		</div>
		<div id="roc"></div>
		<div id="oscillator"></div>
		<div id="macd"></div>
	</div>
</div>

<div id="chart_div"></div>

<div id="status"></div>

<div id="sentiment" class="center"></div>

<div id="newsItems"></div>

<script type="text/javascript">

var dFormat="YYYY-MM-DD";

var now=moment();
console.log(now.format(dFormat));
var oldestDate=dateDelta(-2);
console.log(oldestDate.format(dFormat));

var stockData={};

function portfolio()
{
	var selected=$("#symbol").val();
}

function dateDelta(delta)
{
	var date=moment();
	if(delta<0)
		date.subtract(Math.abs(delta),'days');
	else
		date.add(Math.abs(delta),'days');
	return date;
}

function stockInfo()
{
	$("#status").text("Calculating....");
	var symbol=$("#symbol").val();
	yahooQuery(symbol, dateDelta(-100), now);
}

function yahooQuery(symbol, start, end)
{
	start=start.format(dFormat);
	end=end.format(dFormat);

	var url="https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.historicaldata+where+symbol+=+%22"+symbol+"%22+and+startDate+=+%22"+start+"%22+and+endDate+=+%22"+end+"%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
	$.getJSON(url, function(data)
	{
		var closingPrices=[];
		var dates=[];

		var quotes=data.query.results.quote;
		for(var i in quotes)
		{
			closingPrices.push(quotes[i].Close);
			dates.push(quotes[i].Date);
		}

		stockData.closingPrices=closingPrices;
		stockData.dates=dates;

		stockData.SMA5day=TA.SMAverage(stockData.closingPrices, 5);
		stockData.SMA10day=TA.SMAverage(stockData.closingPrices, 10);
		stockData.SMA20day=TA.SMAverage(stockData.closingPrices, 20);
		stockData.SMA50day=TA.SMAverage(stockData.closingPrices, 50);

		stockData.EMA5day=TA.EMAverage(stockData.closingPrices, 5);
		stockData.EMA10day=TA.EMAverage(stockData.closingPrices, 10);
		stockData.EMA20day=TA.EMAverage(stockData.closingPrices, 20);
		stockData.EMA50day=TA.EMAverage(stockData.closingPrices, 50);

		showTechnicalAnalysis();
		$("#status").text("");
		$("#stockData").fadeIn();
	});
}

function showTechnicalAnalysis()
{
	sma=$("#simMovAvg").find('.col');
	sma.each(function(index, el) 
	{
		var x=$(this).children()[1];
		if(index==0)
			$(x).text(fixed(stockData.SMA5day[0],2));
		else if(index==1)
			$(x).text(fixed(stockData.SMA10day[0],2));
		else if(index==2)
			$(x).text(fixed(stockData.SMA20day[0],2));
		else if(index==3)
			$(x).text(fixed(stockData.SMA50day[0],2));
	});

	ema=$("#expMovAvg").find('.col');
	ema.each(function(index, el) 
	{
		var x=$(this).children()[1];
		if(index==0)
			$(x).text(fixed(stockData.EMA5day[0],2));
		else if(index==1)
			$(x).text(fixed(stockData.EMA10day[0],2));
		else if(index==2)
			$(x).text(fixed(stockData.EMA20day[0],2));
		else if(index==3)
			$(x).text(fixed(stockData.EMA50day[0],2));
	});

	//drawSMAchart();
}

function fixed(floating, places)
{
	return Number(floating).toFixed(places);
}

function drawSMAchart()
{
	chartTitle="Simple Moving Averages";
	dataObject={};
	dataObject.labels=['5day','10day','20day','50day'];
	dataObject.values=['SMA5day', 'SMA10day', 'SMA20day', 'SMA50day'];
	drawChart(dataObject, chartTitle);
}

function drawEMAchart()
{
	chartTitle="Exponential Moving Averages";
	dataObject={};
	dataObject.labels=['5day','10day','20day','50day'];
	dataObject.values=['EMA5day', 'EMA10day', 'EMA20day', 'EMA50day'];
	drawChart(dataObject, chartTitle);
}

function drawChart(dataObject, chartTitle)
{
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'date');
	for(var i in dataObject.labels)
	{
		data.addColumn('number', dataObject.labels[i]);
	}	
	var len=stockData.dates.length-1;
	for(var k in stockData.dates)
	{
		var i=len-k;
		var rowArray=[];
		rowArray.push(stockData.dates[i]);

		for(var j in dataObject.values)
		{
			var dataCell=stockData[dataObject.values[j]][i];
			rowArray.push(dataCell);
		}
		data.addRows([rowArray]);
	}
	var options = {
		title: chartTitle,
		curveType: 'function',
		legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	chart.draw(data, options);
}

function query()
{
	resetUI();
	var term=$("#input").val();
	var articles=[];

	$.getJSON('https://api.havenondemand.com/1/api/sync/findsimilar/v1?text='+term+'&absolute_max_results=30&indexes=news_eng&min_date='+oldestDate.format(dFormat)+'&min_score=75&sort=autn_rank&total_results=false'+apiKey, function(data) 
		{
			$("#status").text("Done! "+term);
        	var docs=data.documents;
        	for(var doc in docs)
        	{
        		var title=docs[doc].title;
        		var link=docs[doc].reference;
        		var isUnique=true;
        		for(var i in articles)
        		{
        			if(title==articles[i])
        			{
        				isUnique=false;
        				break;
        			}
        		}
        		if(isUnique)
        		{
        			articles.push(title);
        			var x=new newsArticle(title,link);
        			x.display();
        		}        		
        	}
        	$('#status').text("Finding the sentiment...");
        	sentiment(articles);
    	}
    );
}

function sentiment(textArray)
{
	var url="https://api.havenondemand.com/1/api/sync/analyzesentiment/v1?";
	for(var i in textArray)
	{
		var text=textArray[i];
		url+="text="+text.replace(/[^\w]/gi, '+')+"&";
	}
	url=url.slice(0,-1);
	url+=apiKey;
	console.log(url);
	$.getJSON(url, function(data)
	{
		var uiTag=$("#sentiment");
		console.log(data);
		var aggregate=data.aggregate;
		var sentiment=aggregate.sentiment;
		var score=Number(aggregate.score);
		score*=100;
		score=score.toFixed(2);
		uiTag.text("Sentiment: "+score+"% "+sentiment);
		if(sentiment=="positive")
			uiTag.css('color', 'green');
		else if(sentiment=="negative")
			uiTag.css('color', 'red');
		else
			uiTag.css('color', 'black');

		var articles=$('#newsItems');

		for(var i in data.positive)
		{
			var senti=data.positive[i];
			var element=articles.children().eq(senti.documentIndex);
			var score=Number(Math.abs(senti.score));
			score=score.toFixed(3);
			element.css('background', 'rgba(0,255,0,'+score+')');
			element.attr('sentiment', 'positive');
		}
		for(var i in data.negative)
		{
			var senti=data.negative[i];
			var element=articles.children().eq(senti.documentIndex);
			var score=Number(Math.abs(senti.score));
			score=score.toFixed(3);
			element.css('background', 'rgba(255,0,0,'+score+')');
			element.attr('sentiment', 'negative');
		}
		$("#status").text("");
		reorderNews();
	});
}

function reorderNews()
{
	var articles=$('#newsItems');
	var positive=[];
	var negative=[];
	var none=[];
	articles.children().each(function(index, el) {
		var sentiment=el.getAttribute('sentiment');
		if(sentiment=='positive')
			positive.push(el);
		else if(sentiment=='negative')
			negative.push(el);
		else
			none.push(el);
	});

	articles.html('');

	for(var i in positive)
	{
		articles.append(positive[i]);
	}
	for(var i in negative)
	{
		articles.append(negative[i]);
	}
	for(var i in none)
	{
		articles.append(none[i]);
	}
}

function resetUI()
{
	$("#status").text("Fetching data...");
	$("#newsItems").text("");
	$("#sentiment").text("");
}
</script>
	
</script>
</body>
</html>