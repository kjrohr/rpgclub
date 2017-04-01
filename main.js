$(document).ready(function(){
  var add_button = $("#add_button");
  var start_button = $("#start_event");
  var pair_players;
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
    $(document.body).append("<h2>Active Players</h2><table><tr><th>Player Number</th><th>Player Name</th></tr></table>");
    $(document.body).append("<button id='pair_players' type='button' name='pair'>Pair Players</button>")
    pair_players = $("#pair_players");
    for (var i = 0; i < players.length; i++) {
      console.log(players[i]);
        $("table").append("<tr><td>" + (i+1) + "</td><td>" + players[i] + "</td>");
    }
  });

  pair_players.on("click", function(){
    players = shuffle(players);
    console.log(players);
  });

  function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}


});
