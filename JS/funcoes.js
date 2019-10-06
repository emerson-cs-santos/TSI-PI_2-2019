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

function preview_image(event) 
{
    var reader = new FileReader();
    reader.onload = 
        function()
        {
            var output = document.getElementById('produtos_digitar_IMG_inputfile');
            output.src = reader.result;
        }
    reader.readAsDataURL(event.target.files[0]);
}