// eachTextAnimeにappeartextというクラス名を付ける定義
function EachTextAnimeControl() {
  $('.eachTextAnime').each(function () {
    var elemPos = $(this).offset().top - 50;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass("appeartext");

    } else {
      $(this).removeClass("appeartext");
    }
  });
}

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  //spanタグを追加する
  var element = $(".eachTextAnime");
  element.each(function () {
    var text = $(this).text();
    var textbox = "";
    text.split('').forEach(function (t, i) {
      if (t !== " ") {
        if (i < 10) {
          textbox += '<span style="animation-delay:.' + i + 's;">' + t + '</span>';
        } else {
          var n = i / 10;
          textbox += '<span style="animation-delay:' + n + 's;">' + t + '</span>';
        }

      } else {
        textbox += t;
      }
    });
    $(this).html(textbox);
  });

  EachTextAnimeControl();/* アニメーション用の関数を呼ぶ*/
});// ここまで画面が読み込まれたらすぐに動かしたい場合の記述

$(window).scroll(function() {
        var scroll = $(window).scrollTop();//スクロール値を定義
    //header-imgの背景
  $('#header-img').css({
      transform: 'scale('+(100 + scroll/10)/100+')',//スクロール値を代入してscale1から拡大.scroll/10の値を小さくすると拡大値が大きくなる
      top: -(scroll/50)  + "%",//スクロール値を代入してtopの位置をマイナスにずらす
        });
    });

const appHumButton = document.querySelector('#apphumberger');
const humList = document.querySelector('#humbergerList');
const navID = document.querySelector('#navID');
const bars = document.querySelector('#bars');
const xmark = document.querySelector('#xmark');

appHumButton.addEventListener('click',function(e){
  xmark.classList.toggle('hide_area');
  xmark.classList.toggle('area_x');
  bars.classList.toggle('hide_area');
  bars.classList.toggle('area_x');
  humList.classList.toggle('fadeDown');
  humList.classList.toggle('z-20');
  humList.classList.toggle('bg-black');
  humList.classList.toggle('fixed');
  humList.classList.toggle('text-gray-700');
  humList.classList.toggle('text-white');
});

