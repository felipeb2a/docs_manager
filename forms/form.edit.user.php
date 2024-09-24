<?php
    include_once('../template/header.php');
    include_once('../dao/usersDao.php');

    $userValues = selectUser($_POST['id']);

?>
    <section id="editTransformer" class="sections degrade">
        <div class="container">
            <div class="content" style="width: 85%;height: 95%; min-height: 600px;">
                <form action="../functions/user.edit.php" method="post" style="margin-top: 30px;">
                    <div class="form-group text-center h2">
                        <label class="text-center text-dark">Editar Usuário</label>
                    </div>

                    <?php

                        //loop user
                        while($user = mysqli_fetch_array($userValues)){
                            echo '<div class="form-group">';
                                echo '<input type="hidden" name="id" value="'.$user['id'].'">';
                            echo '</div>';

                            echo '<div class="form-group">';
                                echo '<label class="text-center text-dark">Nome</label>';
                                echo '<input class="form-control" required="true" name="name" value="'.$user['name'].'">';
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo '<label class="text-center text-dark">E-mail</label>';
                                echo '<input class="form-control" type="email" required="true" name="email" value="'.$user['email'].'">';
                            echo '</div>';
                            echo '<div class="form-group">';
                                echo '<label class="text-center text-dark">Senha</label>';
                                echo '<input class="form-control" type="password" required="true" name="password" value="'.$user['password'].'">';
                            echo '</div>';

                            echo '<div class="form-group">';
                                echo '<label for="inputisActive">Status</label>';
                                echo '<select class="form-control" name="isActive" value="'.$user['isActive'].'">';
                                    echo '<option value="1">Ativo</option>';
                                    echo '<option value="0">Desativado</option>';
                                echo '</select>';
                            echo '</div>';

                            echo '<div class="form-group">';
                                echo '<label for="inputisActive">Usuário Admin</label>';
                                echo '<select class="form-control" name="isAdmin" value="'.$user['isAdmin'].'">';
                                    echo '<option value="1">Sim</option>';
                                    echo '<option value="0">Não</option>';
                                echo '</select>';
                            echo '</div>';

                        }

                    ?>
                    
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
    include_once('../template/footer.php');
?>