<?php 

	/* pagination */
    $page = 1;

    $limit = 5;

    $totalPages = '';

    $end = '';

    $countRegisters = '';

    //verificar requisicao de nova pagina
    if(isset($_GET['page']))
    	$page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
    //retornar a pagina 1 se recebermos erro
    if(!$page)
    	$page = 1;

    $start = ($page * $limit) - $limit;

    //$totalPages = ceil($countRegisters[0] / $limit);

    //$end = ((($page+$limit) < $totalPages) ? $page+$limit : $totalPages);

    function totalPages($countRegisters, $limit){

        //$totalPages = ceil($countRegisters[0] / $limit);
        $result = ceil($countRegisters / $limit);

        return $result;
    }

    function endPage($totalPages, $page, $limit){

        $result = ((($page+$limit) < $totalPages) ? $page+$limit : $totalPages);

        return $result;
    }

?>