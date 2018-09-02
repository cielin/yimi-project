$(function(){
	 // 地址选择
    var province = $("#province"),
        city = $("#city"),
        town = $("#town");
    for (var i = 0; i < provinceList.length; i++) {
        addEle(province, provinceList[i].name);
    }
    // 添加
    function addEle(ele, value) {
        var optionStr = "";
        optionStr = "<option value=" + value + ">" + value + "</option>";
        ele.append(optionStr);
    }
    // 删除
    function removeEle(ele) {
        ele.find("option").remove();
        var optionStar = "<option value=" + "请选择" + ">" + "请选择" + "</option>";
        ele.append(optionStar);
    }
    var provinceText, cityText, cityItem;
    var p = '',
        c = '',
        a = '';
    province.on("change", function () { //省选择
        provinceText = $(this).val();
        $.each(provinceList, function (i, item) {
            if (provinceText == item.name) {
                cityItem = i;
                return cityItem
            }
        });
        removeEle(city);
        removeEle(town);
        $.each(provinceList[cityItem].cityList, function (i, item) {
            addEle(city, item.name)
        })
        p = $("#province option:selected").val();
        c = $("#city option:selected").val();
        a = $("#town option:selected").val();
    });
    city.on("change", function () { //市选择
        cityText = $(this).val();
        removeEle(town);
        $.each(provinceList, function (i, item) {
            if (provinceText == item.name) {
                cityItem = i;
                5
                return cityItem
            }
        });
        $.each(provinceList[cityItem].cityList, function (i, item) {
            if (cityText == item.name) {
                for (var n = 0; n < item.areaList.length; n++) {
                    addEle(town, item.areaList[n])
                }
            }
        });
        p = $("#province option:selected").val();
        c = $("#city option:selected").val();
        a = $("#town option:selected").val();
    });
    town.on("change", function () { //区选择
        p = $("#province option:selected").val();
        c = $("#city option:selected").val();
        a = $("#town option:selected").val();
    });


    $("#commentForm").validate({
        // 添加验证规则
        rules: {
           zipCode: {    //验证邮箱
                isZipCode: true
            },
            phone : {
                isPhone:true
            }
        
        }
    });
});