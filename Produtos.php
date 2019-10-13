<?php
    include('PHP/sessao.php');
    include('cabecalho.php');

    // Utilizado para deixar selecionado na combo a opção filtrada
    $filtro = @$_POST['filtro_produto'];    

?>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Produtos</h1>
                </div> 
            </header>

            <main>
                <section class='row'>
                    <div class='row mt-5'>
                        <div class='col-3'>
                            <a href='Produtos_digitar.php?ID=0'> <button type="button" class="btn btn-primary btn-lg">Incluir</button> </a>
                        </div>                      
                    </div>   
                    
                    <div class='row mt-5 col-3'>
                        <span>Filtro:</span>
                        <select id='produtos_filtro_status' onchange='filtrar_produto()'>
                            <option id='' value="Todos"     <?php   echo $teste = $filtro=="Todos" ? "selected":"";     ?>  >Todos</option>
                            <option id='' value="Ativos"    <?php   echo $teste = $filtro=="Ativos" ? "selected":"";    ?>  >Ativos</option>
                            <option id='' value="Inativos"  <?php   echo $teste = $filtro=="Inativos" ? "selected":"";  ?>  >Inativos</option>
                        </select>  

                        <div class='col-3'>
                            <a href='Painel.php' id='produtos_cmd_painel' type="button" name="produtos_cmd_voltar" class="btn btn-primary btn-lg"> Painel</a>  
                        </div>                       
                    </div>                                     

                    <?php
                        
                        include('PHP\conexao_bd.php');

                        // Se página foi chamada pelo filtro, fazer select com where
                        $where = @$_POST['condicao_produto'];                        
                        
                        $query = "select * from produtos $where order by codigo desc";
                        $result = $conn->query($query);
       
                        echo "<div class='container mt-5'>";
                            echo "<div class='row-fluid'>";
                            
                                echo "<div class='col-xs-6'>";
                                echo "<div class='table-responsive'>";
                                
                                    echo "<table id ='produtos_table' class='table table-hover table-inverse'>";
                                    
                                    echo "<tr>";
                                    echo "<th>Codigo</th>";
                                    echo "<th>Produto</th>";
                                    echo "<th>Categoria</th>";
                                    echo "<th>Preço</th>";
                                    echo "<th>Estoque</th>";
                                    echo "<th>Status</th>";
                                    echo "<th>Alterar</th>";
                                    echo "<th>Visualizar</th>";
                                    echo "<th>Desativar</th>";
                                    echo "<th>Deletar</th>";
                                    echo "</tr>";
                            
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                
                                            echo "<tr>";
                                            echo "<td>" . $row["codigo"] . "</td>";
                                            echo "<td>" . $row["nome"] . "</td>";
                                            echo "<td>" . $row["categoria"] . "</td>";
                                            echo "<td>" . $row["preco"] . "</td>";
                                            echo "<td>" . $row["estoque"] . "</td>";
                                            echo "<td>" . $row["tipo"] . "</td>";
                                            
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='show_produtos.php?ID={$row["codigo"]}'>Visualizar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='desativar_produto({$row["codigo"]})' >Desativar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='deletar_produto({$row["codigo"]})' >Deletar</a> </td>";

                                            echo "</tr>";			
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    
                                echo "</table>";
                                    
                    ?>
                </section>  
            </main>
        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>

