<?php

include 'conn.php';
$vaild = true;
$message = '';

<<<<<<< HEAD
if ( isset( $_POST[ 'send' ] ) && $_POST[ 'send' ] == true ) {
       
    
  if (isset($_POST['className']) && $_POST['className']!="") {
    $className = stripcslashes($_POST['className']);
  }else{
    $vaild = false;
    $message = '用户名不能为空';
  }

    
  if (isset($_POST['classUserID']) && $_POST['classUserID']!="" && is_numeric($_POST['classUserID'])) {
    $classUserID = stripcslashes($_POST['classUserID']);
  }else{
    $vaild = false;
    $message = '请设置会员组管理员';
  }

    
  if (isset($_POST['classUserID']) && $_POST['classUserID']!="" && is_numeric($_POST['classUserID'])) {
    $classUserID = stripcslashes($_POST['classUserID']);
  }else{
    $vaild = false;
    $message = '请设置会员组管理员';
  }

  if (isset($_POST['classAddTime']) && $_POST['classAddTime']!="") {
    $classAddTime = $_POST['classAddTime'];
  }else{
    $classAddTime = DATETIME;
  } 
 
  if (isset($_POST['classNature']) && $_POST['classNature']!="") {
    $classNature = $_POST['classNature'];
  }else{
    $vaild = false;
    $message = '性质必须选一个';
  } 
  
  if (isset($_POST['classInfo']) && $_POST['classInfo']!="") {
    $classInfo = stripcslashes($_POST['classInfo']);
  }else{
    $vaild = false;
    $message = '信息说明不能为空';
  } 
 
    
  if (isset($_POST['isClassOpen']) && $_POST['isClassOpen']!="") {
    $isClassOpen = $_POST['isClassOpen'];
    if($isClassOpen==true){
      $isClassOpen = 1;
    }else{
      $isClassOpen = 0;
    }
  }else{
    $isClassOpen = false;
  } 
     

  if ($vaild) {

      if(isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id']!=""){
         $id = $_POST['id'];
         $sql="UPDATE faction SET className='$className',classInfo='$classInfo',classUserID=$classUserID,classAddTime='$classAddTime',isClassOpen='$isClassOpen',classNature='$classNature' WHERE id=".$id;
         $success  = "用户组修改成功";
      }else{
       $sql="INSERT INTO faction (className,classInfo,classUserID,classAddTime,isClassOpen,classNature) VALUES ('$className','$classInfo',$classUserID,'$classAddTime','$isClassOpen','$classNature')";
       $success  = "用户组添加成功";
    }

   if (mysqli_query($conn,$sql)) {
     $message  = $success;
   }else{
     $vaild = false;
     $message = "用户组添加失败".$sql;
   }

  }else{
    $vaild = false;
    $message = $message;
  }

=======

var_dump($_POST);

exit();

if ( isset( $_POST[ 'send' ] ) && $_POST[ 'send' ] == true ) {
    


//   // '新闻分类表ID ，可复选',
//   if ( isset( $_POST[ 'classid' ] ) && $_POST[ 'classid' ] != "" ) {
//     $classid = $_POST[ 'classid' ]; //拿到分类数组
//     if ( is_array( $classid ) ) {
//       $classid = implode( ',', $classid );
//     }
//   } else {
//     $vaild = false;
//     $message = '新闻分类不能为空';
//   }
 
//   //   abstract varchar(5000) DEFAULT NULL COMMENT '简述文章概要 500字以内，可以为空',
//   if ( isset( $_POST[ 'abstract' ] ) && $_POST[ 'abstract' ] != "" ) {
//     $abstract = stripcslashes( $_POST[ 'abstract' ] );
//     if ( mb_strlen( $abstract, 'UTF8' ) >= 255 ) {
//       $vaild = false;
//       $message = '新闻简介长度超过合法值请小于500';
//     }

//   } else {
//     $abstract = '';
//   }


//   if ( isset( $_POST[ 'content' ] ) && $_POST[ 'content' ] != "" ) {
//     $content = stripcslashes( $_POST[ 'content' ] );
//   } else {
//     $vaild = false;
//     $message = '文章内容不能为空';
//   }

//   //是否允许用户评论   -0表示不允许，  1表示允许',
//   $discuss = $_POST[ 'discuss' ];

//   // '新闻状态 0表示回收站存稿，1表示正常发布',
//   $state = $_POST[ 'state' ];

//   //  '0 输入密码可以查看，1表示私有仅发布者本身允许查看，2表示注册用户查看，3表示完全公开'
//   $openness = $_POST[ 'openness' ];
//   if ( $openness == 0 ) {
//     if ( isset( $_POST[ 'opennessPassword' ] ) && $_POST[ 'opennessPassword' ] != "" ) {
//       $opennessPassword = sha1( $_POST[ 'opennessPassword' ] );
//     } else {
//       $vaild = false;
//       $message = '公开度选择密码时必须输入对应的密码';
//     }
//   } else {
//     $opennessPassword = "";
//   }

//   if ( isset( $_POST[ 'hits' ] ) && is_numeric( $_POST[ 'hits' ] ) && $_POST[ 'hits' ] != "" ) {
//     if ( preg_match( '/^[0-9]+$/', $_POST[ 'hits' ] ) ) {
//       $hits = $_POST[ 'hits' ];
//     } else {
//       $vaild = false;
//       $message = '阅读次数，必须是数字,默认为0';
//     }

//   } else {
//     $hits = 0;
//   }

//   if ( $vaild ) {


//     // var_dump($_POST);

//     $sql = "INSERT INTO news (classid, userid, title, abstract, content, ReleaseTime, author, source, imgurl, mainpicture, discuss, label, state, openness, opennessPassword,hits) VALUES ('$classid', $userid, '$title', '$abstract', '$content', '$ReleaseTime', '$author', '$source', '$imgurl', '$mainpicture', $discuss, '$label', $state, $openness, '$opennessPassword',$hits)";

//     if ( mysqli_query( $conn, $sql ) ) {
//       $message = "新闻发布成功";
//     } else {
//       $vaild = false;
//       $message = "新闻发布失败" . $sql;
//     }
//   }
>>>>>>> 3b64edbccf0208088d2be031f7b6aaa1342e8766



} else {
  $vaild = false;
  $message = '请检查接口参数是否缺少send参数';
}


echo json_encode(
  array( 'vaild' => $vaild, 'message' => $message ), JSON_UNESCAPED_UNICODE
);

$conn->close();