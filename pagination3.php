	<div class="row">
		
	
		<?php if($ttl_perpage < $ttl_found) { 
			
			if(isset($formCount)) $formCount++;
			else $formCount = 1;
		
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


		if($ttl_found > $ttl_perpage){ 
		?>

	

		<script>
		function sub<?php echo $formCount ?>(){
			var f = document.getElementById("goform<?php echo $formCount ?>");
			f.submit();
		}
		
		</script>

		<form method="GET" action="" class="form-control form-inline" id="goform<?php echo $formCount ?>" style="border:0px !important;background-color:transparent">
		<table>
			<tr>
				<td style="padding:5px !important">
			<input type="hidden" name="ttl_perpage" value="<?php echo $ttl_perpage ?>">
			<input type="hidden" name="city" value="<?php echo $city ?>">
			<input type="hidden" name="asc_desc" value="<?php echo $asc_desc ?>">
			<input type="hidden" name="mem" value="<?php echo $mem ?>">
			<input type="hidden" name="mem2" value="<?php echo $mem2 ?>">
			<input type="hidden" name="search" value="<?php echo $search ?>">

					Jump to Page		#
				
				</td><td style="padding:5px !important">
				
			<select name="start" class="form-control form-inline" onchange="sub<?php echo $formCount ?>()" style="height: 20px; line-height: 20px !important; padding:2px !important; width:55px !important">
    		
    			<?php 
    				for($i = 1; $i * $ttl_perpage <= ($ttl_found+$ttl_perpage) && $i < 300; $i++){ 
    					$starti = ($i -1) * $ttl_perpage;
    					$starti = ($i) * $ttl_perpage;
    					if($start == $starti) $sel = " SELECTED=\"SELECTED\" ";
    					else $sel = '';
    					$jval = $i * $ttl_perpage;
    					echo "\n\t<option $sel value=\"$jval\">$i</option>";
    				}
    				
    				
    			}
    			?>

			</select>
			
			</td><td>
			
			<button type="submit" class="btn btn-default  form-inline">GO</button><!--init response //-->
	
			</td>
			</tr>
		</table>

		</form>
	
	<?php }  // end if($ttl_found > $ttl_perpage) ?>
	
	</div>
	<br>
