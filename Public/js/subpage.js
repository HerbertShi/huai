// JavaScript Document
$(document).ready(function(){
	$("#KinSlideshow").css('width','1005px');
	$("#KSS_moveBox").css('width','1005px');
})
$("#KinSlideshow").KinSlideshow({
		moveStyle:"right",
		titleBar:{titleBar_height:30,titleBar_bgColor:"transparent",titleBar_alpha:0.5},
		titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
		btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
});
 var oScrollbar = $('#scrollbox');

 if(oScrollbar.length>0)
 oScrollbar.tinyscrollbar({lockscroll: true , scroll: true});
 
 $('.conaddbtn').click(function(){
   var _this = $(this),
       obj = _this.parent().parent(),
       top = $('.thumb').css('top');
       obj.clone(true).insertAfter(obj).find('.deljiaoyubtn').show();
     oScrollbar.tinyscrollbar_update();
     $('.thumb').css('top', top)
	 $('.deljiaoyubtn').click(function(){
		   var _this = $(this),
	       obj = _this.parent()
		   obj.slideUp(400, function(){
			  obj.remove();
	          oScrollbar.tinyscrollbar_update();		  
		   });
		   return false;
	 })
	 return false; 
 })