window.addEventListener('load', function () {
    "use strict";
    const URL_OFFERS = 'getOffers.php';
    const URL_OFFERS_XML = 'getOffers.php?useXML';

    function fetchOffer() {
        fetch(URL_OFFERS)
            .then(
                function (response) {
                    return response.text();
                })
            .then(
                function (data) {
                    console.log(data);
                    document.getElementById("offers").innerHTML = data;
                })
            .catch(
                function (err) {
                    console.log("Something went wrong!", err);
                });
    }
    fetchOffer();
    setInterval(function(){ fetchOffer() }, 5000);

    function fetchXMLOffers() {
        fetch(URL_OFFERS_XML)
            .then(
                function (response) {
                    return response.text();
                })
            .then(
                function (data) {
                    console.log(data);
                    let parser = new DOMParser();
                    let xmlDoc = parser.parseFromString(data, "text/xml");
                    document.getElementById("XMLoffers").innerHTML = data;

                })
            .catch(
                function (err) {
                    console.log("Something went wrong!", err);
                });
    }
    fetchXMLOffers();
});