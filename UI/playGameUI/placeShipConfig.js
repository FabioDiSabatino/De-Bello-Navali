/**
 * Created by fabiodisabatino on 11/03/17.
 */
(function (metaData) {
    $(document).ready(function () {

        $('.contentMain').matchHeight({
            property: 'height',
            target: $('.bodySize')

        })

        setFlagBanner();




    })



}());

var setFlagBanner=function () {

    $('.flagBanner').append("<img src="+metaData.flagBanner+" class=flagImg>");
    $('.fleetName').text(metaData.fleet);
}

var setShipList= function () {
    for(var i=0;i<metaData.numberShip;i++)
    {   //riempire con i dati delle ship la relativa card, per ogni ship della flotta
        $.get('shipCardTemplate.html')
            .success(function(data) {
                $('.listShip').html(data);
            });
    }

}