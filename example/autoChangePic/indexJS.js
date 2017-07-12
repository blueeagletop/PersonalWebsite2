var curIndex=0;
//时间间隔(单位毫秒)，每秒钟显示一张，数组共有9张图片放在img文件夹下。
var timeInterval=3000;
var arr=new Array();
arr[0]="img/1.jpg";
arr[1]="img/2.jpg";
arr[2]="img/3.jpg";
arr[3]="img/4.jpg";
arr[4]="img/5.jpg";
arr[5]="img/6.jpg";
arr[6]="img/7.jpg";
arr[7]="img/8.jpg";
arr[8]="img/9.jpg";
setInterval(changeImg,timeInterval);
function changeImg()
{
    var obj=document.getElementById('img');
    if (curIndex==arr.length-1) 
    {
        curIndex=0;
    }
    else
    {
        curIndex+=1;
		//图片自动放大和缩小
		if(curIndex%2==1){
			img.style.width = '110%';
		}
		else{
			img.style.width = '100%';
			}
    }
    obj.src=arr[curIndex];
}


