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
        where = where + " and nome like " + "'%" + filtro_login + "%'";
    }  
    
    if(!filtro_email == '')
    {
        where = where + " and email like " + "'%" + filtro_email + "%'";
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
   
   var parametros = "filtro=" + encodeURIComponent(where);
   // Ajax com Jquery e está refazendo apenas a tabela 
   $.post('PHP/consulta_usuarios.php',parametros, function(data)
       {
           $('#table').html(data);
           
       }
   )
}

function filtrar_produto() 
{  
    var where = '';
   
    var filtro_codigo       = document.getElementById("produtos_filtro_codigo").value;
    var filtro_produto      = document.getElementById("produtos_filtro_nome").value;
    var filtro_categoria    = document.getElementById("produtos_filtro_categoria").value;
    var filtro_status       = document.getElementById("produtos_filtro_status").value;
   
    if(!filtro_codigo == '')
    {
        where = where + " and codigo = " + filtro_codigo;
    }

    if(!filtro_produto == '')
    {
        where = where + " and nome like " + "'%" + filtro_produto + "%'";
    }  
    
    if(!filtro_categoria == '')
    {
        where = where + " and categoria like " + "'%" + filtro_categoria + "%'";
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
   
   var parametros = "filtro_produto=" + encodeURIComponent(where);
   // Ajax com Jquery e está refazendo apenas a tabela 
   $.post('PHP/consulta_produtos.php',parametros, function(data)
       {
           $('#table').html(data);
           
       }
   )
}