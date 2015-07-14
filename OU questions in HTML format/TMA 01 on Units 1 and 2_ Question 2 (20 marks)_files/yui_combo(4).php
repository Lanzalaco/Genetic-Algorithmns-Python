// This is an external script, included here, and in one line, for performance.
/* PluginDetect v0.8.6 www.pinlady.net/PluginDetect/license/ [ isMinVersion hasMimeType onDetectionDone ] [ Java Flash ] */ var PluginDetect={version:"0.8.6",name:"PluginDetect",openTag:"<",isDefined:function(b){return typeof b!="undefined"},isArray:function(b){return(/array/i).test(Object.prototype.toString.call(b))},isFunc:function(b){return typeof b=="function"},isString:function(b){return typeof b=="string"},isNum:function(b){return typeof b=="number"},isStrNum:function(b){return(typeof b=="string"&&(/\d/).test(b))},getNumRegx:/[\d][\d\.\_,\-]*/,splitNumRegx:/[\.\_,\-]/g,getNum:function(b,c){var d=this,a=d.isStrNum(b)?(d.isDefined(c)?new RegExp(c):d.getNumRegx).exec(b):null;return a?a[0]:null},compareNums:function(h,f,d){var e=this,c,b,a,g=parseInt;if(e.isStrNum(h)&&e.isStrNum(f)){if(e.isDefined(d)&&d.compareNums){return d.compareNums(h,f)}c=h.split(e.splitNumRegx);b=f.split(e.splitNumRegx);for(a=0;a<Math.min(c.length,b.length);a++){if(g(c[a],10)>g(b[a],10)){return 1}if(g(c[a],10)<g(b[a],10)){return -1}}}return 0},formatNum:function(b,c){var d=this,a,e;if(!d.isStrNum(b)){return null}if(!d.isNum(c)){c=4}c--;e=b.replace(/\s/g,"").split(d.splitNumRegx).concat(["0","0","0","0"]);for(a=0;a<4;a++){if(/^(0+)(.+)$/.test(e[a])){e[a]=RegExp.$2}if(a>c||!(/\d/).test(e[a])){e[a]="0"}}return e.slice(0,4).join(",")},getPROP:function(d,b,a){var c;try{if(d){a=d[b]}}catch(c){}return a},findNavPlugin:function(l,e,c){var j=this,h=new RegExp(l,"i"),d=(!j.isDefined(e)||e)?/\d/:0,k=c?new RegExp(c,"i"):0,a=navigator.plugins,g="",f,b,m;for(f=0;f<a.length;f++){m=a[f].description||g;b=a[f].name||g;if((h.test(m)&&(!d||d.test(RegExp.leftContext+RegExp.rightContext)))||(h.test(b)&&(!d||d.test(RegExp.leftContext+RegExp.rightContext)))){if(!k||!(k.test(m)||k.test(b))){return a[f]}}}return null},getMimeEnabledPlugin:function(k,m,c){var e=this,f,b=new RegExp(m,"i"),h="",g=c?new RegExp(c,"i"):0,a,l,d,j=e.isString(k)?[k]:k;for(d=0;d<j.length;d++){if((f=e.hasMimeType(j[d]))&&(f=f.enabledPlugin)){l=f.description||h;a=f.name||h;if(b.test(l)||b.test(a)){if(!g||!(g.test(l)||g.test(a))){return f}}}}return 0},getVersionDelimiter:",",findPlugin:function(d){var c=this,b,d,a={status:-3,plugin:0};if(c.DOM){c.DOM.initDiv()}if(!c.isString(d)){return a}if(d.length==1){c.getVersionDelimiter=d;return a}d=d.toLowerCase().replace(/\s/g,"");b=c.Plugins[d];if(!b||!b.getVersion){return a}a.plugin=b;a.status=1;return a},getPluginFileVersion:function(f,b){var h=this,e,d,g,a,c=-1;if(h.OS>2||!f||!f.version||!(e=h.getNum(f.version))){return b}if(!b){return e}e=h.formatNum(e);b=h.formatNum(b);d=b.split(h.splitNumRegx);g=e.split(h.splitNumRegx);for(a=0;a<d.length;a++){if(c>-1&&a>c&&d[a]!="0"){return b}if(g[a]!=d[a]){if(c==-1){c=a}if(d[a]!="0"){return b}}}return e},AXO:window.ActiveXObject,getAXO:function(a){var d=null,c,b=this;try{d=new b.AXO(a)}catch(c){};return d},browser:{},INIT:function(){this.init.library(this)},init:{$:1,hasRun:0,objProperties:function(d,e,b){var a,c={};if(e&&b){if(e[b[0]]===1&&!d.isArray(e)&&!d.isFunc(e)&&!d.isString(e)&&!d.isNum(e)){for(a=0;a<b.length;a=a+2){e[b[a]]=b[a+1];c[b[a]]=1}}for(a in e){if(!c[a]&&e[a]&&e[a][b[0]]===1){this.objProperties(d,e[a],b)}}}},publicMethods:function(c,f){var g=this,b=g.$,a,d;if(c&&f){for(a in c){try{if(b.isFunc(c[a])){f[a]=c[a](f)}}catch(d){}}}},plugin:function(a,c){var d=this,b=d.$;if(a){d.objProperties(b,a,["$",b,"$$",a]);if(!b.isDefined(a.getVersionDone)){a.installed=null;a.version=null;a.version0=null;a.getVersionDone=null;a.pluginName=c}}},detectIE:function(){var init=this,$=init.$,browser=$.browser,doc=document,e,x,tmp,userAgent=navigator.userAgent||"",progid,progid1,progid2;tmp=doc.documentMode;try{doc.documentMode=""}catch(e){}browser.isIE=$.isNum(doc.documentMode)?!0:eval("/*@cc_on!@*/!1");try{doc.documentMode=tmp}catch(e){};browser.verIE=null;if(browser.isIE){browser.verIE=($.isNum(doc.documentMode)&&doc.documentMode>=7?doc.documentMode:0)||((/^(?:.*?[^a-zA-Z])??(?:MSIE|rv\s*\:)\s*(\d+\.?\d*)/i).test(userAgent)?parseFloat(RegExp.$1,10):7)};browser.ActiveXEnabled=!1;browser.ActiveXFilteringEnabled=!1;if(browser.isIE){try{browser.ActiveXFilteringEnabled=window.external.msActiveXFilteringEnabled()}catch(e){}progid1=["Msxml2.XMLHTTP","Msxml2.DOMDocument","Microsoft.XMLDOM","TDCCtl.TDCCtl","Shell.UIHelper","HtmlDlgSafeHelper.HtmlDlgSafeHelper","Scripting.Dictionary"];progid2=["WMPlayer.OCX","ShockwaveFlash.ShockwaveFlash","AgControl.AgControl",];progid=progid1.concat(progid2);for(x=0;x<progid.length;x++){if($.getAXO(progid[x])){browser.ActiveXEnabled=!0;if(!$.dbug){break}}}if(browser.ActiveXEnabled&&browser.ActiveXFilteringEnabled){for(x=0;x<progid2.length;x++){if($.getAXO(progid2[x])){browser.ActiveXFilteringEnabled=!1;break}}}}},detectNonIE:function(){var f=this,d=this.$,a=d.browser,e=navigator,c=a.isIE?"":e.userAgent||"",g=e.vendor||"",b=e.product||"";a.isGecko=(/Gecko/i).test(b)&&(/Gecko\s*\/\s*\d/i).test(c);a.verGecko=a.isGecko?d.formatNum((/rv\s*\:\s*([\.\,\d]+)/i).test(c)?RegExp.$1:"0.9"):null;a.isChrome=(/(Chrome|CriOS)\s*\/\s*(\d[\d\.]*)/i).test(c);a.verChrome=a.isChrome?d.formatNum(RegExp.$2):null;a.isSafari=!a.isChrome&&((/Apple/i).test(g)||!g)&&(/Safari\s*\/\s*(\d[\d\.]*)/i).test(c);a.verSafari=a.isSafari&&(/Version\s*\/\s*(\d[\d\.]*)/i).test(c)?d.formatNum(RegExp.$1):null;a.isOpera=(/Opera\s*[\/]?\s*(\d+\.?\d*)/i).test(c);a.verOpera=a.isOpera&&((/Version\s*\/\s*(\d+\.?\d*)/i).test(c)||1)?parseFloat(RegExp.$1,10):null},detectPlatform:function(){var e=this,d=e.$,b,a=navigator.platform||"";d.OS=100;if(a){var c=["Win",1,"Mac",2,"Linux",3,"FreeBSD",4,"iPhone",21.1,"iPod",21.2,"iPad",21.3,"Win.*CE",22.1,"Win.*Mobile",22.2,"Pocket\\s*PC",22.3,"",100];for(b=c.length-2;b>=0;b=b-2){if(c[b]&&new RegExp(c[b],"i").test(a)){d.OS=c[b+1];break}}}},library:function(c){var e=this,d=document,b,a;c.init.objProperties(c,c,["$",c]);for(a in c.Plugins){c.init.plugin(c.Plugins[a],a)}e.publicMethods(c.PUBLIC,c);c.win.init();c.head=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0]||d.body||null;e.detectPlatform();e.detectIE();e.detectNonIE();c.init.hasRun=1}},ev:{$:1,handler:function(d,c,b,a){return function(){d(c,b,a)}},fPush:function(b,a){var c=this,d=c.$;if(d.isArray(a)&&(d.isFunc(b)||(d.isArray(b)&&b.length>0&&d.isFunc(b[0])))){a.push(b)}},callArray:function(a){var b=this,d=b.$,c;if(d.isArray(a)){while(a.length){c=a[0];a.splice(0,1);b.call(c)}}},call:function(d){var b=this,c=b.$,a=c.isArray(d)?d.length:-1;if(a>0&&c.isFunc(d[0])){d[0](c,a>1?d[1]:0,a>2?d[2]:0,a>3?d[3]:0)}else{if(c.isFunc(d)){d(c)}}}},PUBLIC:{isMinVersion:function(b){var a=function(j,h,e,d){var f=b.findPlugin(j),g,c=-1;if(f.status<0){return f.status}g=f.plugin;h=b.formatNum(b.isNum(h)?h.toString():(b.isStrNum(h)?b.getNum(h):"0"));if(g.getVersionDone!=1){g.getVersion(h,e,d);if(g.getVersionDone===null){g.getVersionDone=1}}if(g.installed!==null){c=g.installed<=0.5?g.installed:(g.installed==0.7?1:(g.version===null?0:(b.compareNums(g.version,h,g)>=0?1:-0.1)))};return c};return a},onDetectionDone:function(b){var a=function(j,h,d,c){var e=b.findPlugin(j),k,g;if(e.status==-3){return -1}g=e.plugin;if(!b.isArray(g.funcs)){g.funcs=[]};if(g.getVersionDone!=1){k=b.getVersion?b.getVersion(j,d,c):b.isMinVersion(j,"0",d,c)}if(g.installed!=-0.5&&g.installed!=0.5){b.ev.call(h);return 1}b.ev.fPush(h,g.funcs);return 0};return a},hasMimeType:function(b){var a=function(d){if(!b.browser.isIE&&d&&navigator&&navigator.mimeTypes){var g,f,c,e=b.isArray(d)?d:(b.isString(d)?[d]:[]);for(c=0;c<e.length;c++){if(b.isString(e[c])&&/[^\s]/.test(e[c])){g=navigator.mimeTypes[e[c]];f=g?g.enabledPlugin:0;if(f&&(f.name||f.description)){return g}}}}return null};return a},z:0},codebase:{$:1,isDisabled:function(){var b=this,c=b.$,a=c.browser;return a.ActiveXEnabled&&a.isIE&&a.verIE>=7?0:1},checkGarbage:function(d){var b=this,c=b.$,a;if(c.browser.isIE&&d&&c.getPROP(d.firstChild,"object")){a=c.getPROP(d.firstChild,"readyState");if(c.isNum(a)&&a!=4){b.garbage=1;return 1}}return 0},emptyGarbage:function(){var a=this,b=a.$,c;if(b.browser.isIE&&a.garbage){try{window.CollectGarbage()}catch(c){}a.garbage=0}},init:function(e){if(!e.init){var c=this,d=c.$,a,b;e.init=1;e.min=0;e.max=0;e.hasRun=0;e.version=null;e.L=0;e.altHTML="";e.span=document.createElement("span");e.tagA='<object width="1" height="1" style="display:none;" codebase="#version=';b=e.classID||e.$$.classID||"";e.tagB='" '+((/clsid\s*:/i).test(b)?'classid="':'type="')+b+'">'+e.altHTML+d.openTag+"/object>";for(a=0;a<e.Lower.length;a++){e.Lower[a]=d.formatNum(e.Lower[a]);e.Upper[a]=d.formatNum(e.Upper[a])}}},isActiveXObject:function(i,b){var f=this,g=f.$,a=0,h,d=i.$$,c=i.span;if(i.min&&g.compareNums(b,i.min)<=0){return 1}if(i.max&&g.compareNums(b,i.max)>=0){return 0}c.innerHTML=i.tagA+b+i.tagB;if(g.getPROP(c.firstChild,"object")){a=1};f.checkGarbage(c);c.innerHTML="";if(a){i.min=b}else{i.max=b}return a},convert_:function(f,a,b,e){var d=f.convert[a],c=f.$;return d?(c.isFunc(d)?c.formatNum(d(b.split(c.splitNumRegx),e).join(",")):b):d},convert:function(h,c,g){var e=this,f=h.$,b,a,d;c=f.formatNum(c);a={v:c,x:-1};if(c){for(b=0;b<h.Lower.length;b++){d=e.convert_(h,b,h.Lower[b]);if(d&&f.compareNums(c,g?d:h.Lower[b])>=0&&(!b||f.compareNums(c,g?e.convert_(h,b,h.Upper[b]):h.Upper[b])<0)){a.v=e.convert_(h,b,c,g);a.x=b;break}}}return a},isMin:function(g,f){var d=this,e=g.$,c,b,a=0;d.init(g);if(!e.isStrNum(f)||d.isDisabled()){return a};if(!g.L){g.L={};for(c=0;c<g.Lower.length;c++){if(d.isActiveXObject(g,g.Lower[c])){g.L=d.convert(g,g.Lower[c]);break}}}if(g.L.v){b=d.convert(g,f,1);if(b.x>=0){a=(g.L.x==b.x?d.isActiveXObject(g,b.v):e.compareNums(f,g.L.v)<=0)?1:-1}};return a},search:function(g){var k=this,h=k.$,i=g.$$,b=0,c;k.init(g);return g.version}},win:{$:1,loaded:false,hasRun:0,init:function(){var b=this,a=b.$;if(!b.hasRun){b.hasRun=1;b.runFuncs=a.ev.handler(b.$$runFuncs,a);b.cleanup=a.ev.handler(b.$$cleanup,a);b.addEvent("load",b.runFuncs);b.addEvent("unload",b.cleanup)}},addEvent:function(c,b){var e=this,d=e.$,a=window;if(d.isFunc(b)){if(a.addEventListener){a.addEventListener(c,b,false)}else{if(a.attachEvent){a.attachEvent("on"+c,b)}else{a["on"+c]=e.concatFn(b,a["on"+c])}}}},concatFn:function(d,c){return function(){d();if(typeof c=="function"){c()}}},funcs0:[],funcs:[],$$cleanup:function(b){if(b){for(var a in b){b[a]=0}b=0}},count:0,countMax:1,intervalLength:50,$$runFuncs:function(a){if(!a||a.win.loaded){return}var b=a.win;if(b.count<b.countMax&&b.funcs0.length){setTimeout(b.runFuncs,b.intervalLength)}else{b.loaded=true;a.ev.callArray(b.funcs0);a.ev.callArray(b.funcs);if(a.DOM){a.DOM.onDoneEmptyDiv()}}b.count++}},DOM:{$:1,isEnabled:{$:1,objectTag:function(){var a=this.$;return a.browser.isIE?a.browser.ActiveXEnabled:1},objectProperty:function(){var a=this.$;return a.browser.isIE&&a.browser.verIE>=7?1:0}},div:null,divID:"plugindetect",divClass:"doNotRemove",divWidth:50,getDiv:function(){var a=this;return a.div||document.getElementById(a.divID)||null},isDivPermanent:function(){var b=this,c=b.$,a=b.getDiv();return a&&c.isString(a.className)&&a.className.toLowerCase().indexOf(b.divClass.toLowerCase())>-1?1:0},initDiv:function(b){var c=this,d=c.$,a;if(!c.div){a=c.getDiv();if(a){c.div=a}else{if(b){c.div=document.createElement("div");c.div.id=c.divID}}if(c.div){c.setStyle(c.div,c.defaultStyle.concat(["display","block","width",c.divWidth+"px","height",(c.pluginSize+3)+"px","fontSize",(c.pluginSize+3)+"px","lineHeight",(c.pluginSize+3)+"px"]));if(!a){c.setStyle(c.div,["position","absolute","right","0px","top","0px"]);c.insertDivInBody(c.div)}}}},pluginSize:1,altHTML:"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",emptyNode:function(c){var b=this,d=b.$,a,f;if(c){if(d.browser.isIE){b.setStyle(c,["display","none"])}try{c.innerHTML=""}catch(f){}}},LASTfuncs:[],onDoneEmptyDiv:function(){var f=this,g=f.$,b,d,c,a,h;f.initDiv();if(!g.win.loaded||g.win.funcs0.length||g.win.funcs.length){return}for(b in g.Plugins){d=g.Plugins[b];if(d){if(d.OTF==3||(d.funcs&&d.funcs.length)){return}}}g.ev.callArray(f.LASTfuncs);a=f.getDiv();if(a){if(f.isDivPermanent()){}else{if(a.childNodes){for(b=a.childNodes.length-1;b>=0;b--){c=a.childNodes[b];f.emptyNode(c)}try{a.innerHTML=""}catch(h){}}if(a.parentNode){try{a.parentNode.removeChild(a)}catch(h){}a=null;f.div=null}}}},width:function(){var g=this,e=g.DOM,f=e.$,d=g.span,b,c,a=-1;b=d&&f.isNum(d.scrollWidth)?d.scrollWidth:a;c=d&&f.isNum(d.offsetWidth)?d.offsetWidth:a;return c>0?c:(b>0?b:Math.max(c,b))},obj:function(b){var d=this,c=d.span,a=c&&c.firstChild?c.firstChild:null;return a},readyState:function(){var b=this,a=b.DOM.$;return a.browser.isIE?a.getPROP(b.obj(),"readyState"):b.undefined},objectProperty:function(){var d=this,b=d.DOM,c=b.$,a;if(b.isEnabled.objectProperty()){a=c.getPROP(d.obj(),"object")}return a},getTagStatus:function(b,m,r,p,f,h){var s=this,d=s.$,q;if(!b||!b.span){return -2}var k=b.width(),c=b.readyState(),a=b.objectProperty();if(a){return 1.5}var g=/clsid\s*\:/i,o=r&&g.test(r.outerHTML||"")?r:(p&&g.test(p.outerHTML||"")?p:0),i=r&&!g.test(r.outerHTML||"")?r:(p&&!g.test(p.outerHTML||"")?p:0),l=b&&g.test(b.outerHTML||"")?o:i;if(!m||!m.span||!l||!l.span){return 0}var j=l.width(),n=m.width(),t=l.readyState();if(k<0||j<0||n<=s.pluginSize){return 0}if(h&&!b.pi&&d.isDefined(a)&&d.browser.isIE&&b.tagName==l.tagName&&b.time<=l.time&&k===j&&c===0&&t!==0){b.pi=1}if(j<n){return b.pi?-0.1:0}if(k>=n){if(!b.winLoaded&&d.win.loaded){return b.pi?-0.5:-1}if(d.isNum(f)){if(!d.isNum(b.count2)){b.count2=f}if(f-b.count2>0){return b.pi?-0.5:-1}}}try{if(k==s.pluginSize&&(!d.browser.isIE||c===4)){if(!b.winLoaded&&d.win.loaded){return 1}if(b.winLoaded&&d.isNum(f)){if(!d.isNum(b.count)){b.count=f}if(f-b.count>=5){return 1}}}}catch(q){}return b.pi?-0.1:0},setStyle:function(b,h){var c=this,d=c.$,g=b.style,a,f;if(g&&h){for(a=0;a<h.length;a=a+2){try{g[h[a]]=h[a+1]}catch(f){}}}},insertDivInBody:function(a,h){var j=this,d=j.$,g,b="pd33993399",c=null,i=h?window.top.document:window.document,f=i.getElementsByTagName("body")[0]||i.body;if(!f){try{i.write('<div id="'+b+'">.'+d.openTag+"/div>");c=i.getElementById(b)}catch(g){}}f=i.getElementsByTagName("body")[0]||i.body;if(f){f.insertBefore(a,f.firstChild);if(c){f.removeChild(c)}}},defaultStyle:["verticalAlign","baseline","outlineStyle","none","borderStyle","none","padding","0px","margin","0px","visibility","visible"],insert:function(b,i,g,h,c,q,o){var s=this,f=s.$,r,t=document,v,m,p=t.createElement("span"),k,a,l="outline-style:none;border-style:none;padding:0px;margin:0px;visibility:"+(q?"hidden;":"visible;")+"display:inline;";if(!f.isDefined(h)){h=""}if(f.isString(b)&&(/[^\s]/).test(b)){b=b.toLowerCase().replace(/\s/g,"");v=f.openTag+b+" ";v+='style="'+l+'" ';var j=1,u=1;for(k=0;k<i.length;k=k+2){if(/[^\s]/.test(i[k+1])){v+=i[k]+'="'+i[k+1]+'" '}if((/width/i).test(i[k])){j=0}if((/height/i).test(i[k])){u=0}}v+=(j?'width="'+s.pluginSize+'" ':"")+(u?'height="'+s.pluginSize+'" ':"");v+=">";for(k=0;k<g.length;k=k+2){if(/[^\s]/.test(g[k+1])){v+=f.openTag+'param name="'+g[k]+'" value="'+g[k+1]+'" />'}}v+=h+f.openTag+"/"+b+">"}else{b="";v=h}if(!o){s.initDiv(1)}var n=o||s.getDiv();m={span:null,winLoaded:f.win.loaded,tagName:b,outerHTML:v,DOM:s,time:new Date().getTime(),width:s.width,obj:s.obj,readyState:s.readyState,objectProperty:s.objectProperty};if(n&&n.parentNode){s.setStyle(p,s.defaultStyle.concat(["display","inline"]).concat(o?[]:["fontSize",(s.pluginSize+3)+"px","lineHeight",(s.pluginSize+3)+"px"]));n.appendChild(p);try{p.innerHTML=v}catch(r){};m.span=p;m.winLoaded=f.win.loaded}return m}},file:{$:1,any:"fileStorageAny999",valid:"fileStorageValid999",save:function(d,f,c){var b=this,e=b.$,a;if(d&&e.isDefined(c)){if(!d[b.any]){d[b.any]=[]}if(!d[b.valid]){d[b.valid]=[]}d[b.any].push(c);a=b.split(f,c);if(a){d[b.valid].push(a)}}},getValidLength:function(a){return a&&a[this.valid]?a[this.valid].length:0},getAnyLength:function(a){return a&&a[this.any]?a[this.any].length:0},getValid:function(c,a){var b=this;return c&&c[b.valid]?b.get(c[b.valid],a):null},getAny:function(c,a){var b=this;return c&&c[b.any]?b.get(c[b.any],a):null},get:function(d,a){var c=d.length-1,b=this.$.isNum(a)?a:c;return(b<0||b>c)?null:d[b]},split:function(g,c){var b=this,e=b.$,f=null,a,d;g=g?g.replace(".","\\."):"";d=new RegExp("^(.*[^\\/])("+g+"\\s*)$");if(e.isString(c)&&d.test(c)){a=(RegExp.$1).split("/");f={name:a[a.length-1],ext:RegExp.$2,full:c};a[a.length-1]="";f.path=a.join("/")}return f},z:0},Plugins:{java:{$:1,mimeType:["application/x-java-applet","application/x-java-vm","application/x-java-bean"],mimeType_dummy:"application/dummymimejavaapplet",classID:"clsid:8AD9C840-044E-11D1-B3E9-00805F499D93",classID_dummy:"clsid:8AD9C840-044E-11D1-B3E9-BA9876543210",navigator:{$:1,a:(function(){var b,a=!0;try{a=window.navigator.javaEnabled()}catch(b){}return a})(),javaEnabled:function(){return this.a},mimeObj:0,pluginObj:0},OTF:null,getVerifyTagsDefault:function(){return[1,this.applet.isDisabled.VerifyTagsDefault_1()?0:1,1]},getVersion:function(j,g,i){var b=this,d=b.$,e,a=b.applet,h=b.verify,k=b.navigator,f=null,l=null,c=null;if(b.getVersionDone===null){b.OTF=0;k.mimeObj=d.hasMimeType(b.mimeType);if(k.mimeObj){k.pluginObj=k.mimeObj.enabledPlugin}if(h){h.begin()}}a.setVerifyTagsArray(i);d.file.save(b,".jar",g);if(b.getVersionDone===0){if(a.should_Insert_Query_Any()){e=a.insert_Query_Any(j);b.setPluginStatus(e[0],e[1],f,j)}return}if((!f||d.dbug)&&b.navMime.query().version){f=b.navMime.version}if((!f||d.dbug)&&b.DTK.query(d.dbug).version){f=b.DTK.version}if((!f||d.dbug)&&b.navPlugin.query().version){f=b.navPlugin.version}if(b.nonAppletDetectionOk(f)){c=f}b.setPluginStatus(c,l,f,j);if(a.should_Insert_Query_Any()){e=a.insert_Query_Any(j);if(e[0]){c=e[0];l=e[1]}}b.setPluginStatus(c,l,f,j)},nonAppletDetectionOk:function(b){var d=this,e=d.$,a=d.navigator,c=1;if(!b||!a.javaEnabled()||(!e.browser.isIE&&!a.mimeObj)||(e.browser.isIE&&!e.browser.ActiveXEnabled)){c=0}else{if(e.OS>=20){}else{if(d.info&&d.info.getPlugin2Status()<0&&d.info.BrowserRequiresPlugin2()){c=0}}}return c},setPluginStatus:function(d,i,g,h){var b=this,e=b.$,f,c=0,a=b.applet;g=g||b.version0;f=a.isRange(d);if(f){if(a.setRange(f,h)==d){c=f}d=0}if(b.OTF<3){b.installed=c?(c>0?0.7:-0.1):(d?1:(g?-0.2:-1))}if(b.OTF==2&&b.NOTF&&!b.applet.getResult()[0]){b.installed=g?-0.2:-1}if(b.OTF==3&&b.installed!=-0.5&&b.installed!=0.5){b.installed=(b.NOTF.isJavaActive(1)==1?0.5:-0.5)}if(b.OTF==4&&(b.installed==-0.5||b.installed==0.5)){if(d){b.installed=1}else{if(c){b.installed=c>0?0.7:-0.1}else{if(b.NOTF.isJavaActive(1)==1){if(g){b.installed=1;d=g}else{b.installed=0}}else{if(g){b.installed=-0.2}else{b.installed=-1}}}}}if(g){b.version0=e.formatNum(e.getNum(g))}if(d&&!c){b.version=e.formatNum(e.getNum(d))}if(i&&e.isString(i)){b.vendor=i}if(!b.vendor){b.vendor=""}if(b.verify&&b.verify.isEnabled()){b.getVersionDone=0}else{if(b.getVersionDone!=1){if(b.OTF<2){b.getVersionDone=0}else{b.getVersionDone=b.applet.can_Insert_Query_Any()?0:1}}};e.codebase.emptyGarbage()},DTK:{$:1,hasRun:0,status:null,VERSIONS:[],version:"",HTML:null,Plugin2Status:null,classID:["clsid:CAFEEFAC-DEC7-0000-0001-ABCDEFFEDCBA","clsid:CAFEEFAC-DEC7-0000-0000-ABCDEFFEDCBA"],mimeType:["application/java-deployment-toolkit","application/npruntime-scriptable-plugin;DeploymentToolkit"],isDisabled:function(a){var c=this,d=c.$,b=d.browser;if(!a&&(!d.DOM.isEnabled.objectTag()||(b.isGecko&&d.compareNums(b.verGecko,d.formatNum("1.6"))<=0)||(b.isSafari&&d.OS==1&&(!b.verSafari||d.compareNums(b.verSafari,"5,1,0,0")<0))||b.isChrome)){return 1}return 0},query:function(n){var l=this,h=l.$,f=l.$$,k,m,i,a=h.DOM.altHTML,g={},b,d=null,j=null,c=(l.hasRun||l.isDisabled(n));l.hasRun=1;if(c){return l}l.status=0;if(h.browser.isIE){for(m=0;m<l.classID.length;m++){l.HTML=h.DOM.insert("object",["classid",l.classID[m]],[],a);d=l.HTML.obj();if(h.getPROP(d,"jvms")){break}}}else{i=h.hasMimeType(l.mimeType);if(i&&i.type){l.HTML=h.DOM.insert("object",["type",i.type],[],a);d=l.HTML.obj()}}if(d){try{b=h.getPROP(d,"jvms");if(b){j=b.getLength();if(h.isNum(j)){l.status=j>0?1:-1;for(m=0;m<j;m++){i=h.getNum(b.get(j-1-m).version);if(i){l.VERSIONS.push(i);g["a"+h.formatNum(i)]=1}}}}}catch(k){}}i=0;for(m in g){i++}if(i&&i!==l.VERSIONS.length){l.VERSIONS=[]}if(l.VERSIONS.length){l.version=h.formatNum(l.VERSIONS[0])};return l}},navMime:{$:1,hasRun:0,mimetype:"",version:"",length:0,mimeObj:0,pluginObj:0,isDisabled:function(){var b=this,d=b.$,c=b.$$,a=c.navigator;if(d.browser.isIE||!a.mimeObj||!a.pluginObj){return 1}return 0},query:function(){var i=this,f=i.$,a=i.$$,b=(i.hasRun||i.isDisabled());i.hasRun=1;if(b){return i};var n=/^\s*application\/x-java-applet;jpi-version\s*=\s*(\d.*)$/i,g,l,j,d="",h="a",o,m,k={},c=f.formatNum("0");for(l=0;l<navigator.mimeTypes.length;l++){o=navigator.mimeTypes[l];m=o?o.enabledPlugin:0;g=o&&n.test(o.type||d)?f.formatNum(f.getNum(RegExp.$1)):0;if(g&&m&&(m.description||m.name)){if(!k[h+g]){i.length++}k[h+g]=o.type;if(f.compareNums(g,c)>0){c=g}}}g=k[h+c];if(g){o=f.hasMimeType(g);i.mimeObj=o;i.pluginObj=o?o.enabledPlugin:0;i.mimetype=g;i.version=c};return i}},navPlugin:{$:1,hasRun:0,version:"",isDisabled:function(){var d=this,c=d.$,b=d.$$,a=b.navigator;if(c.browser.isIE||!a.mimeObj||!a.pluginObj){return 1}return 0},query:function(){var m=this,e=m.$,c=m.$$,h=c.navigator,j,l,k,g,d,a,i,f=0,b=(m.hasRun||m.isDisabled());m.hasRun=1;if(b){return m};a=h.pluginObj.name||"";i=h.pluginObj.description||"";if(!f||e.dbug){g=/Java.*TM.*Platform[^\d]*(\d+)(?:[\.,_](\d*))?(?:\s*[Update]+\s*(\d*))?/i;if((g.test(a)||g.test(i))&&parseInt(RegExp.$1,10)>=5){f="1,"+RegExp.$1+","+(RegExp.$2?RegExp.$2:"0")+","+(RegExp.$3?RegExp.$3:"0")}}if(!f||e.dbug){g=/Java[^\d]*Plug-in/i;l=g.test(i)?e.formatNum(e.getNum(i)):0;k=g.test(a)?e.formatNum(e.getNum(a)):0;if(l&&(e.compareNums(l,e.formatNum("1,3"))<0||e.compareNums(l,e.formatNum("2"))>=0)){l=0}if(k&&(e.compareNums(k,e.formatNum("1,3"))<0||e.compareNums(k,e.formatNum("2"))>=0)){k=0}d=l&&k?(e.compareNums(l,k)>0?l:k):(l||k);if(d){f=d}}if(!f&&e.browser.isSafari&&e.OS==2){j=e.findNavPlugin("Java.*\\d.*Plug-in.*Cocoa",0);if(j){l=e.getNum(j.description);if(l){f=l}}};if(f){m.version=e.formatNum(f)};return m}},applet:{$:1,codebase:{$:1,isMin:function(a){return this.$.codebase.isMin(this,a)},search:function(){return this.$.codebase.search(this)},ParamTags:'<param name="code" value="A19999.class" /><param name="codebase_lookup" value="false" />',DIGITMAX:[[16,64],[6,0,512],0,[1,5,2,256],0,[1,4,1,1],[1,4,0,64],[1,3,2,32]],DIGITMIN:[1,0,0,0],Upper:["999","10","5,0,20","1,5,0,20","1,4,1,20","1,4,1,2","1,4,1","1,4"],Lower:["10","5,0,20","1,5,0,20","1,4,1,20","1,4,1,2","1,4,1","1,4","0"],convert:[function(b,a){return a?[parseInt(b[0],10)>1?"99":parseInt(b[1],10)+3+"",b[3],"0","0"]:["1",parseInt(b[0],10)-3+"","0",b[1]]},function(b,a){return a?[b[1],b[2],b[3]+"0","0"]:["1",b[0],b[1],b[2].substring(0,b[2].length-1||1)]},0,function(b,a){return a?[b[0],b[1],b[2],b[3]+"0"]:[b[0],b[1],b[2],b[3].substring(0,b[3].length-1||1)]},0,1,function(b,a){return a?[b[0],b[1],b[2],b[3]+"0"]:[b[0],b[1],b[2],b[3].substring(0,b[3].length-1||1)]},1]},results:[[null,null],[null,null],[null,null],[null,null]],getResult:function(){var b=this,d=b.results,a,c=[];for(a=d.length-1;a>=0;a--){c=d[a];if(c[0]){break}}c=[].concat(c);return c},DummySpanTagHTML:0,HTML:[0,0,0,0],active:[0,0,0,0],DummyObjTagHTML:0,DummyObjTagHTML2:0,allowed:[1,1,1,1],VerifyTagsHas:function(c){var d=this,b;for(b=0;b<d.allowed.length;b++){if(d.allowed[b]===c){return 1}}return 0},saveAsVerifyTagsArray:function(c){var b=this,d=b.$,a;if(d.isArray(c)){for(a=1;a<b.allowed.length;a++){if(c.length>a-1&&d.isNum(c[a-1])){if(c[a-1]<0){c[a-1]=0}if(c[a-1]>3){c[a-1]=3}b.allowed[a]=c[a-1]}}b.allowed[0]=b.allowed[3]}},setVerifyTagsArray:function(d){var b=this,c=b.$,a=b.$$;if(a.getVersionDone===null){b.saveAsVerifyTagsArray(a.getVerifyTagsDefault())}if(c.dbug){b.saveAsVerifyTagsArray([3,3,3])}else{if(d){b.saveAsVerifyTagsArray(d)}}},isDisabled:{$:1,single:function(d){var a=this,c=a.$,b=a.$$;if(d==0){return c.codebase.isDisabled()}if((d==3&&!c.browser.isIE)||a.all()){return 1}if(d==1||d==3){return !c.DOM.isEnabled.objectTag()}if(d==2){return a.AppletTag()}},aA_:null,all:function(){var c=this,f=c.$,e=c.$$,b=e.navigator,a=0,d=f.browser;if(c.aA_===null){if(f.OS>=20){a=0}else{if(d.verOpera&&d.verOpera<11&&!b.javaEnabled()){a=1}else{if((d.verGecko&&f.compareNums(d.verGecko,f.formatNum("2"))<0)&&!b.mimeObj){a=1}else{if(c.AppletTag()&&!f.DOM.isEnabled.objectTag()){a=1}}}};c.aA_=a}return c.aA_},AppletTag:function(){var b=this,d=b.$,c=b.$$,a=c.navigator;return d.browser.isIE?!a.javaEnabled():0},VerifyTagsDefault_1:function(){var b=this.$,a=b.browser;if(b.OS>=20){return 1}if((a.isIE&&(a.verIE<9||!a.ActiveXEnabled))||(a.verGecko&&b.compareNums(a.verGecko,b.formatNum("2"))<0)||(a.isSafari&&(!a.verSafari||b.compareNums(a.verSafari,b.formatNum("4"))<0))||(a.verOpera&&a.verOpera<10)){return 0}return 1},z:0},can_Insert_Query:function(d){var b=this,c=b.results[0][0],a=b.getResult()[0];if(b.HTML[d]||(d==0&&c!==null&&!b.isRange(c))||(d==0&&a&&!b.isRange(a))){return 0}return !b.isDisabled.single(d)},can_Insert_Query_Any:function(){var b=this,a;for(a=0;a<b.results.length;a++){if(b.can_Insert_Query(a)){return 1}}return 0},should_Insert_Query:function(e){var c=this,f=c.allowed,d=c.$,b=c.$$,a=c.getResult()[0];a=a&&(e>0||!c.isRange(a));if(!c.can_Insert_Query(e)||f[e]===0){return 0}if(f[e]==3||(f[e]==2.8&&!a)){return 1}if(!b.nonAppletDetectionOk(b.version0)){if(f[e]==2||(f[e]==1&&!a)){return 1}}return 0},should_Insert_Query_Any:function(){var b=this,a;for(a=0;a<b.allowed.length;a++){if(b.should_Insert_Query(a)){return 1}}return 0},query:function(f){var j,a=this,i=a.$,d=a.$$,k=null,l=null,b=a.results,c,h,g=a.HTML[f];if(!g||!g.obj()||b[f][0]||d.bridgeDisabled||(i.dbug&&d.OTF<3)){return}c=g.obj();h=g.readyState();if(1){try{k=i.getNum(c.getVersion()+"");l=c.getVendor()+"";c.statusbar(i.win.loaded?" ":" ")}catch(j){};if(k&&i.isStrNum(k)){b[f]=[k,l];a.active[f]=2}}},isRange:function(a){return(/^[<>]/).test(a||"")?(a.charAt(0)==">"?1:-1):0},setRange:function(b,a){return(b?(b>0?">":"<"):"")+(this.$.isString(a)?a:"")},insertJavaTag:function(g,n,h,o,m){var e=this,c=e.$,k=e.$$,r="A.class",b=c.file.getValid(k),f=b.name+b.ext,q=b.path;var i=["archive",f,"code",r],l=(o?["width",o]:[]).concat(m?["height",m]:[]),j=["mayscript","true"],p=["scriptable","true","codebase_lookup","false"].concat(j),a=k.navigator,d=!c.browser.isIE&&a.mimeObj&&a.mimeObj.type?a.mimeObj.type:k.mimeType[0];if(g==1){return c.browser.isIE?c.DOM.insert("object",["type",d].concat(l),["codebase",q].concat(i).concat(p),h,k,0,n):c.DOM.insert("object",["type",d].concat(l),["codebase",q].concat(i).concat(p),h,k,0,n)}if(g==2){return c.browser.isIE?c.DOM.insert("applet",["alt",h].concat(j).concat(i).concat(l),["codebase",q].concat(p),h,k,0,n):c.DOM.insert("applet",["codebase",q,"alt",h].concat(j).concat(i).concat(l),[].concat(p),h,k,0,n)}if(g==3){return c.browser.isIE?c.DOM.insert("object",["classid",k.classID].concat(l),["codebase",q].concat(i).concat(p),h,k,0,n):c.DOM.insert()}if(g==4){return c.DOM.insert("embed",["codebase",q].concat(i).concat(["type",d]).concat(p).concat(l),[],h,k,0,n)}},insert_Query_Any:function(h){var b=this,d=b.$,c=b.$$,f=b.results,i=b.HTML,a=d.DOM.altHTML,e,g=d.file.getValid(c);if(b.should_Insert_Query(0)){if(c.OTF<2){c.OTF=2};f[0]=[0,0];e=h?b.codebase.isMin(h):b.codebase.search();if(e){f[0][0]=h?b.setRange(e,h):e}b.active[0]=e?1.5:-1}if(!g){return b.getResult()}if(!b.DummySpanTagHTML){b.DummySpanTagHTML=d.DOM.insert("",[],[],a)}if(b.should_Insert_Query(1)){if(c.OTF<2){c.OTF=2};i[1]=b.insertJavaTag(1,0,a);f[1]=[0,0];b.query(1)}if(b.should_Insert_Query(2)){if(c.OTF<2){c.OTF=2};i[2]=b.insertJavaTag(2,0,a);f[2]=[0,0];b.query(2)}if(b.should_Insert_Query(3)){if(c.OTF<2){c.OTF=2};i[3]=b.insertJavaTag(3,0,a);f[3]=[0,0];b.query(3)}if(d.DOM.isEnabled.objectTag()){if(!b.DummyObjTagHTML&&(i[1]||i[2])){b.DummyObjTagHTML=d.DOM.insert("object",["type",c.mimeType_dummy],[],a)}if(!b.DummyObjTagHTML2&&i[3]){b.DummyObjTagHTML2=d.DOM.insert("object",["classid",c.classID_dummy],[],a)}}c.NOTF.begin();return b.getResult()}},NOTF:{$:1,count:0,countMax:25,intervalLength:250,begin:function(){var c=this,b=c.$,a=c.$$;if(a.OTF<3&&c.shouldContinueQuery()){a.OTF=3;c.onIntervalQuery=b.ev.handler(c.$$onIntervalQuery,c);if(!b.win.loaded){b.win.funcs0.push([c.winOnLoadQuery,c])}setTimeout(c.onIntervalQuery,c.intervalLength)}},shouldContinueQuery:function(){var f=this,e=f.$,c=f.$$,b=c.applet,a,d=0;if(e.win.loaded&&f.count>f.countMax){return 0}for(a=0;a<b.results.length;a++){if(b.HTML[a]){if(!e.win.loaded&&f.count>f.countMax&&e.codebase.checkGarbage(b.HTML[a].span)){d=1;b.HTML[a].DELETE=1}if(!d&&!b.results[a][0]&&(b.allowed[a]>=2||(b.allowed[a]==1&&!b.getResult()[0]))&&f.isAppletActive(a)>=0){return 1}}};return 0},isJavaActive:function(d){var f=this,c=f.$$,a,b,e=-9;for(a=0;a<c.applet.HTML.length;a++){b=f.isAppletActive(a,d);if(b>e){e=b}}return e},isAppletActive:function(e,g){var h=this,f=h.$,b=h.$$,l=b.navigator,a=b.applet,i=a.HTML[e],d=a.active,k,c=0,j,m=d[e];if(g||m>=1.5||!i||!i.span){return m};j=f.DOM.getTagStatus(i,a.DummySpanTagHTML,a.DummyObjTagHTML,a.DummyObjTagHTML2,h.count);for(k=0;k<d.length;k++){if(d[k]>0){c=1}}if(j!=1){m=j}else{if(f.browser.isIE||(b.version0&&l.javaEnabled()&&l.mimeObj&&(i.tagName=="object"||c))){m=1}else{m=0}}d[e]=m;return m},winOnLoadQuery:function(c,d){var b=d.$$,a;if(b.OTF==3){a=d.queryAllApplets();d.queryCompleted(a)}},$$onIntervalQuery:function(d){var c=d.$,b=d.$$,a;if(b.OTF==3){a=d.queryAllApplets();if(!d.shouldContinueQuery()){d.queryCompleted(a)}}d.count++;if(b.OTF==3){setTimeout(d.onIntervalQuery,d.intervalLength)}},queryAllApplets:function(){var f=this,e=f.$,d=f.$$,c=d.applet,b,a;for(b=0;b<c.results.length;b++){c.query(b)}a=c.getResult();return a},queryCompleted:function(c){var g=this,f=g.$,e=g.$$,d=e.applet,b;if(e.OTF>=4){return}e.OTF=4;var a=g.isJavaActive();for(b=0;b<d.HTML.length;b++){if(d.HTML[b]&&d.HTML[b].DELETE){f.DOM.emptyNode(d.HTML[b].span);d.HTML[b].span=null}}e.setPluginStatus(c[0],c[1],0);if(f.onDetectionDone&&e.funcs){f.ev.callArray(e.funcs)}if(f.DOM){f.DOM.onDoneEmptyDiv()}}},zz:0},flash:{$:1,mimeType:"application/x-shockwave-flash",progID:"ShockwaveFlash.ShockwaveFlash",classID:"clsid:D27CDB6E-AE6D-11CF-96B8-444553540000",getVersion:function(){var b=function(i){if(!i){return null}var e=/[\d][\d\,\.\s]*[rRdD]{0,1}[\d\,]*/.exec(i);return e?e[0].replace(/[rRdD\.]/g,",").replace(/\s/g,""):null};var j=this,g=j.$,k,h,l=null,c=null,a=null,f,m,d;if(!g.browser.isIE){m=g.hasMimeType(j.mimeType);if(m&&g.DOM.isEnabled.objectTag()){f=g.DOM.insert("object",["type",j.mimeType],[],"",j).obj();try{l=g.getNum(f.GetVariable("$version"))}catch(k){}}if(!l){d=m?m.enabledPlugin:null;if(d&&d.description){l=b(d.description)}if(l){l=g.getPluginFileVersion(d,l)}}}else{for(h=15;h>2;h--){c=g.getAXO(j.progID+"."+h);if(c){a=h.toString();break}}if(!c){c=g.getAXO(j.progID)}if(a=="6"){try{c.AllowScriptAccess="always"}catch(k){return"6,0,21,0"}}try{l=b(c.GetVariable("$version"))}catch(k){}if(!l&&a){l=a}}j.installed=l?1:-1;j.version=g.formatNum(l);return true}},zz:0}};PluginDetect.INIT();

