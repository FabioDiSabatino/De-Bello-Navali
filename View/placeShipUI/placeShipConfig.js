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
                        shipName:metaData.ship[i].substring(2),
                        shipImg:metaData.shipImg[i],
                        shipWeightImg:metaData.shipWeightImg[i],
                        shipWeight:metaData.shipWeight[i],
                        shipDim: metaData.ship[i].substring(0,1)

                    }
                console.log(data);
                var tpl=Mustache.to_html(template,data);
                $(".listShip").append(tpl);
                }
                $(".shipCard").css("height",divider+"%");

                setDragable();


})};

var setDragable=function () {
    $( ".shipImg" ).draggable({
        addClasses: false,
        revert:true
    });

    $( ".colGrid" ).droppable({
        out:function (event,ui) {
            console.log("fuori");
            var id=parseInt($(this).attr('id'));
            var dim=$(ui.draggable).attr("data-dim");
            $( this ).removeClass( "over" );
            var cursor=this;
            for(i=1;i<dim;i++){
                $(cursor).next().removeClass( "over" );
                cursor=$(cursor).next();
            }

        },
        over:function (event,ui) {

            console.log("sopra");
            var id=parseInt($(this).attr('id'));
            var dim=$(ui.draggable).attr("data-dim");
            $( this ).addClass( "over" );
            var cursor=this;
            for(i=1;i<dim;i++){
                $(cursor).next().addClass( "over" );
                cursor=$(cursor).next();

            }

        },

        drop: function( event, ui ) {
            var id=parseInt($(this).attr('id'));
            var dim=$(ui.draggable).attr("data-dim");
            $( this ).addClass( "placed ui-state-highlight" ).removeClass( "over" );
            var cursor=this;
            for(i=1;i<dim;i++){
                $(cursor).next().addClass( "placed ui-state-highlight" ).removeClass( "over" );
                cursor=$(cursor).next();
            }
        }
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


