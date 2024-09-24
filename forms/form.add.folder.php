<?php
    include_once('../template/header.php');
    require_once('../functions/docs.list.php');

    if(empty($_GET['dir'])){
        $_GET['dir'] = $sourceFolder;
    }
?>
    <section id="addFolder" class="sections degrade">
        <div class="container">
            <div class="content" style="width: 85%;height: 95%; min-height: 600px;">
                <form action="../functions/folder.add.php" method="post" style="margin-top: 30px;">
                    <div class="form-group text-center h2">
                        <label class="text-center text-dark">Adicionar Nova Pasta</label>
                    </div>
                
                    <div class="form-group">
                        <label class="text-center text-dark">Nome</label>
                        <input class="form-control" required="true" name="name">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="dir" value="<?=$_GET['dir']?>">
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