/*

One pixel: 32 X 32

*/

window.onload = function() {
    // Variable Block
    var leftButton = document.getElementById("leftButton");
    var rightButton = document.getElementById("rightButton");
    
    var cnv = document.getElementById("cnv");
    var ctx = cnv.getContext("2d");
    
    var player_car = {
        x: 32 * 4,
        y: 32 * 9
    }
    
    var enemies = [];
    
    var lvl = 1;
    var difficult = 1;
    
    var spawnInterval = 1;
    
    var points = 0;
    var timer;
    var flag = true;
    
    ctx.font = "italic 30pt Arial";
    
    // Function Block
    function moveLeft() {
        if (player_car.x - 32 < 32) rebootGame();
        else {
            player_car.x -= 32 * 3;
            clearAll();
            drawAll();
            drawEnemies();
            showPoints();
            checkCrash();
        }
    }
    
    function moveRight() {
        if (player_car.x + 32 > 224) rebootGame();
        else {
        player_car.x += 32 * 3;
            clearAll();
            drawAll();
            drawEnemies();
            showPoints();
            checkCrash();
        }
    }
    
    function countdownScene() {
        drawStart();
        ctx.fillStyle = "gold";
        ctx.fillText("3", 160, 80);
        setTimeout(function() {
            clearAll();
            drawAll();
            drawStart();
            ctx.fillText("2", 160, 80);
        }, 1000)
        setTimeout(function() {
            clearAll();
            drawAll();
            drawStart();
            ctx.fillText("1", 160, 80);
        }, 2000)
        setTimeout(function() {
            clearAll();
            drawAll();
            drawStart();
            ctx.fillText("Start!", 125, 80);
            showPoints();
        }, 3000)
        setTimeout(function() {
            leftButton.addEventListener("click", moveLeft);
            rightButton.addEventListener("click", moveRight);
            document.onkeydown = function(event) {
            if (event.keyCode == 37) moveLeft();
            if (event.keyCode == 39) moveRight();
            }

            clearAll();
            drawAll();
            flag = true;
            updateGame();
        }, 4000)
    }
    
    function clearAll() {
        ctx.clearRect(0, 0, cnv.width, cnv.height);
    }
    
    function updateGame() {
        if (flag == false) return false;
        points++;
        spawnInterval++;
        updateLvlDiffucult();
        if (spawnInterval == 10) {
            spawnInterval = 0;
            spawnEnemies();
        }
        clearAll();
        drawAll();
        moveEnemies();
        drawEnemies();
        showPoints();
        checkCrash();
        //console.log(enemies);
        timer = setTimeout(updateGame, 1000 / difficult);
    }
    
    function spawnEnemies() {
        //console.log("spawn...");
        var i = randomize(1, 3);
        var j;
        switch(i) {
            case 1:
            j=32;
            break;
            case 2:
            j=128;
            break;
            case 3:
            j=224;
            break;
        }
        enemies.push({
            x: j,
            y: -128
        });
    }
    
    function moveEnemies() {
            for (enemy = 0; enemy < enemies.length; enemy++) {
                enemies[enemy].y = enemies[enemy].y + 32;
            }
    }
    
    function checkCrash() {
        for (enemy = 0; enemy < enemies.length; enemy++) {
            if (Math.abs(enemies[enemy].x - player_car.x) < 96 && Math.abs(enemies[enemy].y - player_car.y) < 128) rebootGame();
        }
    }
    
    function drawEnemies() {
            for (enemy = 0; enemy < enemies.length; enemy++) {
                ctx.fillStyle = "black";
                ctx.fillRect(enemies[enemy].x, enemies[enemy].y, 96, 32);
                ctx.fillRect(enemies[enemy].x, enemies[enemy].y + 64, 96, 32);
                ctx.fillStyle = "purple";
                ctx.fillRect(enemies[enemy].x + 32, enemies[enemy].y, 32, 128);
                //console.log("draw");
            }
    }
    
    function updateLvlDiffucult() {
        if (points % 10 == 0) {
            lvl++;
            difficult+=0.5;
        }
    }
    
    function drawRoad() {
        ctx.fillStyle = "black";
        ctx.fillRect(0, 0, 32, 448);
        ctx.fillRect(320, 0, 32, 448);
    }
    
    function drawStart() {
        var i = 0;
        for (j=32; j<330; j+=32) {
            if (i % 2 == 0) ctx.fillStyle = "white";
            else ctx.fillStyle = "black";
            ctx.fillRect(j, 416, 32, 32);
            i++;
        }
        ctx.fillStyle = "gold";
        ctx.fillRect(32, 416, 288, 4);
    }
    
    function drawPlayer() {
        ctx.fillStyle = "gray";
        //ctx.fillRect(player_car.x, player_car.y, 96, 128);
        ctx.fillStyle = "black";
        ctx.fillRect(player_car.x, player_car.y + 32, 32 * 3, 32);
        ctx.fillRect(player_car.x, player_car.y + 32 * 3, 32 * 3, 32);
        ctx.fillStyle = "red";
        ctx.fillRect(player_car.x + 32, player_car.y, 32, 32 * 4);
    }
    
    function drawAll() {
        drawRoad();
        drawPlayer();
    }
    
    function showPoints() {
        ctx.font = ctx.font = "italic 15pt Arial";
        ctx.fillStyle = "gold";
        ctx.fillText("Points: " + points, 0, 32 * 12);
        ctx.fillText("Level: " + lvl, 0, 32 * 13);
    }

    function rebootGame() {
        alert("Driver Down\nPoints: " + points + "\nLevel: " + lvl);

        leftButton.removeEventListener("click", moveLeft);
        rightButton.removeEventListener("click", moveRight);
        document.onkeydown = function(event) {
        if (event.keyCode == 37) return false;
        if (event.keyCode == 39) return false;
        }

        points = 0;
        enemies = [];
        spawnInterval = 1;
        difficult = 1;
        lvl = 1;
        player_car = {
        x: 32 * 4,
        y: 32 * 9
        }
        ctx.font = "italic 30pt Arial";
        clearAll();
        drawAll();
        clearTimeout(timer);
    
    flag = false;
        countdownScene();
    }
    
    function randomize(min, max) {
        return Math.floor(Math.random()*(max-min+1))+min;
    }
    
    // Drive Block
  
    
    drawAll();
    countdownScene();
}