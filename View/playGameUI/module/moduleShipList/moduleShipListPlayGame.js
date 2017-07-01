/**
 * Created by Silvia on 11/05/2017.
 */

var moduleShipListPlayGame=(function () {

var init= function(){
    var numberShip= 2;
    // var size= 100/numberShip;
    $.get('BoxShipList.tpl')
        .success(function(tpl)  {
            for (var i = 0; i < numberShip; i++){
                var ship = {
                    shipName: GeneralShip.Ship3[1].substring(),
                    shipImg: GeneralShip.Ship3[3].substring(),
                            };
                var template = Mustache.to_html(tpl, ship);
                $(".fleetList").append(template);
                                                }
            $("BoxShipList").css('')
                                })

                    };
});
