### Tennis
The goal of this kata is to report the score for the current game.

In tennis, a game is won by the first player to score four points, with the points being called out as 15, 30, 40, and then "game". A tied score is called "all"; for example, if each player has won a single point (i.e. 15), the server will call the score 15-all. A tied score at 40-40 is called "deuce", and the first player to win two consecutive points after deuce wins the game.

#### Points
- 0 points: "Love"
- 1 point: "Fifteen"
- 2 points: "Thirty"
- 3 points: "Forty"
- 4 points: "Game"

#### Advantage:
After deuce, the player who wins the next point has "advantage".
- If the player with advantage wins the next point, they win the game.
- If the player with advantage loses the next point, the score returns to deuce.
