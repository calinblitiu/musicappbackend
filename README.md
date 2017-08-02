# musicappbackend

success =  0 success
success = 1 error

### getSetList()      id, name, description,is_free,price.

    url    : http://your-domain/getsetlist
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

    url: http://your-domain/getset/14/C
    result:
    success
    {
    "success":0,
    "id":"14",
    "name":"test",
    "description":"test1 sample1",
    "is_free":"no",
    "key":"C",
    "items":{
    "key_1":
    {
        "http:\/\/localhost\/assets\/music-sample\/14_1_C_aaa.mp3",
    }
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

    url : http://your-domain/getmusicfile/14/C/1
    result : 
        success
        {
        "success":0,
        "url":"http:\/\/localhost\/assets\/music-sample\/14_1_C_aaa.mp3"
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

    url : http://your-domain/getorder/14/order_short

    result : 

        success
        - short music
        {
            "success":0,
            "type":"order_short",
            "order":"9,3,4,5,6,7,2,8,1"
        }
        - long music
        {
            "success":0,
            "type":"order_long",
            "order":"11,18,12,13,14,15,16,17,10"
        }
        error

        {
            "success":1,
            "message":"There is no any sample"
        }