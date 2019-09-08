<?php
    include('cabecalho.php');
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

                    <?php
                        
                        include('PHP\conexao_bd.php');
                        
                        $query = "select * from produtos order by codigo desc";
                        $result = $conn->query($query);
       
                        echo "<div class='container mt-5'>";
                            echo "<div class='row-fluid'>";
                            
                                echo "<div class='col-xs-6'>";
                                echo "<div class='table-responsive'>";
                                
                                    echo "<table id ='produtos_table' class='table table-hover table-inverse'>";
                                    
                                    echo "<tr>";
                                    echo "<th>Codigo</th>";
                                    echo "<th>Produto</th>";
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
                                            
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Visualizar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Desativar</a> </td>";
                                            echo " <td> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Deletar</a> </td>";

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

