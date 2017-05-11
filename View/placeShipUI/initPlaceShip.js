/**
 * Created by fabiodisabatino on 11/03/17.
 */
(function (metaData) {
    $(document).ready(function () {

        $('.contentMain').matchHeight({
            property: 'height',
            target: $('.bodySize')
        })

        moduleFlagBanner.initModule();
        moduleShipList.initModule();
        moduleGridZone.initModule();
        moduleTimerZone.initModule();


    })



}());

