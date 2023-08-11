const detail = document.querySelector('#detail');
const detailContents = document.querySelector('#detailContents');
const articleContent = document.querySelector('#articleContent');
const articleComment = document.querySelector('#articleComment');

function addClassOnResize() {
  if(!detailContents == null){
    console.log('yes');
  }
  if (window.innerWidth < 1024) { // 画面幅が600pxより小さい場合
    detailContents.classList.remove('text-left');
    detailContents.classList.add('text-center');
    detail.classList.remove('grid');
    
  } else {
    detailContents.classList.add('text-left');
    detailContents.classList.remove('text-center');
    detail.classList.add('grid');
  }
  if(window.innerWidth < 655){
    articleContent.classList.remove('grid');
  }else{
    articleContent.classList.add('grid');
  }
}

// ウィンドウのリサイズ時に関数を実行
window.addEventListener('resize', addClassOnResize);

// ページ読み込み時にも関数を実行
window.addEventListener('DOMContentLoaded', addClassOnResize);