//实现id为“iframeId”的根据内容自动改变高度功能
function reinitIframe(){
var iframe = document.getElementById("iframeId");
try{
var bHeight = iframe.contentWindow.document.body.scrollHeight;
var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
var height = Math.max(bHeight, dHeight);
iframe.height = height;
console.log(height);
}catch (ex){}
}
window.setInterval("reinitIframe()", 200);
