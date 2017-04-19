$(document).ready(function(){
  var add_button = $("#add_button");
  var start_button = $("#start_event");
  var pair_players = $("#pair_players");
  var players = [];
  var event_players = [];
  var round_players = [];

  add_button.on("click", function(){
    $('input:checked').each(function() {
    var newPlayer = createPlayer($(this).attr('value'));
    players.push(newPlayer);
    // Change to remove entire line but this works for now
    $(this).remove();
    });
  });

  start_button.on("click", function(){
    var table_number = 0;
    $("form").remove();
    $(document.body).append("<h2>Active Players</h2><table id='active_players'><tr><th>Player Number</th><th>Player Name</th></tr></table>");
    for (var i = 0; i < players.length; i++) {
        $("table").append("<tr><td>" + (i+1) + "</td><td>" + players[i].name + "</td>");
    }
    $(document.body).append("<h2>Pairings for Round 1</h2><div id='round_1'><span>Table Number</span><span>Player 1</span><span>Player 2</span></div>");
    for (var i = 0; i < players.length; i++) {
      table_number++;
      players = shuffle(players);
      var tempPlayer1 = players.pop();
      event_players[tempPlayer1.name] = tempPlayer1;
      players = shuffle(players);
      var tempPlayer2 = players.shift();
      event_players[tempPlayer2.name] = tempPlayer2;
      $("#round_1").append("<div><form><span>" + table_number + "</span><label><input type='radio' name='player' value='" + tempPlayer1.name + "'/>" + tempPlayer1.name + "</label><label><input type='radio' name='player' value='" + tempPlayer2.name + "' />" + tempPlayer2.name + "</label><label><input data-player1="+tempPlayer1+" data-player2="+tempPlayer2+" type='radio' name='player' value='tie' />Tie</label></form>");
      i=0;
    }
    $("#round_1").append("<button id='calc_round_1' type='button' name='calculate'>Calculate</button>");

    $("#calc_round_1").on("click", function(){
      $("input:checked").each(function(){
        console.log($(this));
        console.log(this);
        round_players.push(this);
        //console.log(round_players.val());


      });

      console.log(round_players)
      /*
      for(var i=0; i < round_players.length; i++)
      {
        if (round_players[i].val() != 'tie') {
          event_players[round_players[i].val()].score += 3;
        }
        else if(round_players[i].val() == 'tie') {
          event_players[round_players.attr(data-player1)].score++;
          event_players[round_players.attr(data-player2)].score++;
        }
        else {
          console.log("Some how didn't have a win or a tie?!");
        }
      }
*/
      // for(int i = 0; i < players.length; i++) {
      //   for(int p = 0; p <)
      // }
    });

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
