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


function funcao() 
{
    var inputfile = document.getElementById('produtos_digitar_inputfile');
    var imgsrc = document.getElementById('produtos_digitar_IMG_inputfile');

    imgsrc.src = "Imagens/Car_2.png"

     alert('teste'); 

     imgsrc.src = inputfile.Value;

  
}

