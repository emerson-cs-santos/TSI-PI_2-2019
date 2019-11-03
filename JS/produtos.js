function cadastro_produto() 
{
    var codigo      =   0;
    var nome        =   ''; 
    var status      =   '';  
    var categoria   =   '';
    var preco       =   '';
    var desconto    =   '';
    var estoque     =   '';
    var ean         =   '';
    var descri      =   '';

   // OBTENDO VALORES DO CADASTRO

   codigo       = document.getElementById("produtos_digitar_codigo").value;
   nome         = document.getElementById("produtos_digitar_nome").value;
   status       = document.getElementById("produtos_digitar_status").value;
   categoria    = document.getElementById("produtos_digitar_categoria").value;
   preco        = document.getElementById("produtos_digitar_preco").value;
   desconto     = document.getElementById("produtos_digitar_desconto").value;
   estoque      = document.getElementById("produtos_digitar_estoque").value;
   ean          = document.getElementById("produtos_digitar_ean").value;
   descri       = document.getElementById("produtos_digitar_descri").value;

    var cadastro = "codigo=" + codigo + "&nome=" + nome + "&status=" + status + "&categoria=" + categoria + "&preco=" + preco + "&desconto=" + desconto + "&estoque=" + estoque + "&ean=" + ean + "&descri=" + descri;

    // VALIDA CHARS
    if(char_especial(nome))
    {
        swal(
            {
                title: "Caracter(es) inválido(s)!",
                text: 'Não é permitido o uso de caracteres especiais! Exceto " _ "',
                icon: "warning",
                button: "OK",
            }
        )
        return;
    }

    // VERIFICA SE CAMPOS FORAM PREENCHIDOS
    if(nome == "")
    {
        swal(
            {
                title: "Campos obrigatórios não informados!",
                text: "Campos obrigatórios devem ser preenchidos!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    }

    swal_click = true;

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
                            title: "Tudo Certo!",
                            text: "Cadastro efetuado/atualizado com sucesso!",
                            icon: "success",
                            button: "OK",
                        }

                        ).then

                        (
                            (swal_click) => 
                                {

                                    // Gravando Imagem
                                    var fd = new FormData();
                                    var imagem = $('#produtos_digitar_inputfile');
                                    fd.append( 'myFile', imagem[0].files[0] );

                                    var acao = '';
                                    if(codigo>0)
                                    {
                                        acao = 'ALTERAR';
                                    }
                                    else
                                    {
                                        acao = 'INCLUIR';
                                    }
                                    fd.append('acao',acao);
                                    
                                    fd.append('codigo_imagem',codigo);

                                    $.ajax({
                                        url: 'PHP/imagem.php',
                                        data: fd,
                                        enctype: 'multipart/form-data',
                                        processData: false,
                                        contentType: false,
                                        type: 'POST',
                                        success: function(data)
                                        {
                                            if (data == 'erro')
                                            {
                                                swal(
                                                    {
                                                        title: "Problemas ao salvar Imagem!",
                                                        text: " Certifique-se de apenas enviar arquivos dos tipos .jpg, .jpeg, .png. Também verifique permissões de gravação no servidor!",
                                                        icon: "error",
                                                        button: "OK",
                                                    }
                                                )                                 
                                            }

                                            // Verifica se imagem foi salva
                                            verificar_imagem();                            
                                        }
                                    });                                    
                                    window.open("Produtos.php", '_self');
                                }
                        );
                break;
					
				case 'existente':
                    swal(
                        {
                            title: "Cadastro já existe!",
                            text: "Por favor verificar dados informados!",
                            icon: "warning",
                            button: "OK",
                        }
                    )
                break;
				
				 default:
                    swal(
                        {
                            title: "Problema ao efetuar Cadastro!",
                            text: "Por favor entrar em contato com o administrador do sistema!",
                            icon: "error",
                            button: "OK",
                        }
                    )
            }
        };      
    }

    // MODO POST
    xmlhttp.open("POST", "PHP/produtos.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(cadastro);     
}

// Valida se caminho da imagem foi gravado com sucesso
function verificar_imagem() 
{
    // Não validar caso não tenha sido selecionado alguma imagem para gravar
    verif_input_file = document.getElementById("produtos_digitar_inputfile").value;
    if(verif_input_file == '')
    {
        return false;
    }
    
    var codigo = 0;
    codigo = document.getElementById("produtos_digitar_codigo").value;
    var cadastro = "codigo=" + codigo;

   // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");

            if (resposta == 'erro')
            {                
                swal(
                    {
                        title: "Problemas ao salvar Imagem!",
                        text: " Certifique-se de apenas enviar arquivos dos tipos .jpg, .jpeg, .png. Também verifique permissões de gravação no servidor!",
                        icon: "error",
                        button: "OK",
                    }
                )                
            }
        };      
    }

    // MODO POST
    xmlhttp.open("POST", "PHP/imagem_verificar.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(cadastro);
}
