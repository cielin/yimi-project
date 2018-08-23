<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jsencrypt.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/md5.js') }}"></script>
</head>
<body>
<button id='ajax'>ajax</button>
<div id='text'></div>

<script type="text/javascript">

/*
 * 生成签名
 * @params  待签名的json数据
 * @secret  密钥字符串
 */
function makeSign(params, secret){
    var ksort = Object.keys(params).sort();
    var str = '';
    for(var ki in ksort){ 
    str += ksort[ki] + '=' + params[ksort[ki]] + '&'; 
    }

    str += 'secret=' + secret;
    var token = hex_md5(str).toUpperCase();
    return rsa_sign(token);
}

/*
 * rsa加密token
 */
function rsa_sign(token){
    var pubkey='-----BEGIN PUBLIC KEY-----';
    pubkey+='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDSS/B+VvzgF66yWJUN5wmBSl22';
    pubkey+='WdbBHrAiAgg1Jk0WqeWo3ZswH/hIGGUQC3WvKFdbYE50G/Zaoe368O358ueFKtfL';
    pubkey+='FSDyXzKMLDTXTxdX7dqwRuTe+SAMQE4KSazTM0yl6uHTrue2iDRCZI6OMd1oZCTo';
    pubkey+='hKgMxEUSti/kHlMcEQIDAQAB';
    pubkey+='-----END PUBLIC KEY-----';
    // 利用公钥加密
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(pubkey);
    return encrypt.encrypt(token);
}

/*
 * 获取时间戳
 */
function get_time(){
    var d = new Date();
    var time = d.getTime()/1000;
    return parseInt(time);
}

//secret密钥
var secret = 'f0842b09ad765c3daee190fd90a6e6ef';

$("body").on("click","#ajax",function(){
    var params = {};
    params.id = 11;
    params.timestamp = get_time();
    params.sign = makeSign(params, secret);
    var token = "";
    @if (Auth::check())
    token = "{{ Auth::user()->api_token }}";
    @endif
    $.ajax({
        url : "http://www.cyrial.com/api/collect_product",
        data : params,
        headers: {
            'Authorization':'Bearer ' + token,
        },
        type : 'post',
        success:function(message){
            $('#text').html(message);
        },
        async:false
    })
})
</script>
</body>
</html>