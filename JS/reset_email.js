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