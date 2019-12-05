<?php
    include('..' . DIRECTORY_SEPARATOR . 'PHP' . DIRECTORY_SEPARATOR . 'sessao.php');
	
	$filtro_codigo = @$_POST['filtro_codigo'];

	if (!isset($filtro_codigo))
	{
		$filtro_codigo = '';
	}

	$filtro_login = @$_POST['filtro_login'];

	if (!isset($filtro_login))
	{
		$filtro_login = '';
	}

	$filtro_email = @$_POST['filtro_email'];

	if (!isset($filtro_email))
	{
		$filtro_email = '';
	}

	$filtro_status = @$_POST['filtro_status'];

	if (!isset($filtro_status))
	{
		$filtro_status = '';
	}

	// Montando where
	$where = '';

	if(!$filtro_codigo == '')
    {
        $where = $where . " and codigo = $filtro_codigo ";
    }

    if(!$filtro_login == '')
    {
        $where = $where . " and nome like '%$filtro_login%' ";
    }  
    
    if(!$filtro_email == '')
    {
        $where = $where . " and email like '%$filtro_email%' ";
    }        

   switch ($filtro_status)
   {
        case 'Ativos':
            $where = $where . " and tipo ='Ativo' ";
        break;

        case 'Inativos':
            $where = $where . " and tipo ='Inativo' ";
        break;
   }

   // Tirando 1º and, é sempre colocado um and, pois não sabemos quais filtros serão utilizados
   if(!$where == '')
   {
        $where = " Where " . substr($where,5);;
   } 
	
	include('..' . DIRECTORY_SEPARATOR . 'PHP' . DIRECTORY_SEPARATOR . 'conexao_bd.php');
	
	$query = "select * from usuarios $where order by codigo desc";
	$result = $conn->query($query);
		
	echo "<div id='table_consulta_usuarios' class='container'>";
	echo "<div class='row-fluid'>";
	
		echo "<div class='col-xs-6'>";
		echo "<div class='table-responsive'>";
		
			echo "<table id ='usuarios_table' class='table table-hover table-inverse table-sm table-bordered table_format'>";
			// table-hover: Ao Passar o mouse, fazer um destaque
			// table-sm: Diminuir o espaço entre as linhas

			echo "<thead class='thead-light'>";
			
			echo "<tr class='Status_Ativo'>";
			echo "<th>Código</th>";
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