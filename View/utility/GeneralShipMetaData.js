/**
 * Created by Silvia on 20/04/2017.
 */

var GeneralShip={

    "numberOfShip":4,
    "Ship":[
        {

            "ShipName": "Trireme",
            "Dimension": 3,
            "Img": "../placeShipUI/img/ship3.png",
            "Weight": 20,
            "Istance":[
                {
                    "ShipID":1,
                    "Dimension":3,
                    "Position":{
                        "x":3,
                        "y":5
                    },
                    "Orientation":"Horizontal",
                    "Weapon":[
                        {
                            "WeaponName":"W1",
                            "TimeReload":0,
                            "Ammo":"infinity"
                        },
                        {
                            "WeaponName":"W2",
                            "TimeReload":2,
                            "Ammo":3
                        }
                    ]

                },
                {
                    "ShipID":2,
                    "Dimension":3,
                    "Position":{
                        "x":1,
                        "y":1
                    },
                    "Orientation":"Vertical",
                    "Weapon":[
                        {
                            "WeaponName":"W1",
                            "TimeReload":0,
                            "Ammo":"infinity"
                        },
                        {
                            "WeaponName":"W5",
                            "TimeReload":3,
                            "Ammo":2
                        }
                    ]

                },
                {
                    "ShipID":3,
                    "Dimension":3,
                    "Position":{
                        "x":3,
                        "y":5
                    },
                    "Orientation":"Horizontal",
                    "Weapon":[
                        {
                            "WeaponName":"W1",
                            "TimeReload":0,
                            "Ammo":"infinity"
                        },
                        {
                            "WeaponName":"W2",
                            "TimeReload":2,
                            "Ammo":3
                        }
                    ]

                }

            ]
        },
        {
            "ShipName": "Quadrireme",
            "Dimension": 4,
            "Img": "../placeShipUI/img/ship4.png",
            "Weight": 40,
            "Istance":[
                {
                    "ShipID":4,
                    "Dimension":4,
                    "Position":{
                        "x":7,
                        "y":7
                    },
                    "Orientation":"Vertical",
                    "Weapon":[
                        {
                            "WeaponName":"W3",
                            "TimeReload":0,
                            "Ammo":"infinity"
                        },
                        {
                            "WeaponName":"W4",
                            "TimeReload":3,
                            "Ammo":2
                        }
                    ]
                }
            ]

}
    ]

};
