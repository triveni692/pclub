
minRadius = 5;
maxRadius = 50;
minVel = -2;
maxVel = 2;
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");

function checkBrowser(){
	browser = new Object();
	browser.height = document.documentElement.clientHeight;
	browser.width = document.documentElement.clientWidth;
	var canvas = document.getElementById("canvas");
	if(parseInt(canvas.style.width) != parseInt(browser.width) || parseInt(canvas.style.height) !=
	parseInt(browser.height)){
		canvas.style.width = browser.width+"px";
		canvas.style.height = browser.height+"px";
	}
	return browser;
}	

var browser = new checkBrowser();
	document.getElementById("canvas").setAttribute("height",browser.height+"px");
	document.getElementById("canvas").setAttribute("width",browser.width+"px");
	var H = browser.height; var W = browser.width;
                
                //Lets create an array of words
                var particles = [];
                for(var i = 0; i < 12; i++)
                {
                    //This will add 10 words to the array with random positions
                    particles.push(new create_particle());
                }
                
                //Lets create a function which will help us to create multiple particles
                function create_particle()
                {                 

var browser = new checkBrowser();
    this.rad = randomXToY(minRadius,maxRadius);
    
    //DETERMINES WHERE TO START OFF SCREEN, HAS TO BE THIS LENGTHY
    if(betweenZeroAnd(2) == 1){
        //ANYWHERE ON THE Y AXIS
        this.y = randomXToY(0 - this.rad,browser.height + this.rad);
        
        if(betweenZeroAnd(2) == 1){
            //LEFT SIDE
            this.x = 0 - this.rad;
        }else{
            //RIGHT SIDE
            this.x = browser.width + this.rad;
        }
    }else{
        //ANYWHERE ON THE X AXIS
        this.x = randomXToY(0 - this.rad,browser.width + this.rad);
        if(betweenZeroAnd(2) == 1){
            //TOP SIDE
            this.y = 0 - this.rad;
        }else{
            //BOTTOM SIDE
            this.y = browser.height + this.rad;
        }
    }
    
    if(this.x < 0){
        this.vx = randomXToY(0,maxVel);
    }else{
        this.vx = randomXToY(minVel,minVel+maxVel);
    }
    
    if(this.y < 0){
        this.vy = randomXToY(0,maxVel);
    }else{
        this.vy = randomXToY(minVel,maxVel-minVel);
    }
    //ENSURE CIRCLE IS NOT STATIONARY;
    if(this.vx == 0 && this.vy ==0){
        this.vy = 1;
    }
                }

                function draw()
                {

                    var browser = new checkBrowser();
                    	var H=browser.height; var W = browser.width;

                    for(var t = 0; t < particles.length; t++) 
                    {
                        var p = particles[t];
                        var textText = ["JAVA", "haskell","ruby","python","C","PHP","Ruby","VB","C#","Scala","Perl","C++"];
                        var texttheme = ["#199BFF","#B1B260","#FCFF00","#CC9897","#B20C09","#199BFF","#B1B260","#FCFF00","#CC9897","#B20C09","#FFFFFF","#199BFF","#FCFF00"];
                        var textfont = ["Molle","Fascinate Inline","Skranji","Just Me Again Down Here","Stalinist One","Kavoon","Berkshire Swash","Henny Penny","Butcherman","Audiowide","Berkshire Swash","Just Me Again Down Here"];
                        
                        ctx.font = "25px '"+textfont[t]+"'";
                        ctx.lineWidth = 3; 
                        ctx.strokeStyle = texttheme[t];
                        ctx.globalAlpha = 0.4;
                        ctx.fillStyle = texttheme[t+1];
                       ctx.fillText(textText[t], p.x, p.y); 
                        p.x += p.vx;
                        p.y += p.vy;
                        
                        //To prevent the words from moving out of the canvas
                        if(p.x < -50) p.x = W+50;
                        if(p.y < -50) p.y = H+50;
                        if(p.x > W+50) p.x = -50;
                        if(p.y > H+50) p.y = -50;
                        
                    }
                   
                }
                function clearf () {
                  ctx.clearRect(0, 0, canvas.width, canvas.height); 
                } 
                setInterval(clearf, 40);
                setInterval(draw, 40);


                function betweenZeroAnd(num){
return Math.floor(Math.random()*(num))
}

//RETURNS NUMBER BETWEEN X AND Y, FLOAT VAL IS DECIMAL PLACES
function randomXToY(minVal,maxVal,floatVal){
  var randVal = minVal+(Math.random()*(maxVal-minVal));
  return typeof floatVal=='undefined'?Math.round(randVal):randVal.toFixed(floatVal);
}

