

function display_database(databaseName)
{
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
            if(databaseName == 'damfridge')
            {
              document.getElementById('fridge-content').innerHTML = this.responseText;
            }
    };
    xhttp.open("GET", "dbconnect.php?q="+databaseName, true);
    xhttp.send();
}


display_database('damfridge');
