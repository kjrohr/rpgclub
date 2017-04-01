$(document).ready(function(){
  var add_button = $("#add_button");
  var start_button = $("#start_event");
  var pair_players = $("#pair_players");
  var players = [];

  add_button.on("click", function(){
    $('input:checked').each(function() {
    var newPlayer = createPlayer($(this).attr('value'));
    console.log(newPlayer);
    players.push(newPlayer);

    // Change to remove entire line but this works for now
    $(this).remove();
    });
    console.log(players);
  });

  start_button.on("click", function(){
    var table_number = 0;
    $("form").remove();
    $(document.body).append("<h2>Active Players</h2><table id='active_players'><tr><th>Player Number</th><th>Player Name</th></tr></table>");
    for (var i = 0; i < players.length; i++) {
      console.log(players[i]);
        $("table").append("<tr><td>" + (i+1) + "</td><td>" + players[i] + "</td>");
    }
    $(document.body).append("<h2>Pairings for Round 1</h2><table id='round_1'><tr><th>Table Number</th><th>Player 1</th><th>Player 2</th></tr></table>")
    for (var i = 0; i < players.length; i++) {
      table_number++;
      players = shuffle(players);
      var tempPlayer1 = players.pop();
      players = shuffle(players);
      var tempPlayer2 = players.shift();
      $("#round_1").append("<tr><td>" + table_number + "</td><td>" + tempPlayer1 + "</td><td>" + tempPlayer2 + "</td>");
      i=0;
    }
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

function createPlayer(name) {
  var player = {};
  player.name = name;
  player.score = 0;

  return player;
}

});
