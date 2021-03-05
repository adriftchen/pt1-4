<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli"><?=$st1[$do];?></p>
        <form method="post" target="back" action="./api/edit.php">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="70%">最新消息資料管理內容</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
                    </tr>
            <?php
            $all=$News->count();
            $div=5;
            $pages=ceil($all/$div);
            $now=(isset($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$div;

            $rows=$News->all(" limit $start,$div");
            foreach($rows as $row){
            ?>
            <tr>
                <td><textarea name="text[]" sytle="width:95%;heidth:60px"><?=$row['text'];?></textarea></td>
                
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php
            }
            ?>
    </tbody></table>
    <div class="cent">
    <?php
    if(($now-1)>0){
        ?>
        <a href="?do=image&p=<?=$now-1;?>" class="bl" style="font-size:30px">&lt;&nbsp;</a>
        <?php
    }
    ?>
    <?php
    for($i=1;$i<=$pages;$i++){
        if($i==$now){
            $ft="40px";
        }else{
            $ft="30px";
        }
        echo "<a href='?do=image&p=$i' style='font-size:$ft' style='text-decoration:none'> ";
        echo $i;
        echo " </a>";
    }
        ?>
   <?php
    if(($now+1)<=$pages){
        ?>
        <a href="?do=image&p=<?=$now+1;?>" class="bl" style="font-size:30px">&nbsp;&gt;</a>
        <?php
    }
    ?>
    </div>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <input type="hidden" name="table" value="<?=$do;?>">
      <td width="200px">
      <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./mo/<?=$do;?>.php?table=<?=$do;?>&#39;)" value="<?=$st2[$do];?>"></td>
      <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>