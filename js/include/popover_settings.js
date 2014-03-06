var clickedAway = false;

  $('#userName').popover({

    html: true,

    trigger: 'manual'
  }).click(function(e) {

    $('.popover-title').remove();

    $(this).popover('show');

    e.preventDefault()
  });

$(document).click(function(e) {
  $('.popover-title').remove();

  if(clickedAway){
    $('.btn-danger').popover('hide')
    isVisible = clickedAway = false
  } else {
    clickedAway = true
  }
});