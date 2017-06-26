/**
 * Created by fabiodisabatino on 22/04/17.
 */
var moduleGridZone=(function () {


    // return the next cursor of cursor passed as parameter
    __nextCursor=function ($cursor,orientation) {


        if (orientation==0 )
        {
              return $cursor.next();

        }
        else if (orientation == 90){

            var idCursor= $cursor.attr("id");
            var idnext=idCursor-10;
            if (idnext<10)
            {
                idnext="0"+idnext;
            }
            return $("#"+idnext);
        }
        else if(orientation==180){
            return $cursor.next();

        }
        else if (orientation==270){
            var idCursor= $cursor.attr("id");
            var idnext=parseInt(idCursor)+10;
            return $("#"+idnext);
        }
        else if(orientation==360)
        {
            return $cursor.prev();
        }




    };

    __prevCursor=function ($cursor, orientation) {

        if (orientation==0 || orientation==360)
        {
            return $cursor.prev();
        }
        else if( orientation==90){
            var idCursor= $cursor.attr("id");
            var idnext=parseInt(idCursor)-10;
            return $("#"+idnext);

        }
        else if (orientation==180){
            return $cursor.next();

        }
        else if (orientation==270){
            var idCursor= $cursor.attr("id");
            var idnext=parseInt(idCursor)+10;
            return $("#"+idnext);
        }


    };


    var __isPlaceable= function ($cursor,actualWeight,shipWeight,shipDim,orientation){

        var $cursor=__nextCursor($cursor,orientation);
        for(var i=0;i<shipDim-1;i++){
            if ($cursor.hasClass("placed ui-state-highlight") || $cursor.attr("id")==undefined )
            {
                return false
            }

            $cursor=__nextCursor($cursor,orientation);
        }

        if(actualWeight+shipWeight<=100)
        {
            return true

        }
        else
        {
            return false
        }


    };

    var __toogleOrientation= function (orientation){

        //return ((orientation+90)%360);
        if (orientation==0)
            return 90
        else if (orientation==90)
            return 180
        else if (orientation==180)
            return 270
        else if (orientation==270)
            return 360
    };

    //------------------------------------public method----------------------------------------//
    var init=function () {
        var heightText=$('.fleetWeight').height();
        var padding=(heightText-20)/20;
        $('.weightProgress').css("padding-top",padding);
    };

    var updateFleetWeight= function (actualWeight, shipWeight){

        $(".progress-bar")
            .css("width",actualWeight+shipWeight+"%")
            .attr("aria-valuenow",actualWeight+shipWeight)
            .text(actualWeight+shipWeight+"%");

    };

    var addClassPlaced= function ($cursor,shipDim,orientation) {
        console.log("add placed at: "+$cursor.attr("id"));
        $cursor.addClass( "placed ui-state-highlight " );
        $cursor=__nextCursor($cursor,orientation);

        for (var i=0;i<shipDim-2;i++)
        {
            console.log("add placed at: "+$cursor.attr("id"));
            $cursor.addClass( "placed ui-state-highlight noBorder-left" );
            $cursor=__nextCursor($cursor,orientation);
        }

        if (orientation==0)
        {
            $cursor.append('<span class="glyphicon glyphicon-repeat pull-right rotateIcon" aria-hidden="true"></span>');
            $cursor.attr("data-dim",shipDim).attr("data-orientation",0);
        }
        console.log("add placed at: "+$cursor.attr("id"));
        $cursor.addClass("placed ui-state-highlight noBorder-left");


    };

    var addClassOver= function ($cursor, shipDim, orientation) {

        for (var i=0;i<shipDim;i++)
        {
            $cursor.addClass( "over" );
            $cursor=__nextCursor($cursor,orientation);
        }

    };

    var removeClassOver= function ($cursor,shipDim,orientation) {

            for (var i=0;i<shipDim;i++)
            {
                $cursor.removeClass("over");
                $cursor=__nextCursor($cursor,orientation);
            }



    };

    var removeClassPlaced= function ($cursor,shipDim,orientation) {
        for (var i =0;i<shipDim;i++)
        {
            console.log("remove placed at :"+$cursor.attr("id"));
            $cursor=__prevCursor($cursor,orientation);
            $cursor.removeClass("placed ui-state-highlight noBorder-left");
        }
    };

    var setRotateShipEvent=function () {

        $('.rotateIcon').click(function () {

            var $cursor=$(this).parent();
            var shipDim= $cursor.attr("data-dim");
            var orientation= $cursor.attr("data-orientation");
            var toogledOrientation=__toogleOrientation($cursor.attr("data-orientation"));
            if(__isPlaceable($cursor,0,0,shipDim,toogledOrientation))
            {

                console.log("rotate from "+
                    orientation+ " at "+toogledOrientation);
                removeClassPlaced($cursor,shipDim,orientation);
                addClassPlaced($cursor,shipDim,toogledOrientation);
                if (toogledOrientation==360)
                {
                    console.log("ciao");
                    $cursor.attr("data-orientation",0);
                }
                else
                    $cursor.attr("data-orientation",toogledOrientation);

            }
            else
            {
                alert("Attention, it's not possible to turn the ship...")
            }

        })
    };




    return {
        initModule:init,
        isPlaceable: __isPlaceable,
        updateWeight:updateFleetWeight,
        addClassPlaced:addClassPlaced,
        addClassOver:addClassOver,
        removeClassOver:removeClassOver,
        removeClassPlaced:removeClassPlaced,
        setRotateEvent:setRotateShipEvent

    }


})();