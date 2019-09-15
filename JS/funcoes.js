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


function teste() 
{
 //   alert('teste');  
}
