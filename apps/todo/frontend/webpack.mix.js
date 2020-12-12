let mix = require('laravel-mix');

// mix.styles([
// //     'resources/assets/vendor/ui/css/jquery-ui.css',
// //     'resources/assets/vendor/inspinia/css/animate.css',
// //     'resources/assets/vendor/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
// //     'resources/assets/vendor/inspinia/css/plugins/iCheck/custom.css',
// //     'resources/assets/vendor/inspinia/css/style.css',
// //     'resources/assets/vendor/inspinia/css/plugins/chosen/bootstrap-chosen.css',
// //     'resources/assets/vendor/inspinia/css/plugins/dataTables/datatables.min.css',
// //     'resources/assets/vendor/inspinia/css/plugins/bootstrap-markdown/bootstrap-markdown.min.css',
//     'resources/assets/vendor/jqgrid/css/ui.jqgrid.css',
//     'resources/assets/vendor/jqgrid/css/ui.jqgrid-bootstrap.css',
//     'resources/assets/vendor/jqgrid/css/custom.css',
//     'resources/assets/vendor/toastr/toastr.min.css',
//     'resources/assets/vendor/select2/css/select2.min.css',
// //     'resources/assets/vendor/summernote/css/summernote.css',
// //     'resources/assets/vendor/summernote/css/summernote-bs3.css',
//     'resources/assets/vendor/daterangepicker/css/daterangepicker.css',
// //     'resources/assets/vendor/clockpicker/css/clockpicker.css',
// //     'resources/assets/vendor/slick/css/slick.css',
// //     'resources/assets/vendor/slick/css/slick-theme.css',
// //     'resources/assets/vendor/c3/css/c3.min.css'
// ], 'public/css/vendor.css');

// mix.scripts([
//     'resources/assets/vendor/inspinia/js/jquery-3.1.1.min.js',
//     'resources/assets/vendor/pooper/popper.min.js',
//     'resources/assets/vendor/bootstrap/bootstrap.js',
//     //validated...
//     'resources/assets/vendor/inspinia/js/inspinia.js',
//     'resources/assets/vendor/inspinia/js/plugins/metisMenu/jquery.metisMenu.js',
//     'resources/assets/vendor/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js',
//     'resources/assets/vendor/inspinia/js/plugins/pace/pace.min.js',
//     'resources/assets/vendor/inspinia/js/plugins/iCheck/icheck.min.js',
//     'resources/assets/vendor/inspinia/js/plugins/chartJs/Chart.min.js',
//     'resources/assets/vendor/inspinia/js/plugins/chosen/chosen.jquery.js',
//     'resources/assets/vendor/inspinia/js/plugins/dataTables/datatables.min.js',
//     'resources/assets/vendor/inspinia/js/plugins/bootstrap-markdown/bootstrap-markdown.js',
//     'resources/assets/vendor/inspinia/js/plugins/bootstrap-markdown/markdown.js',
//     'resources/assets/vendor/jqgrid/js/i18n/grid.locale-es.js',
//     'resources/assets/vendor/jqgrid/js/jquery.jqGrid.min.js',
//     'resources/assets/vendor/toastr/toastr.min.js',
//     'resources/assets/vendor/validate/jquery.validate.min.js',
//     'resources/assets/vendor/validate/messages_es.js',
//     'resources/assets/vendor/select2/js/select2.full.min.js',
//     'resources/assets/vendor/summernote/js/summernote.min.js',
//     'resources/assets/vendor/daterangepicker/js/moment.min.js',
//     'resources/assets/vendor/daterangepicker/js/daterangepicker.js',
//     'resources/assets/vendor/clockpicker/js/clockpicker.js',
//     'resources/assets/vendor/d3/js/d3.min.js',
//     'resources/assets/vendor/c3/js/c3.min.js',
//     'resources/assets/vendor/bootbox/js/bootbox.min.js'
// ], 'public/js/vendor.js');



mix.js('resources/js/app.js', 'public/build');
//.sass('resources/sass/app.scss', 'public/css');
