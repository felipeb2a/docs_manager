<?php 
	//definir total de paginas
	$totalPages = totalPages($countRegisters, $limit);
	//definir ultima pagina
	$end = totalPages($countRegisters, $page, $limit);

	$navigationPageFirst = '';
	$navigationPagePrevious = '';
	$navigationPageNext = '';
	$navigationPageLast = '';

	if(isset($_GET['search'])){
		$navigationPageFirst = '?page=1&search='.$valueSearch;
		$navigationPagePrevious = '?page='.($page-1).'&search='.$valueSearch;
		$navigationPageNext = '?page='.($page+1).'&search='.$valueSearch;
		$navigationPageLast = '?page='.$totalPages.'&search='.$valueSearch;
	}else{
		$navigationPageFirst = '?page=1';
		$navigationPagePrevious = '?page='.($page-1);
		$navigationPageNext = '?page='.($page+1);
		$navigationPageLast = '?page='.$totalPages;

	}

?>

<div id="pagination">
	<nav aria-label="Page navigation">
		<ul class="pagination">

			<li class="page-item">
    			<a class="page-link" href="<?=$navigationPageFirst?>">First</a>
    		</li>
    								
    		<!-- check first page -->
    		<?php if($page>1): ?>
				<li class="page-item">
					<a class="page-link" href="<?=$navigationPagePrevious?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
			<?php endif;?>

			<!-- set number pages -->
			<li class="page-item"><a class="page-link" href="#"><?=$page?></a></li>
			
			<?php 
    			/*
    			if($totalPages > 1 && $page <= $totalPages){    				
	    			for($i = $start; $i <= $end; $i++){
						if($page == $i){
							//echo " ".$i." ";
							//echo '<li class="page-item"><a class="page-link" href="'.$page.'">'.$i.'</a></li>';
						}else{
							//echo '<a href="paginacao.php?pag='.$i.'"> '.$i.'</a>';
							echo '<li class="page-item"><a class="page-link" href="'.$page.'">'.$i.'</a></li>';
						}
					}
				}
				*/
			?>

			<!-- check last page -->
    		<?php if($page<$totalPages): ?>
				<li class="page-item">
					<a class="page-link" href="<?=$navigationPageNext?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			<?php endif;?>

			<li class="page-item">
    			<a class="page-link" href="<?=$navigationPageLast?>">Last</a>
    		</li>
		</ul>
	</nav>
</div>