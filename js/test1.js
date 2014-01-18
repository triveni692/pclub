
minRadius = 5;
maxRadius = 50;
minVel = -2;
maxVel = 2;
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
	var H = "300px"; var W = "400px";
                
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
    
    //DETERMINES WHERE TO START OFF SCREEN, HAS TO BE THIS LENGTHY
    this.x=30;
    this.y=40;
    this.vy=0;
    this.vx=0;


                }

                function draw()
                {

                    for(var t = 0; t < particles.length; t++) 
                    {
                        var p = particles[t];
                        var textText = ["while(1)alert(welcome);", "haskell","ruby","python","C","java","sql","void main(){}","select * from pclub","def pclub end","printf('Hello World');","C++"];
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

