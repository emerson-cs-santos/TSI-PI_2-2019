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

function preview_image(event) 
{
    var reader = new FileReader();
    reader.onload = 
        function()
        {
            var output = document.getElementById('produtos_digitar_IMG_inputfile');
            output.src = reader.result;
        }
    reader.readAsDataURL(event.target.files[0]);
}

function senha_habilitar() 
{
    var chksenha = document.getElementById('usuarios_digitar_chksenha');
    var txtsenha = document.getElementById('usuarios_digitar_senha');

    // Se marcado para definir/alterar a senha, será desabilitado o checkbox para fazer isso, pois precisamos dele marcado para saber se precisamos passar o MD5 quando estiver alterando o cadastro.
    if (chksenha.checked)
    {
        txtsenha.disabled=false;
        txtsenha.value = '';
        chksenha.disabled=true;
    }
}

function senha_exibir() 
{
    var chkexibirsenha = document.getElementById('usuarios_digitar_chkexibirsenha');
    var txtsenha = document.getElementById('usuarios_digitar_senha');

    if (chkexibirsenha.checked)
    {
        txtsenha.type='text';
    }
    else
    {
        txtsenha.type='password';
    }
}