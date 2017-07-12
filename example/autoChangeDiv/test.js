var divArr=new Array();
var divId=new Array();
var divNum=3;
var i=0;
//隐藏DIV图层
function hides(sdd){
	var ds=document.getElementById(sdd);
	ds.style.display='none';
}
//图层切换
function ss(){
	for(i=0;i<divNum;i++){
		divId[i]="mottoWord"+i;
		divArr[i]=document.getElementById(divId[i]);
	}
	for(j=0;j<divNum;j++){
		if(j<divNum-1){
			if(divArr[j].style.display==''){
				divArr[j+1].style.display='';
				divArr[j].style.display='none';
				break;
				}
			}else{
				divArr[0].style.display='';
				divArr[j].style.display='none';
				}
		}
}
//定时器
function dd(){
	window.setInterval("ss()",1000);
}


