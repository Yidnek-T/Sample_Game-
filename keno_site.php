<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keno_Game_TEST</title>
    <link rel="stylesheet" href="keno.css">
</head>
<body oncontextmenu="return true;">
<script src="indexed.js"> </script>
    

<img class="logo" src="chess.jpg" alt="Logo"> 
<header>
    <h1>Keno Game</h1>
</header>
<nav>
    <a href="index.html">Home</a>
    <a href="about.html"> About Us</a>
    <a href="rename.html">Contact</a>
</nav>

<div class="container">
    <?php
    function generateKenoNumbers($count = 20, $min = 1, $max = 80) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $count);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $drawnNumbers = generateKenoNumbers();
        $playerNumbers = isset($_POST['numbers']) ? array_map('intval', $_POST['numbers']) : [];

        echo "<p>Player Numbers: " . implode(', ', $playerNumbers) . "</p>";
        echo "<p>Drawn Numbers: " . implode(', ', $drawnNumbers) . "</p>";

        $matches = array_intersect($playerNumbers, $drawnNumbers);
        echo "<p>Matches: " . count($matches) . "</p>";

        //determine player win lost
        //$result = count($matches)>=4? "Congratulations! You Win!" : "Sorry, You Lose.  Try Again!";
        $result= count($matches )>=1?  "ዋው አሸንፈሀል! yow did it !": "አላሸነፍክም! እንደገና ሞክር";
        echo "<p class='result'>$result</p>";
    }
    ?>

    <form method="post">
        <label for="numbers">Select 10 numbers (1-80): </label>
        <div class="number-grid">
            <?php for ($i = 1; $i <= 80; $i++) : ?>
                <label>
                    <input type="checkbox" name="numbers[]" value="<?= $i ?>" id="num<?= $i ?>">
                    <?= $i ?>
                </label>
            <?php endfor; ?>
        </div>
        <button type="submit">Play</button>
    </form>

    <img src="keno.PNG" alt="">
</div>

<footer>
    &copy; 2023 Keno Game. All rights reserved.
</footer>

</body>
</html>