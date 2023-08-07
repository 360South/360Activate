// JavaScript Document




//Make canvas responsive.

window.addEventListener("resize", handleResize);
function handleResize() {
    if (mobile===true) {
	    var w = window.innerWidth-2; // -2 accounts for the border
    	var h = window.innerHeight-2;
		
		console.log(w);
    	
		bgctx.canvas.width = w;
    	bgctx.canvas.height = h;
		playerctx.canvas.width = w;
    	playerctx.canvas.height = h;
		asteroidctx.canvas.width = w;
    	asteroidctx.canvas.height = h;
		hudctx.canvas.width = w;
    	hudctx.canvas.height = h;
    	
		canvas.width = w;
    	canvas.height = h;
    } 
}

////// Variables //////
var mobile = true;

// mobile canvas
var canvas = {width: window.innerWidth, height: window.innerHeight, fps:60};

//desktop canvas
//var canvas = {width: 300, height: 500, fps:60};

var score = 0;
var lives = 3;
var Level = 1;
var dead = false;
var gameover = false;
var recovering = false;
var pause = false;
var left = false;
var right = false;

//background stuff
var CSSanimation = "animation"  ||
			  "-ms-animation"  ||
	          "-moz-animation" ||
	          "-webkit-animation";

var bgspeed = 250;

	

////// keys and controls //////

function onkeydown(e) {
		if(e.keyCode === 37) { 
			left = true;
		} 
		
		if(e.keyCode === 39) {
			right = true;	
		} 
}

function onkeyup(e) {
		if (e.keyCode === 37) { 
			left = false;
		} 
		
		if(e.keyCode === 39) {
			right = false;	
		} 
		
		if(e.keyCode === 80 && pause === false) {
			document.getElementById("pausebutton").style.display="none";
			document.getElementById("playbutton").style.display="inline-block";
			animationTimeout( function() { pause = true}, 50);
		} 
		if(e.keyCode === 80 && pause === true) {
			document.getElementById("playbutton").style.display="none";
		document.getElementById("pausebutton").style.display="inline-block";
			animationTimeout( function() { pause = false}, 50);	
		} 
}


function touch() {
	event.preventDefault();
	var touch = event.touches[0];
	var x = touch.clientX;
    var y = touch.clientY;
	
	// move left and right
	if (x < canvas.width*0.5 && y > 60) {
		left=true;
	} 
	if (x > canvas.width*0.5 && y > 60) {
		right=true;
	} 
	
	//restart on touch when game is over
	if (gameover === true) {
		location.reload();
	}
	
	//pause button
	if (y < 60 && x > canvas.width-55 && pause === false) {
		document.getElementById("pausebutton").style.display="none";
		document.getElementById("playbutton").style.display="inline-block";
		animationTimeout( function() { pause = true}, 100);
	}
	if (y < 60 && x > canvas.width-55 && pause === true) {
		document.getElementById("playbutton").style.display="none";
		document.getElementById("pausebutton").style.display="inline-block";
		animationTimeout( function() { pause = false}, 100);
	}
	
}

function releaseTouch() {
	left=false;
	right=false;
}

function pauseButton() {
	if (pause === false) {
		document.getElementById("pausebutton").style.display="none";
		document.getElementById("playbutton").style.display="inline-block";
		animationTimeout( function() { pause = true}, 100);
	}
}

function playButton() {
	if (pause === true) {
		document.getElementById("playbutton").style.display="none";
		document.getElementById("pausebutton").style.display="inline-block";
		animationTimeout( function() { pause = false}, 100);
	}
}

function checktouch() {
	document.addEventListener("touchstart", touch);
	document.addEventListener("touchend", releaseTouch);
}

////// other functions //////


//function to clear canvas
function clearCanvas() {
	bgctx.clearRect(0,0,canvas.width,canvas.height);
	playerctx.clearRect(0,0,canvas.width,canvas.height);
	asteroidctx.clearRect(0,0,canvas.width,canvas.height);
	hudctx.clearRect(0,0,canvas.width,canvas.height);
}

// draw the score in the upper left corner
function drawscore() {
	
	document.getElementById("inputScore").innerHTML = score;
	
	document.getElementById("inputLives").innerHTML = lives;

	//hudctx.fillStyle = "#FFFFFF";
	//hudctx.font = "15px Arial";
	//hudctx.fillText("Level:",20,195);
	//hudctx.fillStyle = "#FFFFFF";
	//hudctx.font = "25px Arial";
	//hudctx.fillText(Level,70,199);
}

