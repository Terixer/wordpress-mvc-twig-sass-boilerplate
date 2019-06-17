const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const rename = require("gulp-rename");

const style = {
  input: './scss/app.scss',
  output: './css',
  watch: './scss/**/*.scss'
}


const js = {
  input: './js/app.js',
  output: './js',
  watch: './js/**/*.js'
}

const sassOptions = {
  dev: {
    errLogToConsole: true,
    outputStyle: 'expanded'
  },
  prod: {
    outputStyle: 'compressed'
  }
};

const autoprefixerOptions = {
  browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};


gulp.task('watch', ['style', 'script'], () => {
  gulp.watch(style.watch, ['style']);
  gulp.watch(js.watch, ['script']);
});


gulp.task('default', ['watch']);

gulp.task('script', () => {
  return gulp
    .src(js.input)
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(js.output))
});


gulp.task('scripts-prod', () => {
  return gulp
    .src(js.input)
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(js.output));
});


gulp.task('style', () => {
  return gulp
    .src(style.input)
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions.dev).on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest(style.output))
});

gulp.task('style-prod', () => {
  return gulp
    .src(style.input)
    .pipe(sass(sassOptions.prod))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(style.output));
})


gulp.task('prod', () => {

  return gulp
    .start('scripts-prod')
    .start('style-prod')
});