YUI.add('moodle-mod_oucontent-oucontent', function(Y) {
    M.mod_oucontent = {
        pix : null,
        jsstrings : '',
        flashinstalled : -99,
        javainstalled : -99,
        nextappletid : 1,
        loadedapplets : 0,

        init : function(str, pix) {
            this.jsstrings = str;
            this.pix = pix;
            var t = this;
            // Prepare onload.
            Y.on('load', this.page_on_load, window, this);

            // Init single/multi choice.
            var singlechoicefn = function(node) {
                var id = node.get('id').substring(4);
                t.toggle_choice_answers(id);
            };
            var multiplechoicefn = function(node) {
                var id = node.get('id').substring(4);
                t.toggle_choice_answers(id);
                t.update_reveal_button(node);
            };
            Y.all('form.oucontent-singlechoice-form').each(singlechoicefn);
            Y.all('form.oucontent-multichoice-form').each(multiplechoicefn);

            // Init matching (onload).
            Y.all('div.oucontent-matching-container').each(function(node) {
                var id = node.get('id').substring(8);
                Y.on('load', function() {
                    M.mod_oucontent.interactionmatching.init(id, node.get('oucontentmatches'));
                }, window);
            });

            // Init Flash etc.
            Y.all('div.oucontent-activecontent').each(function(node) {
                var type = node.get('oucontenttype'), params = node.get('oucontentparams');
                switch (type) {
                case 'flash' :
                    t.show_flash(node.get('id'), params.file,
                            params.width, params.height, params.vars, params.sesskey,
                            params.userid, params.activityid, params.itemid, params.courseid,
                            params.preview);
                    break;
                case 'html5' :
                    t.show_html(node.get('id'), params.file,
                            params.width, params.height, params.vars, params.sesskey,
                            params.userid, params.activityid, params.itemid, params.courseid,
                            params.preview);
                    break;
                case 'java' :
                    t.show_java(node.get('id'), params.java, params.width, params.height,
                            params.appletclass, params.javavars);
                    break;
                case 'openmark' :
                    t.show_openmark(node.get('id'), params.om, params.width, params.height);
                    break;
                }
            });

            if (Y.one('div.oucontent-referenceitem')) {
                var boxes = document.getElementsByName("refboxes");
                if (boxes.length !== 0) {
                    // Get last box.
                    var lastbox = Y.one(boxes[boxes.length-1]);
                    var lastcheckbox = lastbox.ancestor('.oucontent-referenceitem');
                    // Create div node to hold export and select all buttons.
                    var refitemdiv = Y.Node.create('<div class="refitemdiv">');
                    refitemdiv.appendChild(Y.Node.create('<br/>'));
                    var vbutton = Y.Node.create('<input type="button" />');
                    vbutton.set('value', M.mod_oucontent.jsstrings.exportselectedrefs);
                    vbutton.set('id', 'exportselectedrefs');
                    refitemdiv.appendChild(vbutton);
                    vbutton.on('click', M.mod_oucontent.refs_export_selected, vbutton);
                    refitemdiv.appendChild(Y.Node.create('&nbsp;'));
                    var selectallbutton = Y.Node.create('<input type="button" />');
                    selectallbutton.set('value', M.mod_oucontent.jsstrings.selectall);
                    selectallbutton.set('id', 'selectall');
                    refitemdiv.appendChild(selectallbutton);
                    // Insert nodes.
                    lastcheckbox.insert(refitemdiv, 'after');
                    selectallbutton.on('click', M.mod_oucontent.refs_select_all, selectallbutton);
                    // Add listener to checkboxes to update buttons if checkboxes clicked.
                    for (i=0; i<boxes.length; i++) {
                        var box = Y.one(boxes[i]);
                        box.on('click', M.mod_oucontent.refs_update_buttons, box);
                    }
                    // Make initial call to refs_update_buttons.
                    M.mod_oucontent.refs_update_buttons();
                }
            }
        },

        // Note: This method is called from mod/audiorecorder.
        init_audio_recorder : function(id, java, width, height, appletclass, javavars) {
            this.show_java(id, java, width, height, appletclass, javavars);
        },

        page_on_load : function () {
            // Check for reload - certain dynamic content requires that pages are
            // reloaded if you go Back or Forward to them.
            var reload = document.getElementById('oucontent_require_reload');
            if (reload) {
                if (Number(reload.value) === 1) {
                    reload.value = 0;
                    window.location.reload();
                    return;
                } else {
                    reload.value = 1;
                }
            }

            // Find referenced anchor tag and its parents.
            var hash = document.location.hash;
            var hashParents = [];
            if (hash) {
                var hashEl = document.getElementById(hash.substring(1));
                if (hashEl) {
                    for (; hashEl; hashEl=hashEl.parentNode) {
                        hashParents.push(hashEl);
                    }
                }
            }

            // Create toggle links for SAQ items.
            var divs = document.getElementsByTagName('div');
            this.dynamic_links(divs, hashParents, 'saq');

            // Create toggle links for ITQ items.
            var elements = document.getElementsByTagName('li');
            this.dynamic_links(elements, hashParents, 'itq');

            // Find rights info links
            var links=document.getElementsByTagName('a');
            for (var i=0; i<links.length; i++) {
                var link = links[i];
                if (link.className === 'oucontent-rightslink') {
                    link.href = '#';
                    link.onclick = this.do_rights_link(link);
                    // Hide box if visible (CSS means it won't be anyway except on export).
                    var box = link.nextSibling;
                    box.style.display = 'none';
                }
            }

            // Init any free-text responses.
            M.mod_oucontent.freeresponse.init();

            // Init alternative formats.
            M.mod_oucontent.altformats.init();

            if (document.body.className.indexOf('ie7') !== -1) {
                this.ie7_botched_tables();
            }
            if (document.body.className.indexOf('ie7') !== -1) {
                setTimeout(function () { M.mod_oucontent.force_ie_repaint(); }, 500);
                window.onresize = function() {
                    setTimeout(function () { M.mod_oucontent.force_ie_repaint(); }, 50);
                };
            }
        },

        do_rights_link : function (link) {
            return function() {
                var box = link.nextSibling;
                if (box.style.display === 'block') {
                    box.style.display = 'none';
                    link.title = M.mod_oucontent.jsstrings.show_rights_info.replace(/(<([^>]+)>)/ig,"");
                } else {
                    box.style.display = 'block';
                    link.title = M.mod_oucontent.jsstrings.hide_rights_info.replace(/(<([^>]+)>)/ig,"");
                }
                return false;
            };
        },

        ie7_botched_tables : function () {
            var tablesArray = [];
            var tables = document.getElementsByTagName('table');
            for (var j=0; j<tables.length; j++) {
                tablesArray[j] = tables[j];
            }
            for (var i=0; i<tablesArray.length; i++) {
                var table = tablesArray[i];
                var div = table.parentNode;

                if (div.className.indexOf('oucontent-table') !== -1) {
                    var desiredWidth = div.scrollWidth;
                    if (div.clientWidth < desiredWidth) {
                        var desiredTable = table.clientWidth;

                        // Create parent container
                        var container = document.createElement('div');
                        container.style.position = 'relative';
                        table.parentNode.insertBefore(container, table);
                        container.style.minHeight = table.offsetHeight + 'px';
                        table.parentNode.removeChild(table);

                        // Clone table and stick it into right place
                        table.style.width = (desiredTable) + 'px';
                        table.style.position = 'absolute';
                        table.style.top = '0px';
                        table.style.left = '0px';
                        container.appendChild(table);
                    }
                }
            }
        },

        dynamic_links : function (elements, hashParents, type) {
            for (var i=0; i<elements.length; i++) {
                var element = elements[i];
                var isInHash = false;
                for (var j=0; j<hashParents.length; j++) {
                    if (hashParents[j] === element) {
                        isInHash = true;
                        break;
                    }
                }
                var isDiscussion = element.className === 'oucontent-saq-discussion';
                var isAnswer = element.className === 'oucontent-saq-answer';
                if (isDiscussion || isAnswer) {
                    // In CSS, but needed for export.
                    element.style.display = 'none';

                    // Detect whether a discussion is next.
                    if (isDiscussion && element.hasRevealLink) {
                        continue;
                    }

                    var newElement = document.createElement('div');
                    newElement.className = 'oucontent-' + type + '-toggle';
                    var newLink = document.createElement('a');
                    newLink.href = '#';

                    newLink.className = 'oucontent-' + type + '-toggle-link';
                    newElement.appendChild(newLink);
                    var hidetext = document.createElement('span');

                    // The word we're using after 'Reveal' or 'Hide'.
                    if (isDiscussion) {
                        // Check if the discussion has a alias.
                        var discussionclassname = element.firstChild.className;
                        if (discussionclassname.indexOf("oucontent-discussionhasalias") === -1 &&
                                discussionclassname.indexOf("oucontent-discussionhastype") === -1) {
                            newLink.reveal = document.createElement('span');
                            newLink.reveal.innerHTML = M.mod_oucontent.jsstrings.interaction_reveal_discussion;
                            newLink.appendChild(newLink.reveal);
                            hidetext.innerHTML = M.mod_oucontent.jsstrings.interaction_hide_discussion;
                        } else {
                            // There is going to be a heading (may be h3/h4/etc) with the
                            // oucontent-h4 class containing text with the name.
                            var answerName = Y.one(element).one('.oucontent-h4').get('text').toLowerCase();
                            newLink.reveal = document.createElement('span');
                            newLink.reveal.innerHTML = M.mod_oucontent.jsstrings.interaction_reveal.replace(
                                    '#1',answerName);
                            newLink.appendChild(newLink.reveal);
                            hidetext.innerHTML = M.mod_oucontent.jsstrings.interaction_hide.replace(
                                    '#1',answerName);
                        }

                    } else {
                        // Check if answer has a type set as 'Specimen answer'.
                        var answerclassname = element.firstChild.className;
                        newLink.reveal = document.createElement('span');
                        if (answerclassname && answerclassname.indexOf("oucontent-specimen-answer") !== -1) {
                            newLink.reveal.innerHTML = M.mod_oucontent.jsstrings.interaction_reveal_specimen_answer;
                            hidetext.innerHTML = M.mod_oucontent.jsstrings.interaction_hide_specimen_answer;
                        } else {
                            newLink.reveal.innerHTML = M.mod_oucontent.jsstrings.interaction_reveal_answer;
                            hidetext.innerHTML = M.mod_oucontent.jsstrings.interaction_hide_answer;
                        }
                        newLink.appendChild(newLink.reveal);
                    }
                    newLink.flag = hidetext;

                    var targetStyle = null;
                    if (type === 'itq') {
                        targetStyle = 'list-item';
                    }
                    var toggleFunction = this.toggle_function(newLink,element, targetStyle);
                    if (isAnswer) {
                        sibling = this.next_sibling(element);
                        if (sibling && sibling.className === 'oucontent-saq-discussion') {
                            sibling.hasRevealLink = true;
                            targets = [element, sibling];
                            toggleFunction = this.toggle_function(newLink, targets, targetStyle);
                        }
                    }

                    newLink.onclick = toggleFunction;
                    newLink.tabIndex = 0;
                    newLink.onkeypress = newLink.onclick;
                    switch (type) {
                        case 'itq':
                            // append to previous list item.
                            var previousElement = this.previous_sibling(element);
                            previousElement.appendChild(newElement);
                            break;
                        default:
                            element.parentNode.insertBefore(newElement,element);
                            break;
                    }

                    element.parentNode.className += ' oucontent-' + type + '-withtoggle';
                    i++; // To account for the element we just added

                    if (isInHash) {
                        newLink.onclick('programmatic');
                        // The below line looks stupid but works, because previously the
                        // browser didn't jump to the hash on account that it was hidden.
                        location.hash = location.hash;
                    }
                }

                if (element.className === 'oucontent-closewindow') {
                    var a = document.createElement('a');
                    a.onclick = function() { window.close(); };
                    a.href = '#';
                    a.innerHTML = M.mod_oucontent.jsstrings.close_transcript;
                    element.appendChild(a);
                }
            }
        },

        toggle_function : function (link, targets, targetStyle) {
            return function(e) {
                if (e !== 'programmatic') {
                    var ev = e ? e : window.event;
                    if (ev.type === 'keypress' && Number(ev.which) !== 32 && Number(ev.which) !== 13) {
                        return true;
                    }
                }
                if (!M.mod_oucontent.is_array(targets)){
                    targets = [targets];
                }

                if (!targetStyle) {
                    targetStyle = 'block';
                }
                // Check if hiding and mess about with the button.
                var hide;
                if (link.firstChild === link.flag) {
                    hide = true;
                    link.appendChild(link.reveal);
                    link.removeChild(link.flag);
                } else {
                    hide = false;
                    link.appendChild(link.flag);
                    link.removeChild(link.reveal);
                }
                // Hide or show all targets.
                for (var i=0; i<targets.length; i++){
                    target = targets[i];
                    if (hide) {
                      target.style.display='none';
                    } else {
                      target.style.display=targetStyle;
                    }
                }

                M.mod_oucontent.force_ie_repaint();
                return false;
            };
        },

        /*
        * Function to get a correct previous sibling node from the dom
        * http://v3.thewatchmakerproject.com/journal/329/finding-html-elements-using-javascript-nextsibling-and-previoussibling
        */
        previous_sibling : function (node) {
            do {
                node = node.previousSibling;
            } while (node && Number(node.nodeType) !== 1);
            return node;
        },

        /*
         * Function to get a correct next sibling node from the dom.
         * http://v3.thewatchmakerproject.com/journal/329/finding-html-elements-using-javascript-nextsibling-and-previoussibling
         */
        next_sibling : function (node) {
            do {
                node = node.nextSibling;
            } while (node && Number(node.nodeType) !== 1);
            return node;
        },

        force_ie_repaint : function () {
            // IE7 needs a forced repaint.
            if (document.body.className.indexOf('ie7') !== -1) {
                var mc=document.getElementById('middle-column');
                if (!mc) {
                    // Used on other pages.
                    return;
                }
                if (mc.className.indexOf('evilfrog') === -1) {
                    mc.className += " evilfrog";
                } else {
                    mc.className = mc.className.replace(' evilfrog','');
                }
            }
        },

        /*
         * Is the passed object an array.
         * http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256C720080D723
         * @param obj object object to be checked
         * @return bool
         */
        is_array: function(obj) {
            if (!obj.constructor || obj.constructor.toString().indexOf("Array") === -1) {
                return false;
            }

            return true;
        },

        /**
         * This function open the transcript window. It is called from stage1.xsl.
         * @param url The url of the transcript window
         */
        open_transcript : function(url) {
          window.open(url,'transcript','width=450,height=550,location=yes,status=yes,resizable=yes,scrollbars=yes');
          return false;
        },

        build_focusable_list : function(list, element) {
            // Exclude items that are invisible or disabled.
            if (element.style.visibility.toLowerCase() === 'hidden' ||
                    element.style.display.toLowerCase() === 'none' ||
                    element.offsetWidth == 0 ||
                    (typeof element.disabled !== 'undefined' && element.disabled)) {
                return;
            }

            // Tabindex check: see
            // http://fluidproject.org/blog/2008/01/09/getting-setting-and-removing-tabindex-values-with-javascript/
            var attr = element.getAttributeNode("tabindex");
            var specifiedTabIndex = attr ? attr.specified : false;

            // Include elements with manually specified tabindex; links; form controls.
            if (specifiedTabIndex ||
                    (element.nodeName.toLowerCase() === 'a' && typeof element.href !== 'undefined' && element.href) ||
                    (element.nodeName.toLowerCase() === 'input' && element.type.toLowerCase() !== 'hidden') ||
                    (element.nodeName.toLowerCase() === 'textarea')) {
                list[list.length] = element;
            }

            // Do children.
            for (var child = element.firstChild; child !== null; child = child.nextSibling) {
                if (child.nodeType === 1) {
                    this.build_focusable_list(list, child);
                }
            }
        },

        toggle_choice_answers : function(id) {
            my_div=document.getElementById(id);
            my_div.style.display="block";
        },

        /**
         * Update the status of the reveal button for single/multiple-choice questions.
         * @param {object} node the YUI node of the oucontent-matching-container div.
         */
        update_reveal_button : function(node) {
            var checkboxes = node.all('input[type=checkbox]');
            var revealbutton = node.one('input[name=revealbutton]');
            checkboxes.each(function(checkbox) {
                checkbox.on('click', function() {
                    var ischecked = false;
                    for (var i=0; i<checkboxes.size(); i++) {
                        if (checkboxes.item(i).get('checked')) {
                            ischecked = true;
                        }
                    }
                    if (ischecked) {
                        // Disable the reveal button if there is any answer has been selected.
                        revealbutton.set('disabled', true);
                    } else {
                        revealbutton.set('disabled', false);
                    }
                }, checkbox);
            }, this);
        },

        reveal_choice_answer : function(formid, correctanswers) {
            //  Get the form.
            thisform = document.getElementById("form"+formid);
            var groupname = 'choice' + formid;

            //  Uncheck all.
            var grouplength = thisform[groupname].length-1;
            if (grouplength) {
                for (i=grouplength; i > -1; i--) {
                    thisform[groupname][i].checked = 0;
                    thisform[groupname][i].disabled = 1;
                }
            } else {
                thisform[groupname].checked = 0;
                thisform[groupname].disabled = 1;
            }

            //  Check if we only have one element.
            if (thisform[groupname].id) {
                //  Check if the input we have is the right answer.
                if (correctanswers) {
                    if (correctanswers !== '') {
                        thisform[groupname].checked = 1;
                    }
                    thisform.answerbutton.onclick();
                    thisform.answerbutton.disabled = true;
                    if (thisform.revealbutton) {
                        thisform.revealbutton.disabled = true;
                    }
                }
            } else {
                //  Check if the input we have is the right answer.
                if (correctanswers) {
                    var cor_len = correctanswers.length - 1;
                    for (i=cor_len; i > -1; i--) {
                        thisform[groupname][correctanswers[i]-1].checked = 1;
                    }
                    thisform.answerbutton.disabled = true;
                    if (thisform.revealbutton) {
                        thisform.revealbutton.disabled = true;
                    }
                    thisform.answerbutton.onclick();
                }
            }
            // Hide the oucontent-choice-feedback div after clicking the reveal button.
            Y.one(thisform).one('.oucontent-choice-feedback').setStyle('display', 'none');
            M.mod_oucontent.force_ie_repaint();

            return false;
        },

        /**
         * This function open a new window. It is called from stage1.xsl.
         * @param a The link node of the new window
         */
        open_new_window : function(a) {
            window.open(a.href,'_blank');
            return false;
        },

        process_single_choice : function(formid, answerid, correctanswer, feedback) {
            var choice = -1;
            var i = 0;
            thisform = document.getElementById("form" + formid);
            var groupname = 'choice' + formid;

            var grouplength = thisform[groupname].length - 1;
            for (i=grouplength; i > -1; i--) {
                if (thisform[groupname][i].checked) {
                    choice = i+1;
                    i = -1;
                }
            }

            for (i=grouplength; i > -1; i--) {
                feedbackdiv = document.getElementById(feedback[i]);
                if (feedbackdiv) {
                    feedbackdiv.style.display = "none";
                }
            }

            my_div = document.getElementById(answerid);

            // If this was not a mouse action (the last mouse action was > 250ms ago)
            // then change focus to help screenreader.
            if (new Date().getTime() - thisform.lastmouseaction > 250) {
                window.location.hash = answerid;
            }

            var array = [];
            array = M.mod_oucontent.find_print_answer_discussion(thisform.parentNode);

            var answer_tag = array[1];
            var discussion_tag = array[2];

            if (choice !== -1) {
                if (choice === Number(correctanswer)) {
                    my_div.innerHTML = "<p>" + M.mod_oucontent.jsstrings.interaction_correct + "</p>";

                    if (answer_tag) {
                        answer_tag.style.display = 'block';
                    }
                    if (discussion_tag) {
                        discussion_tag.style.display = 'block';
                    }
                    // Disable the reveal button on correct answer.
                    thisform.revealbutton.disabled = true;
                } else {
                    my_div.innerHTML = "<p>" + M.mod_oucontent.jsstrings.interaction_not_correct + " " +
                    M.mod_oucontent.jsstrings.interaction_try_again + "</p>";
                    if (answer_tag) {
                        answer_tag.style.display = 'none';
                    }
                    if (discussion_tag) {
                        discussion_tag.style.display = 'none';
                    }
                    // Enable the reveal button on wrong answer.
                    thisform.revealbutton.disabled = false;
                }
                feedbackdiv = document.getElementById(feedback[choice-1]);
                if (feedbackdiv) {
                    feedbackdiv.style.display = "block";
                }
            } else {
                my_div.innerHTML = "<p><strong>" +
                        M.mod_oucontent.jsstrings.interaction_please_choose_one + "</strong></p>";
            }
            my_div.style.display = 'block';
            M.mod_oucontent.force_ie_repaint();
        },

        process_multiple_choice : function(formid, answerid, correctanswers, feedback) {
            thisform = document.getElementById("form"+formid);
            var groupname = 'choice' + formid;
            var choices = [];

            //  Check if we only have one element (shouldn't happen, but it's only a minor
            //  change to be able to handle only one input!).
            if (thisform[groupname].id) {
                if (thisform[groupname].checked) {
                    choices[0]=1;
                }
                feedbackdiv = document.getElementById(feedback[0]);
                if (feedbackdiv) {
                    feedbackdiv.style.display = "none";
                }
            } else {
                var grouplength = thisform[groupname].length - 1;
                for (i=grouplength; i > -1; i--) {
                    if (thisform[groupname][i].checked) {
                        choices[choices.length] = i+1;
                    }
                    feedbackdiv = document.getElementById(feedback[i]);
                    if (feedbackdiv) {
                        feedbackdiv.style.display = "none";
                    }
                }
            }

            var choiceslength = choices.length;
            var correctlength = correctanswers.length;

            my_div=document.getElementById(answerid);

            var array = [];
            array = M.mod_oucontent.find_print_answer_discussion(thisform.parentNode);

            var answer_tag = array[1];
            var discussion_tag = array[2];

            //  Hide the answer and discussion.
            if (answer_tag) {
                answer_tag.style.display = 'none';
            }

            if (discussion_tag) {
                discussion_tag.style.display = 'none';
            }

            //  First thing we want to do is if no choices selected, but no right choices
            //  say the user is correct!
            var msg = '';
            if (choiceslength === 0 && correctlength === 0) {
                msg = "<p>" + M.mod_oucontent.jsstrings.interaction_correct + "</p>";
                my_div.innerHTML = msg;
                my_div.style.display="block";
                M.mod_oucontent.force_ie_repaint();
                if (answer_tag) {
                    answer_tag.style.display = 'block';
                }
                if (discussion_tag) {
                    discussion_tag.style.display = 'block';
                }
                my_div.style.display = 'block';
                return false;
            }

            if (choiceslength > 0) {
                //  Now we need to loop through all the answers and make sure we have all of
                //  them correct.
                var correct = 0;
                for (i=correctlength-1; i>-1; i--) {
                    for (y=choiceslength-1; y>-1; y--) {
                        if (choices[y] === Number(correctanswers[i])) {
                            correct += 1;
                        }
                    }
                }

                msg = "<p>";
                var incorrect = choiceslength - correct;

                if (correct === correctlength && incorrect === 0) {
                    msg += M.mod_oucontent.jsstrings.interaction_correct;
                    //  Show the answer and discussion
                    if (answer_tag) {
                        answer_tag.style.display = 'block';
                    }
                    if (discussion_tag) {
                        discussion_tag.style.display = 'block';
                    }
                } else {
                    if (correct === 0 && incorrect === 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_wrong_singular;
                    } else if (correct === 0 && incorrect!== 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_wrong_plural;
                    } else if (correct === 1 && incorrect === 0) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_incomplete_singular;
                    } else if (correct !== 1 && incorrect === 0) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_incomplete_plural;
                    }
                    else if (correct === 1 && incorrect === 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_wrong_singular_singular;
                    } else if (correct !== 1 && incorrect === 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_wrong_plural_singular;
                    } else if (correct === 1 && incorrect !== 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_wrong_singular_plural;
                    } else if (correct !== 1 && incorrect !== 1) {
                        msg += M.mod_oucontent.jsstrings.interaction_correct_wrong_plural_plural;
                    }
                    msg += " " + M.mod_oucontent.jsstrings.interaction_try_again;
                    msg = msg.replace("#1", "<b>" + correct+"</b>");
                    msg = msg.replace("#2", "<b>" + incorrect+"</b>");
                }

                msg += "</p>";
                my_div.innerHTML = msg;

                //  Now loop through all the choices and show feedback.
                for (y=choiceslength-1; y > -1; y--) {
                    choiceval = choices[y] - 1;
                    feedbackdiv = document.getElementById(feedback[choiceval]);
                    if (feedbackdiv) {
                        feedbackdiv.style.display = "block";
                    }
                }
            } else {
                my_div.innerHTML = "<p><b>" + M.mod_oucontent.jsstrings.interaction_please_choose_n + "</b></p>";
            }
            my_div.style.display = 'block';
            M.mod_oucontent.force_ie_repaint();
        },

        find_print_answer_discussion : function(container) {
            var answer = null;
            var discussion = null;
            var print = null;
            var n = null;

            //  Get the next sibling that isn't an empty text element!
            n = container;
            do {
                n = n.nextSibling;
            } while (n && n.nodeType !== 1);

            //  Check to see if the next sibling is print.
            if (n && M.mod_oucontent.is_print_node(n)) {
                print = n;

                //  If we have a print node check if the next sibling is a answer node.
                n = print;
                do {
                    n = n.nextSibling;
                } while (n && n.nodeType !== 1);

                if (n && M.mod_oucontent.is_answer_node(n)) {
                    answer = n;

                    //  Get the next node and see if it's a discussion.
                    n = answer;
                    do {
                        n = n.nextSibling;
                    } while (n && n.nodeType !== 1);

                    if (n && M.mod_oucontent.is_discussion_node(n)) {
                        discussion = n;
                    }
                } else if (n && M.mod_oucontent.is_discussion_node(n)) {
                    //  If we have a print node but no answer node, check if the next sibling is a discussion node.
                    discussion = n;
                }
            } else if (n && M.mod_oucontent.is_answer_node(n)) {
                //  If it's not print check to see if it's an answer.
                answer = n;

                //  Get the next node and see if it's a discussion.
                n = answer;
                do {
                    n = n.nextSibling;
                } while (n && n.nodeType !== 1);

                if (n && M.mod_oucontent.is_discussion_node(n)) {
                    discussion = n;
                }
            } else if (n && M.mod_oucontent.is_discussion_node(n)) {
                //  If it's not print and not answer check to see if it's a discussion.
                discussion = n;
            }

            return [print,answer,discussion];
        },

        is_print_node : function(node) {
            return node.className === 'oucontent-interaction-print';
        },

        is_discussion_node : function(node) {
            return node.className === 'oucontent-saq-interactivediscussion';
        },

        is_answer_node : function(node) {
            return node.className === 'oucontent-saq-interactiveanswer';
        },

        show_flash : function(id, file, width, height, vars, sesskey, userid,
                activityid, itemid, courseid, preview) {
            if (this.flashinstalled === -99 ) {
                this.flashinstalled = PluginDetect.isMinVersion('Flash', 9) == 1;
            }
            if (!this.flashinstalled) {
                Y.one('#' + id).get('firstChild').setStyle('display', 'block');
                return;
            }
            var params = {};
            if (vars) {
                var array = vars.split('%%SPLIT%%');
                for (var i=0; i<array.length; i++) {
                    var nameval = this.split_once(array[i], '=');
                    params[nameval[0]] = nameval[1];
                }
            }
            params._s = sesskey;
            params._u = userid;
            if (activityid) {
                params._a = activityid;
            }
            if (itemid) {
                params._i = itemid;
            }
            if (courseid) {
                params._c = courseid;
            }
            if (preview) {
                params._p = preview;
            }
            var embedsettings = {version: "9",
                fixedAttributes:
                    { allowScriptAccess : "always", allowNetworking : "all", wmode : "transparent" },
                flashVars:
                    params
            };
            Y.one('#' + id).setStyle('width', width + 'px');
            Y.one('#' + id).setStyle('height', height + 'px');
            // If it is a zip file, get the swf version of the file
            if ((file).match(/.zip\/index.(html|xhtml)$/)) {
                // only replace the last .zip found in the file name
                file = file.replace(new RegExp('.zip\/index.(html|xhtml)$'), '.swf');
            }

            var classes = Y.one('body').get('className');
            if (/ ie(1[123456789]|[23456789][0123456789])/.test(classes)) {
                // For IE11 to IE99, don't use Y.SWF as it is currently broken.
                var flashvars = '';
                for (var name in params) {
                    if (flashvars != '') {
                        flashvars += '&';
                    }
                    flashvars += Y.Escape.html(name) + '=' + Y.Escape.html(encodeURIComponent(params[name]));
                }
                var htmlstring = '<object type="application/x-shockwave-flash" data="' +
                        Y.Escape.html(file) +
                        '" width="100%" height="100%"><param name="quality" value="high" />' +
                        '<param name="flashvars" value="' + flashvars + '" />' +
                        '<param name="allowscriptaccess" value="always" />' +
                        '<param name="allownetworking" value="all" />' +
                        '<param name="allowfullscreen" value="true" />' +
                        '<param name="wmode" value="transparent" />' +
                        '</object>';
                Y.one('#' + id).set('innerHTML', htmlstring);
            } else {
                new Y.SWF("#" + id, file, embedsettings);
            }
        },

        show_html : function(id, file, width, height, vars, sesskey, userid,
                activityid, itemid, courseid, preview) {

            var htmliframe = Y.Node.create(
                '<iframe class="oucontent-html-activity" frameBorder="0" scrolling="no"/>');
            var querystring = '?_s=' + sesskey + '&_u=' + userid;
            if (activityid) {
                querystring += '&_a=' + activityid;
            // Set iframe name to activity id if specified (makes testing easier).
                htmliframe.setAttribute('name', activityid + '_iframe');
            }
            if (itemid) {
                querystring += '&_i=' + itemid;
            }
            if (courseid) {
                querystring += '&_c=' + courseid;
            }
            if (preview) {
                querystring += '&_p=' + preview;
            }
            if (vars) {
                var array = vars.split('%%SPLIT%%');
                for (var i=0; i<array.length; i++) {
                    var nameval = this.split_once(array[i], '=');
                    querystring += '&' + nameval[0] + '=' + encodeURIComponent(nameval[1]);
                }
            }

            htmliframe.setAttribute("src", file + querystring);
            htmliframe.setAttribute("width", width);
            htmliframe.setAttribute("height", height);
            // This is only needed for IE so that it inherits the background colour.
            htmliframe.setAttribute('allowtransparency', 'true');
            var iframediv = Y.one('#' + id);
            iframediv.insert(htmliframe, 'after');
        },

        show_java : function(id, java, width, height, appletclass, javavars) {
            if (this.javainstalled === -99 ) {
                this.javainstalled = PluginDetect.isMinVersion(
                        'Java', 1.5, 'plugindetect.getjavainfo.jar', [0, 2, 0]) == 1;
            }
            if (!this.javainstalled) {
                Y.one('#' + id).get('firstChild').setStyle('display', 'block');
                return;
            }

            var newApplet=document.createElement("applet");
            newApplet.code=appletclass;
            newApplet.archive=java;
            newApplet.width=width;
            newApplet.height=height;
            // Not directly tabbable.
            newApplet.tabIndex = -1;
            newApplet.mayScript = true;
            newApplet.id = "oucontentJava" + (this.nextappletid++);
            // In case applet supports the focushack system, we
            // pass in its id as a parameter.
            javavars[javavars.length] = 'focushackid';
            javavars[javavars.length] = newApplet.id;
            for (var i=0; i<javavars.length; i+=2) {
                var param=document.createElement('param');
                param.name=javavars[i];
                param.value=javavars[i+1];
                newApplet.appendChild(param);
            }
            var warningDiv = document.getElementById(id);
            warningDiv.style.display="none";
            newApplet.warningDiv = warningDiv;
            newApplet.warningDiv.parentNode.insertBefore(newApplet, warningDiv);
        },

        show_openmark : function (id, omquestion, width, height) {
            if (!document.getElementById("mobileviewpage")) {
                var minwidth = "1050px";
                if (document.getElementById("page")) {
                    document.getElementById("page").style.minWidth = minwidth;
                } else if (document.getElementById("wrapper")) {
                    document.getElementById("wrapper").style.minWidth = minwidth;
                }
            }
            var newIframe=document.createElement("iframe");
            newIframe.setAttribute("src", omquestion + '/?autofocus=off');
            newIframe.setAttribute("width", width+20);
            newIframe.setAttribute("height", height+41);
            newIframe.frameBorder = 0;
            newIframe.className="oucontent-omquestion";
            var my_div = document.getElementById(id);
            my_div.style.display="none";
            my_div.parentNode.insertBefore(newIframe, my_div);
        },

        /**
         * This function only splits the passing in string argument once using the delimiter.
         * @param {string} str the string to be splitted
         * @param {string} delim Specifies the character to use for separating the string
         * @return {Array} A array containing the two resultant substrings. If not found, the array
         * contains one element consisting of the entire passing in string.
         */
        split_once : function (str, delimiter) {
            var components = str.split(delimiter);
            var result = [components.shift()];
            if (components.length) {
                result.push(components.join(delimiter));
            }
            return result;
        },

        // functions to handle single or multiple export of references
        refs_export_selected : function() {
            var url = 'referenceexport.php?';
            // gets the 'id=...' or 'preview=...' parameter from the current URL
            var argstr = location.search.substring(1, location.search.length);
            var args = argstr.split('&');
            // add 'id=...' or 'preview=...' parameter to redirect URL for exporting references
            url = url + args[0];
            var checksfound = false;
            var boxes = document.getElementsByName("refboxes");
            var referencesstr = '';
            for (i=0; i<boxes.length; i++) {
                if (boxes[i].checked) {
                    checksfound = true;
                    referencesstr = referencesstr + boxes[i].value;
                }
            }
            if (checksfound) {
                url = url + '&references=' + referencesstr;
                to = url.length;
                url = url.substr(0, (to - 1));
                window.location.href = url;
            }
        },

        refs_select_all : function () {
            var boxes = document.getElementsByName("refboxes");
            for (i=0; i<boxes.length; i++) {
                boxes[i].checked = true;
            }
            // make call to refs_update_buttons to enable 'export references' and disable 'select all'
            M.mod_oucontent.refs_update_buttons();
        },

        refs_update_buttons : function() {
            var foundcount = 0;
            var boxes = document.getElementsByName("refboxes");
            // if export check boxes found display export buttons
            if (boxes.length !== 0) {
             // check to see how many boxes checked
                var numboxes = boxes.length;
                for (i=0; i<boxes.length; i++) {
                    if (boxes[i].checked) {
                        foundcount++;
                    }
                }
                // check to see whether 'export selected references' button should be enabled/disabled
                if (foundcount > 0) {
                    // enable export selected references button
                    document.getElementById("exportselectedrefs").disabled=false;
                } else {
                    if (foundcount === 0) {
                        // disable export selected references button
                        document.getElementById("exportselectedrefs").disabled=true;
                    }
                }
                // check to see whether 'select all' button should be enabled/disabled
                if (numboxes === foundcount) {
                    // all boxes checked so disable select all button
                    document.getElementById("selectall").disabled=true;
                } else {
                    // some/all boxes unchecked so enable select all button
                    document.getElementById("selectall").disabled=false;
                }
            }
        },

        // This object only contains the function called by Java applets directly.
        javaapplet : {
            applet_load : function(id) {
                var t = this;
                var applet = document.getElementById(id);
                var appletnode = Y.one(applet);

                // These autofocus divs before and after the applet allow focus
                // to be correctly moved to the front/back end of the applet's
                // controls when the user tabs.
                var beforeFocus = document.createElement('div');
                beforeFocus.tabIndex = 0;
                beforeFocus.className = 'oucontentJavaAutofocusBefore';
                beforeFocus.onfocus = function() {
                    t.scroll_into_view(appletnode);
                    applet.initFocus(false);
                };
                applet.parentNode.insertBefore(beforeFocus, applet);

                var afterFocus = document.createElement('div');
                afterFocus.tabIndex = 0;
                afterFocus.className = 'oucontentJavaAutofocusAfter';
                afterFocus.onfocus = function() {
                    t.scroll_into_view(appletnode);
                    applet.initFocus(true);
                };
                applet.parentNode.insertBefore(afterFocus, applet.warningDiv);

                // After all applets are loaded, focus the window to deal with bug
                this.loadedapplets++;
                if (this.loadedapplets === this.nextappletid - 1) {
                  this.loadedapplets = -1;
                  setTimeout(function() { window.focus(); }, 100);
                }
            },
            // If the element is not fully in view, scroll so that it is.
            scroll_into_view : function(target) {
                var region;
                var y;
                var height;
                region = target.get('region');
                y = Y.DOM.docScrollY();
                height = Y.DOM.winHeight();
                if (y + height < region.bottom) {
                  window.scroll(0, region.bottom - height);
                } else if (y > region.top) {
                  window.scroll(0, region.top);
                }
            },
            applet_ditch_focus : function (id, forward) {
                // Get the applet.
                var applet = document.getElementById(id);

                // Get list of everything that can be focused.
                var allFocusable = [];
                M.mod_oucontent.build_focusable_list(allFocusable, document.documentElement);

                // Find applet on list.
                var found = -1;
                for (var i=0; i<allFocusable.length; i++) {
                    if (allFocusable[i] === applet) {
                        found=i;
                        break;
                    }
                }
                if (found === -1) {
                    return;
                }

                // Move to next/previous thing.
                if (forward) {
                    // Including skipping the special autofocus div.
                    found += 2;
                    if (found === allFocusable.length) {
                        found = 0;
                    }
                } else {
                    // Again skip the 'before' focus div.
                    found-=2;
                    if (found < 0) {
                        found = allFocusable.length - 1;
                    }
                }
                var x = allFocusable[found];
                setTimeout(function(){ x.focus(); }, 0);
            }
        },

        // This object contains all the functions used by the alternative formats.
        altformats : {
            init : function() {
                var divs;
                var div;
                divs = Y.all('div.oucontent-alternatives');
                if (divs.size() !== 1) {
                    return;
                } else {
                    div = divs.item(0);
                }
                var heading = Y.one('div.oucontent-alternatives h3');
                var a = Y.Node.create('<a class="oucontent-alternatives-switch" alt="" href="#"> </a>');
                var img = Y.Node.create('<img src="' + M.mod_oucontent.pix.switch_plus + '" alt="" />');
                a.appendChild(img);
                a.appendChild(document.createTextNode(' '));
                a.altcontent = div.one('.oucontent-altcontent');
                a.img = img;
                a.showing = false;
                var span = Y.Node.create('<span/>');
                a.appendChild(span);

                var child = heading.get('firstChild');
                heading.removeChild(child);
                span.appendChild(child);
                heading.appendChild(a);
                a.on('click', function(e) {
                    e.preventDefault();
                    var altcontent = this.altcontent;
                    if (!this.showing) {
                        this.img.set('src', this.img.get('src').replace(/_plus/, '_minus'));
                        altcontent.setStyle('display', 'block');
                        var desiredHeight = Math.ceil(Number(altcontent.getComputedStyle('height').replace('px', '')));
                        altcontent.setStyle('maxHeight', '0');
                        altcontent.setStyle('opacity', 0);

                        altcontent.transition({
                            easing: 'ease',
                            duration: 0.5,
                            opacity: 1.0,
                            maxHeight: desiredHeight + 'px'
                        }, function() {
                            altcontent.setStyle('maxHeight', 'none');
                        });
                        this.showing = true;
                    } else {
                        this.img.set('src', this.img.get('src').replace(/_minus/, '_plus'));
                        var currentHeight = Math.ceil(Number(altcontent.getComputedStyle('height').replace('px', '')));
                        altcontent.setStyle('maxHeight', currentHeight + 'px');
                        altcontent.transition({
                            easing: 'ease',
                            duration: 0.5,
                            opacity: 0.0,
                            maxHeight: 0
                        }, function() {
                            altcontent.setStyle('display', 'none');
                            altcontent.setStyle('maxHeight', 'none');
                        });
                        this.showing = false;
                    }
                }, a);
            }
        },

        // This object contains all the functions used by the free text response activities.
        freeresponse : {
            init : function () {
                var forms = document.getElementsByTagName("form");
                for (var i=0; i<forms.length; i++) {
                    var form = forms[i];
                    // See if this form matches the right class.
                    if (form.className.indexOf('oucontent-freeresponse') !== -1) {
                        M.mod_oucontent.freeresponse.init_one(form);
                    }
                }
            },

            init_one : function (form) {
                // Set up basic data regarding form elements.
                form.freeResponse = form.getAttributeNode('id').value;
                form.waitIcon = document.getElementById('freeresponsewait_' +
                        form.freeResponse);
                form.fieldContent = form.elements['content'];
                form.fieldSubmitS = form.elements['submit_s'];
                form.fieldSubmitR = form.elements['submit_r'];
                form.fieldSubmitReset = form.elements['submit_reset'];
                form.fieldDefaultValue = form.elements['defaultvalue'];
                form.gotValue = form.elements['gotvalue'].value == 1 ? true : false;

                // Firefox: turn off spellchecking by default if the field is not English
                // (this is a hack and we need to stop doing it if they ever fix Firefox
                // bug 338427).
                if (form.fieldContent.lang && form.fieldContent.lang.indexOf('en') !== 0) {
                    form.fieldContent.setAttribute('spellcheck','false');
                }

                if (typeof(form.elements['id']) == 'object') {
                    form.documentIdentifier = "id=" + form.elements['id'].value;
                } else {
                    form.documentIdentifier = "preview=" + form.elements['preview'].value;
                }

                // Set change and submit handlers.
                form.fieldContent.onkeyup = function() {
                    M.mod_oucontent.freeresponse.changed(form);
                };
                Y.one(form.fieldSubmitReset).on('click', function(e) {
                    e.preventDefault();

                    // Get data for AJAX request.
                    var postData = form.documentIdentifier +
                            "&ajax=1&freeresponse=" + form.freeResponse + "&content=" +
                            encodeURIComponent(form.fieldContent.value) + "&submit_reset=" + form.fieldSubmitReset.value;
                    // Grey out the set button again.
                    form.previousOriginal = form.originalValue;
                    form.fieldContent.value = form.defaultValue;
                    form.originalValue = form.fieldContent.value;
                    M.mod_oucontent.freeresponse.changed(form);

                    // Enable the progress image.
                    form.waitIcon.style.display = 'inline';
                    var cfg = {
                        method: 'POST',
                        data: postData,
                        on: {
                            success: function(id, t) {
                                // Is it really success?
                                if (t.responseText !== 'ok') {
                                    cfg.on.failure();
                                    return;
                                }
                                // Hide wait icon and update display if any.
                                M.mod_oucontent.freeresponse.update_display(form);
                                form.waitIcon.style.display = 'none';
                            },
                            failure: function() {
                                // Hide wait icon.
                                form.waitIcon.style.display = 'none';
                                form.originalValue = form.previousOriginal;
                                M.mod_oucontent.freeresponse.changed(form);
                                // Display error.
                                window.alert('There was an error reseting your entry.');
                            }
                        }
                    };
                    Y.io(form.action, cfg);
                });

                form.fieldContent.onkeypress = form.fieldContent.onkeyup;
                form.onsubmit = function() {
                    return M.mod_oucontent.freeresponse.submit(form);
                };

                // Go find Answer and Discussion if any.
                form.answer = null;
                form.discussion = null;
                var first = M.mod_oucontent.next_sibling(form.parentNode),
                        second = first ? M.mod_oucontent.next_sibling(first) : null;
                if (first && M.mod_oucontent.is_answer_node(first)) {
                    form.answer = first;
                    if (second && M.mod_oucontent.is_discussion_node(second)) {
                        form.discussion = second;
                    }
                } else if (first && M.mod_oucontent.is_discussion_node(first)) {
                    form.discussion = first;
                }

                if (form.gotValue) {
                    // We already have a value, show the answer box etc.
                    M.mod_oucontent.freeresponse.show(form, true);
                } else {
                    M.mod_oucontent.freeresponse.show(form, false);
                }

                // Remember the original value.
                form.originalValue = form.fieldContent.value.toString();
                form.defaultValue = form.fieldDefaultValue.value.toString();
                // Grey out the save button until they type something.
                M.mod_oucontent.freeresponse.changed(form);
            },

            changed : function(form) {
                var unchanged = form.fieldContent.value === form.originalValue;
                var isdefault = form.fieldContent.value === form.defaultValue;
                form.fieldSubmitS.disabled = unchanged;
                if (form.fieldSubmitR) {
                    form.fieldSubmitR.disabled = unchanged;
                }
                form.fieldSubmitReset.disabled = isdefault;
            },

            submit : function(form) {
                // Get data for AJAX request.
                var postData = form.documentIdentifier +
                    "&ajax=1&freeresponse=" + form.freeResponse + "&content=" +
                    encodeURIComponent(form.fieldContent.value);

                // Grey out the button again.
                form.previousOriginal = form.originalValue;
                form.originalValue = form.fieldContent.value;
                M.mod_oucontent.freeresponse.changed(form);

                // Show the answer.
                M.mod_oucontent.freeresponse.show(form, form.fieldContent.value !== '');

                // Enable the progress image.
                form.waitIcon.style.display = 'inline';

                var cfg = {
                    method: 'POST',
                    data: postData,
                    on: {
                        success: function(id, t) {
                            // Is it really success?
                            if (t.responseText !== 'ok') {
                                cfg.on.failure();
                                return;
                            }

                            // Hide wait icon and update display if any.
                            M.mod_oucontent.freeresponse.update_display(form);
                            form.waitIcon.style.display = 'none';
                        },
                        failure: function() {
                            // Hide wait icon.
                            form.waitIcon.style.display = 'none';
                            // Enable save button again.
                            form.originalValue = form.previousOriginal;
                            M.mod_oucontent.freeresponse.changed(form);

                            // Display error.
                            window.alert('There was an error saving your entry. Try again, or make a copy elsewhere.');
                        }
                    }
                };
                Y.io(form.action, cfg);

                return false;
            },

            /**
             * If there is a FreeResponseDisplay box on the same page, update it
             * immediately (otherwise do nothing).
             * @param form Form containing FreeResponse data
             */
            update_display : function(form) {
                // On successful update, check if there's
                // a FreeResponseDisplay for this data, and
                // if so, update it live as well.
                var baseurl = (window.location.href + '') . replace(/(mod\/oucontent\/).*$/, '$1');
                var expectedlink = baseurl + 'linkback.php?type=freeresponse&refid=' +
                        form.freeResponse + '&' + form.documentIdentifier;
                var link = Y.one('a[href="' + expectedlink + '"]');
                if (link) {
                    var inner = link.ancestor('.oucontent-free-response-display').one('.oucontent-inner');
                    var isdefault = form.fieldContent.value === form.defaultValue;
                    if (isdefault) {
                        inner.addClass('oucontent-notfound');
                        inner.set('innerHTML', M.mod_oucontent.jsstrings.freeresponse_display_nothing);
                    } else {
                        inner.removeClass('oucontent-notfound');
                        var html = Y.Escape.html(form.fieldContent.value);
                        html = html.replace(/\n/g, '<br/>');
                        inner.set('innerHTML', html);
                    }
                }
            },

            show : function(form, show) {
                var style = show ? 'block' : 'none';
                if (form.answer) {
                    form.answer.style.display = style;
                }
                if (form.discussion) {
                    form.discussion.style.display = style;
                }

                // Choose the appropriate submit button - 'save and reveal' or just 'save'.
                if (form.fieldSubmitR) {
                    form.fieldSubmitS.style.display = show ? 'inline' : 'none';
                    form.fieldSubmitR.style.display = show ? 'none' : 'inline';
                }
                M.mod_oucontent.force_ie_repaint();
            }
        },

        // This object contains all the functions for the matching (drag & drop) question.
        interactionmatching : {
            highestz : 10,
            /**
             * Initialises the selected matching activity.
             * @param {string} id of the oucontent-matching-container div by removing
             *   the first 8 characters ('matching') e.g. 'idm4512'
             * @param {array} item Array of matching objects e.g. [{option:'idm3872',match:'idm3392'},
             *   {option:'idm2448',match:'idm1968'},{option:'idm1024',match:'idp1424'}]
             */
            init : function (id, items) {
                    // The container here is oucontent-interaction div which is the parent div of the
                    // oucontent-matching-container div.
                    var container = Y.one('#' + id);
                    container.setStyle('display', 'block');

                    // Set up metrics and stupid stuff from CSS (so it works differently for
                    // different themes).
                    var tempslot = Y.Node.create('<div class="oucontent-matching-slot"/>');
                    container.appendChild(tempslot);
                    var tempfocus = Y.Node.create('<div class="oucontent-matching-focus"/>');
                    container.appendChild(tempfocus);
                    var gap = 8;
                    var optionheightoffset = this.get_height_offset(Y.one('#' + items[0].option));
                    var optionwidthoffset = this.get_width_offset(Y.one('#' + items[0].option));
                    var matchwidthoffset = this.get_width_offset(Y.one('#' + items[0].match));
                    var slotwidthoffset = this.get_width_offset(tempslot);
                    items.focusbefore = tempfocus.getStyle('borderLeftColor');
                    tempslot.remove();
                    tempfocus.remove();

                    // Init data and set up widths for everything.
                    var containerregion = container.get('region');
                    var containerwidth = containerregion.right - containerregion.left;
                    var optionwidth = Math.floor((containerwidth - gap)/2);
                    var i = 0;
                    for (i=0; i<items.length; i++) {
                        items[i].matchel = Y.one('#' + items[i].match);
                        items[i].optionel = Y.one('#' + items[i].option);
                        items[i].optionel.allitems = items;
                        items[i].matchel.setStyle('width', (optionwidth - matchwidthoffset  -gap*2) + 'px');
                        items[i].optionel.setStyle('width', (optionwidth - optionwidthoffset) + 'px');
                        items[i].matchel.setStyle('display','block');
                        items[i].optionel.setStyle('display','block');
                    }

                    // Create help string and measure it.
                    var help = Y.Node.create('<div class="oucontent-interactionhelp">' +
                            M.mod_oucontent.jsstrings.interaction_matching_info + '</div>');
                    container.appendChild(help);
                    var helpregion = help.get('region');
                    var helpheight = helpregion.bottom - helpregion.top;

                    // Work out the biggest option height and total match height.
                    var optionheight = 0;
                    for (i=0; i<items.length; i++) {
                        var optionregion = Y.one('#' + items[i].option).get('region');
                        var height = optionregion.bottom - optionregion.top;
                        if (height > optionheight) {
                            optionheight = height;
                        }
                    }
                    // So the first gap doesn't count.
                    var slotsheight = -gap;
                    for (i=0; i<items.length; i++) {
                        var match = items[i].matchel;
                        matchregion = match.get('region');
                        match.originalheight = matchregion.bottom - matchregion.top;
                        slotsheight += gap;
                        // Apart from the margin, this match takes up the larger of its own
                        // height and the general option height.
                        if (match.originalheight > optionheight) {
                            slotsheight += match.originalheight;
                        } else {
                            slotsheight += optionheight;
                        }
                    }

                    // Total option height (slotsheight is already a total).
                    // Note: #rows = (#options + 1 ) / 2 and >> here is bit shift operator.
                    var rows = (items.length + 1) >> 1;
                    var optionsheight = rows*optionheight + (rows-1)*gap;

                    // Also an extra gap between slots and options, one gap at the bottom,
                    // the help height and one more gap there.
                    container.setStyle('height', (optionsheight+slotsheight+helpheight+3*gap) + 'px');
                    // Get help text into place.
                    help.setStyle('position','absolute');
                    help.setStyle('width', containerwidth + 'px');
                    help.setStyle('left', '0');
                    help.setStyle('top', (optionsheight + gap) + 'px');

                    // Box around lower area (slots).
                    var lowerarea = Y.Node.create('<div class="oucontent-interaction-lower"/>');
                    lowerarea.setStyle('position', 'absolute');
                    lowerarea.setStyle('width', containerwidth + 'px');
                    lowerarea.setStyle('height', (slotsheight+gap) + 'px');
                    lowerarea.setStyle('left', '0');
                    lowerarea.setStyle('top', (optionsheight + helpheight + gap*2) + 'px');
                    container.prepend(lowerarea);

                    // Initialise position of options (in rows at top, random order).
                    var shuffledoptions = new Array(items.length);
                    for (i=0; i<items.length; i++) {
                        shuffledoptions[i] = items[i].optionel;
                        shuffledoptions[i].setStyle('height', (optionheight - optionheightoffset) + 'px');
                        shuffledoptions[i].sortorder = Math.random();
                    }
                    shuffledoptions.sort(function(a,b) {
                      return (a.sortorder < b.sortorder) ? -1 : 1;
                    });
                    var row = 0, rowpos = 0;
                    for (i=0; i<shuffledoptions.length; i++) {
                        items[i].alloptions = shuffledoptions;
                        shuffledoptions[i].setStyle('position','absolute');
                        shuffledoptions[i].setStyle('left', (rowpos ? optionwidth + gap : 0) + 'px');
                        shuffledoptions[i].setStyle('top', (row*(optionheight + gap)) + 'px');
                        shuffledoptions[i].slot = null;
                        // Create drag object based on the option element and attach the dd event to it.
                        this.attach_dd_events(shuffledoptions[i], container);
                        rowpos++;
                        if (rowpos>1) {
                            rowpos = 0;
                            row++;
                        }
                    }

                    // Position the matches and create the slots.
                    var y = optionsheight + helpheight + gap;
                    for (i=0; i<items.length; i++) {
                        y += gap;
                        items[i].matchel.setStyle('position', 'absolute');
                        items[i].matchel.setStyle('left', "0px");
                        items[i].matchel.setStyle('top', y + "px");

                        // Create drop slot object.
                        var slot = this.create_drop_slot(optionwidth,
                                optionheight, gap, slotwidthoffset, y);
                        container.appendChild(slot);
                        items[i].slotel = slot;
                        slot.holdsoption = null;

                        var focus = Y.Node.create('<div class="oucontent-matching-focus"/>');
                        focus.setStyle('position', 'absolute');
                        focus.setStyle('left', (optionwidth+gap-1) + "px");
                        focus.setStyle('top', (y-1) + "px");
                        focus.setStyle('width', (optionwidth) + "px");
                        focus.setStyle('height', (optionheight) + "px");
                        container.appendChild(focus);
                        items[i].focusel=focus;
                        focus.set('tabIndex', 0);
                        items[i].focusel.on('focus', function() {
                            this.setStyle('borderColor', 'black');
                        }, items[i].focusel);
                        items[i].focusel.on('blur', function() {
                            this.focusel.setStyle('borderColor', this.optionel.allitems.focusbefore);
                        }, items[i]);
                        items[i].focusel.on('keydown', function(e) {
                            M.mod_oucontent.interactionmatching.key_down_handler(e, this);
                        }, items[i]);

                        var rowheight = items[i].matchel.originalheight;
                        if (optionheight > rowheight) {
                            rowheight = optionheight;
                        }
                        y += rowheight;
                    }

                    var array = [];
                    var domcontainer = document.getElementById(id);
                    array = M.mod_oucontent.find_print_answer_discussion(domcontainer);

                    items.print = array[0];
                    items.answer = array[1];
                    items.discussion = array[2];

                    // Add the right/wrong response box.
                    items.rightwrong = Y.Node.create('<div class="oucontent-interactionrightwrong"/>');
                    items.rightwrong.setStyle('display', 'none');
                    if (container.get('nextSibling')) {
                        container.get('nextSibling').insert(items.rightwrong, 'before');
                    } else {
                        container.get('parentNode').appendChild(items.rightwrong);
                    }

                    // Add the buttons.
                    items.buttons = Y.Node.create('<div class="oucontent-interactionbuttons"/>');
                    items.rightwrong.insert(items.buttons, 'before');

                    items.checkbutton = Y.Node.create('<input type="button"/>');
                    this.set_input_value(items.checkbutton,
                            M.mod_oucontent.jsstrings.interaction_check_your_answer);
                    items.checkbutton.set('disabled', false);
                    items.checkbutton.on('click', function (e) {
                        M.mod_oucontent.interactionmatching.check_handler(e, items);
                    }, items.checkbutton);
                    items.buttons.appendChild(items.checkbutton);
                    items.buttons.appendChild(document.createTextNode(' '));

                    items.revealbutton = Y.Node.create('<input type="button"/>');
                    var answerclassname = container.get('className');
                    if (answerclassname.indexOf("oucontent-specimen-answer") === -1) {
                        this.set_input_value(items.revealbutton,
                                M.mod_oucontent.jsstrings.interaction_reveal_answer);
                    } else {
                        this.set_input_value(items.revealbutton,
                                M.mod_oucontent.jsstrings.interaction_reveal_specimen_answer);
                    }
                    items.revealbutton.set('disabled', false);
                    items.revealbutton.on('click', function (e) {
                        M.mod_oucontent.interactionmatching.reveal_handler(e, items);
                    }, items.revealbutton);
                    items.buttons.appendChild(items.revealbutton);
                    // Add skip link
                    var skiplink = Y.Node.create('<a href="#matching_access_"' + id + '></a>');
                    skiplink.setStyle('position', 'absolute');
                    skiplink.setStyle('left', '-1000px');
                    skiplink.on('click', function() {
                        var e = 'x';
                        M.mod_oucontent.interactionmatching.reveal_handler(e, items);
                        container.setStyle('display', 'none');
                        var div = container.get('parentNode').one('div.oucontent-interaction-print');
                        div.setStyle('display', 'block');
                        div.set('id', 'matching_access_' + id);
                        return true;
                    });

                    skiplink.appendChild(document.createTextNode(M.mod_oucontent.jsstrings.interaction_skip_matching));

                    skiplink.on('focus', function() {
                        this.setStyle('position', 'static');
                    });

                    skiplink.on('blur', function() {
                        this.setStyle('position', 'absolute');
                    });

                    container.insert(skiplink, 'before');
            },

            attach_dd_events : function(dragnode, container) {
                var drag = new Y.DD.Drag({
                    node: dragnode,
                    dragMode: 'point'
                }).plug(Y.Plugin.DDConstrained, {
                    // Keep the drag elements within their container to avoid dropping them to slots which belongs
                    // to other matching activities in case there are more than one matching activities in a page.
                    constrain2node: container
                }).plug(Y.Plugin.DDWinScroll);

                drag.on('drag:start', function() {
                    var optionel = this.get('node');
                    M.mod_oucontent.interactionmatching.init_xy(optionel);
                    optionel.setStyle('zIndex', '999');
                });

                drag.on('drag:end', function() {
                    var optionel = this.get('node');
                    optionel.setStyle('zIndex', M.mod_oucontent.interactionmatching.highestz++);
                });

                // Remove from existing slot, if any, and move back.
                drag.on('drag:dropmiss', function() {
                    var optionel = this.get('node');
                    M.mod_oucontent.interactionmatching.put_box_in_slot(optionel, null);
                });

                // Move option to slot and remove any existing option in the slot.
                drag.on('drag:drophit', function(e) {
                    var optionel = this.get('node');
                    var slotel = e.drop.get('node');
                    M.mod_oucontent.interactionmatching.put_box_in_slot(optionel, slotel);
                });
            },

            create_drop_slot : function(optionwidth, optionheight, gap, slotwidthoffset, y) {
                var slot = Y.Node.create('<div class="oucontent-matching-slot"/>');
                slot.setStyle('position', 'absolute');
                slot.setStyle('left', (optionwidth+gap) + "px");
                slot.setStyle('top', y + "px");
                slot.setStyle('height', (optionheight-2) + "px");
                slot.setStyle('width', (optionwidth - slotwidthoffset) + "px");
                drop = new Y.DD.Drop({
                    node: slot
                });
                return slot;
            },

            // Check if the user has already started answering questions.
            update_reveal_button : function(items) {
                var missing = false;
                for (var i=0; i<items.length; i++) {
                    if (items[i].slotel.holdsoption) {
                        missing = true;
                        break;
                    }
                }
                items.revealbutton.set('disabled', missing);
            },

            init_xy : function(el) {
                if (!el.originalxy) {
                    el.originalxy = el.getXY();
                }
            },

            put_box_in_slot : function(optionel, slotel) {

                M.mod_oucontent.interactionmatching.init_xy(optionel);

                // Remove from existing slot, if any.
                if (optionel.slot) {
                    optionel.slot.holdsoption = null;
                    optionel.slot = null;
                    optionel.removeClass('oucontent-interaction-inslot');
                }

                if (slotel) {
                    // If slot is occupied, move that option back to where it was before.
                    if (slotel.holdsoption) {
                        M.mod_oucontent.interactionmatching.put_box_in_slot(slotel.holdsoption, null);
                    }
                    optionel.setXY(slotel.getXY());
                    optionel.slot = slotel;
                    slotel.holdsoption = optionel;
                    optionel.addClass('oucontent-interaction-inslot');
                } else {
                    optionel.setXY(optionel.originalxy);
                }

                M.mod_oucontent.interactionmatching.update_reveal_button(optionel.allitems);
            },

            get_height_offset : function(item) {
                var result;
                result = parseInt(item.getStyle('paddingTop'), 10) +
                        parseInt(item.getStyle('paddingBottom'), 10) +
                        parseInt('0' + item.getStyle('borderTopWidth'), 10) +
                        parseInt('0' + item.getStyle('borderBottomWidth'), 10);
                return result;
            },

            get_width_offset : function(item) {
                var result = parseInt(item.getStyle('paddingLeft'), 10) +
                        parseInt(item.getStyle('paddingRight'), 10) +
                        parseInt('0' + item.getStyle('borderLeftWidth'), 10) +
                        parseInt('0' + item.getStyle('borderRightWidth'), 10);
                return result;
            },

            set_input_value : function(input, string) {
                // Get rid of any HTML codes from string.
                var safe = string.replace(/<[^>]+>/g,'');
                safe = safe.replace('&amp;','&');
                safe = safe.replace('&lt;','<');
                safe = safe.replace('&gt;','>');
                safe = safe.replace('&quot;',"'");
                input.set('value', safe);

                // Set language code.
                var match = string.match(/<span lang='([a-z]+)'/);
                if (match) {
                    input.set('lang', match[1]);
                }
            },

            check_handler : function(e, items) {
                while (items.rightwrong.get('firstChild')) {
                    items.rightwrong.get('firstChild').remove();
                }
                // Add response
                var correct = true;
                var zeroanswered = true;
                var i = 0;
                var correctanswers = 0;
                for (i=0; i<items.length; i++) {
                    if (items[i].slotel.holdsoption) {
                        zeroanswered = false;
                    }
                    if (items[i].optionel.slot !== null && items[i].optionel.slot !== items[i].slotel) {
                        var resetanimation = new Y.Anim({
                            node: items[i].optionel,
                            duration: 1.0,
                            easing: 'elasticOut',
                            to : { xy: items[i].optionel.originalxy }
                        });
                        resetanimation.run();
                        items[i].optionel.slot.holdsoption = null;
                        items[i].optionel.slot = null;
                        correct=false;
                    } else if (items[i].optionel.slot === null) {
                        correct = false;
                    } else {
                        correctanswers++;
                    }
                }
                var msg = '';
                var response = [];
                if (zeroanswered) {
                    msg = M.mod_oucontent.jsstrings.interaction_please_choose_n;
                } else if (correct) {
                    msg = M.mod_oucontent.jsstrings.interaction_correct;
                    M.mod_oucontent.interactionmatching.reveal_handler(e, items);
                } else if (correctanswers === 0) {
                    msg = M.mod_oucontent.jsstrings.interaction_not_correct;
                    items.revealbutton.disabled = false;
                } else if (correctanswers === 1) {
                  msg = M.mod_oucontent.jsstrings.interaction_correct_incomplete_singular;
                } else {
                  msg = M.mod_oucontent.jsstrings.interaction_correct_incomplete_plural;
                }
                items.rightwrong.set('innerHTML', msg.replace("#1", "<b>" + correctanswers + "</b>"));
                for (i=0; i<response.length; i++) {
                    items.rightwrong.appendChild(response[i]);
                }

                items.rightwrong.setStyle('display', 'block');
            },

            reveal_handler : function(e, items) {
                // Move all answers to right place.
                for (var i=0; i<items.length; i++) {
                    var revealanimation = new Y.Anim({
                        node: items[i].optionel,
                        duration: 0.8,
                        easing: 'easeOutStrong',
                        to : { xy: items[i].slotel.getXY() }
                    });
                    revealanimation.run();
                    items[i].optionel.slot = items[i].slotel;
                    items[i].slotel.holdsoption = items[i].optionel;
                    Y.DD.DDM.getDrag(items[i].optionel).set('lock', true);
                }

                // Get rid of UI bits and pieces.
                items.buttons.remove();
                items.rightwrong.setStyle('display','none');

                // Show text answer if provided.
                if (items.answer) {
                    items.answer.style.display = 'block';
                }
                // Show text discussion if provided.
                if (items.discussion) {
                    items.discussion.style.display = 'block';
                }
            },

            key_down_handler : function(e, item) {
                var evt = window.event || e;
                var key = evt.keyCode;
                var i = 0;
                // Get option currently in slot (if any).
                var currentoption = item.slotel.holdsoption, currentoptionindex = -1;
                if (currentoption) {
                    for (i=0; i<item.alloptions.length; i++) {
                        if (item.alloptions[i] === currentoption) {
                            currentoptionindex = i;
                            break;
                        }
                    }
                }

                var newoption;

                if (key===39 || key===32 || key===13) {
                    // 'Forward' keys cycle through the options and blank.
                    // 39 Right-arrow.
                    // 32 Space.
                    // 13 Return.
                    for (i=currentoptionindex+1; i!==currentoptionindex; i++) {
                        if (i===item.alloptions.length) {
                            i=-1;
                        }
                        if (i === -1) {
                            // Yep you can do blank.
                            break;
                        }
                        if (!item.alloptions[i].slot) {
                            // This item is not in a slot, so use it.
                            break;
                        }
                    }

                    newoption = (i===-1) ? null : item.alloptions[i];
                } else if (key===37) {
                    // 'Back' key cycles through the options and blank.
                    // 37 Left-arrow.
                    for (i=currentoptionindex-1; i!==currentoptionindex; i--) {
                        if (i<-1) {
                          i=item.alloptions.length-1;
                        }
                        if (i===-1) {
                         // Yep you can do blank.
                            break;
                        }
                        if (!item.alloptions[i].slot) {
                          // This item is not in a slot, so use it.
                          break;
                        }
                    }
                    newoption = (i===-1) ? null : item.alloptions[i];
                } else if (key === 46 || key === 8 || key === 27) {
                    // 'Delete' keys switch to blank.
                    // 46 Delete.
                    // 8 Backspace.
                    // 27 Escape.
                    newoption = null;
                } else {
                    // They pressed some other key, don't do anything.
                    return;
                }

                // Move current option back.
                if (currentoption) {
                    M.mod_oucontent.interactionmatching.put_box_in_slot(currentoption, null);
                }

                // Set new option if any.
                if (newoption) {
                    M.mod_oucontent.interactionmatching.put_box_in_slot(newoption, item.slotel);
                }
            }
        }

    };

}, '@VERSION@', { requires:['base', 'node', 'event', 'transition', 'swf', 'dom', 'dd',
        'dd-scroll', 'anim', 'escape'] });

