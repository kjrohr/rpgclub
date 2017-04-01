$(document).ready(function(){
  var add_button = $("#add_button");
  var start_button = $("#start_event");
  var players = [];

  add_button.on("click", function(){
    $('input:checked').each(function() {
    players.push($(this).attr('value'));
    // Change to remove entire line but this works for now
    $(this).remove();
    });
    console.log(players);
  });

  start_button.on("click", function(){
    $("form").remove();
    for (var i = 0; i < players.length; i++) {
      console.log(players[i]);
    }
  });


});
