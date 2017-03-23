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
        setGridZone();
        setTimerZone();





    })



}());

var setFlagBanner=function () {
    $('.navbar-brand').append(" <img class='flagCivilization' alt='Brand' src="+metaData.flagCivilitazion+">");
    $('.navbar-header').append("<p class='fleetName navbar-text'>"+metaData.fleetName+"</p>");

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

var setGridZone=function () {

    var heightText=$('.fleetWeight').height();
    var padding=(heightText-20)/20;
    $('.weightProgress').css("padding-top",padding);







}

var setTimerZone=function () {

    clock = new FlipClock($('.timer'), 180, {
        //autoStart:false,
        countdown:true,
        // Create a minute counter
        clockFace: 'MinuteCounter',

        // The onStart callback
        onStart: function() {
            // Do something
        },

        // The onStop callback
        onStop: function() {
            // Do something
        },

        // The onReset callback
        onReset: function() {
            // Do something
        }
    });
    $('.flip-clock-label').remove();
    $('.minutes').remove();



}


