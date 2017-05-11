/**
 * Created by fabiodisabatino on 22/04/17.
 */
var moduleGridZone=(function () {


    var __isPlaceable= function (cursor,actualWeight,shipWeight,shipDim){

        for(i=0;i<shipDim;i++){
            cursor.removeClass( "over" );
            if ($(cursor).hasClass("placed ui-state-highlight"))
            {
                return false;
            }

            cursor=$(cursor).next();
        }

        if(actualWeight+shipWeight<=100)
        {
            return true;
            __updateFleetWeight(actualWeight,shipWeight);

        }
        else
            return false;

    };

    var __updateFleetWeight= function (actualWeight, shipWeight){

        $(".progress-bar")
            .css("width",actualWeight+shipWeight+"%")
            .attr("aria-valuenow",actualWeight+20)
            .text(actualWeight+shipWeight+"%");

    };


    //------------------------------------public method----------------------------------------//
    var init=function () {
        var heightText=$('.fleetWeight').height();
        var padding=(heightText-20)/20;
        $('.weightProgress').css("padding-top",padding);
    };


    return {
        initModule:init,
        isPlaceable:__isPlaceable

    }


})();