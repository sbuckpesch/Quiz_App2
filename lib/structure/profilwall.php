<?php
include_once('../config.php');	
$logos = "http://rfc.site90.com/businessprofile/images/businesslogo";
$images = "http://rfc.site90.com/businessprofile/profilewall/images";
$imagepath ="http://rfc.site90.com/businessprofile/images";
$sql_logos = db_execute("SELECT  bp.* FROM rating rt, businessprofile bp WHERE rt.bid = bp.bid AND (rt.rating >4 OR rt.rating =4)ORDER BY rt.rating desc LIMIT 0 , 3 ");
$wall="
<style type='text/css'>
<!--
.txt1 a{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	font-weight:bold;
	color:#FFFFFF;
	padding-right:10px;
	padding-bottom:20px;

	text-decoration:none;
}
.txt2 {font-size: 11px; padding-left:10px; }
.txt3 {font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#827177; padding-left:10px; padding-top:5px;}
.txt4 {font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#375394; padding-right:15px; padding-top:5px;}
.txt5 {font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#375394; padding-left:8px; padding-bottom:0px;}
.txt5  a{color:#375394; text-decoration:none;}
.txt5  a:hover{color:#375394; text-decoration:none; padding-left:8px;}

.pd {padding-left:15px; }

-->
</style>
</head>

<table width='380'  border='0' cellpadding='0' cellspacing='0' align='center'>
	
    <!--Header-----s---->
    <tr><td background='$images/header.jpg' width='380' height='71'></td></tr>
	<!--Header----e----->
    
    <!--body--s-->
   <tr align='left' valign='top' >
   	<td>
    	<table width='380' border='0' cellpadding='0' cellspacing='0'>
        	<tr>
               <td bgcolor='#212021' height='0px' class='txt1'>&nbsp;</td>
          </tr>
            	<td>
                	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                            <td width='10px' bgcolor='#f3f3f3'></td><td bgcolor='#FFFFFF' height='1'></td>
                            <td width='10px' bgcolor='#f3f3f3'></td>
                      </tr>
                  </table>
                 </td>
                            	<tr>
                           		  <td bgcolor='#212021' height='200' class='pd' valign='top'>
								  
										<table width='280' border='0'>
	<tr>";
	
	
	while($row = mysql_fetch_object($sql_logos ))
	{
			$bnameid = $row->bid;
			$logo = $row->logo;
			$name = $row->bname;
			$type=$row->btype;
			$description = $row->bdesc;
			$description = substr($description,0,50);
			$a_rating = db_execute("SELECT sum(rating) as average,count(userid) as totalusers FROM rating WHERE bid=$bnameid");
			$res_rating= mysql_fetch_object($a_rating);
			$totalrating = $res_rating->average;
			$totalusers=$res_rating->totalusers;
			$averagerating  =$totalrating/$totalusers;
					
			if($averagerating> 4.5 || $averagerating  > 3.5 || $averagerating  > 2.5 || $averagerating  > 1.5 || $averagerating  > 0.5 )
								$averagerating  = ceil($averagerating);
					else 
			if($averagerating  < 4.5 || $averagerating  < 3.5 || $averagerating  < 2.5 || $averagerating  < 1.5 || $averagerating  < 0.5 )
							   $averagerating =floor($averagerating);	

					 if(!$logo)
					 { 
						$wall.="<td width='94' valign='top' >
                     <img src='$logos/logo.JPG' width='90' height='90' ></img>	
					   </td>";
      				   		
					 }  else { 
									    	$wall.="<td width='98' valign='top'>
					 <img src='$logos/$logo' width='90' height='90' > </img>						
				    </td>";
    
					  }

							   
							
                                $wall.="<td valign='top' >
									<table border='0' cellpadding='0' cellspacing='0'>
								
								<tr>
								 <td style='color:#ff7400'><strong>$name</strong></td>
   	                            </tr>
								<tr>
								 <td style='color:#ffffff'>$description</td>
   	                            </tr>
								<tr>
								  <td style='color:#ff7400'><br /> <br />";
								 
			
			if(@$averagerating==1){ 
			
	 $wall.="<img  src='$imagepath/bSelected1.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />";	
		}elseif(@$averagerating ==2){ 
		
	 $wall.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />";	
		 }elseif(@$averagerating ==3){ 
		
	 $wall.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />	";
		}elseif(@$averagerating ==4){ 
	
	 $wall.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif' />	";
		}elseif(@$averagerating ==5){ 
	
	 $wall.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>	";
		}else{ 
			
	 $wall.="<img  src='$imagepath/blank.gif'  />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif' />";
	 } 
								  
								  $wall.=" </td>
							  </table>
							  </td>
				           
						      
							    		
      </tr>
	
							 <tr>";
							
								}
							 
							
								                                            
					 $wall.=" </table>

								  
								  </td>
                            	</tr>
        
                       
               <td>
                	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                            <td width='10px' bgcolor='#f3f3f3'></td><td bgcolor='#FFFFFF' height='1'></td>
                            <td width='10px' bgcolor='#f3f3f3'></td>
                      </tr>
                  </table>
                 </td>  
            <tr>
               <td bgcolor='#212021' height='20' class='txt1'><div align='right'><a href='http://apps.facebook.com/businessprofiles/'>Back to Application</a></a></td>
          </tr> 
      </table>
    
    </td>
  </tr>
   <!--body--e-->
</table>";

//Small Wall...................

$sql_logos = db_execute("SELECT  bp.* FROM rating rt, businessprofile bp WHERE rt.bid = bp.bid AND (rt.rating >4 OR rt.rating =4)ORDER BY rt.rating desc LIMIT 0 , 3 ");

$wall2="<style type='text/css'>
<!--
.txt1 {font-family:Arial, Helvetica, sans-serif; font-size:8px; color:#375394; padding-left:4px; padding-top:0px; padding-bottom:0px;}
.txt12 {font-family:Arial, Helvetica, sans-serif; font-size:8px; font-weight:bold; color:#375394; padding-left:10px; padding-top:0px; padding-bottom:px;}
.txt2 {font-size: 11px; padding-left:10px; }
.txt3 {font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#827177; padding-left:10px; padding-top:5px;}
.txt4 {font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#375394; padding-right:15px; padding-top:5px;}
.txt5 {font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; color:#375394; padding-left:8px; padding-bottom:0px;}
.txt5  a{color:#375394; text-decoration:none;}
.txt5  a:hover{color:#375394; text-decoration:none; padding-left:8px;}

.pd {padding-left:7px; }
.style1 {font-size:8px; color:#375394; padding-left:10px; padding-top:5px; font-family: Arial, Helvetica, sans-serif;}
.vote {	color: #0700B1;	font-size: 12px; font-family: sans-serif; font-weight:bold;}
.voter {	color: #b80008;	font-size: 12px; font-family: sans-serif; font-weight:bold;}
-->
</style>
<table width='184' border='0' cellpadding='0' cellspacing='0' align='center'>
	
    <!--Header-----s---->
    <tr><td background='$images/header2.jpg' width='184' height='34'></td></tr>
	<!--Header----e----->
    
    <!--body--s-->
   <tr align='left' valign='top' >
   	<td>
    	<table width='184' border='0' cellpadding='0' cellspacing='0'>
        	<tr>
               <td bgcolor='#212021' height='0px' class='txt1'>&nbsp;</td>
          </tr>
            	<td>
                	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                            <td width='10px' bgcolor='#f3f3f3'></td><td bgcolor='#FFFFFF' height='1'></td>
                            <td width='10px' bgcolor='#f3f3f3'></td>
                      </tr>
                  </table>
                 </td>
                            	<tr>
                            		<td bgcolor='#212021' height='20' class='pd' valign='top'>
                                		<!-- //-->
										<table width='184' border='0'>
	<tr>";
	
	
	while($row = mysql_fetch_object($sql_logos ))
	{
			$bnameid = $row->bid;
			$logo = $row->logo;
			$name = $row->bname;
			$type=$row->btype;
			$description = $row->bdesc;
			$description = substr($description,0,50);
			$a_rating = db_execute("SELECT sum(rating) as average,count(userid) as totalusers FROM rating WHERE bid=$bnameid");
			$res_rating= mysql_fetch_object($a_rating);
			$totalrating = $res_rating->average;
			$totalusers=$res_rating->totalusers;
			$averagerating  =$totalrating/$totalusers;
					
			if($averagerating> 4.5 || $averagerating  > 3.5 || $averagerating  > 2.5 || $averagerating  > 1.5 || $averagerating  > 0.5 )
								$averagerating  = ceil($averagerating);
					else 
			if($averagerating  < 4.5 || $averagerating  < 3.5 || $averagerating  < 2.5 || $averagerating  < 1.5 || $averagerating  < 0.5 )
							   $averagerating =floor($averagerating);	

					 if(!$logo)
					 { 
						$wall2.="<td valign='top' width='45' >
                     <img src='$logos/logo.JPG' width='43' height='43' ></img>	
					   </td>";
      				   		
					 }  else { 
									    	$wall2.="<td valign='top'>
					 <img src='$logos/$logo' width='43' height='43' > </img>						
				    </td>";
    
					  }

							   
							
                              $wall2.="<td valign='top'><div align='left'>
									<table border='0' cellpadding='0' cellspacing='0' width='130'>
								
								<tr>
								 <td style='color:#ff7400'><strong>$name</strong></td>
   	                            </tr>
								<tr>
								 <td style='color:#ffffff'>$description</td>
   	                            </tr>
								<tr>
								  <td style='color:#ff7400'>";
								 
			
			if(@$averagerating==1){ 
			
	$wall2.="<img  src='$imagepath/bSelected1.gif'  />
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>";
		}elseif(@$averagerating ==2){ 
		
	$wall2.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>";	
		 }elseif(@$averagerating ==3){ 
		
	$wall2.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif'/>";	
		}elseif(@$averagerating ==4){ 
	
	$wall2.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/blank.gif'/>";	
		}elseif(@$averagerating ==5){ 
	
	 $wall2.="<img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>
    <img  src='$imagepath/bSelected1.gif'/>	";
		}else{ 
			
	$wall2.=" <img  src='$imagepath/blank.gif' />
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>
    <img  src='$imagepath/blank.gif'/>";
	 } 
								  
								   $wall2.="</td>
							  </table>
							  </div>
							  </td>
				           
						      
							    		
      </tr>
	
							 <tr>";
							
								}
							 
							
								                                            
					 $wall2.=" </table>
										<!-- //-->
                                	</td>
                            	</tr>
        
                       
               <td>
                	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                            <td width='10px' bgcolor='#f3f3f3'></td><td bgcolor='#FFFFFF' height='1'></td>
                            <td width='10px' bgcolor='#f3f3f3'></td>
                      </tr>
                  </table>
                 </td>  
            <tr>
               <td bgcolor='#212021' height='0px' class='txt1'><div align='right'><a href='http://apps.facebook.com/businessprofiles/'>Back to Application</a></a></td>
          </tr> 
      </table>
    
    </td>
  </tr>
  
</table>";
echo $wall;
echo "<br>";
echo $wall2;
//$facebook->api_client->profile_setFBML(NULL, $user, $wall, NULL, NULL, $wall2);
?>