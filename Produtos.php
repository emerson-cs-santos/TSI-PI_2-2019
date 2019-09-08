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

                        <div class='col-3'>
                                <button type="button" class="btn btn-primary btn-lg">Alterar</button>
                        </div>  
    
                        <div class='col-3'>
                                <button type="button" class="btn btn-primary btn-lg">Desativar</button>
                        </div>

                        <div class='col-3'>
                            <button type="button" class="btn btn-primary btn-lg">Deletar</button>
                        </div>                        
                    </div>

                    <div class='row mt-5'>
                        <div class='col-12'>
                            <button type="button" class="btn btn-primary btn-lg">Visualizar</button>
                         </div>                       
                    </div>                     

                    <?php
                        
                        include('PHP\conexao_bd.php');
                        
                        $query = "select * from usuarios";
                        $result = $conn->query($query);
       
                        echo "<div class='container mt-5'>";
                            echo "<div class='row-fluid'>";
                            
                                echo "<div class='col-xs-6'>";
                                echo "<div class='table-responsive'>";
                                
                                    echo "<table id ='usuarios_table' class='table table-hover table-inverse'>";
                                    
                                    echo "<tr>";
                                    echo "<th>codigo</th>";
                                    echo "<th>nome</th>";
                                    echo "<th>senha</th>";
                                    echo "</tr>";
                            
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                                
                                            echo "<tr>";
                                            echo "<td>" . $row["codigo"] . "</td>";
                                            echo "<td>" . $row["nome"] . "</td>";
                                            echo "<td>" . $row["senha"] . "</td>";
                                            
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Usuarios_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";

                                            echo "</tr>";			
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    
                                echo "</table>";
                                    
                    ?>                   
                </section>

                <script>

                    
                    teste();

                    function teste2() 
                    {
                        alert('ahaaha');
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

