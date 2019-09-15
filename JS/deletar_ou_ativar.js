function desativar(ID_para_desativar) 
{
    var desativar = "codigo=" + ID_para_desativar;

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
				case 'Ativo':
                    alert('Usuário foi Ativado!');
                    window.open("usuarios.php",'_self'); 
                break;

                case 'Inativo':
                    alert('Usuário foi Inativado!');
                    window.open("usuarios.php",'_self');                     
                break;
					
				 default:
					alert('Problemas ao inativar!');
			}
        };      
    }
    // MODO POST
    xmlhttp.open("POST", "PHP/desativar.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(desativar);
}

function deletar(ID_para_deletar) 
{
    var deletar = "codigo=" + ID_para_deletar;

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
                    alert('Usuário foi Deletado!');
                    window.open("usuarios.php",'_self'); 
                break;
                    
                    default:
                    alert('Problemas ao deletar!');
            }
        };      
    }
    // MODO POST
    xmlhttp.open("POST", "PHP/deletar.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
    xmlhttp.send(deletar);
}