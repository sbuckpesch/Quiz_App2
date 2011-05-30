<?

		function setPaging($table,$whereClause,$perPage,$currPage)
						{
						
    
	 $conn = db_connect();
	 $query=" SELECT * FROM  $table $whereClause";
	
	$rs=mysql_query($query) or die(mysql_error());
	$num_rows=mysql_num_rows($rs);
	$perPage = $perPage;
	$totalPages = ceil($num_rows/ $perPage);
	$page=$currPage;
	$start = ($page - 1)* $perPage;
	
	$query2=" SELECT * FROM  $table $whereClause limit $start ,$perPage";
	
	$rs2=mysql_query($query2) or die(mysql_error());
	
	$returValue = array();
	$returValue['start']=$start;
	$returValue['page']=$page;
	$returValue['result']=$rs2;
	$returValue['totalPages']=$totalPages;
	mysql_close($conn);
	return $returValue;
						}

		function createRandomName() 

				 {
				 
				$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
				srand((double)microtime()*1000000);
				$i = 0;
				$pass = '' ;
			   while ($i <= 4) {
					$num = rand() % 33;
					$tmp = substr($chars, $num, 1);
					$pass = $pass . $tmp;
					$i++;
				}
				
				 }
				
		function getExtension($str) {
					$i = strrpos($str,".");
					if (!$i) { return ""; }
					$l = strlen($str) - $i;
					$ext = substr($str,$i+1,$l);
					return $ext;
								}
?>