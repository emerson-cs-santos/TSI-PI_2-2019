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
        alert('Não é permitido o uso de caracteres especiais! Exceto " _ "');
        return;
    }

    // VERIFICA SE CAMPOS FORAM PREENCHIDOS
    if(nome == "")
    {
        alert('Campos obrigatórios devem ser preenchidos!');
        return;
    }

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
                    alert('Cadastro efetuado/atualizado com sucesso!');
                    
                    window.open("Produtos.php",'_self'); 

                break;
					
				case 'existente':
                    alert('Cadastro já existe!');
                break;
				
				 default:
					alert('Problema ao efetuar Cadastro!');
			}
        };      
    }

    // MODO POST
    xmlhttp.open("POST", "PHP/produtos.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(cadastro);
}
