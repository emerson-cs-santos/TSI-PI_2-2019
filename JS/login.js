function login()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            
            var resposta = this.responseText;
            
            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");
            
            if (resposta == 'errado')
            {
                alert('Login ou senha incorretos!');
            }
            else
            {
                window.open("Index.html",'_self');
            }
        }       
    }     

    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;

    xmlhttp.open("GET", "PHP/login.php?login=" + login + "&senha=" + senha,true);

    xmlhttp.send();
}

function abrir_novo_cadastro() 
{
    document.getElementById("form_novo_cadastro").removeAttribute("hidden");
    document.getElementById("div_botao_cadastrar").removeAttribute("hidden");
}

function novo_cadastro() 
{
    
    // OBTENDO VALORES DOS CAMPOS DE NOVO CADASTRO
    var novo_login = document.getElementById("novo_login").value;
    var nova_senha = document.getElementById("nova_senha").value;
    var confirma_senha = document.getElementById("confirmar_senha").value;

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
            
            if (resposta == 'ok')
            {
                alert('Cadastro efetuado com sucesso!');
              //  window.open("Index.html",'_self');                
                
            }
            else
            {
                alert('Problema ao efetuar Cadastro!');
            }
        }       
    }

    xmlhttp.open("GET", "PHP/novo_user.php?login=" + novo_login + "&senha=" + nova_senha,true);

    xmlhttp.send();
}