// preload Images
function preloadImages() {
	var imgPlayer = new Image();
	var imgPlayerLeft = new Image();
	var imgPlayerRight = new Image();
	var imgAsteroid1 = new Image();
	var imgAsteroid2 = new Image();
	var imgAsteroid3 = new Image();
	var imgAsteroid4 = new Image();
	var imgAsteroid5 = new Image();
	
		document.onload = function(){
    		playerctx.drawImage(imgPlayer);
			imgPlayer.src = "templates/home/js/images/player-sheet.png";
			playerctx.drawImage(imgPlayerLeft);
			imgPlayer.src = "templates/home/js/images/player-sheet-left.png";
			playerctx.drawImage(imgPlayerRight);
			imgPlayer.src = "templates/home/js/images/player-sheet-right.png";
			
			asteroidctx.drawImage(imgAsteroid1);
			imgAsteroid1.src = "templates/home/js/images/asteroid1.png";
			
			asteroidctx.drawImage(imgAsteroid2);
			imgAsteroid2.src = "templates/home/js/images/asteroid2.png";
			
			asteroidctx.drawImage(imgAsteroid3);
			imgAsteroid3.src = "templates/home/js/images/asteroid3.png";
			
			asteroidctx.drawImage(imgAsteroid4);
			imgAsteroid4.src = "templates/home/js/images/asteroid4.png";
			
			asteroidctx.drawImage(imgAsteroid5);
			imgAsteroid5.src = "templates/home/js/images/asteroid5.png";
		}
		
}

// set/reset background speed

function bgspeedReset() {
	document.getElementById("bgimage").style.animation = "bg_roll linear infinite " + (100/bgspeed) + "s";
	
	document.getElementById("bgimage").style["-moz-animation"] = "bg_roll linear infinite " + (100/bgspeed) + "s";
	
	document.getElementById("bgimage").style["-ms-animation"] = "bg_roll linear infinite " + (100/bgspeed) + "s";
	
	document.getElementById("bgimage").style["-webkit-animation"] = "bg_roll linear infinite " + (100/bgspeed) + "s";
}

function bgspeedPause() {
	document.getElementById("bgimage").style.animation = "none";
	
	document.getElementById("bgimage").style["-moz-animation"] = "none";
	
	document.getElementById("bgimage").style["-ms-animation"] = "none";
	
	document.getElementById("bgimage").style["-webkit-animation"] = "none";
}

/// Animation frame Timeout alternative

window.animationTimeout=function(callback,delay){
 var dateNow=Date.now,
     requestAnimation=window.requestAnimationFrame,
     start=dateNow(),
     stop,
     timeoutFunc=function(){
      dateNow()-start<delay?stop||requestAnimation(timeoutFunc):callback()
     };
 requestAnimation(timeoutFunc);
 return{
  clear:function(){stop=1}
 }
}

/// Animation frame Interval alternative

window.animationInterval=function(callback,delay){
 var dateNow=Date.now,
     requestAnimation=window.requestAnimationFrame,
     start=dateNow(),
     stop,
     intervalFunc=function(){
      dateNow()-start<delay||(start+=delay,callback());
      stop||requestAnimation(intervalFunc)
     }
 requestAnimation(intervalFunc);
 return{
  clear:function(){stop=1}
 }
}

//////////////// PLAYER SHIP ////////////////


// Draw Player ship.

var player = {
	x: canvas.width*0.5,
	y: canvas.height-75,
	size: 100,
	speed: 5,
	frame: 1,
	framerate: 20,
	coldist: 22   //should be 80% of "size" value
	};

//draw ship
function ship(x,y) {
	var x = player.x;
	var y = player.y;
	
	var playerStraight = "templates/home/js/images/player-sheet.png";
	var playerLeft = "templates/home/js/images/player-sheet-left.png";
	var playerRight = "templates/home/js/images/player-sheet-right.png";
	
	if (left===true) { var playerSrc = playerLeft; }
	if (right===true) { var playerSrc = playerRight; }
	if (left===false && right===false) { var playerSrc = playerStraight;}
		
	if (dead === false) {
		var img = new Image();
		img.src = playerSrc;
		
		if (player.frame === 1) {
			playerctx.drawImage(img, 0, 0, player.size, player.size, player.x-player.size*0.5, player.y-player.size*0.5, player.size, player.size);
			//switch to frame 2
			animationTimeout( function() { player.frame= 2;}, 1000/player.framerate);
		}
		if (player.frame === 2) {
			//draw image on frame 1
			playerctx.drawImage(img, player.size, 0, player.size, player.size, player.x-player.size*0.5, player.y-player.size*0.5, player.size, player.size);
			//switch to frame 2
			animationTimeout( function() { player.frame= 1;}, 1000/player.framerate);
		}
	}
}



// move player ship.
function moveShip() {
	document.onkeydown = onkeydown;
	document.onkeyup = onkeyup;
	
	if (left === true 
	&& player.x > player.size*0.5 
	&& dead === false) {
		
		player.x -= player.speed;
	}
	
	if (right === true 
	&& player.x < canvas.width-player.size*0.5 
	&&dead === false) {
		
		player.x += player.speed;
	}
	
	//wrap around
	//if (player.x > canvas.width+16) {
	//	player.x = -15;
	//}
	//if (player.x < -16) {
	//	player.x = canvas.width+15;
	//}
}


