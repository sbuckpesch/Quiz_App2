<?
/* 已知方法：
 * write($filepath,$contents); //将内容写入到文件 
 */
/**
 * 操纵文件类
 *
 * 例子：
 * FileUtil::createDir('a/1/2/3');                    测试建立文件夹    建一个a/1/2/3文件夹
 * FileUtil::createFile('b/1/2/3');                    测试建立文件        在b/1/2/文件夹下面建一个3文件
 * FileUtil::createFile('b/1/2/3.exe');                测试建立文件        在b/1/2/文件夹下面建一个3.exe文件
 * FileUtil::copyDir('b','d/e');                    测试复制文件夹    建立一个d/e文件夹，把b文件夹下的内容复制进去
 * FileUtil::copyFile('b/1/2/3.exe','b/b/3.exe');    测试复制文件        建立一个b/b文件夹，并把b/1/2文件夹中的3.exe文件复制进去
 * FileUtil::moveDir('a/','b/c');                    测试移动文件夹    建立一个b/c文件夹,并把a文件夹下的内容移动进去，并删除a文件夹
 * FileUtil::moveFile('b/1/2/3.exe','b/d/3.exe');    测试移动文件        建立一个b/d文件夹，并把b/1/2中的3.exe移动进去                   
 * FileUtil::unlinkFile('b/d/3.exe');                测试删除文件        删除b/d/3.exe文件
 * FileUtil::unlinkDir('d');                        测试删除文件夹    删除d文件夹
 */

class Frd_File 
{
  //建立文件夹
  function createDir($aimUrl) 
  {
    $aimUrl = str_replace('', '/', $aimUrl);
    $aimDir = '';
    $arr = explode('/', $aimUrl);
    foreach ($arr as $str) 
    {
      $aimDir .= $str . '/';
      if (!file_exists($aimDir)) 
      {
        mkdir($aimDir);
      }
    }
  }
  // 建立文件
  function createFile($aimUrl, $overWrite = false) 
  {
    if (file_exists($aimUrl) && $overWrite == false) 
    {
      return false;
    }
    else if (file_exists($aimUrl) && $overWrite == true) 
    {
      FileUtil::unlinkFile($aimUrl);
    }
    $aimDir = dirname($aimUrl);
    FileUtil::createDir($aimDir);
    touch($aimUrl);
    return true;
  }
  //移动文件夹
  function moveDir($oldDir, $aimDir, $overWrite = false) {
    $aimDir = str_replace('', '/', $aimDir);
    $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir . '/';
    $oldDir = str_replace('', '/', $oldDir);
    $oldDir = substr($oldDir, -1) == '/' ? $oldDir : $oldDir . '/';
    if (!is_dir($oldDir)) {
      return false;
    }
    if (!file_exists($aimDir)) {
      FileUtil::createDir($aimDir);
    }
    @$dirHandle = opendir($oldDir);
    if (!$dirHandle) {
      return false;
    }
    while(false !== ($file = readdir($dirHandle))) {
      if ($file == '.' || $file == '..') {
        continue;
      }
      if (!is_dir($oldDir.$file)) {
        FileUtil::moveFile($oldDir . $file, $aimDir . $file, $overWrite);
      } else {
        FileUtil::moveDir($oldDir . $file, $aimDir . $file, $overWrite);
      }
    }
    closedir($dirHandle);
    return FileUtil::unlinkDir($oldDir);
  }
  //移动文件
  function moveFile($fileUrl, $aimUrl, $overWrite = false) {
    if (!file_exists($fileUrl)) {
      return false;
    }
    if (file_exists($aimUrl) && $overWrite = false) {
      return false;
    } elseif (file_exists($aimUrl) && $overWrite = true) {
      FileUtil::unlinkFile($aimUrl);
    }
    $aimDir = dirname($aimUrl);
    FileUtil::createDir($aimDir);
    rename($fileUrl, $aimUrl);
    return true;
  }
  //删除文件夹
  function unlinkDir($aimDir) {
    $aimDir = str_replace('', '/', $aimDir);
    $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir.'/';
    if (!is_dir($aimDir)) {
      return false;
    }
    $dirHandle = opendir($aimDir);
    while(false !== ($file = readdir($dirHandle))) {
      if ($file == '.' || $file == '..') {
        continue;
      }
      if (!is_dir($aimDir.$file)) {
        FileUtil::unlinkFile($aimDir . $file);
      } else {
        FileUtil::unlinkDir($aimDir . $file);
      }
    }
    closedir($dirHandle);
    return rmdir($aimDir);
  }
  // 删除文件
  function unlinkFile($aimUrl) {
    if (file_exists($aimUrl)) {
      unlink($aimUrl);
      return true;
    } else {
      return false;
    }
  }
  // 复制文件夹
  function copyDir($oldDir, $aimDir, $overWrite = false) {
    $aimDir = str_replace('', '/', $aimDir);
    $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir.'/';
    $oldDir = str_replace('', '/', $oldDir);
    $oldDir = substr($oldDir, -1) == '/' ? $oldDir : $oldDir.'/';
    if (!is_dir($oldDir)) {
      return false;
    }
    if (!file_exists($aimDir)) {
      FileUtil::createDir($aimDir);
    }
    $dirHandle = opendir($oldDir);
    while(false !== ($file = readdir($dirHandle))) {
      if ($file == '.' || $file == '..') {
        continue;
      }
      if (!is_dir($oldDir . $file)) {
        FileUtil::copyFile($oldDir . $file, $aimDir . $file, $overWrite);
      } else {
        FileUtil::copyDir($oldDir . $file, $aimDir . $file, $overWrite);
      }
    }
    return closedir($dirHandle);
  }
  //复制文件
  function copyFile($fileUrl, $aimUrl, $overWrite = false) {
    if (!file_exists($fileUrl)) {
      return false;
    }
    if (file_exists($aimUrl) && $overWrite == false) {
      return false;
    } elseif (file_exists($aimUrl) && $overWrite == true) {
      FileUtil::unlinkFile($aimUrl);
    }
    $aimDir = dirname($aimUrl);
    FileUtil::createDir($aimDir);
    copy($fileUrl, $aimUrl);
    return true;
  }
  function write($file,$contents)
  {
    file_put_contents($file,$contents);
  }

  function fsize($size)
  {
    $a=array("B","KB","MB","GB","TB","PB");
    $pos=0;
    while($size>=1024){
      $size /= 1024;//$size /= 1024相当于$size=$size/1024;
      $pos++;
    }
    return round($size,4)."".$a[$pos];//round 对浮点数进行四舍五入
  }
}


?>

