/*
KillVote || date: 27/06/2013 || version: 1.0b || @drvymonkey (drvy.net)

Copyright (C) 2013  Dragomir Yordanov
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

var KillVote = (function(){

	var _class = 'killvote';
	var _url = 'vote.php';
	var _update = 1;
	var _errorMsg = 'Error al tratar de votar. Por favor inténtelo mas tarde.';

	this.kl_listen = function(){
		$(document)
		.on('mousemove','.'+_class,function(e){
			if($(this).attr('klvote')==='true'){return false;}
			$(this).children('.'+_class+'_uvote').show().css('width',e.pageX-$(this).offset().left);
		}).on('click','.'+_class,function(e){
			if($(this).attr('klvote')==='true'){return false;}
			var click_c = e.pageX - $(this).offset().left;
			$(this).children('.'+_class+'_uvote').show().css('width',click_c);
			var vote = kl_calc(click_c,$(this).width());
			var sesc = kl_sesc($(this));
			var id = kl_getid($(this).attr('id'));
			kl_vote(vote,id,sesc);
			kl_stop($(this));
			return true;
		});
	};

	var kl_vote = function(vote,id,sesc){
		if(vote<0||vote>100||id<0||sesc.length!==32||_url===undefined){return false;}
		$.post(_url,{'voter[]':[id,vote,sesc,_update]},function(result){
			if(result.substr(0,4)==='ret:'){kl_update(id,result.substr(4)+'%'); return true;}
			else if(result.substr(0,4)==='err:'){alert(_errorMsg+"\n {"+result.substr(4)+' }'); return false;}
			else{return true;}
		}).error(function(){alert(_errorMsg+"\n { Conexión rechazada (404|403|501) }"); return false;});
	};

	var kl_sesc = function(element){
		if($(element).length < 0){return false;}
		var result = $(element).children('p').html();
		if(result.length<1 || result.length>32){return false;}else{return result;}
	};

	var kl_getid = function(id){
		if(id===undefined || id.length<1){return false;}
		var result = id.substr(_class.length+1);
		if(result.length<1){return false;}else{return result;}
	};

	var kl_calc = function(pos,width){
		if($.isNumeric(pos)===false || $.isNumeric(width)===false){return false;}
		var result = Math.ceil((pos/width) * 100);
		if(result>100){result=100;}else if(result<0){result=0;}
		return result;
	};

	var kl_stop = function(element){
		$(element).attr('klvote','true').children('.'+_class+'_uvote').hide('slow');
		return true;
	};

	var kl_update = function(id,val){
		var element = $('#'+_class+'_'+id).children('.'+_class+'_voted'); if(element.length<1){return false;}
		$(element).attr('style','width:'+val+' !important;'); return true;
	};

	this.kl_listen();
});

$(function() {KillVote();});