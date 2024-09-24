<?php
	include_once('../template/header.php');
	require_once('../functions/docs.list.php');    

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
                    			$valueSearch = '';
								include_once('../template/search.php');

								if(!isset($_GET['search'])){									
									//consulta definindo o limite de rows
								    //$resultTransformers = listTransformersPagination($start, $limit);

								} else{
									//definir pesquisado
									$valueSearch = $_GET['search'];
									//realizar consulta
									//$resultTransformers = listTransformersSearch($valueSearch, $start, $limit);
								}
							?>

                    		<div class="form-group">
                        		<a href="list.docs.php" class="btn btn-primary" type="submit">
                        			<i class="icon-home icon"></i>
                        		</a>                        		
                        		<!-- CHECK ADMIN -->
                        		<?php if($type): ?>
	                        		<a href="../forms/form.add.folder.php" class="btn btn-primary" type="submit">
	                        			<i class="icon-plus icon"></i>
	                        			<i class="icon-folder-alt icon"></i>
	                        		</a>
	                        		<a href="../forms/form.add.file.php" class="btn btn-primary" type="submit">
	                        			<i class="icon-plus icon"></i>
	                        			<i class="icon-doc icon"></i>
	                        		</a>
								<?php endif;?>
								
                    		</div>

							<?php
                    			echo '<div class="list-group active">';
									echo '<span " class="list-group-item list-group-item-action active">';
										echo 'Documentos';
									echo '</span>';
									showFiles('../docs/');
								echo '</div>';
							?>

						</div>

		        	</div>
		        </div>
	         </section>
<?php
	include_once('../template/footer.php');
?>