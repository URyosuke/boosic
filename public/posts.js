function addClassOnResize() {
  const articleContents = document.getElementsByName('articleContents');
  const articleComments = document.getElementsByName('articleComment');
  if(!articleContents.length == 0){
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
}

// ウィンドウのリサイズ時に関数を実行
window.addEventListener('resize', addClassOnResize);
// ページ読み込み時にも関数を実行
window.addEventListener('DOMContentLoaded', addClassOnResize);