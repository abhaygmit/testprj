function submit_form(id)
{
    document.getElementById(id).submit();
}


function reset_form(id)
{
    document.getElementById(id).reset();
}

function confirmdeletetreatment(id)
{
    if(confirm('Are you sure you want to delete records?'))
    {
        window.location.href= WEBSITEURLFORJAVASCRIPT+'home/delete_treatmenttype/'+id;
        return true;
    }
    else
    {
        return false;
    }
}