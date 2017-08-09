# musicappbackend

success =  0 : success

success = 1  : error

### getSetList()      id, name, description,is_free,price.

    url    : http://churchflo.net/getsetlist
    result :
 
    success
    {
        "success":0,
        "count":4,"
        items":[
        {
            "id":"14",
            "name":"test",
            "description":
            "test1 sample1",
            "is_free":"no",
            "price":"2"
        },
        {
            "id":"16",
            "name":"test1",
            "description":"this is test sample",
            "is_free":"yes",
            "price":"12"
        }
        ]
    } 

    error
    {
        "success":0,
        "message":"There is no any sample"
    }

### getSet(sample_id,key) id, name, description,is_free,price.{18 array(url)}

    url: http://churchflo.net/getset/14/C
    result:
    {
        "success":0,
        "id":"24",
        "name":"ee",
        "description":"ee",
        "is_free":"yes",
        "key":"C",
        "items":
        {
            "key_1":{
                "drum":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_1_aaa.mp3",
                "bass":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_2_aaa.mp3",
                "piano":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_3_aaa.mp3",
                "rhodes":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_4_aaa.mp3",
                "organ":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_5_aaa.mp3",
                "synth":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_6_aaa.mp3",
                "guitar":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_7_aaa.mp3"
                },
            "key_2":"",
            "key_3":"",
            "key_4":"",
            "key_5":"",
            "key_6":"",
            "key_7":"",
            "key_8":"",
            "key_9":"",
            "key_10":"",
            "key_11":"",
            "key_12":"",
            "key_13":"",
            "key_14":"",
            "key_15":"",
            "key_16":"",
            "key_17":"",
            "key_18":""
            }
        }


    error
    {
        "success":0,
        "message":"There is no any sample"
    }

### getMusicFile(sample_id,key, num) 

    url : http://churchflo.net/getmusicfile/14/C/1
    result : 
        success
        {
            "success":0,
            "id":"221",
            "items":{
                "drum":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_1_aaa.mp3",
                "bass":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_2_aaa.mp3",
                "piano":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_3_aaa.mp3",
                "rhodes":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_4_aaa.mp3",
                "organ":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_5_aaa.mp3",
                "synth":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_6_aaa.mp3",
                "guitar":"http:\/\/churchflo.net\/assets\/music-sample\/24_130_C_221_7_aaa.mp3"
            }
        }

        error
        -sample is empty
        {
            "success":0,
            "message":"There is no any sample"
        }
        -Item is empty
        {
            "success":0,
            "message":"This item is empty!"
        }



### getOrder(sample_id,type)

    type : order_short,order_long

    url :http://churchflo.net/getorder/14/order_short

    result : 

        success
        - short music
        {
            "success":0,
            "type":"order_short",
            "order":"9,3,4,5,6,7,2,8,1,3,4,5,7"
        }
        - long music
        {
            "success":0,
            "type":"order_long",
            "order":"11,18,12,13,14,15,16,17,10,11,14"
        }
        error

        {
            "success":1,
            "message":"There is no any sample"
        }

### getMusicFiles(cell_id)

    url: http://churchflo.net/getmusicfiles/216

    result:
    success
    {
        "id":"221",
        "success":0,
        "player_1":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_1_aaa.mp3",
        "player_2":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_2_aaa.mp3",
        "player_3":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_3_aaa.mp3",
        "player_4":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_4_aaa.mp3",
        "player_5":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_5_aaa.mp3",
        "player_6":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_6_aaa.mp3",
        "player_7":"http:\/\/localhost\/assets\/music-sample\/24_130_C_221_7_aaa.mp3"
    }

    error
    {
        "success":1,
        "message":"There is no any sample"
    }

### registerDeviceToken(token)

    url    : http://churchflo.net/registerdevicetoken/token
    result : nothing

### updatePaidState($token,$sample_id,$key_name,$update_state)

    url     : http://churchflo.net/updatepaidstatus/5BC387969C96A2FB2BEEB21216405/26/C/paid
            : http://churchflo.net/updatepaidstatus/5BC387969C96A2FB2BEEB21216405/26/All/unpaid

    result  : nothing

###getPaidState($token,$sample_id,$key_name)
    
    url     : http://churchflo.net/getpaidstatus/5BC387969C96A2FB2BEEB21216405/26/C

    result  : 
                {
                    "success":0,
                    "status":"paid"
                }