// console.log("tool外面");
// $(function(){
// 	console.log("tool");
// })
var F = {
	strConvert: function(literal) {
		//console.log("literal",literal);
	    var result = literal.substring(0, literal.length);
	    result = $.trim(result.replace(/'/g, '\''));

	    return '\''+result+'\'';
	},
	beforeDate:function(date){
		var now = new Date(date);
        now = new Date(now.getTime() - 86400000);
        var yyyy = now.getFullYear(), mm = (now.getMonth() + 1).toString(), dd = now
                .getDate().toString();
        if (mm.length == 1) {
            mm = '0' + mm;
        }
        if (dd.length == 1) {
            dd = '0' + dd;
        }
       // alert(yyyy + '-' + mm + '-' + dd+' ');
       return yyyy + '-' + mm + '-' + dd
	},
	afterDate:function(date){
		var now = new Date(date);
        now = new Date(now.getTime() + 86400000);
        var yyyy = now.getFullYear(), mm = (now.getMonth() + 1).toString(), dd = now
                .getDate().toString();
        if (mm.length == 1) {
            mm = '0' + mm;
        }
        if (dd.length == 1) {
            dd = '0' + dd;
        }
       // alert(yyyy + '-' + mm + '-' + dd+' ');
       return yyyy + '-' + mm + '-' + dd
	}
};
var ajax = {
	post: function(url,dataObj,successCallback,error){
		var postUrl = url || webInfo;
		var dataJson = JSON.stringify(dataObj);
		$.ajax({
			contentType: "application/json; charset=utf-8",  
		   	url: postUrl,
		   	type :"POST",
		   	dataType : "json",
		   	async:false,
		   	data: dataJson,
		   	success:function(data){
				if(data.length == 0){
		   			successCallback();
		   		}else{
		   			successCallback(data);
		   		}
		   	},
		   	error:function(error){
		   		var sError = "系统故障,请联系管理员";
				sError = error || sError;
				alert(sError,1);
		   	}
		});
	},
	postNoParam: function(url,successCallback){
		 $.ajax({
			contentType: "application/json; charset=utf-8",  
		   	url: url,
		   	type :"POST",
		   	async:false,
		   	success: function(data){
		   		if($.isEmptyObject(data) || data.length == 0){
		   			successCallback();
		   		}else{
		   			successCallback(data);
		   		}
		   	},
		   	error:function(error){
		   		var sError = "系统故障,请联系管理员";
				sError = error || sError;
				alert(sError,1);
		   	}
		});
	} 
}




