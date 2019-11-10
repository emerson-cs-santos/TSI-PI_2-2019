<?php
	include('../PHP/sessao.php');

	$filtro = @$_POST['filtro_produto'];

	if (!isset($filtro))
	{
		$filtro = '';
	}
	
	include('..\PHP\conexao_bd.php');                      
	
	$query = "select * from produtos $filtro order by codigo desc";
	$result = $conn->query($query);

	echo "<div class='container mt-3'>";
		echo "<div class='row-fluid'>";
		
			echo "<div class='col-xs-6'>";
			echo "<div class='table-responsive'>";
			
				echo "<table id ='produtos_table' class='table table-hover table-inverse table-sm table-bordered'>";

				echo "<thead class='thead-light'>";
				
				echo "<tr class='Status_Ativo'>";
				echo "<th>ID</th>";
				echo "<th>Produto</th>";
				echo "<th>Preview</th>";
				echo "<th>Categoria</th>";
				echo "<th>Preço</th>";
				echo "<th>Estoque</th>";
				echo "<th>Alterar</th>";
				echo "<th>Visualizar</th>";
				echo "<th>Desativar</th>";
				echo "<th>Deletar</th>";
				echo "</tr>";

				echo '</thead>';
		
				if ($result->num_rows > 0) {
					
					$Style_Status = '';

					while($row = $result->fetch_assoc()) {
							
						if ($row["tipo"] == 'Ativo')
						{
							$Style_Status = 'Status_Ativo';
						}
						else
						{
							$Style_Status = 'Status_Inativo';
						}						
						
						echo "<tr class='" . $Style_Status . "'>";
						echo "<td>" . $row["codigo"] . "</td>";
						echo "<td>" . $row["nome"] . "</td>";
						echo "<td><img src='" . $row["imagem"] . "' alt='Preview do produto' border=3 height=100 width=100></img></td>";
						echo "<td>" . $row["categoria"] . "</td>";
						echo "<td>" . $row["preco"] . "</td>";
						echo "<td>" . $row["estoque"] . "</td>";
						
						echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg'  href='Produtos_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
						echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg'  href='show_produtos.php?ID={$row["codigo"]}'>Visualizar</a> </td>";
						echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg' onclick='desativar_produto({$row["codigo"]})' >Desativar</a> </td>";
						echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg' onclick='deletar_produto({$row["codigo"]})' >Deletar</a> </td>";

						echo "</tr>";			
					}
				} else {
					//echo "0 results";
				}
				
			echo "</table>";			
?>