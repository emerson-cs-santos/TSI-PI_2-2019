function filtrar(tipo) 
{
    switch (tipo)
    {
        case 'usuarios':
            
        break;
            
        case 'produtos':

        break;
        
         default:
            alert('Problema ao executar filtro!');
            return;

    }    
    
   codigo = document.getElementById("produtos_digitar_codigo").value;

    var filtro = "codigo=" + codigo;

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

                    window.open("Usuarios.php",'_self'); 

                break;
					
				 default:
					alert('Problema ao realizar filtro');
			}
        };      
    }

    // MODO POST
    xmlhttp.open("POST", "PHP/produtos.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(filtro);
}