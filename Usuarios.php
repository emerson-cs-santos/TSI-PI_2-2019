<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Controle de usuários</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <div class='col-12'>

                        <!-- Botões principais -->
                        <div class='form-group row mt-3 col-12 d-flex justify-content-center'>
                            <a href='Usuarios_digitar.php?ID=0'>            <button type="button" class="btn btn-primary btn-lg">Incluir</button> </a>
                        </div>

                        <!-- Filtros -->
                        <div class='Status_Ativo'>

                            <div class='form-group row col-12'>
                                <span class='font-weight-bold'>Filtros:</span>
                            </div>    

                            <!-- Filtro por Código -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>Código:</span>
                                <span style='color:white; user-select:none;'>.</span>
                                <input type="number" min="1" max="999999" id='usuarios_filtro_codigo' class="form-control col-2" oninput='filtrar_usuario()'>
                            </div>  

                            <!-- Filtro pelo Login -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>Login:</span>
                                <span style='color:white; user-select:none;'>....</span>
                                <input type="text" id='usuarios_filtro_login' class="form-control col-4" oninput='filtrar_usuario()'>
                            </div>  

                            <!-- Filtro pelo E-mail -->
                            <div class='form-group row mt-3 col-12'>
                                <span class=''>E-mail:</span>
                                <span style='color:white; user-select:none;'>...</span>
                                <input type="text" id='usuarios_filtro_email' class="form-control col-4" oninput='filtrar_usuario()'>
                            </div>                                                

                            <!-- Filtro de Status -->
                            <div class='form-group row mt-3 col-12'>
                                <span>Status:</span>
                                <span style='color:white; user-select:none;'>....</span>

                                <select id='usuarios_filtro_status' onchange='filtrar_usuario()'>
                                    <option id='' value="Todos">Todos</option>
                                    <option id='' value="Ativos">Ativos</option>
                                    <option id='' value="Inativos">Inativos</option>
                                </select>
                            </div> 
                              
                        </div>                                                                                           

                        <div id='table' class='container mt-4'>
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

