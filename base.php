<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$Total=new DB('total');
$Title=new DB('title');
$Bottom=new DB('bottom');
$Admin=new DB('admin');
$Menu=new DB('menu');
$News=new DB('news');
$Image=new DB('image');
$Mvim=new DB('mvim');
$Ad=new DB('ad');

$st1=[
    'total'=>"進站總人數管理",
    'title'=>"網站標題管理",
    'bottom'=>"頁尾版權文字管理",
    'admin'=>"管理者帳號管理",
    'menu'=>"選單管理",
    'news'=>"最新消息管理",
    'image'=>"校園映像資料管理",
    'mvim'=>"動畫圖片管理",
    'ad'=>"動態文字廣告管理",
];
$st2=[
    'total'=>"新增進站總人數",
    'title'=>"新增網站標題",
    'bottom'=>"新增頁尾版權文字",
    'admin'=>"新增管理者帳號",
    'menu'=>"新增選單",
    'news'=>"新增最新消息",
    'image'=>"新增校園映像資料",
    'mvim'=>"新增動畫圖片",
    'ad'=>"新增動態文字",
];
$upl=[
    'title'=>['更新網站標題圖片','網站標題圖片'],
    'image'=>['更新校園映像圖片','校園映像圖片'],
    'mvim'=>['更換動畫圖片','動畫圖片'],
];

if(empty($_SESSION['total'])){
    $total=$Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['total']=$total['total'];
}

class DB{

    protected $table;
    protected $dsn="mysql:host=localhost;dbname=db01;charset=utf8";
    protected $pdo;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');

    }

    function all(...$arg){
        $sql="select * from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll();

    }
    function count(...$arg){
        $sql="select count(*) from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id){
        $sql="select * from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }
        

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql="delete from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }
        

        return $this->pdo->exec($sql);
    }
    function save($arr){
        if(isset($arr['id'])){
            //update
            foreach($arr as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql="update $this->table set ".implode(',',$tmp)." where `id`='{$arr['id']}'";
        }else{
            //insert

            $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }

    
}

function to($url){
    header("location:".$url);
}
?>