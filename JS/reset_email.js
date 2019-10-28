function login_verif()
{
    var parametros = "login=" + document.getElementById('login_usuario_reset').value;    

    $.post('PHP/verif_login.php',parametros, function(data)
        {
            switch (data)
            {
                case 'existente':
                    // Marcar passo 1 como OK
                    passos_reset_email('1','OK');
                break;

                case 'nao':
                    // Marcar passo 1 como Pendente
                    passos_reset_email('1','Pendente');
                break;                
                    
                default:
                swal(
                    {
                        title:  "Problemas ao encontrar usuário!",
                        text:   "Por favor entrar em contato com o administrador do sistema!",
                        icon:   "error",
                        button: "OK",
                    }
                )
                passos_reset_email('1','Pendente');                  
            }
        }
    )
}


function enviar_email()
{
    var parametros = '';
    var email = '';
    var resposta = '';
    var login = '';

    // Gera e grava código de reset do e-mail
    // Retorna endereço de e-mail do login
    login = document.getElementById('login_usuario_reset').value; 
    parametros = "login=" + login;  
    $.post('PHP/cod_reset_email.php',parametros, function(data)
        {
            // Converter array do php em objeto
            resposta = JSON.parse(data);

            switch (resposta.status)
            {
                
                case 'ok':
                    cod_random = resposta.cod_random;
                    email = resposta.email;

                    // Envio de e-mail
                    parametros = "cod_random=" + cod_random + "&email=" + email + "&login=" + login;
                    // Ajax com Jquery e está refazendo apenas a tabela 
                    $.post('PHP/PHPMailer.php',parametros, function(data)
                        {
                            
                            data = 'ok';
                            
                            if(data=='ok')
                            {
                                passos_reset_email('2','OK');  
                                swal(
                                    {
                                        title:  "Mensagem enviada!",
                                        text:   "Por favor verifique sua caixa de E-mail e Spam!",
                                        icon:   "success",
                                        button: "OK",
                                    }
                                )   

                            }
                            else
                            {
                                passos_reset_email('2','Pendente');  
                                swal(
                                    {
                                        title:  "Problema ao enviar e-mail!",
                                        text:   "Por favor verificar e-mail informado!",
                                        icon:   "error",
                                        button: "OK",
                                    }
                                )                                   
                            }
                        }
                    )
                break; 
        
                case 'nao':
                    swal(
                        {
                            title:  "Usuário não encontrado!",
                            text:   "Por favor entrar em contato com o administrador do sistema!",
                            icon:   "warning",
                            button: "OK",
                        }
                    )                    
                    // Marcar passo como Pendente
                    passos_reset_email('2','Pendente');
                    return false;               
                    
                default:
                swal(
                    {
                        title:  "Problemas ao encontrar usuário!",
                        text:   "Por favor entrar em contato com o administrador do sistema!",
                        icon:   "error",
                        button: "OK",
                    }
                )
                passos_reset_email('2','Pendente');
                return false;               
            }              
        }
    )
}

function confimar_codigo()
{
    var parametros = "cod_random=" + document.getElementById('login_codigo_email').value;    

    $.post('PHP/confirma_codigo_email.php',parametros, function(data)
        {
            switch (data)
            {
                case 'ok':
                    passos_reset_email('3','OK');

                    swal(
                        {
                            title:  "Código OK!",
                            text:   "Por favor inserir nova senha",
                            icon:   "success",
                            button: "OK",
                        }
                    )                    

                    var senha = document.getElementById('login_reset_senha');
                    senha.disabled=false;
                    var confirm_senha = document.getElementById('login_reset_nova_senha');
                    confirm_senha.disabled=false;

                    login = document.getElementById('login_usuario_reset'); 
                    login.disabled=true;

                break;

                case 'nao':
                    swal(
                        {
                            title:  "Código inválido!",
                            text:   "Por favor verificar código enviado ao seu e-mail!",
                            icon:   "warning",
                            button: "OK",
                        }
                    )
                    passos_reset_email('3','Pendente');
                break;                
                    
                default:
                swal(
                    {
                        title:  "Problemas ao encontrar usuário!",
                        text:   "Por favor entrar em contato com o administrador do sistema!",
                        icon:   "error",
                        button: "OK",
                    }
                )
                passos_reset_email('3','Pendente');                  
            }
        }
    )
}

function nova_senha()
{
    
    login = document.getElementById('login_usuario_reset').value; 
    var nova_senha = document.getElementById('login_reset_senha').value;
    var confirma_senha = document.getElementById('login_reset_nova_senha').value;

    // VALIDA CHARS
    if (char_especial(nova_senha) || char_especial(confirma_senha)) 
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

    // VALIDA SE TEM ESPAÇO
    if (valida_espaco(nova_senha) || valida_espaco(confirma_senha)) 
    {
        swal(
            {
                title: "Espaço não é permitido!",
                text: 'Não é permitido o uso espaço! Nem entre ou dentro das palavras!',
                icon: "warning",
                button: "OK",
            }
        )
        return;
    } 

    if (nova_senha == "" || confirma_senha == "") 
    {
        swal(
            {
                title: "Campos de senha não preenchidos!",
                text: "Por favor preencher ambos campos da senha!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    }

    // VERIFICAR SENHAS DIGITAS
    if (nova_senha != confirma_senha) 
    {
        swal(
            {
                title: "Senhas não conferem!",
                text: "Senhas digitadas têm que ser iguais!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    }
    
    var parametros = "login=" + login + "&senha=" + nova_senha;    
    swal_click = true;
    $.post('PHP/reset_senha.php',parametros, function(data)
        {
            switch (data)
            {
                case 'ok':
                passos_reset_email('4','OK');
                var senha = document.getElementById('login_reset_senha');
                senha.disabled=true;
                var confirm_senha = document.getElementById('login_reset_nova_senha');
                confirm_senha.disabled=true;                
                swal
                    (
                    {
                        title:  "Senha alterada!",
                        text:   "Por favor fazer login com a nova senha!",
                        icon:   "success",
                        button: "OK",
                    }

                    ).then

                    (
                    (swal_click) => {
                        window.open("Painel.php", '_self');
                    }
                    );
                break;

                default:
                swal(
                    {
                        title:  "Problemas ao redefinir senha!",
                        text:   "Por favor entrar em contato com o administrador do sistema!",
                        icon:   "error",
                        button: "OK",
                    }
                )
                passos_reset_email('4','Pendente');                  
            }
        }
    )
}

// Marca os passos de resetar os e-mail como OK
function passos_reset_email(passo,tipo)
{
    var mudar_status = document.getElementById('passo' + passo);
    var cor='';
    if(tipo=='OK')
    {
        cor = 'blue';
    }
    else
    {
        cor = 'red';
    }
    mudar_status.style.color = cor;
    mudar_status.innerHTML = tipo +'!';
}