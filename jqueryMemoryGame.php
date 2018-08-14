<?php session_start();
?>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/bootstrap.min.css" rel="stylesheet" />
  <script src="/jquery.min.js"></script>
  <script src="/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <script src="myscripts.js"></script>
  <style>
  td:hover {background-color: #ddd;}
</style>
  
</head>
<body onload="myFunction()" style="margin:0;">

	<div id="loader"></div>

	<div style="display:none;" id="myDiv" class="animate-bottom">
	<H1 id="congrats"><H1>
	<table id="mytable">
	</table>
	
<script>
  	
	
	// images are anything that you would choose
	shapes=['<img id="n1" src="../images/red.png" style="width:60%; height:auto;">','<img id="n1" src="../images/lightgreen.png" style="width:60%; height:auto;">','<img id="n1" src="../images/darkgreen.png" style="width:60%; height:auto;">','<img id="n1" src="../images/orange.png" style="width:60%; height:auto;">','<img id="n1" src="../images/yellow.png" style="width:60%; height:auto;">','<img id="n1" src="../images/lightblue.png" style="width:60%; height:auto;">','<img id="n1" src="../images/darkblue.png" style="width:60%; height:auto;">','<img id="n1" src="../images/purple.png" style="width:60%; height:auto;">','<img id="n1" src="../images/pink.png" style="width:60%; height:auto;">'];
	shapesimg=['<img src="../images/red.png" style="width:60%; height:auto;">','<img src="../images/lightgreen.png" style="width:60%; height:auto;">','<img src="../images/darkgreen.png" style="width:60%; height:auto;">','<img src="../images/orange.png" style="width:60%; height:auto;">','<img src="../images/yellow.png" style="width:60%; height:auto;">','<img src="../images/lightblue.png" style="width:60%; height:auto;">','<img src="../images/darkblue.png" style="width:60%; height:auto;">','<img src="../images/purple.png" style="width:60%; height:auto;">','<img src="../images/pink.png" style="width:60%; height:auto;">'];
	
	vraag=new Array(); // question.
	antwoord=new Array();// answer.
	
	numcols=4;
	tempnom=generateRandom(shapes.length,0);
	vraag.push(shapes[tempnom].toString()); // add values to question array
	antwoord.push(shapesimg[tempnom].toString()); // add answer to question array
	
	for(i=1;i<(numcols*numcols/2);i++)
	{
		
		do
		{
			tempnom=generateRandom(shapes.length,0);
		}
		while(antwoord.indexOf(shapesimg[tempnom].toString())!=-1)
		
		vraag.push(shapes[tempnom].toString());
		antwoord.push(shapesimg[tempnom].toString());
			
	}
	
	tabelle = new Array();
	for(i=0;i<numcols;i++)
	{
		tabelle.push([])
	}
	
	for(i=0;i<numcols;i++)
	{
		for(j=0;j<numcols;j++)
		{
				tabelle[i].push('');
		}
	}
	console.log(tabelle);
	
	for(i=0;i<vraag.length;i++)
	{
		do
		{
			x=generateRandom(numcols,0);
			y=generateRandom(numcols,0);
			console.log(tabelle[x,y]);
			
		}
		while(tabelle[x][y]!='')
			
		tabelle[x][y]=vraag[i];
		
		do
		{
			x=generateRandom(numcols,0);
			y=generateRandom(numcols,0);
			console.log(tabelle[x,y]);
			
		}
		while(tabelle[x][y]!='')
			
		tabelle[x][y]=antwoord[i];
		
	}
	
	console.log(tabelle);
	
	
	var tableString = "<table class='table table-striped table-bordered style='table-layout: fixed;' >";
    body = document.getElementsByTagName('body')[0];
    div = document.createElement('div');
	var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	width=width/(numcols+2);
	
	for (row = 0; row < numcols; row += 1) {

		tableString += "<tr>";

		for (col = 0; col < numcols; col += 1) {

			tableString += "<td  style='line-height: 80px;'><p  style='opacity:0; text-align:center;display: block;margin: auto auto; vertical-align: middle; width:"+width+"'>" +   tabelle[row][col] + "</p></td>";
		}
    tableString += "</tr>";
	}

	tableString += "</table>";
	div.innerHTML = tableString;
	body.appendChild(div);
	document.getElementById('congrats').innerHTML="Please click on a block to start";
	
	//jquery start
	
	$opened='';
	$clicked=0;
	$realclicked=0;
	$('p').click(function() {
	$temptext=$(this).html();
	$temptext=$temptext.replace(' <="" p="">','');
	console.log("Clicked ="+$temptext);
	if ($temptext!="Found")
	{
		$realclicked++;
	
		
		
		if($opened==="")
		{
			$opened=$(this).html();
			$openid=$(this);
			console.log('First clicked'+$opened);
			$(this).animate({'opacity': "1"},100);
			$openid.prop("selected",1);
		}
		else
		{
			$tempopened=$(this).html();
			$(this).animate({'opacity': "1"},100).delay(100);
			console.log("This = ",$(this));
			console.log("Openid = ",$openid);
			
			$opened=$opened.replace(' <="" p="">','');
			$tempopened=$tempopened.replace(' <="" p="">','');
			
			opened=$opened;
			tempopened=$tempopened;
			
			console.log("Opened="+$opened);
			console.log("TempOpened="+$tempopened);
			
			temp1=vraag.indexOf(opened);
			temp2=antwoord.indexOf(opened);
			if(temp1===-1){$a1=temp2;}
			if(temp2===-1){$a1=temp1;}
			
			console.log("opened= "+opened);
			console.log("tempopened= "+tempopened);
			
			temp1a=vraag.indexOf(tempopened);
			temp2a=antwoord.indexOf(tempopened);
			if(temp1a===-1){$a2=temp2a;}
			if(temp2a===-1){$a2=temp1a;}
			
			console.log($a1+ " "+$a2);
			console.log(tempopened+ " "+ opened);
			console.log(vraag);
			console.log(antwoord);
						
			if(($a2===$a1)&&($(this).prop('selected')!=1))
			{
				console.log("We have a winner");
				$(this).css('text-align', 'center');
				$openid.css('text-align', 'center');
				$(this).html('Found');
				$openid.html('Found');
				//$(this).animate({'fontSize':'2vw'},100);// other animation options
				//$openid.animate({'fontSize':'2vw'},100);
				$openid.prop("selected",0);
				$(this).prop('selected',0);
				
				//$(this).css('background-color', 'red');// other animation options
				//$openid.css('background-color', 'red');
				$clicked++;
				$clicked++;
				if ($clicked>=(numcols*numcols)){
					clicked=$clicked;
					realclicked=$realclicked;
					clicked=realclicked/clicked*100;
					clicked=clicked.toFixed(2);
					console.log("Finished");
					document.getElementById('congrats').innerHTML="Congratulations, You have Finished";
					
					}
					document.getElementById('congrats').innerHTML="Clicks: "+$realclicked+" Found: "+$clicked;
				$openid=null;
				$opened="";
			}
			else
			{
				$(this).animate({'opacity': '0'},100);
				$openid.animate({'opacity': '0'},100);
				setTimeout(function () { 
				$openid.prop('selected',0);
				$(this).prop('selected',0);
				$opened="";
				$openid=null;
				document.getElementById('congrats').innerHTML="Clicks: "+$realclicked+" Found: "+$clicked;
				
				}, 100);
			}
		}
				
		
	}
	
}) 
	
 </script>
  
	</div>
</body>
</html>