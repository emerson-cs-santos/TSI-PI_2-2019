<?php
    include('PHP/sessao.php');
    include('cabecalho.php');
?>
                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Produtos</h1>
                </div> 
            </header>

            <main>
                <section class='row'>

                    <!-- Botões principais -->
                    <div class='form-group row mt-3 col-12 d-flex justify-content-center'>
                        <a href='Produtos_digitar.php?ID=0'> <button type="button" class="btn btn-primary btn-lg">Incluir</button> </a>
                        <span style='color:white; user-select:none;'>........</span>
                        <a href='Painel.php'> <button type="button" class="btn btn-primary btn-lg">Painel </button> </a> 
                    </div>

                    <!-- Filtros -->
                    <div class='form-group row col-12'>
                        <span class='font-weight-bold'>Filtros:</span>
                    </div>    

                    <!-- Filtro por Código -->
                    <div class='form-group row mt-1 col-12'>
                        <span class=''>ID:</span>
                        <span style='color:white; user-select:none;'>................</span>
                        <input type="number" min="1" max="999999" id='produtos_filtro_codigo' class="form-control col-2" oninput='filtrar_produto()'>
                    </div>  

                    <!-- Filtro pelo Login -->
                    <div class='form-group row mt-1 col-12'>
                        <span class=''>Produto:</span>
                        <span style='color:white; user-select:none;'>....</span>
                        <input type="text" id='produtos_filtro_nome' class="form-control col-4" oninput='filtrar_produto()'>
                    </div>  

                    <!-- Filtro pelo E-mail -->
                    <div class='form-group row mt-1 col-12'>
                        <span class=''>Categoria:</span>
                        <span style='color:white; user-select:none;'>.</span>
                        <input type="text" id='produtos_filtro_categoria' class="form-control col-4" oninput='filtrar_produto()'>
                    </div>                                                

                    <!-- Filtro de Status -->
                    <div class='form-group row mt-1 col-12'>
                        <span>Status:</span>
                        <span style='color:white; user-select:none;'>.........</span>

                        <select id='produtos_filtro_status' onchange='filtrar_produto()'>
                            <option id='' value="Todos">Todos</option>
                            <option id='' value="Ativos">Ativos</option>
                            <option id='' value="Inativos">Inativos</option>
                        </select>
                    </div>                      

                    <div id='table' class='container mt-3'>
                </section>  
            </main>

            <script>
                var parametros = '';
                // Ajax com Jquery e está refazendo apenas a tabela 
                $.post('PHP/consulta_produtos.php',parametros, function(data)
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

