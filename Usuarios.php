<?php
    include('PHP/sessao.php');
    include('cabecalho.php');

    // Utilizado para deixar selecionado na combo a opção filtrada
   // $filtro = @$_POST['filtro'];

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
                                     
                    <?php

                      //  include('PHP\conexao_bd.php');

                        // Se página foi chamada pelo filtro, fazer select com where
                        // $where = @$_POST['condicao'];
                        
                       // $query = "select * from usuarios $where order by codigo desc";
                       // $result = $conn->query($query);
       
                       //  echo "<div id='table' class='container mt-5'>";
                        //     echo "<div class='row-fluid'>";
                            
                        //         echo "<div class='col-xs-6'>";
                        //         echo "<div class='table-responsive'>";
                                
                        //             echo "<table id ='usuarios_table' class='table table-hover table-inverse'>";
                                    
                        //             echo "<tr>";
                        //             echo "<th>Codigo</th>";
                        //             echo "<th>Login</th>";
                        //             echo "<th>Status</th>";
                        //             echo "<th>Alterar</th>";
                        //             echo "<th>Desativar</th>";
                        //             echo "<th>Deletar</th>";
                        //             echo "</tr>";
									
						// 			echo "<tbody>";
                            
                        //             if ($result->num_rows > 0) {
                        //                 // output data of each row
                        //                 while($row = $result->fetch_assoc()) {
                                                
                        //                     echo "<tr>";
                        //                     echo "<td>" . $row["codigo"] . "</td>";
                        //                     echo "<td>" . $row["nome"] . "</td>";
                        //                     echo "<td>" . $row["tipo"] . "</td>";
                                            
                        //                     echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' href='Usuarios_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
                        //                     echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='desativar({$row["codigo"]})' >Desativar</a> </td>";
                        //                     echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='deletar({$row["codigo"]})' >Deletar</a> </td>";

                        //                     echo "</tr>";			
                        //                 }
                        //             } else {
                        //               //  echo "0 results";
                        //             }
                                    
						// 		echo "</tbody>";
                        //         echo "</table>";
                    ?>                   
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

