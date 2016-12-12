<?php
// 引用图片上传工具
require_once 'ImgUpload.class.php';


/*******************************
* 单个文件上传, 可带缩略图
*/
// 初始化上传工具，参数(input表单name属性 , 文件上传路径)

// var_dump( $_POST );
// var_dump( $_FILES);

$imgUpload = new ImgUpload('myfile', 'file/');

//进行单文件上传操作，上传成功返回true
if ($imgUpload->acceptSingleFile()) {
    
    //获取上传后的文件路径，并用img标签显示
    echo "<img src='{$imgUpload->getUploadFiles()[0]}'/>";

    // 生成缩小图：$imgUpload->getUploadFiles()：０＝＞＇/assets/upload/583bd86fbb3f3.jpg＇
    $imgUpload->imgUpdateSize($imgUpload->getUploadFiles()[0]);
    
} else {
    //打印错误信息
    echo $imgUpload->getErrorMsg();
}



/*******************************
* 多个文件上传，可带缩略图。 注：表单name 加一个[]
* 上传多个 <input type="file"  name="file[]" multiple="multiple" />


//初始化上传工具，参数(input表单name属性 , 文件上传路径)
$imgUpload = new ImgUpload('myfile', 'file/');

//设置允许上传的文件后缀类型
$imgUpload->setAllowExt(array('png', 'jpg','gif'));



//设置上传文件的最大尺寸大小：2M
$imgUpload->setMaxSize(1024 * 2);

//进行多文件上传操作，全部上传成功返回true
$imgUpload->acceptMultiFile();

// 生成缩小图: 多文件上件需要循环
$len =  count($imgUpload->getUploadFiles());
for($i = 0; $i<$len; $i++){
    $imgUpload->imgUpdateSize($imgUpload->getUploadFiles()[$i]);
}

//打印所有上传成功的图片路径
print_r($imgUpload->getUploadFiles());

//打印所有上传失败的错误信息
print_r($imgUpload->getErrorMsg());
*/