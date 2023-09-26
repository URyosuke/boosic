const appHumButton = document.querySelector('#apphumberger');
const humList = document.querySelector('#humbergerList');
const navID = document.querySelector('#navID');
const bars = document.querySelector('#bars');
const xmark = document.querySelector('#xmark');
const followButton = document.querySelector('#followButton');

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


function follow(userId) {
        $.ajax({
          // これがないと419エラーが出ます
          headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
          url: `/boosic/follow/${userId}`,
          type: "POST",
        })
          .done((data) => {
            if(followButton.textContent == 'フォロー'){
              followButton.textContent="フォロー中"
              const followerNum = document.querySelector('#followerNum');
              followerNum.textContent=`フォロワー${data}`;
            }else{
              followButton.textContent="フォロー"
              const followerNum = document.querySelector('#followerNum');
              followerNum.textContent=`フォロワー${data}`;
            }
            followButton.classList.toggle('bg-gray-400');
            followButton.classList.toggle('bg-white');
          })
          .fail((data) => {
            console.log(data);
          });
}

function like(postId) {
  $.ajax({
    headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
    url: `/boosic/like/${postId}`,
    type: "POST",
  })
    .done(function (data, status, xhr) {
      const heart = document.querySelector(`#heart${postId}`);
      const heartsNum = document.querySelector(`#heartsNum${postId}`)
      
      heart.classList.toggle('fa-solid');
      heart.classList.toggle('fa-heart-solid');
      heart.classList.toggle('fa-regular');
      heartsNum.textContent=data;
    })
    .fail(function (xhr, status, error) {
      console.log();
    });
}

$(function () {
  $('#openModal').click(function(){
      $('#modalArea').fadeIn();
  });
  $('#closeModal , #modalBg').click(function(){
    $('#modalArea').fadeOut();
  });
});

function previewImage(obj)
  {
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.querySelector('#preview').src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
  }
  