<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
</marquee>
<?php
$ads=$Ad->all(['sh'=>1]);
$str="";

foreach($ads as $ad){
    echo $ad['text']  ."&nbsp;&nbsp;&nbsp;";
}
?>