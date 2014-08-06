// JavaScript Document

(function(){
		  
	var prolistBox = $('#proimgbox');
	var slideBox = $('#proslidebox');
	slideBox.find('.proslidecon').width(slideBox.find('.proslidecon li').length*103)
	prolistBox.find('.hide_tips').click(function(){
	  var obj = $(this).parent();
	  obj.slideUp();
	  obj.parents('.proimg').eq(0).find('.show_tips').show().click(function(){
	    obj.slideDown();
		$(this).hide();
	  });
	})
	
	slideBox.find('.proslidecon li').click(function(){
		var index = $(this).index('.proslidecon li');
		$(this).addClass('current').siblings().removeClass('current');
		prolistBox.find('.proimg').hide();
		prolistBox.find('.proimg').eq(index).fadeIn();
		return false;
		
	})
	
	slideBox.find('.nextPic').click(function(){
		var obj = slideBox.find('.proslidecon');
		var len = obj.find('li').length;
		var left =  parseInt(obj.css('left'));
		if(left <= -(len-7) *103){
		  return false;
		}
		obj.animate({
		 left: left - 103
		},200)
			
	})
	slideBox.find('.prevPic').click(function(){
		var obj = slideBox.find('.proslidecon');
		var left =  parseInt(obj.css('left'));
		if(left >= 0){
		  return false;
		}
		obj.animate({
		 left: left + 103
		},200)
	})	
	
})();