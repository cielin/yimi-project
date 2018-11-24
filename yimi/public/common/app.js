/*
 *
 * author: wxl
 * describe ： load script
 * 
 */

var pluginJs = '<!--plugin js start-->' +
	'<script type="text/javascript" src="../plugin/jquery-3.3.1.min.js"></script>' +
	'<script type="text/javascript" src="../plugin/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>' +
	'<script type="text/javascript" src="../plugin/swiper/js/swiper.min.js"></script>' +
	'<script type="text/javascript" src="../plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>' +
	'<script type="text/javascript" src="../plugin/jquery.Huploadify.js"></script>' +
	'<script type="text/javascript" src="../plugin/jquery.validate.js"></script>' +
	'<!--plugin js start-->';

var JS = '<!--custom js start-->' +
	'<script type="text/javascript" src="../common/utils/tools.js"></script>' +
	'<script type="text/javascript" src="../common/utils/layout.js"></script>' +
	'<script type="text/javascript" src="../common/data.js"></script>' +
	'<script type="text/javascript" src="../common/common.js"></script>' +
	'<script type="text/javascript" src="../common/controller.js"></script>' +
	'<script type="text/javascript" src="../common/plugin.js"></script>'
	// +'<script type="text/javascript" src="../common/footer.js"></script>'

	+
	'<!--custom js end-->' +
	'<!---------------------- page  start-------------------->';

document.write(pluginJs + JS);