//////////////// ASTEROIDS ////////////////

//all asteroids
var asteroids = {
	startY: -100,
	speed: 6,
	minsize: 25,
	maxsize: 80,
	color: "#f7941d",
	padding: 200,
	spawning: true,
	quantity: 0,
	// frequency is in milliseconds
	frequency: 1000
};

// other asteroids

var asteroid1 = {
	size: Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize),
	y: asteroids.startY,
	x: Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding),
	speed: asteroids.speed,
	exists: false
};
var asteroid2 = {
	size: Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize),
	y: asteroids.startY,
	x: Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding),
	speed: asteroids.speed,
	exists: false
};
var asteroid3 = {
	size: Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize),
	y: asteroids.startY,
	x: Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding),
	speed: asteroids.speed,
	exists: false
};
var asteroid4 = {
	size: Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize),
	y: asteroids.startY,
	x: Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding),
	speed: asteroids.speed,
	exists: false
};
var asteroid5 = {
	size: Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize),
	y: asteroids.startY,
	x: Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding),
	speed: asteroids.speed,
	exists: false
};

// draw asteroids
function drawAsteroid1() {
	if (asteroid1.y < canvas.height+asteroids.maxsize+25) {
	
		asteroid1.exists = true;
		this.x = asteroid1.x;
		this.y = asteroid1.y;
		this.size = asteroid1.size;
		asteroidctx.fillStyle = asteroids.color;
	
		var img = new Image();
		img.src = "templates/home/js/images/asteroid1.png";
		asteroidctx.drawImage(img,this.x-this.size*0.5,this.y-this.size*0.5,this.size,this.size);	
	} else {
		asteroid1.exists = false;
		console.log("asteroid 1 has perished")
	}
}

function drawAsteroid2() {
	if (asteroid2.y < canvas.height+asteroids.maxsize+25) {
	
		asteroid2.exists = true;
		this.x = asteroid2.x;
		this.y = asteroid2.y;
		this.size = asteroid2.size;
		asteroidctx.fillStyle = asteroids.color;
	
		var img = new Image();
		img.src = "templates/home/js/images/asteroid2.png";
		asteroidctx.drawImage(img,this.x-this.size*0.5,this.y-this.size*0.5,this.size,this.size);		
	} else {
		asteroid2.exists = false;
		console.log("asteroid 2 has perished")
	}
}

function drawAsteroid3() {
	if (asteroid3.y < canvas.height+asteroids.maxsize+25) {
	
		asteroid3.exists = true;
		this.x = asteroid3.x;
		this.y = asteroid3.y;
		this.size = asteroid3.size;
		asteroidctx.fillStyle = asteroids.color;
	
		var img = new Image();
		img.src = "templates/home/js/images/asteroid3.png";
		asteroidctx.drawImage(img,this.x-this.size*0.5,this.y-this.size*0.5,this.size,this.size);			
	} else {
		asteroid3.exists = false;
		console.log("asteroid 3 has perished")
	}
}

function drawAsteroid4() {
	if (asteroid4.y < canvas.height+asteroids.maxsize+25) {
	
		asteroid4.exists = true;
		this.x = asteroid4.x;
		this.y = asteroid4.y;
		this.size = asteroid4.size;
		asteroidctx.fillStyle = asteroids.color;
	
		var img = new Image();
		img.src = "templates/home/js/images/asteroid4.png";
		asteroidctx.drawImage(img,this.x-this.size*0.5,this.y-this.size*0.5,this.size,this.size);			
	} else {
		asteroid4.exists = false;
		console.log("asteroid 4 has perished")
	}
}

function drawAsteroid5() {
	if (asteroid5.y < canvas.height+asteroids.maxsize+25) {
	
		asteroid5.exists = true;
		this.x = asteroid5.x;
		this.y = asteroid5.y;
		this.size = asteroid5.size;
		asteroidctx.fillStyle = asteroids.color;
	
		var img = new Image();
		img.src = "templates/home/js/images/asteroid5.png";
		asteroidctx.drawImage(img,this.x-this.size*0.5,this.y-this.size*0.5,this.size,this.size);		
	} else {
		asteroid5.exists = false;
		console.log("asteroid 5 has perished")
	}
}


// move asteroids
function moveAsteroids() {
	if (asteroid1.exists == true) {
		asteroid1.y += asteroids.speed;
		drawAsteroid1();
	}
	if (asteroid2.exists == true) {
		asteroid2.y += asteroids.speed;
		drawAsteroid2();
	}
	if (asteroid3.exists == true) {
		asteroid3.y += asteroids.speed;
		drawAsteroid3();
	}
	if (asteroid4.exists == true) {
		asteroid4.y += asteroids.speed;
		drawAsteroid4();
	}
	if (asteroid5.exists == true) {
		asteroid5.y += asteroids.speed;
		drawAsteroid5();
	}
}

