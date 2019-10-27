function filtrar_usuario() 
{  
    var where = '';
   
    var filtro_codigo   = document.getElementById("usuarios_filtro_codigo").value;
    var filtro_login    = document.getElementById("usuarios_filtro_login").value;
    var filtro_email    = document.getElementById("usuarios_filtro_email").value;
    var filtro_status   = document.getElementById("usuarios_filtro_status").value;
   
    if(!filtro_codigo == '')
    {
        where = where + " and codigo = " + filtro_codigo;
    }

    if(!filtro_login == '')
    {
        where = " and nome like " + "'%" + filtro_login + "%'";
    }  
    
    if(!filtro_email == '')
    {
        where = " and email like " + "'%" + filtro_email + "%'";
    }        

   switch (filtro_status)
   {
        case 'Ativos':
            where = where + " and tipo ='Ativo' ";
        break;

        case 'Inativos':
            where = where + " and tipo ='Inativo' ";
        break;
   }

   // Tirando 1º and, é sempre colocado um and, pois não sabemos quais filtros serão utilizados
   if(!where == '')
   {
        where = " Where " + where.substring(5);
   } 
   
   var parametros = "filtro=" + where;
   // Ajax com Jquery e está refazendo apenas a tabela 
   $.post('PHP/consulta_usuarios.php',parametros, function(data)
       {
           $('#table').html(data);
           
       }
   )
}


function filtrar_produto() 
{  
   var filtro = document.getElementById("produtos_filtro_status").value;
   var where = '';

   switch (filtro)
   {
        case 'Ativos':
            where = " where tipo ='Ativo' ";
        break;

        case 'Inativos':
            where = " where tipo ='Inativo' ";
        break

        default:
            where = '';
   }

   // Filtrar precisa abrir a página novamente, por isso não se usa o AJAX
   // Neste caso chama a própria página de usuarios, mas passando da forma simples o modo POST (GET também funcionaria)
   // Mas para chamar neste modo precisa de um form, então criamos um e adicionamos na arvore DOM e usamos ela para chamar o PHP
   // Como se fosse um formulário que um usuário digitou e clicou em enviar (neste caso usamos o submit do proprio form).
   var form = document.createElement('FORM');

   // Para não ficar mostrando um mini form no canto da tela
   // Apenas usamos o form para fazer o filtro, não precisamos mostrar esse form criado aqui na tela
   form.hidden=true;

   form.action = 'Produtos.php';
   form.id='form_produtos_filtro';
   form.method='POST';
   
   var condicao_filtro = document.createElement("INPUT");
   condicao_filtro.id="";
   condicao_filtro.name='condicao_produto';
   condicao_filtro.value=where;
   form.appendChild(condicao_filtro);

   var opcao_usada = document.createElement("INPUT");
   opcao_usada.id="";
   opcao_usada.name='filtro_produto';
   opcao_usada.value=filtro;
   form.appendChild(opcao_usada);
   
   document.body.appendChild(form);
   
   form.submit();
}