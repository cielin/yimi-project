/*
 *
 * describe ： 加载css样式
 * author: wxl
 * 
 */

var pluginCss = '<!--plugin css start-->' +
   '<link href="../plugin/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">' +
   '<link href="../plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet">' +
   '<link href="../plugin/Huploadify.css" type="text/css" rel="stylesheet">' +
   '<!--plugin css end-->';

var css = '<!--custom start-->' +
   '<link href="../assets/fonts/iconfont.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/reset.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/base.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/layout.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/common.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/plugin.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/magic-check.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/page.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/custorm.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/768px.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/992px.css" type="text/css" rel="stylesheet">' +
   '<link href="../assets/css/1200px.css" type="text/css" rel="stylesheet">' +
   '<!--custom end-->';

// var template = '<script type="text/javascript" src="../common/header.js"></script>'
// +'<script type="text/javascript" src="../common/login.js"></script>';
var template = '<script type="text/javascript" src="../common/login.js"></script>';

document.write(pluginCss, css, template);