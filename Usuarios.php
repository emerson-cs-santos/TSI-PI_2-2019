<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Controle de usuários</h1>
                </div> 
            </header>

            <main>
                <section class='row'>
                    <div class='row mt-5'>
                        <div class='col-3'>
                            <a href='Usuarios_digitar.php?ID=0'> <button type="button" class="btn btn-primary btn-lg">Incluir</button> </a>
                        </div>                                          
                    </div> 

                    <div class='row mt-5 col-3'>
                        <span>Filtro:</span>
                        <select id='usuarios_filtro_status' onchange='filtrar_usuario()'>
                            <option id='' value="Todos">Todos</option>
                            <option id='' value="Ativos">Ativos</option>
                            <option id='' value="Inativos">Inativos</option>
                        </select>  

                        <div class='col-3'>
                            <a href='Painel.php' id='produtos_cmd_painel' type="button" name="produtos_cmd_voltar" class="btn btn-primary btn-lg"> Painel</a>  
                        </div>
                    </div>

                    <div id='table' class='container mt-5'>                 
                </section>
            </main>

            <script>
                var parametros = '';
                // Ajax com Jquery e está refazendo apenas a tabela 
                $.post('PHP/consulta_usuarios.php',parametros, function(data)
                    {
                        $('#table').html(data);
                        
                    }
                )
            </script>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>

