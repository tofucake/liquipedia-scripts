// ==UserScript==
// @name        LP net login
// @namespace   fo
// @include     http://wiki.teamliquid.net/*
// @version     1
// @grant       none
// @run-at      document-idle
// @icon        http://wiki.liquipedia.space/starcraft2/FO.png
// ==/UserScript==

mw.loader.using( ['mediawiki.util', 'mediawiki.user'] ).then( function() {
	var scripttext = "var username = 'USER'; var password = 'PASSWORD';";

	scripttext += 
	"function wiki_auth(login, pass, ref) {"+
		"$.post(mw.util.wikiScript('api') + '?action=login&lgname=' + login + '&lgpassword=' + pass + '&format=json', function(data) {"+
			"if(data.login.result == 'NeedToken') {"+
				"$.post(mw.util.wikiScript('api') + '?action=login&lgname=' + login + '&lgpassword=' + pass + '&lgtoken='+mw.util.rawurlencode(data.login.token)+'&format=json', function(data) {"+
					"if(!data.error) {"+
						"if(data.login.result == 'Success') {"+
							"document.location.href=ref;"+
						"} else {"+
							"console.log('Result: '+ data.login.result);"+
						"}"+
					"} else {"+
						"console.log('Error: ' + data.error);"+
					"}"+
				"});"+
			"} else {"+
				"console.log('Result: ' + data.login.result);"+
			"}"+
			"if(data.error) {"+
				"console.log('Error: ' + data.error);"+
			"}"+
		"});"+
	"}"+
	"if(mw.user.isAnon()) {"+
		"wiki_auth(username, password, mw.config.get('wgArticlePath').replace('$1', mw.config.get('wgPageName')));"+
	"}"
	
	var script = document.createElement('script');
	script.innerHTML = scripttext;
	document.getElementById("top").appendChild(script);
});