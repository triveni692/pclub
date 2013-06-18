
              //Lets create a simple particle system in HTML5 canvas and JS

                //Initializing the canvas
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");

function checkBrowser(){
	browser = new Object();
	browser.height = document.documentElement.clientHeight;
	browser.width = document.documentElement.clientWidth;
	//IF BROWSER HEIGHT OR WIDTH HAS CHANGED, FIX
	var canvas = document.getElementById("canvas");
	if(parseInt(canvas.style.width) != parseInt(browser.width) || parseInt(canvas.style.height) !=
	parseInt(browser.height)){
		canvas.style.width = browser.width+"px";
		canvas.style.height = browser.height+"px";
	}
	return browser;
}	

var browser = new checkBrowser();
	//document.getElementById("canvas").style.height = browser.width+"px";
	//document.getElementById("canvas").style.height = browser.height+"px";
	document.getElementById("canvas").setAttribute("height",browser.height+"px");
	document.getElementById("canvas").setAttribute("width",browser.width+"px");
	var H = browser.height; var W = browser.width;
                
                //Lets create an array of words
                var particles = [];
                for(var i = 0; i < 10; i++)
                {
                    //This will add 10 words to the array with random positions
                    particles.push(new create_particle());
                }
                
                //Lets create a function which will help us to create multiple particles
                function create_particle()
                {                    var browser = new checkBrowser();
                    	var H=browser.height; var W = browser.width;
                    //Places the words at random positions on the canvas
                    this.x = Math.random()*W; //Notice I am using the W again here with a random number between 0 and 1. 
                    this.y = Math.random()*H; //Notice I am using the H again here with a random number between 0 and 1. 
                    
                    //Lets add random velocity to each particle. 
                    this.vx = Math.random()*-1; // Change the number 50 to change the speed.  Lower is slower.
                    this.vy = Math.random()*1;  // Change the number 50 to change the speed.  Lower is slower. 

                }

                
                //Lets animate and draw the words.
                function draw()
                {

                    var browser = new checkBrowser();
                    	var H=browser.height; var W = browser.width;
                    //Lets draw particles from the array now
                    // t represents the number of words in the array which is 10
                    for(var t = 0; t < particles.length; t++) 
                    {
                        //Creats the words
                        var p = particles[t];
                        //An array of text to use for each separate word particle
                        var textText = ["while(1)alert(welcome);", "haskell","ruby","python","C","java","sql","void main(){}","select * from pclub","def pclub end"];
                        
                        //An array of colors to use with each fill or stroke
                        var texttheme = ["#199BFF","#B1B260","#FCFF00","#CC9897","#B20C09","#199BFF","#B1B260","#FCFF00","#CC9897","#B20C09","#FFFFFF"];
                        
                        //An array of Google Web Fonts 
                        var textfont = ["Molle","Fascinate Inline","Skranji","Just Me Again Down Here","Stalinist One","Kavoon","Berkshire Swash","Henny Penny","Butcherman","Audiowide"];
                        
                        //This is the size of the text combined with the type of font.
                        //The textfont[t] means that it will choose the font at that place in the font array as t is counted 
                        //through the loop.  So, if t = 1, it will choose Molle as its font.  If t = 6 it will choose Kavoon.  
                        ctx.font = "25px '"+textfont[t]+"'";
                        
                        //This is the thickness of the line or border around the text.  
                        ctx.lineWidth = 3; 
                        
                        //Chooses the color of the border around the word
                        ctx.strokeStyle = texttheme[t];
                        ctx.globalAlpha = 0.4;
                        
                        //Chooses the color of the fill inside the word
                        ctx.fillStyle = texttheme[t+1];
                        
                        //Chooses the text from the array of text for the border of the word
                       ctx.fillText(textText[t], p.x, p.y);
   
                        
                        //Lets use the velocity now which means movement.  
                        p.x += p.vx;
                        p.y += p.vy;
                        
                        //To prevent the words from moving out of the canvas
                        if(p.x < -50) p.x = W+50;
                        if(p.y < -50) p.y = H+50;
                        if(p.x > W+50) p.x = -50;
                        if(p.y > H+50) p.y = -50;
                        
                    }
                   
                }
                //Function that clears the canvas at each interval which creates movement
                function clearf () {
                  ctx.clearRect(0, 0, canvas.width, canvas.height); 
                }
                //Clear interval fires the function that clears the canvas.  
                setInterval(clearf, 40);
                //Draw interval fires the function that draws the words on the canvas
                setInterval(draw, 40);

