<?php
	include_once('../template/header.php');
	include_once('../dao/usersDao.php');
    $resulUsers = listUsers();

?>
			 <section id="listUsersPhp" class="sections degrade" style="">
	            <div class="container">
                    <div class="content" style="width: 90%;height: 95%;">
		                <div class="table-responsive" style="padding-top: 20px; min-height: 600px;">

		                	<div class="form-group text-center h2">
                        		<label class="text-center text-dark">Lista Usuários</label>
                    		</div>

							<table class="table table-bordered">
								<tbody>
									<tr class="text-center thead-dark">
								    	<th scope="row">Editar</th>	
								    	<th scope="row">ID</th>
								    	<th scope="row">Nome</th>
								    	<th scope="row">E-mail</th>
								    	<th scope="row">Status</th>
								    	<th scope="row">Usuário Admin</th>
									</tr>
			                   		<?php
			                  			//loop usersPhp
			                   			while($user = mysqli_fetch_array($resulUsers)){
									 		echo '<tr class="text-center">';

									 			/* edit button */							    			
								    			echo '<th scope="row">';
									    			echo '<form action="../forms/form.edit.user.php" method="post" style="margin-top: 30px;">';
									                    echo '<div class="form-group">';						                    	
										                    echo '<input type="hidden" name="id" value="'.$user['id'].'">';
									                    echo '</div>';
									                    //<!-- enviar -->
								                        echo '<div class="form-group">';
								                            echo '<button class="btn btn-success" type="submit">Editar</button>';
								                        echo '</div>';
								                  	echo '</form>';
								    			echo '</th>';
								    			/* end edit button*/

								    			echo '<th scope="row">'.$user['id'].'</th>';
								    			echo '<th scope="row">'.$user['name'].'</th>';
								    			echo '<th scope="row">'.$user['email'].'</th>';

								    			//verify and set status
								    			if($user['isActive'] == 1){
								    				$isActive = 'ATIVO';
								    			}else{
								    				$isActive = 'DESATIVADO';								    				
								    			}
								    			echo '<th scope="row">'.$isActive.'</th>';

								    			//verify and set isAdmin
								    			if($user['isAdmin'] == 1){
								    				$isAdmin = 'SIM';
								    			}else{
								    				$isAdmin = 'NÃO';								    				
								    			}
								    			echo '<th scope="row">'.$isAdmin.'</th>';
									    	echo '</tr>';
									    }
									?>
								</tbody>
							</table>
						</div>
		        	</div>
		        </div>
	         </section>
<?php
	include_once('../template/footer.php');
?>