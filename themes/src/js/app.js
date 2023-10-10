// ========== ハンバーガーメニュー ==========
$(() => {
  $('.js-hamburger').click(function () {
    $(this).toggleClass('is-active');

    if ($(this).hasClass('is-active')) {
      $('.js-globalNav').addClass('is-active');
    } else {
      $('.js-globalNav').removeClass('is-active');
    }
  });
});


// ========== ページトップ ==========
$(() => {
  const pageTop = $('.js-pageTop');
  pageTop.hide();

  $(window).scroll(() => {
    if ($(this).scrollTop() > 300) {
      pageTop.fadeIn(300, 'easeInOutBounce');
      // console.log('スクロールした');
    } else {
      pageTop.fadeOut(300, 'easeInOutBounce');
      // console.log('スクロール戻った');
    }
  });

  pageTop.click(() => {
    $('body, html').animate({
      scrollTop: 0
    }, 100, 'easeOutQuint');
    return false;
  });
});


// ========== fadeイベント ==========
// ページ読み込み時
$(window).ready(() => {
  const fadeTarget = $('.js-fade').eq(0);
  const windowH = $(window).height();
  const mainVisualH = $('.slick-slide').innerHeight();

  // console.log(`ページ読み込み時 windowH = ${windowH}`);
  // console.log(`ページ読み込み時 mainVisualH = ${mainVisualH}`);

  if (mainVisualH < windowH) {
    fadeTarget.addClass('is-fade-always');
  } else {
    fadeTarget.removeClass('is-fade-always');
  }
});

// 画面リサイズ時
$(window).resize(() => {
  const fadeTarget = $('.js-fade').eq(0);
  const windowH = $(window).height();
  const mainVisualH = $('.slick-slide').innerHeight();
  const headerH = $('header').innerHeight();

  // console.log(`画面リサイズ時 windowH = ${windowH}`);
  // console.log(`画面リサイズ時 mainVisualH = ${mainVisualH}`);

  if (mainVisualH + headerH < windowH) {
    fadeTarget.addClass('is-fade-always');
  } else {
    fadeTarget.removeClass('is-fade-always');
  }
});


// スクロール時
$(window).scroll(function () {
  $('.js-fade').each(function () {
    const scroll = $(window).scrollTop();
    const windowH = $(window).height();

    if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/i)) {
      const offset = $(this).offset().top + 30;
      if (scroll >= offset - windowH) {
        $(this).addClass('is-fade');
      } else {
        $(this).removeClass('is-fade');
      }
    } else {
      const offset = $(this).offset().top + 300;
      if (scroll >= offset - windowH) {
        $(this).addClass('is-fade');
      } else {
        $(this).removeClass('is-fade');
      }
    }
  });
});


// ========== MV高さ ==========
$(window).ready(() => {
  const mainVisual = $('.slick-slide');
  const mainVisualImg = $('.js-mainVisual').children('img');

  const headerH = $('header').innerHeight();
  const windowH = $(window).innerHeight();

  // console.log(windowH - headerH + 'px');

  mainVisual.css('maxHeight', windowH - headerH + 'px');
  mainVisualImg.css('maxHeight', windowH - headerH + 'px');
});

$(window).resize(() => {
  const mainVisual = $('.slick-slide');
  const mainVisualImg = $('.js-mainVisual').children('img');
  const headerH = $('header').innerHeight();
  const windowH = $(window).innerHeight();

  // console.log(windowH - headerH + 'px');

  mainVisual.css('maxHeight', windowH - headerH + 'px');
  mainVisualImg.css('maxHeight', windowH - headerH + 'px');
});


// ========== ヘッダー高さ分mainを下げる ==========
$(window).ready(() => {
  const headerH = $('header').innerHeight();

  $('.js-headerH').css('padding-top', headerH + 'px')
});

$(window).resize(() => {
  const headerH = $('header').innerHeight();

  $('.js-headerH').css('padding-top', headerH + 'px')
});


// ========== ヘッダーfade ==========
//スクロールすると上部に固定させるための設定を関数でまとめる
let beforePos = 0;//スクロールの値の比較用の設定

//スクロール途中でヘッダーが消え、上にスクロールすると復活する設定を関数にまとめる
function ScrollAnime() {
  const screenH = $(window).innerHeight();
  const scroll = $(window).scrollTop();
  // console.log(`screenH = ${screenH}`);
  // console.log(`scroll = ${scroll}`);


  //ヘッダーの出し入れをする
  if (scroll == beforePos) {
    //IE11対策で処理を入れない
  } else if (screenH > scroll || 0 > scroll - beforePos) {
    //ヘッダーが上から出現する
    $('.js-header').removeClass('is-fade');
  } else {
    //ヘッダーが上に消える
    $('.js-header').addClass('is-fade');
  }
  //現在のスクロール値を比較用のbeforePosに格納
  beforePos = scroll;
}


// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});


// ========== body 100vh以下の際底辺固定 ==========
$(() => {
  const bodyH = $('body').height();
  const windowH = $(window).innerHeight();

  // console.log(`bodyH = ${bodyH} windowH = ${windowH}`);

  if (bodyH < windowH) {
    $('footer').addClass('is-bottom');
  } else {
    $('footer').removeClass('is-bottom');
  }
});


// ========== WPログイン時ヘッダー下げ ==========
$(window).ready(() => {
  const adminberH = $('#wpadminbar').height();

  if ($('body').hasClass('admin-bar')) {
    $('header').css('margin-top', adminberH + 'px');
    console.log(adminberH);
  }
});

$(window).resize(() => {
  const adminberH = $('#wpadminbar').height();

  if ($('body').hasClass('admin-bar')) {
    $('header').css('margin-top', adminberH + 'px');
    console.log(adminberH);
  }
});


// ========== slick ==========
$('.js-slick').slick({
  autoplay: true,
  arrows: false, // 前・次のボタンを表示する
  speed: 1000, // スライドさせるスピード（ミリ秒）
  slidesToShow: 1, // 表示させるスライド数
  centerMode: true, // slidesToShowが奇数のとき、現在のスライドを中央に表示する
  variableWidth: true,
});
