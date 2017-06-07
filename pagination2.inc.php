<?php
  // establish the following parameters before including this file
  // $ttl_perpage = total number of records to show per page
  // $ttl_found = $total number of records found
  //  $asc_desc = optional ASC / DESC sort order for SQL
  // $start is for SQL see below
  // LIMIT Portion of SQL -> $limit = "LIMIT $start, $ttl_perpage";
  // NOTE sample SQL:
  // SELECT * FROM <myTable> WHERE <conditions> ORDER BY lastvisit $asc_desc $limit 
  
?>
	
  
  <?php if($ttl_perpage < $ttl_found) { 
		
			$prev_class = '';
			$next_class = '';
			$start_prev = $start - $ttl_perpage;
			if($start_prev < 0){
				$prev_class = " class=\"disabled\" ";
				$start_prev = 0;
			}
			$start_next = $start + $ttl_perpage;
			if($start_next >= $ttl_found){
				$start_next = $ttl_found - $ttl_perpage;
				$next_class = " class=\"disabled\" ";
			}
		?>

				<nav aria-label="Page navigation">
  					<ul class="pagination">
    					<li <?php echo $prev_class ?>>
      						<a href="?mem=<?php echo $mem ?>&start=<?php echo $start_prev ?>&ttl_perpage=<?php echo $ttl_perpage ?>&asc_desc=<?php echo $asc_desc ?>&search=<?php echo $search ?>&city=<?php echo $city ?>" aria-label="Previous">
        					<span aria-hidden="true">&laquo;</span>
      						</a>
    					</li>
    		
    			<?php 
    				for($i = 1; $i * $ttl_perpage <= ($ttl_found+$ttl_perpage) && $i < 30; $i++){ 
    					$starti = ($i -1) * $ttl_perpage;
    					if($start == $starti) $dis = " class=\"active\" ";
    					else $dis = '';
    					echo "\n\t<li $dis><a href=\"?mem=$mem&start=$starti&asc_desc=$asc_desc&ttl_perpage=$ttl_perpage&search=$search&city=$city\">$i</a></li>";
    				}
    			?>
    					<li <?php echo $next_class ?>>
      						<a href="?mem=<?php echo $mem ?>&start=<?php echo $start_next ?>&ttl_perpage=<?php echo $ttl_perpage ?>&asc_desc=<?php echo $asc_desc ?>&search=<?php echo $search ?>&city=<?php echo $city ?>" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      						</a>
    					</li>
  					</ul>
				</nav>		 
				
		 <?php } ?>
