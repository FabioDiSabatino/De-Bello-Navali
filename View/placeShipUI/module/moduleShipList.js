/**
 * Created by fabiodisabatino on 22/04/17.
 */
var moduleShipList=(function () {


    //------------------------------------private method----------------------------------------//

    var __initDragable=function () {
        $( ".shipImg" ).draggable({
            addClasses: false,
            revert:true
        });

        $( ".colGrid" ).droppable({

            over:function (event,ui) {
                var id=parseInt($(this).attr('id'));
                var dim=$(ui.draggable).attr("data-dim");
                $( this ).addClass( "over" );
                var cursor=this;
                for(i=1;i<dim;i++){
                    $(cursor).next().addClass( "over" );
                    cursor=$(cursor).next();

                }

            },
            out:function (event,ui) {
                var id=parseInt($(this).attr('id'));
                var dim=$(ui.draggable).attr("data-dim");
                var cursor=this;
                if($(cursor).prev().hasClass("over"))
                {
                    //spostamento a sx
                    cursor=$(cursor).next().next();
                    $(cursor).removeClass( "over" );
                }
                else
                {
                    //spostamento a dx
                    $( cursor ).removeClass( "over" );
                    for(i=1;i<dim;i++){
                        $(cursor).next().removeClass( "over" );
                        cursor=$(cursor).next();
                    }
                }



            },

            drop: function( event, ui ) {
                var id=parseInt($(this).attr('id'));
                var dim=$(ui.draggable).attr("data-dim");
                var position=parseInt($(this).attr('id'));
                var actualWeight=parseInt($('.progress-bar').attr("aria-valuenow"));
                var shipWeight=parseInt($(ui.draggable).parent().next().attr("data-weight"));
                console.log($(ui.draggable).parent().next().attr("data-weight"));
                var cursor=this;
                var valid=true;
                for(i=0;i<dim;i++){
                    $(cursor).removeClass( "over" );
                    if ($(cursor).hasClass("placed ui-state-highlight"))
                    {
                        valid=false;
                    }

                    cursor=$(cursor).next();
                }
                if(valid )
                {


                    if(actualWeight+shipWeight<=100)
                    {
                        $(".progress-bar")
                            .css("width",actualWeight+shipWeight+"%")
                            .attr("aria-valuenow",actualWeight+20)
                            .text(actualWeight+shipWeight+"%");
                        //posizione valida
                        cursor= $(this);
                        $(this).addClass( "placed ui-state-highlight" );
                        for(i=1;i<dim;i++){
                            $(cursor).next().addClass( "placed ui-state-highlight" );
                            cursor=$(cursor).next();
                        }
                        placeShipController.addShip(dim,position);

                    }
                    else
                    {
                        alert("Attention ship too heavy!! ")
                    }


                }
                else
                {
                    alert("Attention please! It's impossible to place a ship here square not empty...")
                }
            }
        });

    }


    //------------------------------------public method----------------------------------------//
    var init=function () {
        var numberShip=metaData.numberShip;
        var divider= 100/numberShip;
        $.get('../placeShipUI/shipCard.tpl')
            .success(function(template) {
                for (var i = 0; i < numberShip; i++) {
                    var data = {
                        shipName: metaData.ship[i].substring(2),
                        shipImg: metaData.shipImg[i],
                        shipWeightImg: metaData.shipWeightImg[i],
                        shipWeight: metaData.shipWeight[i],
                        shipDim: metaData.ship[i].substring(0, 1)

                    }
                    var tpl = Mustache.to_html(template, data);
                    $(".listShip").append(tpl);
                }
                $(".shipCard").css("height", divider + "%");

                __initDragable();

            })};



    //return an object with only public method
    return {
        initModule:init
    }


})();