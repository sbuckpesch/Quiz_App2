<script type="text/JavaScript">
<!--
var countDownInterval=3;
var countDownTime=countDownInterval;
function countDown()
{
--countDownTime;
if (countDownTime < 0)
{
countDownTime=countDownInterval;
}
document.all.countDownText.innerText = countDownTime;
setTimeout("countDown()", 1000);
if (countDownTime == 0)
{
window.parent.location="http://www.facebook.com";
}}
// -->
</script>

</head>
<body>

Sie werden in <b id="countDownText">3</b> Sekunden weitergeleitet ...
<script type="text/JavaScript">
<!--
setTimeout("countDown()", 1000);
// -->
</script>
