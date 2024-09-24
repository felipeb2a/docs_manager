<?php
    include_once('../template/header.php');
    include_once('../dao/usersDao.php');
?>
    <section id="addUser" class="sections degrade">
        <div class="container">
            <div class="content" style="width: 85%;height: 95%; min-height: 600px;">
                <form action="../functions/user.add.php" method="post" style="margin-top: 30px;">
                    <div class="form-group text-center h2">
                        <label class="text-center text-dark">Adicionar Usuário</label>
                    </div>
                
                    <div class="form-group">
                        <label class="text-center text-dark">Nome</label>
                        <input class="form-control" required="true" name="name">
                    </div>
                    <div class="form-group">
                        <label class="text-center text-dark">E-mail</label>
                        <input class="form-control" type="email" required="true" name="email">
                    </div>
                    <div class="form-group">
                        <label class="text-center text-dark">Senha</label>
                        <input class="form-control" type="password" required="true" name="password">
                    </div>                    

                    <div class="form-group">
                        <label for="inputisActive">Status</label>
                        <select class="form-control" name="isActive">
                            <option value="1">Ativo</option>
                            <option value="0">Desativado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputisActive">Usuário Admin</label>
                        <select class="form-control" name="isAdmin">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
    include_once('../template/footer.php');
?>