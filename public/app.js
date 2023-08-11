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
  humList.classList.toggle('hidez');
  humList.classList.toggle('fadeDown');
  humList.classList.toggle('z-20');
  humList.classList.toggle('bg-black');
  humList.classList.toggle('fixed');
  humList.classList.toggle('text-gray-700');
  humList.classList.toggle('text-white');
});

function addClassOnResize() {
  const articleContents = document.getElementsByName('articleContents');
  const articleComments = document.getElementsByName('articleComment');
  
    if (window.innerWidth < 655) { // 画面幅が600pxより小さい場合
      for (let i = 0; i < articleContents.length; i++){
        articleContents[i].classList.remove('grid');
        articleComments[i].classList.add('hidden');
      }
    } else {
      if (!articleContents[0].classList.contains('grid')) { // 要素にクラスが付与されていない場合
        for (let i = 0; i < articleContents.length; i++){
          articleContents[i].classList.add('grid');
        }
      }
      if (articleComments[0].classList.contains('hidden')) { // 要素にクラスが付与されていない場合
        for (let i = 0; i < articleContents.length; i++){
          articleComments[i].classList.remove('hidden');
        }
      }
    }
}

// ウィンドウのリサイズ時に関数を実行
window.addEventListener('resize', addClassOnResize);
// ページ読み込み時にも関数を実行
window.addEventListener('DOMContentLoaded', addClassOnResize);

function follow(userId) {
        $.ajax({
          // これがないと419エラーが出ます
          headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
          url: `/follow/${userId}`,
          type: "POST",
        })
          .done((data) => {
            console.log(data);
          })
          .fail((data) => {
            console.log(data);
          });
      }