// JavaScript Document
var index = 0, pictimeout, timeoutFlag = true;
var clientWidth = document.body.clientWidth;

function picmouseover(){
   if(timeoutFlag){
	  var _this = $(this);
	  var target = $('#banbox');
	   if(pictimeout!=null) clearTimeout(pictimeout);  
	   pictimeout = null; 
	   index = _this.index('.slidecon li');
	   if(index == 0){
 	    target.css('left', -clientWidth + 'px');     
       }else{
	    target.css('left', -(parseInt(index)-1)*clientWidth  + 'px');
	   }
	   modeSwitch(_this, index, target, clientWidth);
   }
   return false;
}

function picintervalHandle(obj) {
	index = obj.index('.slidecon li');
	modeSwitch(obj, index, $('#banbox'), clientWidth);
}

function picInterval(){
    if(index == 5){
      index = -1;
 	  $('#banbox').css('left', -clientWidth + 'px');     
    }
	index = index + 1;
	picintervalHandle($('.slidecon').find('li').eq(index))
	pictimeout = setTimeout(picInterval, 4000)
	return false;
}

function newsTabSwitch () {
  var _this = $(this),
  ind = _this.index('.nbheader li');
  modeSwitch(_this, ind, $('#newsboxcon'), 690);

}

function modeSwitch(obj, ind , target, num){
	if(obj.hasClass('current'))  return false;
	timeoutFlag = false;
	obj.addClass('current').siblings().removeClass('current');
    target.animate({
		left: -ind*num
	},500, function() {
		timeoutFlag = true;
	})

}



function picmouseout(){
	if(pictimeout!=null)clearTimeout(pictimeout); 
	pictimeout = setTimeout(picInterval, 4000)
	return false;
}

$('.nbheader').find('li').bind('click',newsTabSwitch);

//$('.wond_tp_icon').find('a').bind('click', wondtpTabSwitch);





function protabswitch(option){
	var obj = $('.prolistcon'),
	   list_len = obj.find('.prolist').length,
	   left = parseInt(obj.css('left'));
	   option == 'add' ? left += 270 : left -= 270 ;
	   if(left > 0 || left <  -(list_len-1) * 270) return false;
	   obj.animate({
		 left: left
	   },400);
}


$('.pro_opt').find('.prev_pro').click(function(){
	  protabswitch('jian')
})

$('.pro_opt').find('.next_pro').click(function(){
	 protabswitch('add')
})

/*
$('.slidecon').find('li').unbind('mouseenter').bind('mouseenter', picmouseover).unbind('mouseleave').bind("mouseleave",picmouseout);

$('.slidecon, .b_item').unbind('mouseenter').bind('mouseenter', function(){
    if(pictimeout!=null)clearTimeout(pictimeout);  
    pictimeout = null; 
}).unbind('mouseleave').bind("mouseleave",picmouseout); 

$('#banner').find('.scroLeft').click(function(){
    if(index == 0){
	  $('.slidecon').find('li').eq(5).mouseenter();		
    }else{
	  $('.slidecon').find('.current').prev().mouseenter();
	}
	return false;
})
$('#banner').find('.scroRight').click(function(){
    if(index == 5){
	  $('.slidecon').find('li').eq(0).mouseenter();		
    }else{
	  $('.slidecon').find('.current').next().mouseenter();
	}
	return false;
}) 
$('#banner').mouseenter(function(){
	$('.srollopt').show();
}).mouseleave(function(){
	$('.srollopt').hide();  
})*/

picInterval();

(function(){
  $('#slides').slidesjs({
    width: clientWidth,
    height: 427,
    navigation: false,
    play: {
      auto: true
    }      
  });

})(); 