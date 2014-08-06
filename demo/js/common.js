$(function(){
    var ali=$('.banner .dotts a');
    var aPage=$('.banner .img a');
    var aslide_img=$('.banner .img a');
    var iNow=0;
	
    ali.each(function(index){	
        $(this).mouseover(function(){
            slide(index);
        })
    });
	
    function slide(index){	
        iNow=index;
        ali.eq(index).addClass('active').siblings().removeClass();
		aPage.eq(index).siblings().stop().animate({"-moz-opacity":"0","filter":"alpha(opacity=0)","-khtml-opacity":"0","opacity":"0","z-index":"0"},600);
		aPage.eq(index).stop().animate({"-moz-opacity":"1","filter":"alpha(opacity=100)","-khtml-opacity":"1","opacity":"1","z-index":"1"},600);	
        aslide_img.eq(index).stop().animate({"-moz-opacity":"1","filter":"alpha(opacity=100)","-khtml-opacity":"1","opacity":"1","z-index":"1"},600).siblings('a').stop().animate({"-moz-opacity":"0","filter":"alpha(opacity=0)","-khtml-opacity":"0","opacity":"0","z-index":"0"},600);
    }
	
	function autoRun(){	
        iNow++;
		if(iNow==ali.length){
			iNow=0;
		}
		slide(iNow);
	}
	
	var timer=setInterval(autoRun,4000);
		
    ali.hover(function(){
		clearInterval(timer);
	},function(){
		timer=setInterval(autoRun,4000);
    });	
})
$(function(){
	$(".tel_popup .close").click(function(){
	 	$(this).parent("div").hide();	
	})	
})

$(function(){
	$("#popup").hide();
	$("#popup .title .right,#popup .btn_white").click(function(){
		$("#popup").hide();
	})
})
