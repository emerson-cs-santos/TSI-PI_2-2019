<?php
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
                            <select>
                                <option value="Todos">Todos</option>
                                <option value="Ativos">Ativos</option>
                                <option value="Inativos">Inativos</option>
                            </select>  

                            <div class='col-3'>
                                <a id='usuarios_cmd_filtrar' type="button" name="usuarios_cmd_filtrar" class="btn btn-primary btn-lg" onclick="filtrar('usuario')"> Filtrar</a>  
                            </div>
                        </div>                       
                                     
                    <?php

                        include('PHP\conexao_bd.php');

                        // Se página foi chamada pelo filtro, fazer select com where

                     //   $tipo = $_POST['tipo'];

                        if(isset($tipo))
                        {
                            // condição
                        }
                        
                        $query = "select * from usuarios order by codigo desc";
                        $result = $conn->query($query);
       
                        echo "<div class='container mt-5'>";
                            echo "<div class='row-fluid'>";
                            
                                echo "<div class='col-xs-6'>";
                                echo "<div class='table-responsive'>";
                                
                                    echo "<table id ='usuarios_table' class='table table-hover table-inverse'>";
                                    
                                    echo "<tr>";
                                    echo "<th>Codigo</th>";
                                    echo "<th>Login</th>";
                                    echo "<th>senha</th>";
                                    echo "<th>Status</th>";
                                    echo "<th>Alterar</th>";
                                    echo "<th>Desativar</th>";
                                    echo "<th>Deletar</th>";
                                    echo "</tr>";
                            
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                
                                            echo "<tr>";
                                            echo "<td>" . $row["codigo"] . "</td>";
                                            echo "<td>" . $row["nome"] . "</td>";
                                            echo "<td>" . $row["senha"] . "</td>";
                                            echo "<td>" . $row["tipo"] . "</td>";
                                            
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' href='Usuarios_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='desativar({$row["codigo"]})' >Desativar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg' onclick='deletar({$row["codigo"]})' >Deletar</a> </td>";

                                            echo "</tr>";			
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    
                                echo "</table>";
                                    
                                // function writeMsg() {
                                //     echo "Hello world!";
                                // }             


                    ?>                   
                </section>

                <script>

                    
                    teste();

                    function teste2() 
                    {
                       // alert('ahaaha');
                    }

                    var table = document.getElementById('usuarios_table');

                    if(table) 
                    {
                        Array.from(table.rows).forEach
                        (
                            (tr, row_ind) => 
                            {
                                table.rows[row_ind].onclick = teste2;              
                            }
                        );
                    }                    

                    // Passa por todas as linhas a colunas
                    // if(t) {
                    //     Array.from(t.rows).forEach((tr, row_ind) => {
                    //         Array.from(tr.cells).forEach((cell, col_ind) => {
                    //             alert('Value at row/col [' + row_ind + ',' + col_ind + '] = ' + cell.textContent);
                    //         });
                    //     });
                    // }                      

   
                </script>   
            </main>

        <?php
            include('footer.php');
        ?>
        </div>
    </body>
</html>

