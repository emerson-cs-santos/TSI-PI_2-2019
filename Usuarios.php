<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gamer Shopping</title>
        <meta charset="utf-8"> 

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </head>                            
    
     <body>
         <div class='container'>
            <header class='row'>
                
                <div class="col-12">
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: #ccc;">

                        <a href="Index.html"><img src="Imagens/logo.png" alt="Logo do site" style="height:100px; width:100px;"></a>
                       
                        <a class="navbar-brand p-4" href="Index.html">Home</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav nav-pills">

                                <li class="nav-item">
                                    <a class="nav-link" href="Jogos.html">Jogos</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Login.html">Bem vindo! Entre ou se cadastre-se</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                    <h1 class="text-center mt-3" style="font-family: Comic Sans MS , cursive, sans-serif;">Controle de usuários</h1>

                </div> 
            </header>

            <main>
                <section class='row'>
                    <div class='row mt-5'>
                        <div class='col-3'>
                            <a href='Usuarios_digitar.php'> <button type="button" class="btn btn-primary btn-lg">Incluir</button> </a>
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
                        //Change the password to match your configuration
                        $link = mysqli_connect("localhost", "root", "", "SENAC_PI");

                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        echo "<br>";
                        
                        
                        $sql = "select * from usuarios";
                        $result = $link->query($sql);
                                
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
                                                echo "</tr>";			
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        
                                        echo "</table>";
                                        
                            // Close connection
                            mysqli_close($link);
                        ?>                   
                </section>

                <script>

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

            <footer class='mt-3' style="background-color: #ccc;">
                <div class="col-12">
                    <p style="font-weight: bold"> Gamer Shopping</p>
                    <p>Contato: gamertrash@uol.com.br<br> </p>
                </div>
            </footer>
        </div>
    </body>
</html>

