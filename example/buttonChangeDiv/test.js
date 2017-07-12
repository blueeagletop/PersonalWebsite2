var divArr=new Array();
var divId=new Array();
var roundId=new Array();
var divNum=3;
var i=0;
//隐藏DIV图层
function hides(sdd){
	var ds=document.getElementById(sdd);
	ds.style.display='none';
}
//切换到第n个图层
function changeDiv(n){
	for(i=0;i<divNum;i++){//赋初值
		divId[i]="mottoWord"+i;
		divArr[i]=document.getElementById(divId[i]);
		roundId[i]="round"+i;
	}
	for(j=0;j<divNum;j++){
                        document.getElementById(roundId[n]).src="img/round_a.png";
			if(j==n){
				divArr[n].style.display='';
			}else{
				divArr[j].style.display='none';
				}
		}
	}



