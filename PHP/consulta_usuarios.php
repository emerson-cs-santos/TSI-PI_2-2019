<?php
    include('..' . DIRECTORY_SEPARATOR . 'PHP' . DIRECTORY_SEPARATOR . 'sessao.php');
	$filtro = @$_POST['filtro'];

	if (!isset($filtro))
	{
		$filtro = '';
	}
	
	include('..' . DIRECTORY_SEPARATOR . 'PHP' . DIRECTORY_SEPARATOR . 'conexao_bd.php');
	
	$query = "select * from usuarios $filtro order by codigo desc";
	$result = $conn->query($query);
		
	echo "<div id='table' class='container'>";
	echo "<div class='row-fluid'>";
	
		echo "<div class='col-xs-6'>";
		echo "<div class='table-responsive'>";
		
			echo "<table id ='usuarios_table' class='table table-hover table-inverse table-sm table-bordered table_format'>";
			// table-hover: Ao Passar o mouse, fazer um destaque
			// table-sm: Diminuir o espaço entre as linhas

			echo "<thead class='thead-light'>";
			
			echo "<tr class='Status_Ativo'>";
			echo "<th>Codigo</th>";
			echo "<th>Login</th>";
			echo "<th>E-mail</th>";
			echo "<th>Alterar</th>";
			echo "<th>Desativar</th>";
			echo "<th>Excluir</th>";
			echo "</tr>";

			echo '</thead>';
			
			echo "<tbody>";
	
			if ($result->num_rows > 0) {
				
				$Style_Status = '';
				$Cor_botao_inativar = '';
				$ToolTipText_inativar = '';

				while($row = $result->fetch_assoc()) 
				{
						
					if ($row["tipo"] == 'Ativo')
					{
						$Style_Status = 'Status_Ativo';
						$Cor_botao_inativar = 'btn-warning';
						$ToolTipText_inativar = 'Desativar usuário';
					}
					else
					{
						$Style_Status = 'Status_Inativo';
						$Cor_botao_inativar = 'btn-success';
						$ToolTipText_inativar = 'Ativar usuário';
					}
					
					echo "<tr class='" . $Style_Status . "'>";
					echo "<td>" . $row["codigo"] . "</td>";
					echo "<td>" . $row["nome"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					
					echo " <td class='Status_Ativo'> <a type='button' class='btn btn-primary fa fa-pencil fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='Alterar cadastro do produto' href='Usuarios_digitar.php?ID={$row["codigo"]}'>	</a> </td>";
					echo " <td class='Status_Ativo'> <a type='button' class='btn $Cor_botao_inativar fa fa-warning fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='$ToolTipText_inativar' onclick='desativar({$row["codigo"]})' ></a> </td>";
					echo " <td class='Status_Ativo'> <a type='button' class='btn btn-danger fa fa-eraser fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='Apagar do usuário do sistema' onclick='deletar({$row["codigo"]})' ></a> </td>";

					echo "</tr>";			
				}
			} else {
				echo "Nenhum registro encontrado...";
			}
			
		echo "</tbody>";
		echo "</table>";
?>