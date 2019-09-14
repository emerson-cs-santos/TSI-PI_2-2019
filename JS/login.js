function login()
{
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;

    var params = "login=" + login + "&senha=" + senha;

    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            if (resposta == 'ok')
            {
                window.open("Painel.php",'_self');
            }
            else
            {
                alert('Login ou senha incorretos!');
            }
        }       
    }     

    // MODO POST
        xmlhttp.open("POST", "PHP/login.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    
        xmlhttp.send(params);

    // MODO GET
        // xmlhttp.open("GET", "PHP/login.php?" + params,true);
        // xmlhttp.send();
}

function abrir_novo_cadastro() 
{
    document.getElementById("form_novo_cadastro").removeAttribute("hidden");
    document.getElementById("div_botao_cadastrar").removeAttribute("hidden");
}

function novo_cadastro(tipo) 
{
    var novo_login = '';
    var nova_senha = '';
    var codigo = 0;
    var confirma_senha = '';  
    var status='' ;

   // OBTENDO VALORES DOS CAMPOS DE NOVO CADASTRO

    switch (tipo)
    {
        case 'cadastro':
            novo_login = document.getElementById("usuarios_digitar_login").value;
            nova_senha = document.getElementById("usuarios_digitar_senha").value;
            confirma_senha = nova_senha;

            codigo = document.getElementById("usuarios_digitar_codigo").value;
            status = document.getElementById("usuarios_digitar_status").value;
        break;
            
        case 'login':
            novo_login = document.getElementById("novo_login").value;
            nova_senha = document.getElementById("nova_senha").value;
            confirma_senha = document.getElementById("confirmar_senha").value;
        break;
        
         default:
            alert('Problema ao efetuar Cadastro!');
    }

    var novo_cadastro = "login=" + novo_login + "&senha=" + nova_senha + "&tipo=" + tipo + "&codigo=" + codigo + "&status=" + status;

    // VALIDA CHARS
    if(char_especial(novo_login) || char_especial(nova_senha) || char_especial(confirma_senha))
    {
        alert('Não é permitido o uso de caracteres especiais! Exceto " _ "');
        return;
    };
 
    // VALIDA SE TEM ESPAÇO
    if (valida_espaco(novo_login) || valida_espaco(nova_senha) || valida_espaco(confirma_senha) ) 
    {
        alert('Não é permitido usar espaço!');
        return;
    };

    // VERIFICA SE CAMPOS FORAM PREENCHIDOS
    if(novo_login == "")
    {
        alert('Novo login não informado!');
        return;
    };

    if(nova_senha == "" || confirma_senha == "")
    {
        alert('Por favor preencher ambos campos da senha!');
        return;
    };

    // VERIFICAR SENHAS DIGITAS
    if(nova_senha != confirma_senha )
    {
        alert('Senhas digitadas não conferem!');
        return;
    };
      

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
                    alert('Cadastro efetuado com sucesso!');
                    
                    if(tipo=='cadastro')
                    {
                        window.open("Usuarios.php",'_self'); 
                    }
                    else
                    {
                        window.open("Painel.html",'_self'); 
                    }
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
    xmlhttp.open("POST", "PHP/novo_user.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(novo_cadastro);
   
   // MODO GET
   // xmlhttp.open("GET", "PHP/novo_user.php?" + novo_cadastro,true);
   // xmlhttp.send();
}