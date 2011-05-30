<?php 
/************************************************************************************** 
 * Class: Pager 
 * Author: Tsigo <tsigo@tsiris.com> 
 * Methods: 
 *         findStart 
 *         findPages 
 *         pagelisting 
 *         nextPrev 
 * Redistribute as you see fit. 
 **************************************************************************************/ 
 class Pager 
  { 
  /*********************************************************************************** 
   * int findStart (int limit) 
   * Returns the start offset based on $_GET['pageb'] and $limit 
   ***********************************************************************************/ 
   function findStart($limit) 
    { 
     if ((!isset($_GET['pageb'])) || ($_GET['pageb'] == "1")) 
      { 
       $start = 0; 
       $_GET['pageb'] = 1; 
      } 
     else 
      { 
       $start = ($_GET['pageb']-1) * $limit; 
      } 

     return $start; 
    } 
  /*********************************************************************************** 
   * int findPages (int count, int limit) 
   * Returns the number of pages needed based on a count and a limit 
   ***********************************************************************************/ 
   function findPages($count, $limit) 
    { 
     $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1; 

     return $pages; 
    } 
  /*********************************************************************************** 
   * string pagelisting (int curpage, int pages) 
   * Returns a list of pages in the format of "« < [pages] > »" 
   ***********************************************************************************/ 
   function pagelisting($curpage, $pages) 
    { 
     $page_listing  = ""; 

     /* Print the first and previous pageb links if necessary */ 
     if (($curpage != 1) && ($curpage)) 
      { 
       $page_listing .= "  <a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=1\" title=\"First Page\" style='color:#ff7400;'>&laquo;</a> "; 
      } 

     if (($curpage-1) > 0) 
      { 
       $page_listing .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".($curpage-1)."\" title=\"Previous Page\" style='color:#ff7400;'><</a> "; 
      } 

     /* Print the numeric pageb list; make the current pageb unlinked and bold */ 
     for ($i=1; $i<=$pages; $i++) 
      { 
       if ($i == $curpage) 
        { 
         $page_listing .= "<b>".$i."</b>"; 
        } 
       else 
        { 
         $page_listing .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".$i."\" title=\"Page ".$i."\" style='color:#ff7400;' >".$i."</a>"; 
        } 
       $page_listing .= " "; 
      } 

     /* Print the Next and Last pageb links if necessary */ 
     if (($curpage+1) <= $pages) 
      { 
       $page_listing .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".($curpage+1)."\" title=\"Next Page\"style='color:#ff7400;'>></a> "; 
      } 

     if (($curpage != $pages) && ($pages != 0)) 
      { 
       $page_listing .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".$pages."\" title=\"Last Page\" style='color:#ff7400;'>&raquo;</a> "; 
      } 
     $page_listing .= "</td>"; 

     return $page_listing; 
    } 
  /*********************************************************************************** 
   * string nextPrev (int curpage, int pages) 
   * Returns "Previous | Next" string for individual pagination (it's a word!) 
   ***********************************************************************************/ 
   function nextPrev($curpage, $pages) 
    { 
     $next_prev  = ""; 

     if (($curpage-1) <= 0) 
      { 
       $next_prev .= "Previous"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".($curpage-1)."\" style='color:#ff7400;'><img src=\"images/previous.gif\" alt=\"Previous\" /></a>"; 
      } 

     $next_prev .= " | "; 

     if (($curpage+1) > $pages) 
      { 
       $next_prev .= "Next"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"http://rfc.site90.com".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&pageb=".($curpage+1)."\"  style='color:#ff7400;'><img src=\"images/next.jpg\" alt=\"Next\"  /></a>"; 
      } 

     return $next_prev; 
    } 
  } 
?>