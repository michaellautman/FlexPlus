/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to 
slow the page load.

*/

/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')"
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();}}}}

// as the page loads, call these scripts
$(document).ready(function() {

	// add foundation classes and color based on how many times tag is used
	function addFoundationClass(thisObj) {
	  var title = $(thisObj).attr('title');
	  if (title) {
	    var titles = title.split(' ');
	    if (titles[0]) {
	      var num = parseInt(titles[0]);
	      if (num > 0)
	      	$(thisObj).addClass('');
	      if (num > 2 && num < 4)
	        $(thisObj).addClass('success');
	      if (num > 5)
	        $(thisObj).addClass('alert');
	    }
	  }
	  return true;
	}

	$("#tag-cloud a").each(function() {
	    addFoundationClass(this);
	    return true;
	});
	
	$("ol.commentlist a.comment-reply-link").each(function() {
		$(this).addClass('button blue radius small');
		return true;
	});
	
	// Input placeholder text fix for IE
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
		input.val('');
		input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	  }
	}).blur();
	
	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
	 
}); /* end of as page load scripts */

/* Rainbow v1.1.8 rainbowco.de */
window.Rainbow=function(){function q(a){var b,c=a.getAttribute&&a.getAttribute("data-language")||0;if(!c){a=a.attributes;for(b=0;b<a.length;++b)if("data-language"===a[b].nodeName)return a[b].nodeValue}return c}function B(a){var b=q(a)||q(a.parentNode);if(!b){var c=/\blang(?:uage)?-(\w+)/;(a=a.className.match(c)||a.parentNode.className.match(c))&&(b=a[1])}return b}function C(a,b){for(var c in e[d]){c=parseInt(c,10);if(a==c&&b==e[d][c]?0:a<=c&&b>=e[d][c])delete e[d][c],delete j[d][c];if(a>=c&&a<e[d][c]||
b>c&&b<e[d][c])return!0}return!1}function r(a,b){return'<span class="'+a.replace(/\./g," ")+(l?" "+l:"")+'">'+b+"</span>"}function s(a,b,c,h){var f=a.exec(c);if(f){++t;!b.name&&"string"==typeof b.matches[0]&&(b.name=b.matches[0],delete b.matches[0]);var k=f[0],i=f.index,u=f[0].length+i,g=function(){function f(){s(a,b,c,h)}t0>0?f():setTimeout(f,0)};if(C(i,u))g();else{var m=v(b.matches),l=function(a,c,h){if(a>=c.length)h(k);else{var d=f[c[a]];if(d){var e=b.matches[c[a]],i=e.language,g=e.name&&e.matches?
e.matches:e,j=function(b,d,e){var i;i=0;var g;for(g=1;g<c[a];++g)f[g]&&(i=i+f[g].length);d=e?r(e,d):d;k=k.substr(0,i)+k.substr(i).replace(b,d);l(++a,c,h)};i?n(d,i,function(a){j(d,a)}):typeof e==="string"?j(d,d,e):w(d,g.length?g:[g],function(a){j(d,a,e.matches?e.name:0)})}else l(++a,c,h)}};l(0,m,function(a){b.name&&(a=r(b.name,a));if(!j[d]){j[d]={};e[d]={}}j[d][i]={replace:f[0],"with":a};e[d][i]=u;g()})}}else h()}function v(a){var b=[],c;for(c in a)a.hasOwnProperty(c)&&b.push(c);return b.sort(function(a,
b){return b-a})}function w(a,b,c){function h(b,k){k<b.length?s(b[k].pattern,b[k],a,function(){h(b,++k)}):D(a,function(a){delete j[d];delete e[d];--d;c(a)})}++d;h(b,0)}function D(a,b){function c(a,b,h,e){if(h<b.length){++x;var g=b[h],l=j[d][g],a=a.substr(0,g)+a.substr(g).replace(l.replace,l["with"]),g=function(){c(a,b,++h,e)};0<x%250?g():setTimeout(g,0)}else e(a)}var h=v(j[d]);c(a,h,0,b)}function n(a,b,c){var d=m[b]||[],f=m[y]||[],b=z[b]?d:d.concat(f);w(a.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/&(?![\w\#]+;)/g,
"&amp;"),b,c)}function o(a,b,c){if(b<a.length){var d=a[b],f=B(d);return!(-1<(" "+d.className+" ").indexOf(" rainbow "))&&f?(f=f.toLowerCase(),d.className+=d.className?" rainbow":"rainbow",n(d.innerHTML,f,function(k){d.innerHTML=k;j={};e={};p&&p(d,f);setTimeout(function(){o(a,++b,c)},0)})):o(a,++b,c)}c&&c()}function A(a,b){var a=a&&"function"==typeof a.getElementsByTagName?a:document,c=a.getElementsByTagName("pre"),d=a.getElementsByTagName("code"),f,e=[];for(f=0;f<d.length;++f)e.push(d[f]);for(f=0;f<
c.length;++f)c[f].getElementsByTagName("code").length||e.push(c[f]);o(e,0,b)}var j={},e={},m={},z={},d=0,y=0,t=0,x=0,l,p;return{extend:function(a,b,c){1==arguments.length&&(b=a,a=y);z[a]=c;m[a]=b.concat(m[a]||[])},b:function(a){p=a},a:function(a){l=a},color:function(a,b,c){if("string"==typeof a)return n(a,b,c);if("function"==typeof a)return A(0,a);A(a,b)}}}();window.addEventListener?window.addEventListener("load",Rainbow.color,!1):window.attachEvent("onload",Rainbow.color);Rainbow.onHighlight=Rainbow.b;
Rainbow.addClass=Rainbow.a;

Rainbow.extend([{matches:{1:{name:"keyword.operator",pattern:/\=/g},2:{name:"string",matches:{name:"constant.character.escape",pattern:/\\('|"){1}/g}}},pattern:/(\(|\s|\[|\=|:)(('|")([^\\\1]|\\.)*?(\3))/gm},{name:"comment",pattern:/\/\*[\s\S]*?\*\/|(\/\/|\#)[\s\S]*?$/gm},{name:"constant.numeric",pattern:/\b(\d+(\.\d+)?(e(\+|\-)?\d+)?(f|d)?|0x[\da-f]+)\b/gi},{matches:{1:"keyword"},pattern:/\b(and|array|as|bool(ean)?|c(atch|har|lass|onst)|d(ef|elete|o(uble)?)|e(cho|lse(if)?|xit|xtends|xcept)|f(inally|loat|or(each)?|unction)|global|if|import|int(eger)?|long|new|object|or|pr(int|ivate|otected)|public|return|self|st(ring|ruct|atic)|switch|th(en|is|row)|try|(un)?signed|var|void|while)(?=\(|\b)/gi},
{name:"constant.language",pattern:/true|false|null/g},{name:"keyword.operator",pattern:/\+|\!|\-|&(gt|lt|amp);|\||\*|\=/g},{matches:{1:"function.call"},pattern:/(\w+?)(?=\()/g},{matches:{1:"storage.function",2:"entity.name.function"},pattern:/(function)\s(.*?)(?=\()/g}]);Rainbow.extend("javascript",[{name:"selector",pattern:/(\s|^)\$(?=\.|\()/g},{name:"support",pattern:/\b(window|document)\b/g},{matches:{1:"support.property"},pattern:/\.(length|node(Name|Value))\b/g},{matches:{1:"support.function"},pattern:/(setTimeout|setInterval)(?=\()/g},{matches:{1:"support.method"},pattern:/\.(getAttribute|push|getElementById|getElementsByClassName|log|setTimeout|setInterval)(?=\()/g},{matches:{1:"support.tag.script",2:[{name:"string",pattern:/('|")(.*?)(\1)/g},{name:"entity.tag.script",
pattern:/(\w+)/g}],3:"support.tag.script"},pattern:/(&lt;\/?)(script.*?)(&gt;)/g},{name:"string.regexp",matches:{1:"string.regexp.open",2:{name:"constant.regexp.escape",pattern:/\\(.){1}/g},3:"string.regexp.close",4:"string.regexp.modifier"},pattern:/(\/)(?!\*)(.+)(\/)([igm]{0,3})/g},{matches:{1:"storage",3:"entity.function"},pattern:/(var)?(\s|^)(.*)(?=\s?=\s?function\()/g},{name:"entity.function",pattern:/(\w+)(?=:\s{0,}function)/g}]);Rainbow.extend("ruby",[{name:"string",matches:{1:"string.open",2:{name:"string.keyword",pattern:/(\#\{.*?\})/g},3:"string.close"},pattern:/("|`)(.*?[^\\\1])?(\1)/g},{name:"string",pattern:/('|"|`)([^\\\1\n]|\\.)*\1/g},{name:"string",pattern:/%[qQ](?=(\(|\[|\{|&lt;|.)(.*?)(?:'|\)|\]|\}|&gt;|\1))(?:\(\2\)|\[\2\]|\{\2\}|\&lt;\2&gt;|\1\2\1)/g},{matches:{1:"string",2:"string",3:"string"},pattern:/(&lt;&lt;)(\w+).*?$([\s\S]*?^\2)/gm},{matches:{1:"string",2:"string",3:"string"},pattern:/(&lt;&lt;\-)(\w+).*?$([\s\S]*?\2)/gm},
{name:"string.regexp",matches:{1:"string.regexp",2:{name:"string.regexp",pattern:/\\(.){1}/g},3:"string.regexp",4:"string.regexp"},pattern:/(\/)(.*?)(\/)([a-z]*)/g},{name:"string.regexp",matches:{1:"string.regexp",2:{name:"string.regexp",pattern:/\\(.){1}/g},3:"string.regexp",4:"string.regexp"},pattern:/%r(?=(\(|\[|\{|&lt;|.)(.*?)('|\)|\]|\}|&gt;|\1))(?:\(\2\)|\[\2\]|\{\2\}|\&lt;\2&gt;|\1\2\1)([a-z]*)/g},{name:"comment",pattern:/#.*$/gm},{name:"comment",pattern:/^\=begin[\s\S]*?\=end$/gm},{matches:{1:"constant"},
pattern:/(\w+:)[^:]/g},{matches:{1:"constant.symbol"},pattern:/[^:](:(?:\w+|(?=['"](.*?)['"])(?:"\2"|'\2')))/g},{name:"constant.numeric",pattern:/\b(0x[\da-f]+|\d+)\b/g},{name:"support.class",pattern:/\b[A-Z]\w*(?=((\.|::)[A-Za-z]|\[))/g},{name:"constant",pattern:/\b[A-Z]\w*\b/g},{matches:{1:"storage.class",2:"entity.name.class",3:"entity.other.inherited-class"},pattern:/\s*(class)\s+((?:(?:::)?[A-Z]\w*)+)(?:\s+&lt;\s+((?:(?:::)?[A-Z]\w*)+))?/g},{matches:{1:"storage.module",2:"entity.name.class"},
pattern:/\s*(module)\s+((?:(?:::)?[A-Z]\w*)+)/g},{name:"variable.global",pattern:/\$([a-zA-Z_]\w*)\b/g},{name:"variable.class",pattern:/@@([a-zA-Z_]\w*)\b/g},{name:"variable.instance",pattern:/@([a-zA-Z_]\w*)\b/g},{matches:{1:"keyword.control"},pattern:/[^\.]\b(BEGIN|begin|case|class|do|else|elsif|END|end|ensure|for|if|in|module|rescue|then|unless|until|when|while)\b(?![?!])/g},{matches:{1:"keyword.control.pseudo-method"},pattern:/[^\.]\b(alias|alias_method|break|next|redo|retry|return|super|undef|yield)\b(?![?!])|\bdefined\?|\bblock_given\?/g},
{matches:{1:"constant.language"},pattern:/\b(nil|true|false)\b(?![?!])/g},{matches:{1:"variable.language"},pattern:/\b(__(FILE|LINE)__|self)\b(?![?!])/g},{matches:{1:"keyword.special-method"},pattern:/\b(require|gem|initialize|new|loop|include|extend|raise|attr_reader|attr_writer|attr_accessor|attr|catch|throw|private|module_function|public|protected)\b(?![?!])/g},{name:"keyword.operator",pattern:/\s\?\s|=|&lt;&lt;|&lt;&lt;=|%=|&=|\*=|\*\*=|\+=|\-=|\^=|\|{1,2}=|&lt;&lt;|&lt;=&gt;|&lt;(?!&lt;|=)|&gt;(?!&lt;|=|&gt;)|&lt;=|&gt;=|===|==|=~|!=|!~|%|&amp;|\*\*|\*|\+|\-|\/|\||~|&gt;&gt;/g},
{matches:{1:"keyword.operator.logical"},pattern:/[^\.]\b(and|not|or)\b/g},{matches:{1:"storage.function",2:"entity.name.function"},pattern:/(def)\s(.*?)(?=(\s|\())/g}],!0);Rainbow.extend("html",[{name:"source.php.embedded",matches:{2:{language:"php"}},pattern:/&lt;\?=?(?!xml)(php)?([\s\S]*?)(\?&gt;)/gm},{name:"source.css.embedded",matches:{"0":{language:"css"}},pattern:/&lt;style(.*?)&gt;([\s\S]*?)&lt;\/style&gt;/gm},{name:"source.js.embedded",matches:{"0":{language:"javascript"}},pattern:/&lt;script(?! src)(.*?)&gt;([\s\S]*?)&lt;\/script&gt;/gm},{name:"comment.html",pattern:/&lt;\!--[\S\s]*?--&gt;/g},{matches:{1:"support.tag.open",2:"support.tag.close"},pattern:/(&lt;)|(\/?\??&gt;)/g},
{name:"support.tag",matches:{1:"support.tag",2:"support.tag.special",3:"support.tag-name"},pattern:/(&lt;\??)(\/|\!?)(\w+)/g},{matches:{1:"support.attribute"},pattern:/([a-z-]+)(?=\=)/g},{matches:{1:"support.operator",2:"string.quote",3:"string.value",4:"string.quote"},pattern:/(=)('|")(.*?)(\2)/g},{matches:{1:"support.operator",2:"support.value"},pattern:/(=)([a-zA-Z\-0-9]*)\b/g},{matches:{1:"support.attribute"},pattern:/\s(\w+)(?=\s|&gt;)(?![\s\S]*&lt;)/g}],!0);Rainbow.extend("css",[{name:"comment",pattern:/\/\*[\s\S]*?\*\//gm},{name:"constant.hex-color",pattern:/#([a-f0-9]{3}|[a-f0-9]{6})(?=;|\s)/gi},{matches:{1:"constant.numeric",2:"keyword.unit"},pattern:/(\d+)(px|em|cm|s|%)?/g},{name:"string",pattern:/('|")(.*?)\1/g},{name:"support.css-property",matches:{1:"support.vendor-prefix"},pattern:/(-o-|-moz-|-webkit-|-ms-)?[\w-]+(?=\s?:)(?!.*\{)/g},{matches:{1:[{name:"entity.name.sass",pattern:/&amp;/g},{name:"direct-descendant",pattern:/&gt;/g},{name:"entity.name.class",
pattern:/\.[\w\-_]+/g},{name:"entity.name.id",pattern:/\#[\w\-_]+/g},{name:"entity.name.pseudo",pattern:/:[\w\-_]+/g},{name:"entity.name.tag",pattern:/\w+/g}]},pattern:/([\w\ ,:\.\#\&\;\-_]+)(?=.*\{)/g},{matches:{2:"support.vendor-prefix",3:"support.css-value"},pattern:/(:|,)\s?(-o-|-moz-|-webkit-|-ms-)?([a-zA-Z-]*)(?=\b)(?!.*\{)/g},{matches:{1:"support.tag.style",2:[{name:"string",pattern:/('|")(.*?)(\1)/g},{name:"entity.tag.style",pattern:/(\w+)/g}],3:"support.tag.style"},pattern:/(&lt;\/?)(style.*?)(&gt;)/g}],
!0);