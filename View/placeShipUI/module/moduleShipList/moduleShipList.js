/**
 * Created by fabiodisabatino on 22/04/17.
 */
var moduleShipList=(function () {


    //------------------------------------private method----------------------------------------//



    var __rotateShip= function () {
        
    }

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
                var cursor=$(this);
                var id=parseInt(cursor.attr('id'));
                var dim=$(ui.draggable).attr("data-dim");
                if(cursor.prev().hasClass("over"))
                {
                    //spostamento a sx
                    var dim=$(ui.draggable).attr("data-dim");
                    for( var i=1;i<dim;i++) {
                        cursor = cursor.next();
                        console.log(cursor.attr('id'));
                    }

                        cursor.removeClass( "over" );
                        console.log(" sto rimuovendo "+cursor.attr('id'));



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


                var id=parseInt($(ui).attr('id'));
                var dim=$(ui.draggable).attr("data-dim");
                var position=parseInt($(this).attr('id'));
                var actualWeight=parseInt($('.progress-bar').attr("aria-valuenow"));
                var shipWeight=parseInt($(ui.draggable).parent().next().attr("data-weight"));

                var cursor=$(this);

                    if(moduleGridZone.isPlaceable(cursor,actualWeight,shipWeight,dim))
                    {
                        //posizione valida e fleet weight sufficiente
                        cursor.addClass("placed ui-state-highlight ");

                        for(i=1;i<dim;i++){
                            cursor=cursor.next();
                            cursor.addClass( "placed ui-state-highlight noBorder-left" );
                            console.log(cursor.attr('id'));
                        }

                        //ultima col aggiunge anche il bottore per cambiare orientamento

                        cursor.append('<span class="glyphicon glyphicon-repeat pull-right rotateIcon" aria-hidden="true"></span>').
                        addClass("placed ui-state-highlight noBorder-left");

                        // chiamare il controller per comunicare al server che si è piazzata una nave
                        placeShipController.addShip(dim,position);

                    }
                    else
                    {
                        alert("Attention ship too heavy!! ")
                    }

            }
        });

    };




    //------------------------------------public method----------------------------------------//
    var init=function () {
        var numberShip=metaData.numberShip;
        var divider= 100/numberShip;
        //chiedere al net Comunicator di farsi dare questi template
        $.get('../placeShipUI/module/moduleShipList/template/shipCard.tpl')
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