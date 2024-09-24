<?php
	include_once('../template/header.php');
	require_once('../functions/docs.list.php');

	//folder
	$source = $_GET['dir'];

	//name current folder
	$strArrayFolder = explode("/", $source);
	//$currentFolder = end($strArrayFolder);

	//return to previous folder
	$lastElement = array_pop($strArrayFolder);
	$penultimateElement = array_pop($strArrayFolder);
	$currentFolder = $penultimateElement;
	$previousFolder = '';

	if((implode('/', $strArrayFolder)) == "../docs" || (implode('/', $strArrayFolder)) == "..")
		$previousFolder = "list.docs.php";
	else
		$previousFolder = "folder.show.php?dir=".implode('/', $strArrayFolder)."/";


	//retornar para pagina principal caso folder vazio
	if(empty($source)){
		//header('location:list.docs.php');
	}

?>
			 <section id="listDocs" class="sections degrade" style="">
	            <div class="container">
                    <div class="content" style="width: 90%;height: 95%;">
		                <div class="table-responsive" style="padding-top: 20px; min-height: 600px;">

		                	<div class="form-group text-center h2">
                        		<label class="text-center text-dark">Lista Documentos</label>
                    		</div>

                    		<!-- SEARCH -->
                    		<?php
								include_once('../template/search.php');
							?>

                    		<div class="menu-folder form-group">
                        		<a href="list.docs.php" class="btn btn-primary" type="submit">
                        			<i class="icon-home icon"></i>
                        		</a>
                        		<!-- CHECK ADMIN -->
                        		<?php if($type): ?>
	                        		<a href="../forms/form.add.folder.php?dir=<?=$_GET['dir']?>" class="btn btn-primary" type="submit">
	                        			<i class="icon-plus icon"></i>
	                        			<i class="icon-folder-alt icon"></i>
	                        		</a>
	                        		<a href="../forms/form.add.file.php?dir=<?=$_GET['dir']?>" class="btn btn-primary" type="submit">
	                        			<i class="icon-plus icon"></i>
	                        			<i class="icon-doc icon"></i>
	                        		</a>
								<?php endif;?>
                        		<a href="<?=$previousFolder?>" class="btn btn-primary" type="submit">
                        			<i class="icon-arrow-left-circle icon"></i>
                        		</a>
                    		</div>
							
							<!-- CHECK SEARCH -->
                        	<?php if(!isset($_GET['search'])): ?>
	                    		<div class="list-group active">
									<span class="list-group-item list-group-item-action active">
										<?='Pasta - '.$currentFolder?>
									</span>
									<?=showFiles($source)?>
								</div>

							<?php else: ?>
								<div class="list-group active">
									<span class="list-group-item list-group-item-action active">
											Pesquisa de Documentos
									</span>

									<table class="table table-bordered table-docs">
										<tbody>
												
											<tr class="text-center thead-dark">
													<th scope="row">Tipo</th>
													<th scope="row">Nome</th>
													<th scope="row">Data de Modificação</th>
													<!-- CHECK ADMIN -->
													<?php if($_SESSION['type']): ?>
														<th scope="row">Excluir</th>
													<?php endif;?>
											</tr>
											<?=showFilesSearch($sourceFolder, $_GET['search'])?>
										</tbody>
									</table>
								</div>
							<?php endif;?>


						</div>

		        	</div>
		        </div>
	         </section>
<?php
	include_once('../template/footer.php');
?>