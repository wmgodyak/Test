'use strict';

var gulp = require('gulp'); /*Підключаємо gulp*/
var sass = require('gulp-sass'); /*Плагін для sass*/
var uglify = require('gulp-uglify');  /*Мініфікація JS*/
var concat = require('gulp-concat');  /*Склейка файлів */
var sourcemaps = require('gulp-sourcemaps'); /*Отладка коду, дебагінг кода в Chrome*/



gulp.task('js', function() { /*Створюємо завдання*/
    gulp.src('assets/**/*.js') /*Вибираємо всі файли в папці media з розширенням js*/
        .pipe(concat('script.js')) /*Записуємо все в один файл "конкатинуємо"*/
        .pipe(gulp.dest('./js')); /*зберігаємо */
});

gulp.task('copyfonts', function() {
    gulp.src('./assets/sass/fonts/bootstrap/*')
        .pipe(gulp.dest('./fonts'));
});

gulp.task('sass', function(){

    gulp.src('./assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('style.css'))
        .pipe(gulp.dest('./css'));
});


gulp.task('watch', function(){
    gulp.run('sass');
    gulp.run('js');

    gulp.watch('./assets/sass/**/*.scss', function() {
        gulp.run('sass');
    });

    gulp.watch('./assets/js/*.js', function() {
        gulp.run('js');
    });
});
