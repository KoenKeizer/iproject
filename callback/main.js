$(function() {

    // we maken een instantie aan van de JSONLoader
    var playlistLoader = new JSONLoader();
    // we roepen de functie load(url, callback) aan en geven een 'callback' functie door
    playlistLoader.load('data.json', function(data){
        // de callback functie krijgt de data mee (kijk maar in JSONLoader)
        console.log(data);
    });

});