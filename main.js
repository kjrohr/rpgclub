$(document).ready(function(){
  var add_button = $("#add_button");
  var players = [];

  add_button.on("click", function(){
    $('input:checked').each(function() {
    players.push($(this).attr('value'));
    $(this).remove();
    });
    console.log(players);
  });
});
