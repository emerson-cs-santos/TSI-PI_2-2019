function desativar(ID_para_desativar) 
{
    var desativar = "codigo=" + encodeURIComponent(ID_para_desativar);

   // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            switch (resposta)
			{
				case 'Ativo':
                    swal(
                        {
                            title:  "Usuário foi Ativado!",
                            text:   'Usuário está ativo no sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )
					
                break;

                case 'Inativo':
                    swal(
                        {
                            title:  "Usuário foi Inativado!",
                            text:   'Usuário não tem mais acesso ao sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )                   
                break;
					
				 default:
                    swal(
                        {
                            title:  "Problemas ao inativar!",
                            text:   "Por favor entrar em contato com o administrador do sistema!",
                            icon:   "error",
                            button: "OK",
                        }
                    )                    
			}
            
            // Ajax com Jquery e está refazendo apenas a tabela 
			$.post('PHP/consulta_usuarios.php',desativar, function(data)
				{
					$('#table').html(data);
				}
			)			
			
        }      
    }
    // MODO POST
    xmlhttp.open("POST", "PHP/desativar.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(desativar);
}


function deletar(ID_para_deletar) 
{
    swal({
        title: "Apagar usuário?",
        text: "Uma vez excluído, não será possivel recuperar esse registro!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            deletar_usuario_parte2(ID_para_deletar);
        } else {
            swal(
                {
                    title:  "Processo cancelado!",
                    text:   'Usuário NÂO foi apagado!',
                   
                    button: "OK",
                }
            )             
        }
        });
}

function deletar_usuario_parte2 (ID_para_deletar)
{
    var deletar = "codigo=" + encodeURIComponent(ID_para_deletar);

    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            switch (resposta)
            {
                case 'ok':
                    swal(
                        {
                            title:  "Usuário foi deletado!",
                            text:   'Usuário não está mais disponível no sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )
                break;
                    
                default:
                swal(
                    {
                        title:  "Problemas ao deletar!",
                        text:   "Por favor entrar em contato com o administrador do sistema!",
                        icon:   "error",
                        button: "OK",
                    }
                )                  
            }

            // Ajax com Jquery e está refazendo apenas a tabela 
			$.post('PHP/consulta_usuarios.php',deletar, function(data)
				{
					$('#table').html(data);
				}
			)	

        };      
    }
    // MODO POST
    xmlhttp.open("POST", "PHP/deletar.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(deletar);  
}


function desativar_produto(ID_para_desativar) 
{
    var desativar = "codigo=" + encodeURIComponent(ID_para_desativar);

   // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            switch (resposta)
			{
				case 'Ativo':
                    swal(
                        {
                            title:  "Produto foi Ativado!",
                            text:   'Produto está ativo no sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )
                break;

                case 'Inativo':
                    swal(
                        {
                            title:  "Produto foi Inativado!",
                            text:   'Produto não é mais considerado no controle do sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )                    
                break;
					
				 default:
                    swal(
                        {
                            title:  "Problemas ao inativar!",
                            text:   "Por favor entrar em contato com o administrador do sistema!",
                            icon:   "error",
                            button: "OK",
                        }
                    )
            }

            // Ajax com Jquery e está refazendo apenas a tabela 
			$.post('PHP/consulta_produtos.php',desativar, function(data)
				{
					$('#table').html(data);
				}
			)            
        }      
    }
    // MODO POST
    xmlhttp.open("POST", "PHP/desativar_produto.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(desativar);
}


function deletar_produto(ID_para_deletar) 
{		
	var deletar = "codigo=" + encodeURIComponent(ID_para_deletar);

    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            switch (resposta)
            {
                case 'ok':
                    swal(
                        {
                            title:  "Produto foi deletado!",
                            text:   'Produto não está mais disponível no sistema!',
                            icon:   "success",
                            button: "OK",
                        }
                    )                   
                break;
                    
                default:
                    swal(
                        {
                            title:  "Problemas ao deletar!",
                            text:   "Por favor entrar em contato com o administrador do sistema!",
                            icon:   "error",
                            button: "OK",
                        }
                    )
            }

            // Ajax com Jquery e está refazendo apenas a tabela 
			$.post('PHP/consulta_produtos.php',deletar, function(data)
				{
					$('#table').html(data);
				}
			)
        }      
    }
    //MODO POST
    xmlhttp.open("POST", "PHP/deletar_produto.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(deletar);
}