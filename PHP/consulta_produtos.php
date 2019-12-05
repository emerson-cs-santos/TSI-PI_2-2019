<?php
	include('..' . DIRECTORY_SEPARATOR . 'PHP' . DIRECTORY_SEPARATOR . 'sessao.php');

	$filtro_codigo = @$_POST['filtro_codigo'];

	if (!isset($filtro_codigo))
	{
		$filtro_codigo = '';
	}

	$filtro_produto = @$_POST['filtro_produto'];

	if (!isset($filtro_produto))
	{
		$filtro_produto = '';
	}

	$filtro_categoria = @$_POST['filtro_categoria'];

	if (!isset($filtro_categoria))
	{
		$filtro_categoria = '';
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

    if(!$filtro_produto == '')
    {
        $where = $where . " and nome like '%$filtro_produto%' ";
    }  
    
    if(!$filtro_categoria == '')
    {
        $where = $where . " and categoria like '%$filtro_categoria%' ";
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
	
	$query = "select * from produtos $where order by codigo desc";
	$result = $conn->query($query);

	echo "<div id='table_consulta_produtos' class='container mt-3'>";
		echo "<div class='row-fluid'>";
		
			echo "<div class='col-xs-6'>";
			echo "<div class='table-responsive'>";
			
				echo "<table id ='produtos_table' class='table table-hover table-inverse table-sm table-bordered table_format'>";

				echo "<thead class='thead-light'>";
				
				echo "<tr class='Status_Ativo'>";
				echo "<th>ID</th>";
				echo "<th>Produto</th>";
				echo "<th>Preview</th>";
				echo "<th>Categoria</th>";
				echo "<th>Preço(R$)</th>";
				echo "<th>Estoque</th>";
				echo "<th>Alterar</th>";
				echo "<th>Loja</th>";
				echo "<th>Desativar</th>";
				echo "<th>Excluir</th>";
				echo "</tr>";

				echo '</thead>';

				echo '<tbody>';
		
				if ($result->num_rows > 0) {
					
					$Style_Status = '';
					$Cor_botao_inativar = '';
					$ToolTipText_inativar = '';					

					while($row = $result->fetch_assoc()) {
							
						if ($row["tipo"] == 'Ativo')
						{
							$Style_Status = 'Status_Ativo';
							$Cor_botao_inativar = 'btn-warning';
							$ToolTipText_inativar = 'Desativar produto';							
						}
						else
						{
							$Style_Status = 'Status_Inativo';
							$Cor_botao_inativar = 'btn-success';
							$ToolTipText_inativar = 'Ativar produto';							
						}						
						
						echo "<tr class='" . $Style_Status . "'>";
						echo "<td>" . $row["codigo"] . "</td>";
						echo "<td>" . $row["nome"] . "</td>";
						
						$imagem = trim($row["imagem"]);
										
						if($imagem == '')
						{
							$imagem     =   'Imagens/produto_sem_imagem.jpg';
						}						
						echo "<td><img src='" . $imagem . "' alt='Preview do produto' border=3 height=100 width=100></img></td>";
						
						echo "<td>" . $row["categoria"] . "</td>";
						echo "<td>" . number_format($row["preco"], 2, ',', '.') . "</td>";
						echo "<td>" . number_format($row["estoque"], 0, ',', '.') . "</td>";
						
						echo " <td class='Status_Ativo'> <a type='button' class='btn btn-primary fa fa-pencil fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='Alterar cadastro do produto' href='Produtos_digitar.php?ID={$row["codigo"]}'></a> </td>";
						echo " <td class='Status_Ativo'> <a type='button' class='btn btn-info fa fa-shopping-bag fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='Preview do produto na loja' href='show_produtos.php?ID={$row["codigo"]}'></a> </td>";
						echo " <td class='Status_Ativo'> <a type='button' class='btn $Cor_botao_inativar fa fa-warning fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='$ToolTipText_inativar' onclick='desativar_produto({$row["codigo"]})' ></a> </td>";
						echo " <td class='Status_Ativo'> <a type='button' class='btn btn-danger fa fa-eraser fa-2x botoes_grade' data-placement='top' data-toggle='tooltip' title='Apagar do produto do sistema' onclick='deletar_produto({$row["codigo"]})' ></a> </td>";

						echo "</tr>";			
					}
				} else {
					echo "Nenhum registro encontrado...";
				}
			
			echo '</tbody>';
			echo "</table>";
?>