// Global function called by Java applets when loaded - only if the Java version/applet supports
// the focushack system.
function appletLoaded(id) {
    M.mod_oucontent.javaapplet.applet_load(id);
}

// Global function called by Java applets when they want to lose focus.
function appletDitchFocus(id, forward) {
    M.mod_oucontent.javaapplet.applet_ditch_focus(id, forward);
}
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-mousewheel",function(e,t){var n="DOMMouseScroll",r=function(t){var r=e.Array(t,0,!0),i;return e.UA.gecko?(r[0]=n,i=e.config.win):i=e.config.doc,r.length<3?r[2]=i:r.splice(2,0,i),r};e.Env.evt.plugins.mousewheel={on:function(){return e.Event._attach(r(arguments))},detach:function(){return e.Event.detach.apply(e.Event,r(arguments))}}},"3.15.0",{requires:["node-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-resize",function(e,t){e.Event.define("windowresize",{on:e.UA.gecko&&e.UA.gecko<1.91?function(t,n,r){n._handle=e.Event.attach("resize",function(e){r.fire(e)})}:function(t,n,r){var i=e.config.windowResizeDelay||100;n._handle=e.Event.attach("resize",function(t){n._timer&&n._timer.cancel(),n._timer=e.later(i,e,function(){r.fire(t)})})},detach:function(e,t){t._timer&&t._timer.cancel(),t._handle.detach()}})},"3.15.0",{requires:["node-base","event-synthetic"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-hover",function(e,t){var n=e.Lang.isFunction,r=function(){},i={processArgs:function(e){var t=n(e[2])?2:3;return n(e[t])?e.splice(t,1)[0]:r},on:function(e,t,n,r){var i=t.args?t.args.slice():[];i.unshift(null),t._detach=e[r?"delegate":"on"]({mouseenter:function(e){e.phase="over",n.fire(e)},mouseleave:function(e){var n=t.context||this;i[0]=e,e.type="hover",e.phase="out",t._extra.apply(n,i)}},r)},detach:function(e,t,n){t._detach.detach()}};i.delegate=i.on,i.detachDelegate=i.detach,e.Event.define("hover",i)},"3.15.0",{requires:["event-mouseenter"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-touch",function(e,t){var n="scale",r="rotation",i="identifier",s=e.config.win,o={};e.DOMEventFacade.prototype._touch=function(t,s,o){var u,a,f,l,c;if(t.touches){this.touches=[],c={};for(u=0,a=t.touches.length;u<a;++u)l=t.touches[u],c[e.stamp(l)]=this.touches[u]=new e.DOMEventFacade(l,s,o)}if(t.targetTouches){this.targetTouches=[];for(u=0,a=t.targetTouches.length;u<a;++u)l=t.targetTouches[u],f=c&&c[e.stamp(l,!0)],this.targetTouches[u]=f||new e.DOMEventFacade(l,s,o)}if(t.changedTouches){this.changedTouches=[];for(u=0,a=t.changedTouches.length;u<a;++u)l=t.changedTouches[u],f=c&&c[e.stamp(l,!0)],this.changedTouches[u]=f||new e.DOMEventFacade(l,s,o)}n in t&&(this[n]=t[n]),r in t&&(this[r]=t[r]),i in t&&(this[i]=t[i])},e.Node.DOM_EVENTS&&e.mix(e.Node.DOM_EVENTS,{touchstart:1,touchmove:1,touchend:1,touchcancel:1,gesturestart:1,gesturechange:1,gestureend:1,MSPointerDown:1,MSPointerUp:1,MSPointerMove:1,MSPointerCancel:1,pointerdown:1,pointerup:1,pointermove:1,pointercancel:1}),s&&"ontouchstart"in s&&!(e.UA.chrome&&e.UA.chrome<6)?(o.start=["touchstart","mousedown"],o.end=["touchend","mouseup"],o.move=["touchmove","mousemove"],o.cancel=["touchcancel","mousecancel"]):s&&s.PointerEvent?(o.start="pointerdown",o.end="pointerup",o.move="pointermove",o.cancel="pointercancel"):s&&"msPointerEnabled"in s.navigator?(o.start="MSPointerDown",o.end="MSPointerUp",o.move="MSPointerMove",o.cancel="MSPointerCancel"):(o.start="mousedown",o.end="mouseup",o.move="mousemove",o.cancel="mousecancel"),e.Event._GESTURE_MAP=o},"3.15.0",{requires:["node-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-move",function(e,t){var n=e.Event._GESTURE_MAP,r={start:n.start,end:n.end,move:n.move},i="start",s="move",o="end",u="gesture"+s,a=u+o,f=u+i,l="_msh",c="_mh",h="_meh",p="_dmsh",d="_dmh",v="_dmeh",m="_ms",g="_m",y="minTime",b="minDistance",w="preventDefault",E="button",S="ownerDocument",x="currentTarget",T="target",N="nodeType",C=e.config.win&&"msPointerEnabled"in e.config.win.navigator,k="msTouchActionCount",L="msInitTouchAction",A=function(t,n,r){var i=r?4:3,s=n.length>i?e.merge(n.splice(i,1)[0]):{};return w in s||(s[w]=t.PREVENT_DEFAULT),s},O=function(e,t){return t._extra.root||e.get(N)===9?e:e.get(S)},M=function(t){var n=t.getDOMNode();return t.compareTo(e.config.doc)&&n.documentElement?n.documentElement:!1},_=function(e,t,n){e.pageX=t.pageX,e.pageY=t.pageY,e.screenX=t.screenX,e.screenY=t.screenY,e.clientX=t.clientX,e.clientY=t.clientY,e[T]=e[T]||t[T],e[x]=e[x]||t[x],e[E]=n&&n[E]||1},D=function(t){var n=M(t)||t.getDOMNode(),r=t.getData(k);C&&(r||(r=0,t.setData(L,n.style.msTouchAction)),n.style.msTouchAction=e.Event._DEFAULT_TOUCH_ACTION,r++,t.setData(k,r))},P=function(e){var t=M(e)||e.getDOMNode(),n=e.getData(k),r=e.getData(L);C&&(n--,e.setData(k,n),n===0&&t.style.msTouchAction!==r&&(t.style.msTouchAction=r))},H=function(e,t){t&&(!t.call||t(e))&&e.preventDefault()},B=e.Event.define;e.Event._DEFAULT_TOUCH_ACTION="none",B(f,{on:function(e,t,n){D(e),t[l]=e.on(r[i],this._onStart,this,e,t,n)},delegate:function(e,t,n,s){var o=this;t[p]=e.delegate(r[i],function(r){o._onStart(r,e,t,n,!0)},s)},detachDelegate:function(e,t,n,r){var i=t[p];i&&(i.detach(),t[p]=null),P(e)},detach:function(e,t,n){var r=t[l];r&&(r.detach(),t[l]=null),P(e)},processArgs:function(e,t){var n=A(this,e,t);return y in n||(n[y]=this.MIN_TIME),b in n||(n[b]=this.MIN_DISTANCE),n},_onStart:function(t,n,i,u,a){a&&(n=t[x]);var f=i._extra,l=!0,c=f[y],h=f[b],p=f.button,d=f[w],v=O(n,i),m;t.touches?t.touches.length===1?_(t,t.touches[0],f):l=!1:l=p===undefined||p===t.button,l&&(H(t,d),c===0||h===0?this._start(t,n,u,f):(m=[t.pageX,t.pageY],c>0&&(f._ht=e.later(c,this,this._start,[t,n,u,f]),f._hme=v.on(r[o],e.bind(function(){this._cancel(f)},this))),h>0&&(f._hm=v.on(r[s],e.bind(function(e){(Math.abs(e.pageX-m[0])>h||Math.abs(e.pageY-m[1])>h)&&this._start(t,n,u,f)},this)))))},_cancel:function(e){e._ht&&(e._ht.cancel(),e._ht=null),e._hme&&(e._hme.detach(),e._hme=null),e._hm&&(e._hm.detach(),e._hm=null)},_start:function(e,t,n,r){r&&this._cancel(r),e.type=f,t.setData(m,e),n.fire(e)},MIN_TIME:0,MIN_DISTANCE:0,PREVENT_DEFAULT:!1}),B(u,{on:function(e,t,n){D(e);var i=O(e,t,r[s]),o=i.on(r[s],this._onMove,this,e,t,n);t[c]=o},delegate:function(e,t,n,i){var o=this;t[d]=e.delegate(r[s],function(r){o._onMove(r,e,t,n,!0)},i)},detach:function(e,t,n){var r=t[c];r&&(r.detach(),t[c]=null),P(e)},detachDelegate:function(e,t,n,r){var i=t[d];i&&(i.detach(),t[d]=null),P(e)},processArgs:function(e,t){return A(this,e,t)},_onMove:function(e,t,n,r,i){i&&(t=e[x]);var s=n._extra.standAlone||t.getData(m),o=n._extra.preventDefault;s&&(e.touches&&(e.touches.length===1?_(e,e.touches[0]):s=!1),s&&(H(e,o),e.type=u,r.fire(e)))},PREVENT_DEFAULT:!1}),B(a,{on:function(e,t,n){D(e);var i=O(e,t),s=i.on(r[o],this._onEnd,this,e,t,n);t[h]=s},delegate:function(e,t,n,i){var s=this;t[v]=e.delegate(r[o],function(r){s._onEnd(r,e,t,n,!0)},i)},detachDelegate:function(e,t,n,r){var i=t[v];i&&(i.detach(),t[v]=null),P(e)},detach:function(e,t,n){var r=t[h];r&&(r.detach(),t[h]=null),P(e)},processArgs:function(e,t){return A(this,e,t)},_onEnd:function(e,t,n,r,i){i&&(t=e[x]);var s=n._extra.standAlone||t.getData(g)||t.getData(m),o=n._extra.preventDefault;s&&(e.changedTouches&&(e.changedTouches.length===1?_(e,e.changedTouches[0]):s=!1),s&&(H(e,o),e.type=a,r.fire(e),t.clearData(m),t.clearData(g)))},PREVENT_DEFAULT:!1})},"3.15.0",{requires:["node-base","event-touch","event-synthetic"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-flick",function(e,t){var n=e.Event._GESTURE_MAP,r={start:n.start,end:n.end,move:n.move},i="start",s="end",o="move",u="ownerDocument",a="minVelocity",f="minDistance",l="preventDefault",c="_fs",h="_fsh",p="_feh",d="_fmh",v="nodeType";e.Event.define("flick",{on:function(e,t,n){var s=e.on(r[i],this._onStart,this,e,t,n);t[h]=s},detach:function(e,t,n){var r=t[h],i=t[p];r&&(r.detach(),t[h]=null),i&&(i.detach(),t[p]=null)},processArgs:function(t){var n=t.length>3?e.merge(t.splice(3,1)[0]):{};return a in n||(n[a]=this.MIN_VELOCITY),f in n||(n[f]=this.MIN_DISTANCE),l in n||(n[l]=this.PREVENT_DEFAULT),n},_onStart:function(t,n,i,a){var f=!0,l,h,m,g=i._extra.preventDefault,y=t;t.touches&&(f=t.touches.length===1,t=t.touches[0]),f&&(g&&(!g.call||g(t))&&y.preventDefault(),t.flick={time:(new Date).getTime()},i[c]=t,l=i[p],m=n.get(v)===9?n:n.get(u),l||(l=m.on(r[s],e.bind(this._onEnd,this),null,n,i,a),i[p]=l),i[d]=m.once(r[o],e.bind(this._onMove,this),null,n,i,a))},_onMove:function(e,t,n,r){var i=n[c];i&&i.flick&&(i.flick.time=(new Date).getTime())},_onEnd:function(e,t,n,r){var i=(new Date).getTime(),s=n[c],o=!!s,u=e,h,p,v,m,g,y,b,w,E=n[d];E&&(E.detach(),delete n[d]),o&&(e.changedTouches&&(e.changedTouches.length===1&&e.touches.length===0?u=e.changedTouches[0]:o=!1),o&&(m=n._extra,v=m[l],v&&(!v.call||v(e))&&e.preventDefault(),h=s.flick.time,i=(new Date).getTime(),p=i-h,g=[u.pageX-s.pageX,u.pageY-s.pageY],m.axis?w=m.axis:w=Math.abs(g[0])>=Math.abs(g[1])?"x":"y",y=g[w==="x"?0:1],b=p!==0?y/p:0,isFinite(b)&&Math.abs(y)>=m[f]&&Math.abs(b)>=m[a]&&(e.type="flick",e.flick={time:p,distance:y,velocity:b,axis:w,start:s},r.fire(e)),n[c]=null))},MIN_VELOCITY:0,MIN_DISTANCE:0,PREVENT_DEFAULT:!1})},"3.15.0",{requires:["node-base","event-touch","event-synthetic"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-valuechange",function(e,t){var n="_valuechange",r="value",i="nodeName",s,o={POLL_INTERVAL:50,TIMEOUT:1e4,_poll:function(t,r){var i=t._node,s=r.e,u=t._data&&t._data[n],a=0,f,l,c,h,p,d;if(!i||!u){o._stopPolling(t);return}l=u.prevVal,h=u.nodeName,u.isEditable?c=i.innerHTML:h==="input"||h==="textarea"?c=i.value:h==="select"&&(p=i.options[i.selectedIndex],c=p.value||p.text),c!==l&&(u.prevVal=c,f={_event:s,currentTarget:s&&s.currentTarget||t,newVal:c,prevVal:l,target:s&&s.target||t},e.Object.some(u.notifiers,function(e){var t=e.handle.evt,n;a!==1?e.fire(f):t.el===d&&e.fire(f),n=t&&t._facade?t._facade.stopped:0,n>a&&(a=n,a===1&&(d=t.el));if(a===2)return!0}),o._refreshTimeout(t))},_refreshTimeout:function(e,t){if(!e._node)return;var r=e.getData(n);o._stopTimeout(e),r.timeout=setTimeout(function(){o._stopPolling(e,t)},o.TIMEOUT)},_startPolling:function(t,s,u){var a,f;if(!t.test("input,textarea,select")&&!(f=o._isEditable(t)))return;a=t.getData(n),a||(a={nodeName:t.get(i).toLowerCase(),isEditable:f,prevVal:f?t.getDOMNode().innerHTML:t.get(r)},t.setData(n,a)),a.notifiers||(a.notifiers={});if(a.interval){if(!u.force){a.notifiers[e.stamp(s)]=s;return}o._stopPolling(t,s)}a.notifiers[e.stamp(s)]=s,a.interval=setInterval(function(){o._poll(t,u)},o.POLL_INTERVAL),o._refreshTimeout(t,s)},_stopPolling:function(t,r){if(!t._node)return;var i=t.getData(n)||{};clearInterval(i.interval),delete i.interval,o._stopTimeout(t),r?i.notifiers&&delete i.notifiers[e.stamp(r)]:i.notifiers={}},_stopTimeout:function(e){var t=e.getData(n)||{};clearTimeout(t.timeout),delete t.timeout},_isEditable:function(e){var t=e._node;return t.contentEditable==="true"||t.contentEditable===""},_onBlur:function(e,t){o._stopPolling(e.currentTarget,t)},_onFocus:function(e,t){var s=e.currentTarget,u=s.getData(n);u||(u={isEditable:o._isEditable(s),nodeName:s.get(i).toLowerCase()},s.setData(n,u)),u.prevVal=u.isEditable?s.getDOMNode().innerHTML:s.get(r),o._startPolling(s,t,{e:e})},_onKeyDown:function(e,t){o._startPolling(e.currentTarget,t,{e:e})},_onKeyUp:function(e,t){(e.charCode===229||e.charCode===197)&&o._startPolling(e.currentTarget,t,{e:e,force:!0})},_onMouseDown:function(e,t){o._startPolling(e.currentTarget,t,{e:e})},_onSubscribe:function(t,s,u,a){var f,l,c,h,p;l={blur:o._onBlur,focus:o._onFocus,keydown:o._onKeyDown,keyup:o._onKeyUp,mousedown:o._onMouseDown},f=u._valuechange={};if(a)f.delegated=!0,f.getNodes=function(){return h=t.all("input,textarea,select").filter(a),p=t.all('[contenteditable="true"],[contenteditable=""]').filter(a),h.concat(p)},f.getNodes().each(function(e){e.getData(n)||e.setData(n,{nodeName:e.get(i).toLowerCase(),isEditable:o._isEditable(e),prevVal:c?e.getDOMNode().innerHTML:e.get(r)})}),u._handles=e.delegate(l,t,a,null,u);else{c=o._isEditable(t);if(!t.test("input,textarea,select")&&!c)return;t.getData(n)||t.setData(n,{nodeName:t.get(i).toLowerCase(),isEditable:c,prevVal:c?t.getDOMNode().innerHTML:t.get(r)}),u._handles=t.on(l,null,null,u)}},_onUnsubscribe:function(e,t,n){var r=n._valuechange;n._handles&&n._handles.detach(),r.delegated?r.getNodes().each(function(e){o._stopPolling(e,n)}):o._stopPolling(e,n)}};s={detach:o._onUnsubscribe,on:o._onSubscribe,delegate:o._onSubscribe,detachDelegate:o._onUnsubscribe,publishConfig:{emitFacade:!0}},e.Event.define("valuechange",s),e.Event.define("valueChange",s),e.ValueChange=o},"3.15.0",{requires:["event-focus","event-synthetic"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("event-tap",function(e,t){function a(t,n){n=n||e.Object.values(u),e.Array.each(n,function(e){var n=t[e];n&&(n.detach(),t[e]=null)})}var n=e.config.doc,r=e.Event._GESTURE_MAP,i=r.start,s="tap",o=/pointer/i,u={START:"Y_TAP_ON_START_HANDLE",END:"Y_TAP_ON_END_HANDLE",CANCEL:"Y_TAP_ON_CANCEL_HANDLE"};e.Event.define(s,{publishConfig:{preventedFn:function(e){var t=e.target.once("click",function(e){e.preventDefault()});setTimeout(function(){t.detach()},100)}},processArgs:function(e,t){if(!t){var n=e[3];return e.splice(3,1),n}},on:function(e,t,n){t[u.START]=e.on(i,this._start,this,e,t,n)},detach:function(e,t,n){a(t)},delegate:function(t,n,r,s){n[u.START]=e.delegate(i,function(e){this._start(e,t,n,r,!0)},t,s,this)},detachDelegate:function(e,t,n){a(t)},_start:function(e,t,n,i,s){var a={canceled:!1,eventType:e.type},f=n.preventMouse||!1;if(e.button&&e.button===3)return;if(e.touches&&e.touches.length!==1)return;a.node=s?e.currentTarget:t,e.touches?a.startXY=[e.touches[0].pageX,e.touches[0].pageY]:a.startXY=[e.pageX,e.pageY],e.touches?(n[u.END]=t.once("touchend",this._end,this,t,n,i,s,a),n[u.CANCEL]=t.once("touchcancel",this.detach,this,t,n,i,s,a),n.preventMouse=!0):a.eventType.indexOf("mouse")!==-1&&!f?(n[u.END]=t.once("mouseup",this._end,this,t,n,i,s,a),n[u.CANCEL]=t.once("mousecancel",this.detach,this,t,n,i,s,a)):a.eventType.indexOf("mouse")!==-1&&f?n.preventMouse=!1:o.test(a.eventType)&&(n[u.END]=t.once(r.end,this._end,this,t,n,i,s,a),n[u.CANCEL]=t.once(r.cancel,this.detach,this,t,n,i,s,a))},_end:function(e,t,n,r,i,o){var f=o.startXY,l,c,h=15;n._extra&&n._extra.sensitivity>=0&&(h=n._extra.sensitivity),e.changedTouches?(l=[e.changedTouches[0].pageX,e.changedTouches[0].pageY],c=[e.changedTouches[0].clientX,e.changedTouches[0].clientY]):(l=[e.pageX,e.pageY],c=[e.clientX,e.clientY]),Math.abs(l[0]-f[0])<=h&&Math.abs(l[1]-f[1])<=h&&(e.type=s,e.pageX=l[0],e.pageY=l[1],e.clientX=c[0],e.clientY=c[1],e.currentTarget=o.node,r.fire(e)),a(n,[u.END,u.CANCEL])}})},"3.15.0",{requires:["node-base","event-base","event-touch","event-synthetic"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("swfdetect",function(e,t){function c(e){return parseInt(e,10)}function h(e){i.isNumber(c(e[0]))&&(r.flashMajor=e[0]),i.isNumber(c(e[1]))&&(r.flashMinor=e[1]),i.isNumber(c(e[2]))&&(r.flashRev=e[2])}var n=0,r=e.UA,i=e.Lang,s="ShockwaveFlash",o,u,a,f,l;if(r.gecko||r.webkit||r.opera){if(o=navigator.mimeTypes["application/x-shockwave-flash"])if(u=o.enabledPlugin)a=u.description.replace(/\s[rd]/g,".").replace(/[A-Za-z\s]+/g,"").split("."),h(a)}else if(r.ie){try{f=new ActiveXObject(s+"."+s+".6"),f.AllowScriptAccess="always"}catch(p){f!==null&&(n=6)}if(n===0)try{l=new ActiveXObject(s+"."+s),a=l.GetVariable("$version").replace(/[A-Za-z\s]+/g,"").split(","),h(a)}catch(d){}}e.SWFDetect={getFlashVersion:function(){return String(r.flashMajor)+"."+String(r.flashMinor)+"."+String(r.flashRev)},isFlashVersionAtLeast:function(e,t,n){var i=c(r.flashMajor),s=c(r.flashMinor),o=c(r.flashRev);return e=c(e||0),t=c(t||0),n=c(n||0),e===i?t===s?n<=o:t<s:e<i}}},"3.15.0",{requires:["yui-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("swf",function(e,t){function d(t,n,d){this._id=e.guid("yuiswf");var v=this._id,m=o.one(t),d=d||{},g=d.version||l,y=(g+"").split("."),b=r.isFlashVersionAtLeast(parseInt(y[0],10),parseInt(y[1],10),parseInt(y[2],10)),w=r.isFlashVersionAtLeast(8,0,0),E=w&&!b&&d.useExpressInstall,S=E?c:n,x="<object ",T,N,C="yId="+e.id+"&YUISwfId="+v+"&YUIBridgeCallback="+h+"&allowedDomain="+document.location.hostname;e.SWF._instances[v]=this;if(m&&(b||E)&&S){x+='id="'+v+'" ',s.ie?x+='classid="'+a+'" ':x+='type="'+f+'" data="'+u.html(S)+'" ',T="100%",N="100%",x+='width="'+T+'" height="'+N+'">',s.ie&&(x+='<param name="movie" value="'+u.html(S)+'"/>');for(var k in d.fixedAttributes)p.hasOwnProperty(k)&&(x+='<param name="'+u.html(k)+'" value="'+u.html(d.fixedAttributes[k])+'"/>');for(var L in d.flashVars){var A=d.flashVars[L];i.isString(A)&&(C+="&"+u.html(L)+"="+u.html(encodeURIComponent(A)))}C&&(x+='<param name="flashVars" value="'+C+'"/>'),x+="</object>",m.set("innerHTML",x),this._swf=o.one("#"+v)}else{var O={};O.type="wrongflashversion",this.publish("wrongflashversion",{fireOnce:!0}),this.fire("wrongflashversion",O)}}var n=e.Event,r=e.SWFDetect,i=e.Lang,s=e.UA,o=e.Node,u=e.Escape,a="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000",f="application/x-shockwave-flash",l="10.0.22",c="http://fpdownload.macromedia.com/pub/flashplayer/update/current/swf/autoUpdater.swf?"+Math.random(),h="SWF.eventHandler",p={align:"",allowFullScreen:"",allowNetworking:"",allowScriptAccess:"",base:"",bgcolor:"",loop:"",menu:"",name:"",play:"",quality:"",salign:"",scale:"",tabindex:"",wmode:""};d._instances=d._instances||{},d.eventHandler=function(e,t){d._instances[e]._eventHandler(t)},d.prototype={_eventHandler:function(e){e.type==="swfReady"?(this.publish("swfReady",{fireOnce:!0}),this.fire("swfReady",e)):e.type!=="log"&&this.fire(e.type,e)},callSWF:function(e,t){return t||(t=[]),this._swf._node[e]?this._swf._node[e].apply(this._swf._node,t):null},toString:function(){return"SWF "+this._id}},e.augment(d,e.EventTarget),e.SWF=d},"3.15.0",{requires:["event-custom","node","swfdetect","escape"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-ddm",function(e,t){e.mix(e.DD.DDM,{_pg:null,_debugShim:!1,_activateTargets:function(){},_deactivateTargets:function(){},_startDrag:function(){this.activeDrag&&this.activeDrag.get("useShim")&&(this._shimming=!0,this._pg_activate(),this._activateTargets())},_endDrag:function(){this._pg_deactivate(),this._deactivateTargets()},_pg_deactivate:function(){this._pg.setStyle("display","none")},_pg_activate:function(){this._pg||this._createPG();var e=this.activeDrag.get("activeHandle"),t="auto";e&&(t=e.getStyle("cursor")),t==="auto"&&(t=this.get("dragCursor")),this._pg_size(),this._pg.setStyles({top:0,left:0,display:"block",opacity:this._debugShim?".5":"0",cursor:t})},_pg_size:function(){if(this.activeDrag){var t=e.one("body"),n=t.get("docHeight"),r=t.get("docWidth");this._pg.setStyles({height:n+"px",width:r+"px"})}},_createPG:function(){var t=e.Node.create("<div></div>"),n=e.one("body"),r;t.setStyles({top:"0",left:"0",position:"absolute",zIndex:"9999",overflow:"hidden",backgroundColor:"red",display:"none",height:"5px",width:"5px"}),t.set("id",e.stamp(t)),t.addClass(e.DD.DDM.CSS_PREFIX+"-shim"),n.prepend(t),this._pg=t,this._pg.on("mousemove",e.throttle(e.bind(this._move,this),this.get("throttleTime"))),this._pg.on("mouseup",e.bind(this._end,this)),r=e.one("win"),e.on("window:resize",e.bind(this._pg_size,this)),r.on("scroll",e.bind(this._pg_size,this))}},!0)},"3.15.0",{requires:["dd-ddm-base","event-resize"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-ddm-drop",function(e,t){e.mix(e.DD.DDM,{_noShim:!1,_activeShims:[],_hasActiveShim:function(){return this._noShim?!0:this._activeShims.length},_addActiveShim:function(e){this._activeShims.push(e)},_removeActiveShim:function(t){var n=[];e.Array.each(this._activeShims,function(e){e._yuid!==t._yuid&&n.push(e)}),this._activeShims=n},syncActiveShims:function(t){e.later(0,this,function(t){var n=t?this.targets:this._lookup();e.Array.each(n,function(e){e.sizeShim.call(e)},this)},t)},mode:0,POINT:0,INTERSECT:1,STRICT:2,useHash:!0,activeDrop:null,validDrops:[],otherDrops:{},targets:[],_addValid:function(e){return this.validDrops.push(e),this},_removeValid:function(t){var n=[];return e.Array.each(this.validDrops,function(e){e!==t&&n.push(e)}),this.validDrops=n,this},isOverTarget:function(e){if(this.activeDrag&&e){var t=this.activeDrag.mouseXY,n,r=this.activeDrag.get("dragMode"),i,s=e.shim;if(t&&this.activeDrag){i=this.activeDrag.region;if(r===this.STRICT)return this.activeDrag.get("dragNode").inRegion(e.region,!0,i);if(e&&e.shim)return r===this.INTERSECT&&this._noShim?(n=i||this.activeDrag.get("node"),e.get("node").intersect(n,e.region).inRegion):(this._noShim&&(s=e.get("node")),s.intersect({top:t[1],bottom:t[1],left:t[0],right:t[0]},e.region).inRegion)}}return!1},clearCache:function(){this.validDrops=[],this.otherDrops={},this._activeShims=[]},_activateTargets:function(){this._noShim=!0,this.clearCache(),e.Array.each(this.targets,function(e){e._activateShim([]),e.get("noShim")===!0&&(this._noShim=!1)},this),this._handleTargetOver()},getBestMatch:function(t,n){var r=null,i=0,s;return e.Object.each(t,function(e){var t=this.activeDrag.get("dragNode").intersect(e.get("node"));e.region.area=t.area,t.inRegion&&t.area>i&&(i=t.area,r=e)},this),n?(s=[],e.Object.each(t,function(e){e!==r&&s.push(e)},this),[r,s]):r},_deactivateTargets:function(){var t=[],n,r=this.activeDrag,i=this.activeDrop;r&&i&&this.otherDrops[i]?(r.get("dragMode")?(n=this.getBestMatch(this.otherDrops,!0),i=n[0],t=n[1]):(t=this.otherDrops,delete t[i]),r.get("node").removeClass(this.CSS_PREFIX+"-drag-over"),i&&(i.fire("drop:hit",{drag:r,drop:i,others:t}),r.fire("drag:drophit",{drag:r,drop:i,others:t}))):r&&r.get("dragging")&&(r.get("node").removeClass(this.CSS_PREFIX+"-drag-over"),r.fire("drag:dropmiss",{pageX:r.lastXY[0],pageY:r.lastXY[1]})),this.activeDrop=null,e.Array.each(this.targets,function(e){e._deactivateShim([])},this)},_dropMove:function(){this._hasActiveShim()?this._handleTargetOver():e.Object.each(this.otherDrops,function(e){e._handleOut.apply(e,[])})},_lookup:function(){if(!this.useHash||this._noShim)return this.validDrops;var t=[];return e.Array.each(this.validDrops,function(e){e.shim&&e.shim.inViewportRegion(!1,e.region)&&t.push(e)}),t},_handleTargetOver:function(){var t=this._lookup();e.Array.each(t,function(e){e._handleTargetOver.call(e)},this)},_regTarget:function(e){this.targets.push(e)},_unregTarget:function(t){var n=[],r;e.Array.each(this.targets,function(e){e!==t&&n.push(e)},this),this.targets=n,r=[],e.Array.each(this.validDrops,function(e){e!==t&&r.push(e)}),this.validDrops=r},getDrop:function(t){var n=!1,r=e.one(t);return r instanceof e.Node&&e.Array.each(this.targets,function(e){r.compareTo(e.get("node"))&&(n=e)}),n}},!0)},"3.15.0",{requires:["dd-ddm"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-proxy",function(e,t){var n=e.DD.DDM,r="node",i="dragNode",s="host",o=!0,u,a=function(){a.superclass.constructor.apply(this,arguments)};a.NAME="DDProxy",a.NS="proxy",a.ATTRS={host:{},moveOnEnd:{value:o},hideOnEnd:{value:o},resizeFrame:{value:o},positionProxy:{value:o},borderStyle:{value:"1px solid #808080"},cloneNode:{value:!1}},u={_hands:null,_init:function(){if(!n._proxy){n._createFrame(),e.on("domready",e.bind(this._init,this));return}this._hands||(this._hands=[]);var t,o,u=this.get(s),a=u.get(i);a.compareTo(u.get(r))&&n._proxy&&u.set(i,n._proxy),e.Array.each(this._hands,function(e){e.detach()}),t=n.on("ddm:start",e.bind(function(){n.activeDrag===u&&n._setFrame(u)},this)),o=n.on("ddm:end",e.bind(function(){u.get("dragging")&&(this.get("moveOnEnd")&&u.get(r).setXY(u.lastXY),this.get("hideOnEnd")&&u.get(i).setStyle("display","none"),this.get("cloneNode")&&(u.get(i).remove(),u.set(i,n._proxy)))},this)),this._hands=[t,o]},initializer:function(){this._init()},destructor:function(){var t=this.get(s);e.Array.each(this._hands,function(e){e.detach()}),t.set(i,t.get(r))},clone:function(){var t=this.get(s),n=t.get(r),o=n.cloneNode(!0);return delete o._yuid,o.setAttribute("id",e.guid()),o.setStyle("position","absolute"),n.get("parentNode").appendChild(o),t.set(i,o),o}},e.namespace("Plugin"),e.extend(a,e.Base,u),e.Plugin.DDProxy=a,e.mix(n,{_createFrame:function(){if(!n._proxy){n._proxy=o;var t=e.Node.create("<div></div>"),r=e.one("body");t.setStyles({position:"absolute",display:"none",zIndex:"999",top:"-999px",left:"-999px"}),r.prepend(t),t.set("id",e.guid()),t.addClass(n.CSS_PREFIX+"-proxy"),n._proxy=t}},_setFrame:function(e){var t=e.get(r),s=e.get(i),o,u="auto";o=n.activeDrag.get("activeHandle"),o&&(u=o.getStyle("cursor")),u==="auto"&&(u=n.get("dragCursor")),s.setStyles({visibility:"hidden",display:"block",cursor:u,border:e.proxy.get("borderStyle")}),e.proxy.get("cloneNode")&&(s=e.proxy.clone()),e.proxy.get("resizeFrame")&&s.setStyles({height:t.get("offsetHeight")+"px",width:t.get("offsetWidth")+"px"}),e.proxy.get("positionProxy")&&s.setXY(e.nodeXY),s.setStyle("visibility","visible")}})},"3.15.0",{requires:["dd-drag"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-constrain",function(e,t){var n="dragNode",r="offsetHeight",i="offsetWidth",s="host",o="tickXArray",u="tickYArray",a=e.DD.DDM,f="top",l="right",c="bottom",h="left",p="view",d=null,v="drag:tickAlignX",m="drag:tickAlignY",g=function(){this._lazyAddAttrs=!1,g.superclass.constructor.apply(this,arguments)};g.NAME="ddConstrained",g.NS="con",g.ATTRS={host:{},stickX:{value:!1},stickY:{value:!1},tickX:{value:!1},tickY:{value:!1},tickXArray:{value:!1},tickYArray:{value:!1},gutter:{value:"0",setter:function(t){return e.DD.DDM.cssSizestoObject(t)}},constrain:{value:p,setter:function(t){var n=e.one(t);return n&&(t=n),t}},constrain2region:{setter:function(e){return this.set("constrain",e)}},constrain2node:{setter:function(t){return this.set("constrain",e.one(t))}},constrain2view:{setter:function(){return this.set("constrain",p)}},cacheRegion:{value:!0}},d={_lastTickXFired:null,_lastTickYFired:null,initializer:function(){this._createEvents(),this._eventHandles=[this.get(s).on("drag:end",e.bind(this._handleEnd,this)),this.get(s).on("drag:start",e.bind(this._handleStart,this)),this.get(s).after("drag:align",e.bind(this.align,this)),this.get(s).after("drag:drag",e.bind(this.drag,this))]},destructor:function(){e.Array.each(this._eventHandles,function(e){e.detach()}),this._eventHandles.length=0},_createEvents:function(){var t=[v,m];e.Array.each(t,function(e){this.publish(e,{type:e,emitFacade:!0,bubbles:!0,queuable:!1,prefix:"drag"})},this)},_handleEnd:function(){this._lastTickYFired=null,this._lastTickXFired=null},_handleStart:function(){this.resetCache()},_regionCache:null,_cacheRegion:function(){this._regionCache=this.get("constrain").get("region")},resetCache:function(){this._regionCache=null},_getConstraint:function(){var t=this.get("constrain"),r=this.get("gutter"),i;t&&(t instanceof e.Node?(this._regionCache||(this._eventHandles.push(e.on("resize",e.bind(this._cacheRegion,this),e.config.win)),this._cacheRegion()),i=e.clone(this._regionCache),this.get("cacheRegion")||this.resetCache()):e.Lang.isObject(t)&&(i=e.clone(t)));if(!t||!i)t=p;return t===p&&(i=this.get(s).get(n).get("viewportRegion")),e.Object.each(r,function(e,t){t===l||t===c?i[t]-=e:i[t]+=e}),i},getRegion:function(e){var t={},o=null,u=null,a=this.get(s);return t=this._getConstraint(),e&&(o=a.get(n).get(r),u=a.get(n).get(i),t[l]=t[l]-u,t[c]=t[c]-o),t},_checkRegion:function(e){var t=e,o=this.getRegion(),u=this.get(s),a=u.get(n).get(r),p=u.get(n).get(i);return t[1]>o[c]-a&&(e[1]=o[c]-a),o[f]>t[1]&&(e[1]=o[f]),t[0]>o[l]-p&&(e[0]=o[l]-p),o[h]>t[0]&&(e[0]=o[h]),e},inRegion:function(e){e=e||this.get(s).get(n).getXY();var t=this._checkRegion([e[0],e[1]]),r=!1;return e[0]===t[0]&&e[1]===t[1]&&(r=!0),r},align:function(){var e=this.get(s),t=[e.actXY[0],e.actXY[1]],n=this.getRegion(!0);this.get("stickX")&&(t[1]=e.startXY[1]-e.deltaXY[1]),this.get("stickY")&&(t[0]=e.startXY[0]-e.deltaXY[0]),n&&(t=this._checkRegion(t)),t=this._checkTicks(t,n),e.actXY=t},drag:function(){var t=this.get(s),n=this.get("tickX"),r=this.get("tickY"),i=[t.actXY[0],t.actXY[1]];(e.Lang.isNumber(n)||this.get(o))&&this._lastTickXFired!==i[0]&&(this._tickAlignX(),this._lastTickXFired=i[0]),(e.Lang.isNumber(r)||this.get(u))&&this._lastTickYFired!==i[1]&&(this._tickAlignY(),this._lastTickYFired=i[1])},_checkTicks:function(e,t){var n=this.get(s),r=n.startXY[0]-n.deltaXY[0],i=n.startXY[1]-n.deltaXY[1],p=this.get("tickX"),d=this.get("tickY");return p&&!this.get(o)&&(e[0]=a._calcTicks(e[0],r,p,t[h],t[l])),d&&!this.get(u)&&(e[1]=a._calcTicks(e[1],i,d,t[f],t[c])),this.get(o)&&(e[0]=a._calcTickArray(e[0],this.get(o),t[h],t[l])),this.get(u)&&(e[1]=a._calcTickArray(e[1],this.get(u),t[f],t[c])),e},_tickAlignX:function(){this.fire(v)},_tickAlignY:function(){this.fire(m)}},e.namespace("Plugin"),e.extend(g,e.Base,d),e.Plugin.DDConstrained=g,e.mix(a,{_calcTicks:function(e,t,n,r,i){var s=(e-t)/n,o=Math.floor(s),u=Math.ceil(s);return(o!==0||u!==0)&&s>=o&&s<=u&&(e=t+n*o,r&&i&&(e<r&&(e=t+n*(o+1)),e>i&&(e=t+n*(o-1)))),e},_calcTickArray:function(e,t,n,r){var i=0,s=t.length,o=0,u,a,f;if(!t||t.length===0)return e;if(t[0]>=e)return t[0];for(i=0;i<s;i++){o=i+1;if(t[o]&&t[o]>=e)return u=e-t[i],a=t[o]-e,f=a>u?t[i]:t[o],n&&r&&f>r&&(t[i]?f=t[i]:f=t[s-1]),f}return t[t.length-1]}})},"3.15.0",{requires:["dd-drag"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-drop",function(e,t){var n="node",r=e.DD.DDM,i="offsetHeight",s="offsetWidth",o="drop:over",u="drop:enter",a="drop:exit",f=function(){this._lazyAddAttrs=!1,f.superclass.constructor.apply(this,arguments),e.on("domready",e.bind(function(){e.later(100,this,this._createShim)},this)),r._regTarget(this)};f.NAME="drop",f.ATTRS={node:{setter:function(t){var n=e.one(t);return n||e.error("DD.Drop: Invalid Node Given: "+t),n}},groups:{value:["default"],getter:function(){return this._groups?e.Object.keys(this._groups):(this._groups={},[])},setter:function(t){return this._groups=e.Array.hash(t),t}},padding:{value:"0",setter:function(e){return r.cssSizestoObject(e)}},lock:{value:!1,setter:function(e){return e?this.get(n).addClass(r.CSS_PREFIX+"-drop-locked"):this.get(n).removeClass(r.CSS_PREFIX+"-drop-locked"),e}},bubbles:{setter:function(e){return this.addTarget(e),e}},useShim:{value:!0,setter:function(t){return e.DD.DDM._noShim=!t,t}}},e.extend(f,e.Base,{_bubbleTargets:e.DD.DDM,addToGroup:function(e){return this._groups[e]=!0,this},removeFromGroup:function(e){return delete this._groups[e],this},_createEvents:function(){var t=[o,u,a,"drop:hit"];e.Array.each(t,function(e){this.publish(e,{type:e,emitFacade:!0,preventable:!1,bubbles:!0,queuable:!1,prefix:"drop"})},this)},_valid:null,_groups:null,shim:null,region:null,overTarget:null,inGroup:function(t){this._valid=!1;var n=!1;return e.Array.each(t,function(e){this._groups[e]&&(n=!0,this._valid=!0)},this),n},initializer:function(){e.later(100,this,this._createEvents);var t=this.get(n),i;t.get("id")||(i=e.stamp(t),t.set("id",i)),t.addClass(r.CSS_PREFIX+"-drop"),this.set("groups",this.get("groups"))},destructor:function(){r._unregTarget(this),this.shim&&this.shim!==this.get(n)&&(this.shim.detachAll(),this.shim.remove(),this.shim=null),this.get(n).removeClass(r.CSS_PREFIX+"-drop"),this.detachAll()},_deactivateShim:function(){if(!this.shim)return!1;this.get(n).removeClass(r.CSS_PREFIX+"-drop-active-valid"),this.get(n).removeClass(r.CSS_PREFIX+"-drop-active-invalid"),this.get(n).removeClass(r.CSS_PREFIX+"-drop-over"),this.get("useShim")&&this.shim.setStyles({top:"-999px",left:"-999px",zIndex:"1"}),this.overTarget=!1},_activateShim:function(){if(!r.activeDrag)return!1;if(this.get(n)===r.activeDrag.get(n))return!1;if(this.get("lock"))return!1;var e=this.get(n);this.inGroup(r.activeDrag.get("groups"))?(e.removeClass(r.CSS_PREFIX+"-drop-active-invalid"),e.addClass(r.CSS_PREFIX+"-drop-active-valid"),r._addValid(this),this.overTarget=!1,this.get("useShim")||(this.shim=this.get(n)),this.sizeShim()):(r._removeValid(this),e.removeClass(r.CSS_PREFIX+"-drop-active-valid"),e.addClass(r.CSS_PREFIX+"-drop-active-invalid"))},sizeShim:function(){if(!r.activeDrag)return!1;if(this.get(n)===r.activeDrag.get(n))return!1;if(this.get("lock"))return!1;if(!this.shim)return e.later(100,this,this.sizeShim),!1;var t=this.get(n),o=t.get(i),u=t.get(s),a=t.getXY(),f=this.get("padding"),l,c,h;u=u+f.left+f.right,o=o+f.top+f.bottom,a[0]=a[0]-f.left,a[1]=a[1]-f.top,r.activeDrag.get("dragMode")===r.INTERSECT&&(l=r.activeDrag,c=l.get(n).get(i),h=l.get(n).get(s),o+=c,u+=h,a[0]=a[0]-(h-l.deltaXY[0]),a[1]=a[1]-(c-l.deltaXY[1])),this.get("useShim")&&this.shim.setStyles({height:o+"px",width:u+"px",top:a[1]+"px",left:a[0]+"px"}),this.region={0:a[0],1:a[1],area:0,top:a[1],right:a[0]+u,bottom:a[1]+o,left:a[0]}},_createShim:function(){if(!r._pg){e.later(10,this,this._createShim);return}if(this.shim)return;var t=this.get("node");this.get("useShim")&&(t=e.Node.create('<div id="'+this.get(n).get("id")+'_shim"></div>'),t.setStyles({height:this.get(n).get(i)+"px",width:this.get(n).get(s)+"px",backgroundColor:"yellow",opacity:".5",zIndex:"1",overflow:"hidden",top:"-900px",left:"-900px",position:"absolute"}),r._pg.appendChild(t),t.on("mouseover",e.bind(this._handleOverEvent,this)),t.on("mouseout",e.bind(this._handleOutEvent,this))),this.shim=t},_handleTargetOver:function(){r.isOverTarget(this)?(this.get(n).addClass(r.CSS_PREFIX+"-drop-over"),r.activeDrop=this,r.otherDrops[this]=this,this.overTarget?(r.activeDrag.fire("drag:over",{drop:this,drag:r.activeDrag}),this.fire(o,{drop:this,drag:r.activeDrag})):r.activeDrag.get("dragging")&&(this.overTarget=!0,this.fire(u,{drop:this,drag:r.activeDrag}),r.activeDrag.fire("drag:enter",{drop:this,drag:r.activeDrag}),r.activeDrag.get(n).addClass(r.CSS_PREFIX+"-drag-over"))):this._handleOut()},_handleOverEvent:function(){this.shim.setStyle("zIndex","999"),r._addActiveShim(this)},_handleOutEvent:function(){this.shim.setStyle("zIndex","1"),r._removeActiveShim(this)},_handleOut:function(e){(!r.isOverTarget(this)||e)&&this.overTarget&&(this.overTarget=!1,e||r._removeActiveShim(this),r.activeDrag&&(this.get(n).removeClass(r.CSS_PREFIX+"-drop-over"),r.activeDrag.get(n).removeClass(r.CSS_PREFIX+"-drag-over"),this.fire(a,{drop:this,drag:r.activeDrag}),r.activeDrag.fire("drag:exit",{drop:this,drag:r.activeDrag}),delete r.otherDrops[this]))}}),e.DD.Drop=f},"3.15.0",{requires:["dd-drag","dd-ddm-drop"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-scroll",function(e,t){var n=function(){n.superclass.constructor.apply(this,arguments)},r,i,s="host",o="buffer",u="parentScroll",a="windowScroll",f="scrollTop",l="scrollLeft",c="offsetWidth",h="offsetHeight";n.ATTRS={parentScroll:{value:!1,setter:function(e){return e?e:!1}},buffer:{value:30,validator:e.Lang.isNumber},scrollDelay:{value:235,validator:e.Lang.isNumber},host:{value:null},windowScroll:{value:!1,validator:e.Lang.isBoolean},vertical:{value:!0,validator:e.Lang.isBoolean},horizontal:{value:!0,validator:e.Lang.isBoolean}},e.extend(n,e.Base,{_scrolling:null,_vpRegionCache:null,_dimCache:null,_scrollTimer:null,_getVPRegion:function(){var e={},t=this.get(u),n=this.get(o),r=this.get(a),i=r?[]:t.getXY(),s=r?"winWidth":c,p=r?"winHeight":h,d=r?t.get(f):i[1],v=r?t.get(l):i[0];return e={top:d+n,right:t.get(s)+v-n,bottom:t.get(p)+d-n,left:v+n},this._vpRegionCache=e,e},initializer:function(){var t=this.get(s);t.after("drag:start",e.bind(this.start,this)),t.after("drag:end",e.bind(this.end,this)),t.on("drag:align",e.bind(this.align,this)),e.one("win").on("scroll",e.bind(function(){this._vpRegionCache=null},this))},_checkWinScroll:function(e){var t=this._getVPRegion(),n=this.get(s),r=this.get(a),i=n.lastXY,c=!1,h=this.get(o),p=this.get(u),d=p.get(f),v=p.get(l),m=this._dimCache.w,g=this._dimCache.h,y=i[1]+g,b=i[1],w=i[0]+m,E=i[0],S=b,x=E,T=d,N=v;this.get("horizontal")&&(E<=t.left&&(c=!0,x=i[0]-(r?h:0),N=v-h),w>=t.right&&(c=!0,x=i[0]+(r?h:0),N=v+h)),this.get("vertical")&&(y>=t.bottom&&(c=!0,S=i[1]+(r?h:0),T=d+h),b<=t.top&&(c=!0,S=i[1]-(r?h:0),T=d-h)),T<0&&(T=0,S=i[1]),N<0&&(N=0,x=i[0]),S<0&&(S=i[1]),x<0&&(x=i[0]),e?(n.actXY=[x,S],n._alignNode([x,S],!0),i=n.actXY,n.actXY=[x,S],n._moveNode({node:p,top:T,left:N}),!T&&!N&&this._cancelScroll()):c?this._initScroll():this._cancelScroll()},_initScroll:function(){this._cancelScroll(),this._scrollTimer=e.Lang.later(this.get("scrollDelay"),this,this._checkWinScroll,[!0],!0)},_cancelScroll:function(){this._scrolling=!1,this._scrollTimer&&(this._scrollTimer.cancel(),delete this._scrollTimer)},align:function(e){this._scrolling&&(this._cancelScroll(),e.preventDefault()),this._scrolling||this._checkWinScroll()},_setDimCache:function(){var e=this.get(s).get("dragNode");this._dimCache={h:e.get(h),w:e.get(c)}},start:function(){this._setDimCache()},end:function(){this._dimCache=null,this._cancelScroll()}}),e.namespace("Plugin"),r=function(){r.superclass.constructor.apply(this,arguments)},r.ATTRS=e.merge(n.ATTRS,{windowScroll:{value:!0,setter:function(t){return t&&this.set(u,e.one("win")),t}}}),e.extend(r,n,{initializer:function(){this.set("windowScroll",this.get("windowScroll"))}}),r.NAME=r.NS="winscroll",e.Plugin.DDWinScroll=r,i=function(){i.superclass.constructor.apply(this,arguments)},i.ATTRS=e.merge(n.ATTRS,{node:{value:!1,setter:function(t){var n=e.one(t);return n?this.set(u,n):t!==!1&&e.error("DDNodeScroll: Invalid Node Given: "+t),n}}}),e.extend(i,n,{initializer:function(){this.set("node",this.get("node"))}}),i.NAME=i.NS="nodescroll",e.Plugin.DDNodeScroll=i,e.DD.Scroll=n},"3.15.0",{requires:["dd-drag"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-drop-plugin",function(e,t){var n=function(e){e.node=e.host,n.superclass.constructor.apply(this,arguments)};n.NAME="dd-drop-plugin",n.NS="drop",e.extend(n,e.DD.Drop),e.namespace("Plugin"),e.Plugin.Drop=n},"3.15.0",{requires:["dd-drop"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("dd-delegate",function(e,t){var n=function(){n.superclass.constructor.apply(this,arguments)},r="container",i="nodes",s=e.Node.create("<div>Temp Node</div>");e.extend(n,e.Base,{_bubbleTargets:e.DD.DDM,dd:null,_shimState:null,_handles:null,_onNodeChange:function(e){this.set("dragNode",e.newVal)},_afterDragEnd:function(){e.DD.DDM._noShim=this._shimState,this.set("lastNode",this.dd.get("node")),this.get("lastNode").removeClass(e.DD.DDM.CSS_PREFIX+"-dragging"),this.dd._unprep(),this.dd.set("node",s)},_delMouseDown:function(t){var n=t.currentTarget,r=this.dd,s=n,o=this.get("dragConfig");n.test(this.get(i))&&!n.test(this.get("invalid"))&&(this._shimState=e.DD.DDM._noShim,e.DD.DDM._noShim=!0,this.set("currentNode",n),r.set("node",n),o&&o.dragNode?s=o.dragNode:r.proxy&&(s=e.DD.DDM._proxy),r.set("dragNode",s),r._prep(),r.fire("drag:mouseDown",{ev:t}))},_onMouseEnter:function(){this._shimState=e.DD.DDM._noShim,e.DD.DDM._noShim=!0},_onMouseLeave:function(){e.DD.DDM._noShim=this._shimState},initializer:function(){this._handles=[];var t=this.get("dragConfig")||{},n=this.get(r);t.node=s.cloneNode(!0),t.bubbleTargets=this,this.get("handles")&&(t.handles=this.get("handles")),this.dd=new e.DD.Drag(t),this.dd.after("drag:end",e.bind(this._afterDragEnd,this)),this.dd.on("dragNodeChange",e.bind(this._onNodeChange,this)),this.dd.after("drag:mouseup",function(){this._unprep()}),this._handles.push(e.delegate(e.DD.Drag.START_EVENT,e.bind(this._delMouseDown,this),n,this.get(i))),this._handles.push(e.on("mouseenter",e.bind(this._onMouseEnter,this),n)),this._handles.push(e.on("mouseleave",e.bind(this._onMouseLeave,this),n)),e.later(50,this,this.syncTargets),e.DD.DDM.regDelegate(this)},syncTargets:function(){if(!e.Plugin.Drop||this.get("destroyed"))return;var t,n,s;return this.get("target")&&(t=e.one(this.get(r)).all(this.get(i)),n=this.dd.get("groups"),s=this.get("dragConfig"),s&&s.groups&&(n=s.groups),t.each(function(e){this.createDrop(e,n)},this)),this},createDrop:function(t,n){var r={useShim:!1,bubbleTargets:this};return t.drop||t.plug(e.Plugin.Drop,r),t.drop.set("groups",n),t},destructor:function(){this.dd&&this.dd.destroy();if(e.Plugin.Drop){var t=e.one(this.get(r)).all(this.get(i));t.unplug(e.Plugin.Drop)}e.Array.each(this._handles,function(e){e.detach()})}},{NAME:"delegate",ATTRS:{container:{value:"body"},nodes:{value:".dd-draggable"},invalid:{value:"input, select, button, a, textarea"},lastNode:{value:s},currentNode:{value:s},dragNode:{value:s},over:{value:!1},target:{value:!1},dragConfig:{value:null},handles:{value:null}}}),e.mix(e.DD.DDM,{_delegates:[],regDelegate:function(e){this._delegates.push(e)},getDelegate:function(t){var n=null;return t=e.one(t),e.Array.each(this._delegates,function(e){t.test(e.get(r))&&(n=e)},this),n}}),e.namespace("DD"),e.DD.Delegate=n},"3.15.0",{requires:["dd-drag","dd-drop-plugin","event-mouseenter"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-base",function(e,t){var n="running",r="startTime",i="elapsedTime",s="start",o="tween",u="end",a="node",f="paused",l="reverse",c="iterationCount",h=Number,p={},d;e.Anim=function(){e.Anim.superclass.constructor.apply(this,arguments),e.Anim._instances[e.stamp(this)]=this},e.Anim.NAME="anim",e.Anim._instances={},e.Anim.RE_DEFAULT_UNIT=/^width|height|top|right|bottom|left|margin.*|padding.*|border.*$/i,e.Anim.DEFAULT_UNIT="px",e.Anim.DEFAULT_EASING=function(e,t,n,r){return n*e/r+t},e.Anim._intervalTime=20,e.Anim.behaviors={left:{get:function(e,t){return e._getOffset(t)}}},e.Anim.behaviors.top=e.Anim.behaviors.left,e.Anim.DEFAULT_SETTER=function(t,n,r,i,s,o,u,a){var f=t._node,l=f._node,c=u(s,h(r),h(i)-h(r),o);l?"style"in l&&(n in l.style||n in e.DOM.CUSTOM_STYLES)?(a=a||"",f.setStyle(n,c+a)):"attributes"in l&&n in l.attributes?f.setAttribute(n,c):n in l&&(l[n]=c):f.set?f.set(n,c):n in f&&(f[n]=c)},e.Anim.DEFAULT_GETTER=function(t,n){var r=t._node,i=r._node,s="";return i?"style"in i&&(n in i.style||n in e.DOM.CUSTOM_STYLES)?s=r.getComputedStyle(n):"attributes"in i&&n in i.attributes?s=r.getAttribute(n):n in i&&(s=i[n]):r.get?s=r.get(n):n in r&&(s=r[n]),s},e.Anim.ATTRS={node:{setter:function(t){return t&&(typeof t=="string"||t.nodeType)&&(t=e.one(t)),this._node=t,!t,t}},duration:{value:1},easing:{value:e.Anim.DEFAULT_EASING,setter:function(t){if(typeof t=="string"&&e.Easing)return e.Easing[t]}},from:{},to:{},startTime:{value:0,readOnly:!0},elapsedTime:{value:0,readOnly:!0},running:{getter:function(){return!!p[e.stamp(this)]},value:!1,readOnly:!0},iterations:{value:1},iterationCount:{value:0,readOnly:!0},direction:{value:"normal"},paused:{readOnly:!0,value:!1},reverse:{value:!1}},e.Anim.run=function(){var t=e.Anim._instances,n;for(n in t)t[n].run&&t[n].run()},e.Anim.pause=function(){for(var t in p)p[t].pause&&p[t].pause();e.Anim._stopTimer()},e.Anim.stop=function(){for(var t in p)p[t].stop&&p[t].stop();e.Anim._stopTimer()},e.Anim._startTimer=function(){d||(d=setInterval(e.Anim._runFrame,e.Anim._intervalTime))},e.Anim._stopTimer=function(){clearInterval(d),d=0},e.Anim._runFrame=function(){var t=!0,n;for(n in p)p[n]._runFrame&&(t=!1,p[n]._runFrame());t&&e.Anim._stopTimer()},e.Anim.RE_UNITS=/^(-?\d*\.?\d*){1}(em|ex|px|in|cm|mm|pt|pc|%)*$/;var v={run:function(){return this.get(f)?this._resume():this.get(n)||this._start(),this},pause:function(){return this.get(n)&&this._pause(),this},stop:function(e){return(this.get(n)||this.get(f))&&this._end(e),this},_added:!1,_start:function(){this._set(r,new Date-this.get(i)),this._actualFrames=0,this.get(f)||this._initAnimAttr(),p[e.stamp(this)]=this,e.Anim._startTimer(),this.fire(s)},_pause:function(){this._set(r,null),this._set(f,!0),delete p[e.stamp(this)],this.fire("pause")},_resume:function(){this._set(f,!1),p[e.stamp(this)]=this,this._set(r,new Date-this.get(i)),e.Anim._startTimer(),this.fire("resume")},_end:function(t){var n=this.get("duration")*1e3;t&&this._runAttrs(n,n,this.get(l)),this._set(r,null),this._set(i,0),this._set(f,!1),delete p[e.stamp(this)],this.fire(u,{elapsed:this.get(i)})},_runFrame:function(){var e=this._runtimeAttr.duration,t=new Date-this.get(r),n=this.get(l),s=t>=e;this._runAttrs(t,e,n),this._actualFrames+=1,this._set(i,t),this.fire(o),s&&this._lastFrame()},_runAttrs:function(t,n,r){var i=this._runtimeAttr,s=e.Anim.behaviors,o=i.easing,u=n,a=!1,f,l,c;t>=n&&(a=!0),r&&(t=n-t,u=0);for(c in i)i[c].to&&(f=i[c],l=c in s&&"set"in s[c]?s[c].set:e.Anim.DEFAULT_SETTER,a?l(this,c,f.from,f.to,u,n,o,f.unit):l(this,c,f.from,f.to,t,n,o,f.unit))},_lastFrame:function(){var e=this.get("iterations"),t=this.get(c);t+=1,e==="infinite"||t<e?(this.get("direction")==="alternate"&&this.set(l,!this.get(l)),this.fire("iteration")):(t=0,this._end()),this._set(r,new Date),this._set(c,t)},_initAnimAttr:function(){var t=this.get("from")||{},n=this.get("to")||{},r={duration:this.get("duration")*1e3,easing:this.get("easing")},i=e.Anim.behaviors,s=this.get(a),o,u,f;e.each(n,function(n,a){typeof n=="function"&&(n=n.call(this,s)),u=t[a],u===undefined?u=a in i&&"get"in i[a]?i[a].get(this,a):e.Anim.DEFAULT_GETTER(this,a):typeof u=="function"&&(u=u.call(this,s));var l=e.Anim.RE_UNITS.exec(u),c=e.Anim.RE_UNITS.exec(n);u=l?l[1]:u,f=c?c[1]:n,o=c?c[2]:l?l[2]:"",!o&&e.Anim.RE_DEFAULT_UNIT.test(a)&&(o=e.Anim.DEFAULT_UNIT);if(!u||!f){e.error('invalid "from" or "to" for "'+a+'"',"Anim");return}r[a]={from:e.Lang.isObject(u)?e.clone(u):u,to:f,unit:o}},this),this._runtimeAttr=r},_getOffset:function(e){var t=this._node,n=t.getComputedStyle(e),r=e==="left"?"getX":"getY",i=e==="left"?"setX":"setY",s;return n==="auto"&&(s=t.getStyle("position"),s==="absolute"||s==="fixed"?(n=t[r](),t[i](n)):n=0),n},destructor:function(){delete e.Anim._instances[e.stamp(this)]}};e.extend(e.Anim,e.Base,v)},"3.15.0",{requires:["base-base","node-style"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-color",function(e,t){var n=Number;e.Anim.getUpdatedColorValue=function(t,r,i,s,o){return t=e.Color.re_RGB.exec(e.Color.toRGB(t)),r=e.Color.re_RGB.exec(e.Color.toRGB(r)),(!t||t.length<3||!r||r.length<3)&&e.error("invalid from or to passed to color behavior"),"rgb("+[Math.floor(o(i,n(t[1]),n(r[1])-n(t[1]),s)),Math.floor(o(i,n(t[2]),n(r[2])-n(t[2]),s)),Math.floor(o(i,n(t[3]),n(r[3])-n(t[3]),s))].join(", ")+")"},e.Anim.behaviors.color={set:function(t,n,r,i,s,o,u){t._node.setStyle(n,e.Anim.getUpdatedColorValue(r,i,s,o,u))},get:function(e,t){var n=e._node.getComputedStyle(t);return n=n==="transparent"?"rgb(255, 255, 255)":n,n}},e.each(["backgroundColor","borderColor","borderTopColor","borderRightColor","borderBottomColor","borderLeftColor"],function(t){e.Anim.behaviors[t]=e.Anim.behaviors.color})},"3.15.0",{requires:["anim-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-xy",function(e,t){var n=Number;e.Anim.behaviors.xy={set:function(e,t,r,i,s,o,u){e._node.setXY([u(s,n(r[0]),n(i[0])-n(r[0]),o),u(s,n(r[1]),n(i[1])-n(r[1]),o)])},get:function(e){return e._node.getXY()}}},"3.15.0",{requires:["anim-base","node-screen"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-curve",function(e,t){e.Anim.behaviors.curve={set:function(t,n,r,i,s,o,u){r=r.slice.call(r),i=i.slice.call(i);var a=u(s,0,100,o)/100;i.unshift(r),t._node.setXY(e.Anim.getBezier(i,a))},get:function(e){return e._node.getXY()}},e.Anim.getBezier=function(e,t){var n=e.length,r=[],i,s;for(i=0;i<n;++i)r[i]=[e[i][0],e[i][1]];for(s=1;s<n;++s)for(i=0;i<n-s;++i)r[i][0]=(1-t)*r[i][0]+t*r[parseInt(i+1,10)][0],r[i][1]=(1-t)*r[i][1]+t*r[parseInt(i+1,10)][1];return[r[0][0],r[0][1]]}},"3.15.0",{requires:["anim-xy"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-easing",function(e,t){var n={easeNone:function(e,t,n,r){return n*e/r+t},easeIn:function(e,t,n,r){return n*(e/=r)*e+t},easeOut:function(e,t,n,r){return-n*(e/=r)*(e-2)+t},easeBoth:function(e,t,n,r){return(e/=r/2)<1?n/2*e*e+t:-n/2*(--e*(e-2)-1)+t},easeInStrong:function(e,t,n,r){return n*(e/=r)*e*e*e+t},easeOutStrong:function(e,t,n,r){return-n*((e=e/r-1)*e*e*e-1)+t},easeBothStrong:function(e,t,n,r){return(e/=r/2)<1?n/2*e*e*e*e+t:-n/2*((e-=2)*e*e*e-2)+t},elasticIn:function(e,t,n,r,i,s){var o;return e===0?t:(e/=r)===1?t+n:(s||(s=r*.3),!i||i<Math.abs(n)?(i=n,o=s/4):o=s/(2*Math.PI)*Math.asin(n/i),-(i*Math.pow(2,10*(e-=1))*Math.sin((e*r-o)*2*Math.PI/s))+t)},elasticOut:function(e,t,n,r,i,s){var o;return e===0?t:(e/=r)===1?t+n:(s||(s=r*.3),!i||i<Math.abs(n)?(i=n,o=s/4):o=s/(2*Math.PI)*Math.asin(n/i),i*Math.pow(2,-10*e)*Math.sin((e*r-o)*2*Math.PI/s)+n+t)},elasticBoth:function(e,t,n,r,i,s){var o;return e===0?t:(e/=r/2)===2?t+n:(s||(s=r*.3*1.5),!i||i<Math.abs(n)?(i=n,o=s/4):o=s/(2*Math.PI)*Math.asin(n/i),e<1?-0.5*i*Math.pow(2,10*(e-=1))*Math.sin((e*r-o)*2*Math.PI/s)+t:i*Math.pow(2,-10*(e-=1))*Math.sin((e*r-o)*2*Math.PI/s)*.5+n+t)},backIn:function(e,t,n,r,i){return i===undefined&&(i=1.70158),e===r&&(e-=.001),n*(e/=r)*e*((i+1)*e-i)+t},backOut:function(e,t,n,r,i){return typeof i=="undefined"&&(i=1.70158),n*((e=e/r-1)*e*((i+1)*e+i)+1)+t},backBoth:function(e,t,n,r,i){return typeof i=="undefined"&&(i=1.70158),(e/=r/2)<1?n/2*e*e*(((i*=1.525)+1)*e-i)+t:n/2*((e-=2)*e*(((i*=1.525)+1)*e+i)+2)+t},bounceIn:function(t,n,r,i){return r-e.Easing.bounceOut(i-t,0,r,i)+n},bounceOut:function(e,t,n,r){return(e/=r)<1/2.75?n*7.5625*e*e+t:e<2/2.75?n*(7.5625*(e-=1.5/2.75)*e+.75)+t:e<2.5/2.75?n*(7.5625*(e-=2.25/2.75)*e+.9375)+t:n*(7.5625*(e-=2.625/2.75)*e+.984375)+t},bounceBoth:function(t,n,r,i){return t<i/2?e.Easing.bounceIn(t*2,0,r,i)*.5+n:e.Easing.bounceOut(t*2-i,0,r,i)*.5+r*.5+n}};e.Easing=n},"3.15.0",{requires:["anim-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-node-plugin",function(e,t){var n=function(t){t=t?e.merge(t):{},t.node=t.host,n.superclass.constructor.apply(this,arguments)};n.NAME="nodefx",n.NS="fx",e.extend(n,e.Anim),e.namespace("Plugin"),e.Plugin.NodeFX=n},"3.15.0",{requires:["node-pluginhost","anim-base"]});
/*
YUI 3.15.0 (build 834026e)
Copyright 2014 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

YUI.add("anim-scroll",function(e,t){var n=Number;e.Anim.behaviors.scroll={set:function(e,t,r,i,s,o,u){var a=e._node,f=[u(s,n(r[0]),n(i[0])-n(r[0]),o),u(s,n(r[1]),n(i[1])-n(r[1]),o)];f[0]&&a.set("scrollLeft",f[0]),f[1]&&a.set("scrollTop",f[1])},get:function(e){var t=e._node;return[t.get("scrollLeft"),t.get("scrollTop")]}}},"3.15.0",{requires:["anim-base"]});
