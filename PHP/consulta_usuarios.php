<?php
    include('../PHP/sessao.php');
	$filtro = @$_POST['filtro'];

	if (!isset($filtro))
	{
		$filtro = '';
	}
	
	include('..\PHP\conexao_bd.php');
	
	$query = "select * from usuarios $filtro order by codigo desc";
	$result = $conn->query($query);
		
	echo "<div id='table' class='container'>";
	echo "<div class='row-fluid'>";
	
		echo "<div class='col-xs-6'>";
		echo "<div class='table-responsive'>";
		
			echo "<table id ='usuarios_table' class='table table-hover table-inverse table-sm table-bordered'>";
			// table-hover: Ao Passar o mouse, fazer um destaque
			// table-sm: Diminuir o espaço entre as linhas

			echo "<thead class='thead-light'>";
			
			echo "<tr class='Status_Ativo'>";
			echo "<th>Codigo</th>";
			echo "<th>Login</th>";
			echo "<th>E-mail</th>";
			echo "<th>Alterar</th>";
			echo "<th>Desativar</th>";
			echo "<th>Deletar</th>";
			echo "</tr>";

			echo '</thead>';
			
			echo "<tbody>";
	
			if ($result->num_rows > 0) {
				
				$Style_Status = '';

				while($row = $result->fetch_assoc()) 
				{
						
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
					echo "<td>" . $row["email"] . "</td>";
					
					echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg' href='Usuarios_digitar.php?ID={$row["codigo"]}'>Alterar</a> </td>";
					echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg' onclick='desativar({$row["codigo"]})' >Desativar</a> </td>";
					echo " <td class='Status_Ativo'> <a id='' type='button' class='btn btn-primary btn-lg' onclick='deletar({$row["codigo"]})' >Deletar</a> </td>";

					echo "</tr>";			
				}
			} else {
			//	echo "0 results";
			}
			
		echo "</tbody>";
		echo "</table>";
?>