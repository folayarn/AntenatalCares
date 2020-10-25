<?php 
$file_tmp_name=$_FILES['file']['tmp_name'];
$file_name=$_FILES['file']['name'];
$target_dir="images/";
$target_file=$target_dir.basename($file_name);
$upload=1;
$imageType=pathinfo($target_file,PATHINFO_EXTENSION);
$check=getimagesize($file_tmp_name);
if(file_exists($target_file)){

}else{
  if($_FILES["file"]["size"] <= 200000){
 
if ($check !== false){
  if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"
   && $imageType != "gif"){
     echo "sorry file must be an image";
   }else{
  if($upload==0){
  echo "your image was not uploaded, try again";
  }else{

    move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
  $upload=1;


   }

  }
  
}
else{
echo "file is not an image";
$upload=0;
}
}else{
  echo "image is too large";
}
}