// Creating new asteroids

function createAsteroids() {
	
	if (asteroids.quantity === 4 && dead === false && pause === false) { 
		asteroid5.size = Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize);
		asteroid5.y = asteroids.startY;
		asteroid5.x = Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding);
		
		drawAsteroid5();
	}
	if (asteroids.quantity === 3 && dead === false && pause === false) {
		asteroid4.size = Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize);
		asteroid4.y = asteroids.startY;
		asteroid4.x = Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding);
		
		drawAsteroid4();
	}
	if (asteroids.quantity === 2 && dead === false && pause === false) {
		asteroid3.size = Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize);
		asteroid3.y = asteroids.startY;
		asteroid3.x = Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding);
		
		drawAsteroid3();
	}
	if (asteroids.quantity === 1 && dead === false && pause === false) {
		asteroid2.size = Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize);
		asteroid2.y = asteroids.startY;
		asteroid2.x = Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding);
		
		drawAsteroid2();
	}
	if (asteroids.quantity === 0 && dead === false && pause === false) {
		
		asteroid1.size = Math.floor((Math.random() * asteroids.maxsize) + asteroids.minsize);
		asteroid1.y = asteroids.startY;
		asteroid1.x = Math.floor((Math.random() * canvas.width-asteroids.padding) + asteroids.padding);
		
		drawAsteroid1();
	}
	
	if (asteroids.quantity < 4 && pause === false) {
		asteroids.quantity += 1;
	}
	if (asteroids.quantity === 4) {
		asteroids.quantity = 0;
	}
	animationTimeout (createAsteroids, asteroids.frequency);
}


////////// GAME OVER ///////////

// Check collision of asteroid with player

var dist = function(x1,y1,x2,y2) {
	this.x1 = x1;
	this.y1 = y1;
	this.x2 = x2;
	this.y2 = y2;
	
	var a = x2-x1;
	var b = y2-y1
	
	return Math.sqrt(a*a+b*b);
};

function checkCollision() {
	var distance = {
	ast1: dist(asteroid1.x,asteroid1.y,player.x,player.y),
	ast2: dist(asteroid2.x,asteroid2.y,player.x,player.y),
	ast3: dist(asteroid3.x,asteroid3.y,player.x,player.y),
	ast4: dist(asteroid4.x,asteroid4.y,player.x,player.y),
	ast5: dist(asteroid5.x,asteroid5.y,player.x,player.y)
	};
	
	//check collision
	if ((distance.ast1 < player.coldist+asteroid1.size*0.5) || 
		(distance.ast2 < player.coldist+asteroid2.size*0.5) || 
		(distance.ast3 < player.coldist+asteroid3.size*0.5) || 
		(distance.ast4 < player.coldist+asteroid4.size*0.5) || 
		(distance.ast5 < player.coldist+asteroid5.size*0.5) &&
		recovering === false) {
			
		dead = true;
		player.x = undefined;
		player.y = undefined;
		lives -= 1;
		animationTimeout( function() {
			player.x = canvas.width/2;
			player.y = canvas.height-75;
			recovering = true;
			dead = false;
		}, 3000);
		animationTimeout( function() {
			console.log("recovering complete");
			recovering = false;
		}, 5000);
	}
	
	if (lives <= 0) {
		dead = true;
		player.x = undefined;
		player.y = undefined;
		
		hudctx.fillStyle = "#FFFFFF";
		hudctx.font = "30px Arial";
		hudctx.fontWeight = "900";
		hudctx.fillText("Game Over",22, canvas.height*0.5-20);
		
		hudctx.fillStyle = "#FFFFFF";
		hudctx.font = "15px Arial";
		hudctx.fillText("You Scored "+score,27, canvas.height*0.5+10);
		hudctx.fillText("Tap to restart",27, canvas.height*0.5+40);
		
		animationTimeout ( function() { gameover = true; }, 2000);
		
	}
	
}


// make it harder as you go
function lvlup() {
	if (lives>0 && pause === false) {
	
	Level += 1;
	score += 50*Level
	
	player.speed += 0.1;
	
	bgspeed += 20;
	//bgspeedReset();
	
	asteroids.speed += 0.25;
	asteroids.frequency = asteroids.frequency*0.97;
	if (asteroids.maxsize < (canvas.width*0.5)) {
		asteroids.maxsize +=5;
		asteroids.minsize +=1.5;
	} else {
		if (asteroids.minsize < (canvas.width*0.33)) {
			asteroids.minsize +=5;
		}
	}
	
	}
}

function upscore() {
	if (dead == false && pause === false) {
		score += 1;
	}
}