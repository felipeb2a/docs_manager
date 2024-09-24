<?php
    include_once( __DIR__ . '/template/header.index.php');
    require_once('functions/docs.list.php');
    $list = showLastModifiedFiles('docs');
?>      
    <!-- ETAPAS E DATAS-->
    <section id="etapa" class="sem-degrade clean-block features text-white">
        <div class="container">
            <div class="block-heading">
                <h2>DOCs</h2>
            </div>
            <div class="row justify-content-center" style="min-height: 600px;">
                <div class="col-md-11 feature-box"><i class="icon-check icon text-warning"></i>
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Atividade</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody class="text-center menu-folder">
                            <tr>
                                <th scope="row">1</th>
                                <td>Lista de Documentos</td>
                                <td><a href="paginas/list.docs.php">Click Aqui</a></td>
                            </tr>

                            <!-- CHECK ADMIN -->
                            <?php if($type): ?>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Adicionar Usuários</td>
                                    <td><a href="forms/form.add.user.php">Click Aqui</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Lista de Usuários</td>
                                    <td><a href="paginas/list.users.php">Click Aqui</a></td>
                                </tr>
                            <?php endif;?>                            
                        </tbody>
                    </table>

                    </br>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4" scope="col" class="text-center">Arquivos Adicionados Recentemente</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody class="text-center menu-folder">
                            <?php $i = 1; ?>
                            <?php foreach($list as $key=>$value): ?>
                                <tr>
                                    <th scope="row"><?= $i?></th>
                                    <td>
                                        <a href="functions/file.pdf.open.php?dir=../<?= $value['pathName']; ?>" target="_blank">
                                            <?= $value['fileName']; ?>
                                        </a>
                                    </td>
                                    <td><?= date ("d/m/Y - H:i:s",  $value['mTime']); ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

<?php
    include_once('template/footer.index.php');
?>