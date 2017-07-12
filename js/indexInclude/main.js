$(document).ready(function(){

	introMove();
	function introMove() {
		TweenLite.from($("#intro .el1"), 1, {css:{top: 160, left: 250}, delay:0.6});
		TweenLite.from($("#intro .el2"), 1, {css:{top: 160, left: 250}, delay:0.8});
		TweenLite.from($("#intro .el3"), 1, {css:{top: 160, left: 250}, delay:1.1});
		TweenLite.from($("#intro .electro"), 0.5, {css:{top: 20}, onComplete:introMoveEnd});
		$("#intro .electro").show();
	}
	function introMoveEnd(){
		eleRandomMove("start");	
	}
	var interval_ele;
	function eleRandomMove(type){
		if(type == "start"){
			clearInterval(interval_ele);
			interval_ele = setInterval(function () {
				TweenLite.to($("#intro .el1"), 1, {css:{top: Math.floor(Math.random() * 26 +(140)), left: Math.floor(Math.random() * 30 +(50))}});
				TweenLite.to($("#intro .el2"), 1, {css:{top: Math.floor(Math.random() * 30 +(10)), left: Math.floor(Math.random() * 30 +(220))}});
				TweenLite.to($("#intro .el3"), 1, {css:{top: Math.floor(Math.random() * 20 +(160)), left: Math.floor(Math.random() * 30 +(400))}});
			}, 800);
		}else{
			clearInterval(interval_ele);
		}
	}
})