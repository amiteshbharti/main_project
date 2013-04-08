<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">


function Timer(id, minLimit, callback){
       var thisTimer = this;
       this.limit = minLimit * 1;
       this.callback = callback;
       this.timer = 0;
       this.addEvent(window, 'load', function(){
               thisTimer.el = document.getElementById(id);
               thisTimer.txt = thisTimer.el.firstChild;
               thisTimer.intv = setInterval(function(){thisTimer.intvFunc();}, 1000);
       });
}

Timer.prototype = {

       intvFunc: function(){
               this.txt.nodeValue = this.formatTime(++this.timer);
               if(this.timer === this.limit){
                       clearInterval(this.intv);
                       this.callback.call(this);
               }
       },

       formatNum: function(n){
               return n < 10? '0' + n : n;
       },

       formatTime: function (n, m, s){
               s = n % 60;
               m = (n - s) / 60;
               return [this.formatNum(m), ':', this.formatNum(s)].join('');
       },

       addEvent: (function(){return window.addEventListener? function(el, ev, f){
                       el.addEventListener(ev, f, false);
               }:window.attachEvent? function(el, ev, f){
                       el.attachEvent('on' + ev, f);
               }:function(){return;};
       })()
};

// Usage: new Timer('id_of_counting_element', #_of_mins, callback_function(){});
new Timer('timer1', 60, function(){this.el.parentNode.style.color = 'red'});
//new Timer('timer2', 15, function(){this.el.parentNode.style.color = 'green'});



</script>
</head>
<body>
<div>Timer One Value: <span id="timer1">00:00</span></div>
<!--<div>Timer One Value: <span id="timer2">00:00</span></div>-->
</body>
</html>

 

