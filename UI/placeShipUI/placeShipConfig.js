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
        setShipList();




    })



}());

var setFlagBanner=function () {
    $('.flagBanner').append("<p class='fleetName '>"+metaData.fleet+"</p>");
    $('.flagBanner').append("<img class='flagImg img-circle' src="+metaData.flagBanner+">");
}

var setShipList= function () {

        var numberShip=metaData.numberShip;
        var divider= 100/numberShip;
        console.log(divider);
        $.get('../placeShipUI/shipCard.tpl')
            .success(function(template) {
                for(var i=0;i<numberShip;i++)
                {
                    var data={
                        shipName:metaData.ship[i],
                        shipImg:metaData.shipImg[i],
                        shipWeightImg:metaData.shipWeightImg[i],
                        shipWeight:metaData.shipWeight[i]

                    }
                console.log(data);
                var tpl=Mustache.to_html(template,data);
                $(".listShip").append(tpl);
                }
                $(".shipCard").css("height",divider+"%");


            });


}