<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>

                    <h1 class="text-center H1_titulo mt-3">Usuários</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <div class='text-center col-12 mt-4'>
                            <h2 class='H2_titulo'> Controle e Listagem </h2>
                        </div>                    

                        <!-- Botões principais -->
                        <form action='Usuarios_digitar.php?ID=0' method='POST' class='form-group row mt-3 col-12 d-flex justify-content-center'>
                            <button type="button" class="btn btn-success fa fa-pencil-square-o botao_incluir" data-placement="top" data-toggle="tooltip" title="Adicionar novo usuário"> Incluir</button>
                        </form>

                        <!-- Filtros -->
                        <div class='Status_Ativo'>

                            <div class='form-group row col-12'>
                                <span class='font-weight-bold'>Filtros:</span>
                            </div>    

                            <!-- Filtro por Código -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>Código:</span>
                                <span class='espaco_objetos' >.</span>
                                <input type="number" min="1" max="999999" id='usuarios_filtro_codigo' class="form-control col-2" oninput='filtrar_usuario()'>
                            </div>  

                            <!-- Filtro pelo Login -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>Login:</span>
                                <span class='espaco_objetos' >....</span>
                                <input type="text" id='usuarios_filtro_login' class="form-control col-4" oninput='filtrar_usuario()'>
                            </div>  

                            <!-- Filtro pelo E-mail -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>E-mail:</span>
                                <span class='espaco_objetos' >...</span>
                                <input type="text" id='usuarios_filtro_email' class="form-control col-4" oninput='filtrar_usuario()'>
                            </div>                                                

                            <!-- Filtro de Status -->
                            <div class='form-group row mt-3 col-12'>
                                <span>Status:</span>
                                <span class='espaco_objetos' >....</span>

                                <select id='usuarios_filtro_status' onchange='filtrar_usuario()'>
                                    <option value="Todos">Todos</option>
                                    <option value="Ativos">Ativos</option>
                                    <option value="Inativos">Inativos</option>
                                </select>
                            </div> 
                              
                        </div>                                                                                           

                        <div id='table' class='container mt-4'> </div>
                    </div>

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

