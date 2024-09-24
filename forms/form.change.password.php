<?php
    include_once('../template/header.php');
    include_once('../dao/usersDao.php');

    $userValues = login($_SESSION['user']);

?>
    <section id="editTransformer" class="sections degrade">
        <div class="container">
            <div class="content" style="width: 85%;height: 95%; min-height: 600px;">
                <form action="../functions/user.change.password.php" method="post" style="margin-top: 30px;">
                    <div class="form-group text-center h2">
                        <label class="text-center text-dark">Alterar Senha</label>
                    </div>

                    <?php while($user = mysqli_fetch_array($userValues)){?>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?=$user['id']?>">
                            </div>

                            <div class="form-group">
                                <label class="text-center text-dark">Nome</label>
                                <input class="form-control" disabled required="true" name="name" value="<?=$user['name']?>">
                            </div>

                            <div class="form-group">
                                <label class="text-center text-dark">E-mail</label>
                                <input class="form-control" type="email" required="true" name="email" value="<?=$user['email']?>">
                            </div>

                            <div class="form-group">
                                <label class="text-center text-dark">Nome</label>
                                <input class="form-control" type="password" required="true" name="password" value="<?=$user['password']?>">
                            </div>

                    <?php  } ?>

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