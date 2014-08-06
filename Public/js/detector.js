/**
 * @author alteredq / http://alteredqualia.com/
 * @author mr.doob / http://mrdoob.com/
 */
 
Detector = {
	canvas: !! window.CanvasRenderingContext2D,
	webgl: ( function () { try { return !! window.WebGLRenderingContext } catch( e ) { return false; } } )(),
	workers: !! window.Worker,
	fileapi: window.File && window.FileReader && window.FileList && window.Blob,
	getWebGLErrorMessage: function () {
		var element = document.createElement( 'div' );
		element.id = 'webgl-error-message';
		element.style.fontFamily = 'monospace';
		element.style.fontSize = '13px';
		element.style.fontWeight = 'normal';
		element.style.textAlign = 'center';
		element.style.background = '#fff';
		element.style.color = '#000';
		element.style.padding = '1.5em';
		element.style.width = '400px';
		element.style.margin = '200px auto 0';
		if ( ! this.webgl ) {
			$('#loading').hide();
			element.innerHTML = window.WebGLRenderingContext ? [
				'抱歉，你的显卡貌似不支持WebGl，请尝试升级显卡驱动或购买新的显卡。<br /><a href="http://support.google.com/chrome/bin/answer.py?hl=zh-Hans&hlrm=en&answer=1220892" target="_blank" style="color:#00f;text-decoration: underline;">点击查看各型号显卡支持情况</a>.<br />',
				''
			].join( '\n' ) : [
				'抱歉，你的浏览器不支持WebGl，推荐使用Chrome浏览器<br/><a href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html?hl=zh-CN&brand=chmo" target="_blank" style="color:#00f;text-decoration: underline;">去下载Chrome浏览器</a> (安装后请用chrome浏览器打开)<BR/><span style="padding-left:20px;"><a id="setupIeplugin" style="color:#00f;text-decoration: underline;" target="_blank" href="models/ieplugin.msi">安装IE浏览器插件</a>(安装完成后请重启IE浏览器)</spa>',
				''
			].join( '\n' );

		}
		return element;
	},
	addGetWebGLMessage: function ( parameters ) {
		var parent, id, element;
		parameters = parameters || {};
		parent = parameters.parent !== undefined ? parameters.parent : document.body;
		id = parameters.id !== undefined ? parameters.id : 'oldie';
		element = Detector.getWebGLErrorMessage();
		element.id = id;
		document.getElementById('container').appendChild(element);

	
	}
};
