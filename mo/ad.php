<h3>新增動態廣告文字</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動態廣告文字</td>
        <td><input type="text" name="text" id=""></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </td>
    </tr>
</table>
</form>