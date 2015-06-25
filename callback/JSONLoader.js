/**
 * de constructor van JSONLoader. Hierbinnen doen we niets
 * maar nu kunnen we wel nieuwe instanties aanmaken
 */
function JSONLoader()
{
}

JSONLoader.prototype.load = function(url, callback)
{
    // om data op te kunnen halen hebben we een XMLHttpRequest nodig
    var xmlhttp = new XMLHttpRequest();
    // je geeft eerst de method GET/POST en de url door
    xmlhttp.open("GET", url);
    xmlhttp.send(); // met send() halen we de data op (asynchroon)

    // we luisteren of er iets gebeurd (foutmelding of succes)
    // we moeten wel luisteren aangezien send() asynchroon gebeurd.
    xmlhttp.addEventListener('readystatechange', function () {
        // readyState 4 is 'request finished and response is ready' oftewel 'send()' is klaar
        // status 200 betekent 'bestand gevonden' oftewel: ophalen was een succes
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // als er een functie is doorgegeven dan roepen we hem aan en we geven de data door
            if(callback)
            {
                // de data is in JSON formaat. Met JSON.parse() zetten we het eerst om naar een echt object
                callback( JSON.parse(xmlhttp.responseText) );
            }
        }
    });
};
