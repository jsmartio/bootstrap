// $ttl_prpage = how many record to show per page
// $ttl_found is the total number of records retuned per search
    
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
      						<a href="?start=<?php echo $start_prev ?>&ttl_perpage=<?php echo $ttl_perpage ?>&asc_desc=<?php echo $asc_desc ?>&search=<?php echo $search ?>" aria-label="Previous">
        					<span aria-hidden="true">&laquo;</span>
      						</a>
    					</li>
    		
    			<?php 
    				for($i = 1; $i * $ttl_perpage <= $ttl_found && $i < 30; $i++){ 
    					$starti = ($i -1) * $ttl_perpage;
    					if($start == $starti) $dis = " class=\"active\" ";
    					else $dis = '';
    					echo "\n\t<li $dis><a href=\"?start=$starti&asc_desc=$asc_desc&ttl_perpage=$ttl_perpage&search=$search\">$i</a></li>";
    				}
    			?>
    					<li <?php echo $next_class ?>>
      						<a href="?start=<?php echo $start_next ?>&ttl_perpage=<?php echo $ttl_perpage ?>&asc_desc=<?php echo $asc_desc ?>&search=<?php echo $search ?>" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      						</a>
    					</li>
  					</ul>
				</nav>		 
				
		 <?php } ?>
