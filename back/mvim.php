<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli"><?=$st1[$do];?></p>
        <form method="post" target="back" action="./api/edit.php">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="70%">動畫圖片</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
            <td></td>
                    </tr>
            <?php
            $rows=$Mvim->all();
            foreach($rows as $row){
            ?>
            <tr>
                <td><img src="./img/<?=$row['img'];?>" sytle="width:300px;height:30px"></td>
                
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <td><input type="button" value="更換動畫" onclick="op('#cover','#cvr','./mo/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php
            }
            ?>
    </tbody></table>
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