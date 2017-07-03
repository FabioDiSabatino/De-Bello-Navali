/**
 * Created by Silvia on 11/05/2017.
 */

var moduleShipListPlayGame=(function () {

    var __templateBox="BoxShipList";
    var __templateWeapon='weaponShipList';

    var __getTemplate=function (template) {

        return $.get('module/moduleShipList/'+template+'.tpl')
    };

    //------------------------------------private method----------------------------------------//



    var __init= function(){
            var numberShip= GeneralShip.numberOfShip;
            var divider= 100/numberShip;
            //chiedere al net comunicator di farsi dare questo template
            $.when(__getTemplate(__templateBox),__getTemplate(__templateWeapon)).
                done(function(tplBox,tplWeapon){
                    for (var i=0;i<GeneralShip.Ship.length;i++)
                    {

                            var shipXGeneral=GeneralShip.Ship[i];

                            var shipsX=shipXGeneral.Istance;

                            for (var j=0;j<shipsX.length;j++){

                                var shipX=shipsX[j];
                                var ship={
                                    shipName:shipXGeneral.ShipName,
                                    shipImg:shipXGeneral.Img,
                                    shipID:shipX.ShipID
                                };

                                var templateBox= Mustache.to_html(tplBox[0], ship);
                                $(".fleetList").append(templateBox);
                                $(".cardShip").css("height", divider + "%");
                                var shipXWeapon=shipX.Weapon;


                                for (var y=0;y<shipXWeapon.length;y++)
                                {
                                    var weapon={
                                        WeaponName:shipXWeapon[y].WeaponName,
                                        TimeReload:shipXWeapon[y].TimeReload,
                                        Ammo:shipXWeapon[y].Ammo
                                    };


                                    var templateWeapon=Mustache.to_html(tplWeapon[0],weapon);
                                    $("#"+ship.shipID).find(".weaponShip").append(templateWeapon);
                                }

                                var dividerWeapon=100/shipXWeapon.length;
                                $(".rowWeapon").css("height",dividerWeapon+"%");








                            }





                    }


                })


    };



    //------------------------------------public method----------------------------------------//

    return{

        initModule:__init
    }


})();
