/**
 * Created by fabiodisabatino on 22/04/17.
 */
var moduleGridZone=(function () {


    //------------------------------------public method----------------------------------------//
    var init=function () {
        var heightText=$('.fleetWeight').height();
        var padding=(heightText-20)/20;
        $('.weightProgress').css("padding-top",padding);
    }


    return {
        initModule:init
    }


})();