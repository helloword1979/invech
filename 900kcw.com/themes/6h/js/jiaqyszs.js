$(function(){var c=30,b=1,a="#FFC514,#F8223C";d();function d(){$.ajax({type:"post",url:url.config140+"getChineseZodiacTrend.php",data:{type:b,periods:c,colors:a},dataType:"json",success:function(f){console.log(f);var g=0;$(".jqyszs_r").on("click","ul>li>a",function(h){h.preventDefault();$(h.target).addClass("checked").parent().siblings().children(".checked").removeClass("checked");g=$(h.target).attr("href");e(g)});e(g);function e(u){var x=[];var k=[];var s=[];k=f.result.data[u].axisY;x=f.result.data[u].axisX;$.each(f.result.data[u].items,function(z,h){var i=[h.y,h.color];s.push(i)});console.log(s);var y=c1.getContext("2d");y.clearRect(60,0,1180,580);y.font="14px 微软雅黑 Regular";y.textBaseline="alphabetic";y.shadowBlur="";var m=new Image();m.src="../img/JCYS.png";m.onload=function(){y.drawImage(m,20,53)};y.beginPath();y.moveTo(80,290.5);y.lineTo(1150,290.5);y.strokeStyle="#999999";y.lineWidth=1;y.stroke();y.font="16px 微软雅黑 Regular";var w=100,v=86.85,t=1150,r=290;y.beginPath();var j={};y.fillStyle="#767676";for(var l=0;l<k.length;l++){if(l==6){v+=33.85}y.moveTo(w,v);y.lineTo(t,v);j[11-l]=v;y.fillText(k[l],w-20,v+5);v+=33.85}console.log(j);y.strokeStyle="#E6E6E6";y.lineWidth=0.7;y.stroke();y.font="14px 微软雅黑 Regular";var q=100,p=526.9;for(var l=0;l<x.length;l++){y.fillText(x[l],q,p);q+=34.34}var n=110;y.beginPath();for(var l=0;l<s.length;l++){y.lineTo(n,j[s[l][0]]);y.strokeStyle="#D1D1D1";y.lineWidth=0.8;n+=34.34}y.stroke();var o=110;for(var l=0;l<s.length;l++){y.beginPath();y.arc(o,j[s[l][0]],4,0,2*Math.PI);y.fillStyle=s[l][1];y.fill();o+=34.34}}},error:function(e){console.log(e+"错误信息")}})}});