function filtrar_usuario() 
{  
    var filtro_codigo   = document.getElementById("usuarios_filtro_codigo").value;
    var filtro_login    = document.getElementById("usuarios_filtro_login").value;
    var filtro_email    = document.getElementById("usuarios_filtro_email").value;
    var filtro_status   = document.getElementById("usuarios_filtro_status").value;

    var parametros = "filtro_codigo=" + encodeURIComponent(filtro_codigo) + "&filtro_login=" + encodeURIComponent(filtro_login) + "&filtro_email=" + encodeURIComponent(filtro_email) + "&filtro_status=" + encodeURIComponent(filtro_status);
    
    // Ajax com Jquery e está refazendo apenas a tabela 
    $.post('PHP/consulta_usuarios.php',parametros, function(data)
        {
            $('#table_consulta_usuarios').html(data);
        }
    )
}

function filtrar_produto() 
{  
    var filtro_codigo       = document.getElementById("produtos_filtro_codigo").value;
    var filtro_produto      = document.getElementById("produtos_filtro_nome").value;
    var filtro_categoria    = document.getElementById("produtos_filtro_categoria").value;
    var filtro_status       = document.getElementById("produtos_filtro_status").value;    

    var parametros = "filtro_codigo=" + encodeURIComponent(filtro_codigo) + "&filtro_produto=" + encodeURIComponent(filtro_produto) + "&filtro_categoria=" + encodeURIComponent(filtro_categoria) + "&filtro_status=" + encodeURIComponent(filtro_status);    
    
   // Ajax com Jquery e está refazendo apenas a tabela 
   $.post('PHP/consulta_produtos.php',parametros, function(data)
       {
           $('#table_consulta_produtos').html(data);
       }
   )
}