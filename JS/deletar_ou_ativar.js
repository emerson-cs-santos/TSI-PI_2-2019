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
				case 'ok':
                    alert('Usuário foi inativado!');
                    
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

function deletar(teste) 
{
    alert(teste);  
}