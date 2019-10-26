function login() {
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;

    var params = "login=" + login + "&senha=" + senha;

    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var resposta = this.responseText;

            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");

            switch (resposta) {
                case 'ok':
                    window.open("Painel.php", '_self');
                    break;

                case 'Inativo':
                    swal(
                        {
                            title: "Usuário está inativo!",
                            text: "Por favor entrar em contato com o administrador do sistema!",
                            icon: "warning",
                            button: "OK",
                        }
                    )
                    break;

                case 'errado':
                    swal(
                        {
                            title: "Login ou senha incorretos!",
                            text: "Por favor verifique as informações digitadas!",
                            icon: "warning",
                            button: "OK",
                        }
                    )
                    break;

                default:
                    swal(
                        {
                            title: "Problemas com login!",
                            text: "Por favor entrar em contato com o administrador do sistema!",
                            icon: "error",
                            button: "OK",
                        }
                    )
            }
        }
    }

    // MODO POST
    xmlhttp.open("POST", "PHP/login.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);

    // MODO GET
    // xmlhttp.open("GET", "PHP/login.php?" + params,true);
    // xmlhttp.send();
}

function abrir_novo_cadastro() 
{
    if ($("#formContent").css("display") == "block") 
    {
        document.getElementById("form_novo_cadastro").removeAttribute("hidden");
        document.getElementById("div_botao_cadastrar").removeAttribute("hidden");
        document.getElementById("formContent").style.display = 'none';
    }
    else
    {
        $("#form_novo_cadastro").attr("hidden",true);
        $("#div_botao_cadastrar").attr("hidden", true);
        $("#formContent").css("display","block");
    }
}


function novo_cadastro(tipo) {
    var novo_login = '';
    var nova_senha = '';
    var codigo = 0;
    var confirma_senha = '';
    var status = '';

    // OBTENDO VALORES DOS CAMPOS DE NOVO CADASTRO

    switch (tipo) {
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
            swal(
                {
                    title: "Problema ao efetuar Cadastro!",
                    text: "Por favor entrar em contato com o administrador do sistema!",
                    icon: "error",
                    button: "OK",
                }
            )
    }

    var fazer_md5_alteracao = 'NAO';

    // Definindo se vai ser feito MD5 na alteração
    if (tipo == 'cadastro') {
        var chksenha = document.getElementById('usuarios_digitar_chksenha');
        if (chksenha.disabled == true) {
            fazer_md5_alteracao = 'SIM';
        }
    }

    var novo_cadastro = "login=" + novo_login + "&senha=" + nova_senha + "&tipo=" + tipo + "&codigo=" + codigo + "&status=" + status + "&md5alteracao=" + fazer_md5_alteracao;

    // VALIDA CHARS
    if (char_especial(novo_login) || char_especial(nova_senha) || char_especial(confirma_senha)) {
        swal(
            {
                title: "Caracter(es) inválido(s)!",
                text: 'Não é permitido o uso de caracteres especiais! Exceto " _ "',
                icon: "warning",
                button: "OK",
            }
        )
        return;
    };

    // VALIDA SE TEM ESPAÇO
    if (valida_espaco(novo_login) || valida_espaco(nova_senha) || valida_espaco(confirma_senha)) {
        swal(
            {
                title: "Espaço não é permitido!",
                text: 'Não é permitido o uso espaço! Nem entre ou dentro das palavras!',
                icon: "warning",
                button: "OK",
            }
        )
        return;
    };

    // VERIFICA SE CAMPOS FORAM PREENCHIDOS
    if (novo_login == "") {
        swal(
            {
                title: "Login não informado!",
                text: "Por favor preencher o login!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    };

    if (nova_senha == "" || confirma_senha == "") {
        swal(
            {
                title: "Campos de senha não preenchidos!",
                text: "Por favor preencher ambos campos da senha!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    };

    // VERIFICAR SENHAS DIGITAS
    if (nova_senha != confirma_senha) {
        swal(
            {
                title: "Senhas não conferem!",
                text: "Senhas digitadas têm que ser iguais!",
                icon: "warning",
                button: "OK",
            }
        )
        return;
    };

    swal_click = true;
    // AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var resposta = this.responseText;

            // Tirando ENTER
            resposta = resposta.replace(/(\r\n|\n|\r)/gm, "");

            switch (resposta) {
                case 'ok':
                    swal
                        (
                        {
                            title: "Tudo Certo!",
                            text: "Cadastro efetuado com sucesso!",
                            icon: "success",
                            button: "OK",
                        }

                        ).then

                        (
                        (swal_click) => {
                            if (tipo == 'cadastro') {
                                window.open("Usuarios.php", '_self');
                            }
                            else {
                                window.open("Painel.php", '_self');
                            }
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
    xmlhttp.open("POST", "PHP/novo_user.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(novo_cadastro);
}