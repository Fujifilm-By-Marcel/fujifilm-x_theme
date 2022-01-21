const { series, gulp, src, dest, watch } = require('gulp');
const less = require('gulp-less');
const sourcemaps = require('gulp-sourcemaps');

function compile_less(cb){
    return src("fnac-assets/css/less/*.less")    
    	.pipe(sourcemaps.init())    
       	.pipe(less())        
       	.pipe(sourcemaps.write('./less/maps'))
       	.pipe(dest('fnac-assets/css/'));
    cb();
}

exports.watch = function(){
	watch("fnac-assets/css/less/*.less", series(compile_less));
};
exports.default = series(compile_less);