<?php  

// Valida Char especial, exceto _
function char_especial(string $campo) : bool 
{
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $campo))
    {
        return true;
    }    
    else
    {
        return false;
    }
}

// Valida se tem espaço
function valida_espaco(string $campo) : bool 
{
    if (preg_match('/ /', $campo))
    {
        return true;
    }    
    else
    {
        return false;
    }
}

// Valida e-mail
function validar_email(string $email) : bool 
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
        return false;
    }
}


?>