
const gulp = require("gulp");
const browserSync = require("browser-sync");
const reload = browserSync.reload;
const ssi = require("connect-ssi");
const sass = require("gulp-sass")(require('node-sass'));
const autoprefixer = require("gulp-autoprefixer");
const glob = require("gulp-sass-glob");
const notify = require('gulp-notify');
const plumber = require("gulp-plumber");
const babel = require('gulp-babel');
const uglify = require("gulp-uglify-es").default;
const imagemin = require("gulp-imagemin");
const mozjpeg = require("imagemin-mozjpeg");
const pngquant = require("imagemin-pngquant");
const changed = require('gulp-changed');
const rename = require('gulp-rename');
const webpack = require("webpack");


const paths = {
  rootDir: "atsushi-sekiguchi/",
  htmlSrc: "atsushi-sekiguchi/*.html",
  scssSrc: "src/scss/**/*.scss",
  jsSrc: "src/js/**/*.js",
  imgSrc: "src/img/**/*",
  outCss: "atsushi-sekiguchi/css",
  outJs: "atsushi-sekiguchi/js",
  outImg: "atsushi-sekiguchi/img",
};

// browser sync
function browserSyncFunc(done){
  browserSync.init({
      server: {
          baseDir: paths.rootDir,
          middleware: [
            ssi({
              baseDir: paths.rootDir,
              notify: false, //通知
              ext: ".html"
            })
          ]
      },
      port: 3000,
      reloadOnRestart: true
  });
  done();
}

// ブラウザリロード
const browserReload = (done) => {
  browserSync.reload();
  done();
};

// sass
function sassFunc() {
    return gulp.src(paths.scssSrc , {
        sourcemaps: true
    })
    .pipe(rename((path) => {
      // manファイルにはminをつけたくないのでif文
      if(!path.extname.endsWith('.map')) {
        path.basename += '.min'
      }
    }))
    .pipe(plumber({
        errorHandler: notify.onError('<%= error.message %>'),
    }))
    .pipe(glob())
    .pipe(sass({
        outputStyle: 'compressed'
    }))
    .pipe(gulp.dest(paths.outCss), {
        sourcemaps: './sourcemaps'
    })
    .pipe(autoprefixer({
      // browsers: ["last 2 versions", "ie >= 11", "Android >= 4"],
      // cascade: false
    }))
    .pipe(gulp.dest(paths.outCss), {
        sourcemaps: './sourcemaps'
    })
    // .pipe(browserSync.stream());
    .pipe(reload({
      stream: true,
      once: true,
    }));
}

// js
function jsFunc() {
  return gulp.src(paths.jsSrc , {
    sourcemaps: true
  })
  .pipe(rename({
    suffix: ".min",
  }))
  .pipe(plumber({
    errorHandler: notify.onError('<%= error.message %>'),
  }))
  .pipe(babel())
  .pipe(uglify({}))
  .pipe(gulp.dest(paths.outJs))
  .pipe(reload({
    stream: true,
    once: true,
  }));
}

// img
function imgFunc() {
  return gulp.src(paths.imgSrc)
  .pipe(changed(paths.outImg))
  .pipe(gulp.dest(paths.outImg))
  .pipe(imagemin(
    [
      mozjpeg({
        quality: 80 //画像圧縮率
      }),
      pngquant()
    ],
    {
      verbose: true
    }
  ))
  .pipe(reload({
    stream: true,
    once: true,
  }));
}

// JEST
const jest = require('gulp-jest').default;

function jestTask() {
  return gulp.src('__tests__').pipe(jest({
    "preprocessorIgnorePatterns": [
      "<rootDir>/atsushi-sekiguchi/", "<rootDir>/node_modules/"
    ],
    "automock": false
  }));
}

gulp.task('jest', jestTask);


// watch
function watchFunc(done) {
  gulp.watch(paths.htmlSrc, browserReload);
  gulp.watch(paths.scssSrc, gulp.parallel(sassFunc), browserReload);
  gulp.watch(paths.jsSrc, gulp.parallel(jsFunc), browserReload);
  gulp.watch(paths.imgSrc, gulp.parallel(imgFunc), browserReload);
  done();
}

  // scripts tasks
gulp.task('default',
gulp.parallel(
  browserSyncFunc, watchFunc, sassFunc, jsFunc,imgFunc
  )
);

