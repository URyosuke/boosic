const detail = document.querySelector('#formDetail')


function addClassOnResize() {
    
  if (window.innerWidth < 900) { // 画面幅が600pxより小さい場合
    detail.classList.remove('grid');

  } else {
    detail.classList.add('grid');
  }
}

// ウィンドウのリサイズ時に関数を実行
window.addEventListener('resize', addClassOnResize);
// ページ読み込み時にも関数を実行
window.addEventListener('DOMContentLoaded', addClassOnResize);