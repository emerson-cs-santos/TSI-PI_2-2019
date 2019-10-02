// VALIDA CARACTERES ESPECIAIS
function char_especial(campo) 
{
    var format = /[!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?]+/;

    if (format.test(campo))
    {
        return(true);
    }

    return(false);
}

// VALIDA SE TEM ESPAÇO
function valida_espaco(campo) 
{
    if (/\s/.test(campo))
    {
        return(true);
    }

    return(false);
}


function tratar_imagem() 
{
   // OBTENDO VALORES

   var form = document.getElementById('form_produtos'); 

   var cadastro = "arquivo=" + form;

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
    xmlhttp.open("POST", "PHP/teste_imagem.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(cadastro);
}

  


