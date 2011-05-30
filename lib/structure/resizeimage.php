<?php
include_once("ImageResizeFactory.php");

if($_POST["hdnupload"])
{
print_r($_FILES);

	$maxSize = "1048576"; // 1MB upload size of the file.
	$width = $_POST["width"];
	$height = $_POST["height"];
	$allowedExtensions = array("jpg", "JPG", "JPEG", "png", "PNG");
	
	
	$uploadedFileName = $_FILES['filename']['name'];
	if($_FILES['filename']['size'] > $maxSize)
	{
		$error = "File size cannot exceed 1MB";
	}
	if(file_exists("../structure/uploads/" . $uploadedFileName)) {
		$error = "File with " . $uploadedFileName . " name is already present<br>";
	}
	$extension = pathinfo($_FILES['filename']['name']);
	$extension = $extension["extension"];
	foreach($allowedExtensions as $key=>$ext) {
		if(strcasecmp($ext, $extension) == 0)
		{
			$boolValidExt = true;
			break;
		}
	}
	if($boolValidExt) {
		if(empty($error)) {
			if(is_uploaded_file($_FILES['filename']['tmp_name'])) {
				copy($_FILES['filename']['tmp_name'], "../structure/uploads/" . $uploadedFileName);
			}
		}
	}
	else
	{
		$error = "Files with .$extension extensions are not allowed";
	}
	if(empty($error))
	{
		$srcFile = "../structure/uploads/" . $uploadedFileName;
		$destFile = "../structure/uploads/resize_" . $uploadedFileName;

		// Instantiate the correct object depending on type of image i.e jpg or png
		$objResize = ImageResizeFactory::getInstanceOf($srcFile, $destFile, $width, $height);
		// Call the method to resize the image
		$objResize->getResizedImage();
		unlink($srcFile);
		unset($objResize);
		header("Location:" . $destFile);
		exit;
	}
}
?>
<script language="javascript">
	function validate()	{
		if(isNaN(document.frmupload.width.value)) {
			alert("Width should be numeric");
			document.frmupload.width.focus();
			return false;
		}
		if(isNaN(document.frmupload.height.value)) {
			alert("Height should be numeric");
			document.frmupload.height.focus();
			return false;
		}
		if(document.frmupload.width.value <= 0)
		{
			alert("Width should be greater than 0");
			document.frmupload.width.focus();
			return false;
		}
		if(document.frmupload.height.value <= 0)
		{
			alert("Height should be greater than 0");
			document.frmupload.height.focus();
			return false;
		}
		return true;
	}
	
	function formSubmit() {
		if(validate()) {
			document.frmupload.hdnupload.value=true;
			document.frmupload.submit();
			return true;
		}
		else {
			return false;
		}
	}
</script>
<HTML>
<HEAD>
<TITLE></TITLE>
</HEAD>
<BODY>
<FORM name="frmupload" method="POST" enctype="multipart/form-data">
<TABLE align="center">
	<TR>
		<TD>
			<TABLE border="0">
				<TH colspan="4" align"left">
					Resize Image
				</TH>
				<TR>
					<TD>
						File:-
					</TD>
					<TD colspan="4">
						<INPUT type="file" name="filename">
					</TD>
				</TR>
				<TR>
					<TD>
						Resize Width:-
					</TD>
					<TD align="center">
						<INPUT type="text" name="width" maxlength="3" size="5">
					</TD>
					<TD>
						Resize Height:-
					</TD>
					<TD align="center">
						<INPUT type="text" name="height" maxlength="3" size="5">
					</TD>
				</TR>
				<TR>
					<TD align="center" colspan="4">
						<INPUT type="button" name="bupload" value="Resize" onClick="return formSubmit();">&nbsp&nbsp;
						<INPUT type="reset" value="Clear">
					</TD>
				</TR>
				<TR>
					<TD colspan="4" align="center">
						<font color="red"><b><?php echo $error;?></b></font>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
<INPUT type="hidden" name="hdnupload" value="false">
</FORM>
</BODY>
</HTML>
