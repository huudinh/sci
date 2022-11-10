<?php
   if(isset($_FILES['image'])){
      $errors= array();
    //   $file_name = vn_str_filter( $_FILES['image']['name']);

    // Get Date realtime
    $date = date_create();
    $date = date_format($date,"YmdHis");

    /* Đổi tên file name */
    $nameurl = vn_str_filter(str_replace(' ','-',trim($_POST['iname'])));
    $nameurl = strtolower($nameurl);

    /* Đổi tên file upload theo tên KH */
    $file_name = vn_str_filter(str_replace(' ','-',trim($_FILES['image']['name'])));
    $file_name = strtolower($file_name);

	$file_name = $date.'-'.$nameurl.'-'.$file_name;

    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $expensions= array("jpeg","jpg","png","pdf");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
    
    if($file_size > 2097152) {
       $errors[]='Kích thước file không được lớn hơn 2MB';
    }

    /* Vị trí upload */
	$location = "uploads/".$file_name;
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"uploads/".$file_name);
    //    echo "Success";
       echo 'https://scigroup.com.vn/app/upload/'.$location;
    }else{
       print_r($errors);
    }
}
//bỏ dấu
function vn_str_filter ($str){
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
   foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
   }
    return $str;
}
?>
<html>
   <body>
       
      <form action = "" method = "POST" enctype = "multipart/form-data">
        <input type="input" name="iname" />
         <input type = "file" name = "image" />
         <input type = "submit"/>
             
         <!-- <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul> -->
             
      </form>
       
   </body>
</html>