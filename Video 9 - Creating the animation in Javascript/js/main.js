
class Matrix { 

    constructor(htmlObject) { // passes the DOM text container into our Javasctipt file 
        this.htmlObject = htmlObject; // puts the DOM object into the classed attribute so we can use it through the class
        this.chars = '1234567890ABCDEFGHIJKLMNOPQRSTUZWXYZ'; // assigns our characters to use in our animation 
        this.duration = 40; 
    }

    getTextData(newPhrase) { // this function gets all the vital information from both phrases
        const oldPhrase = this.htmlObject.innerText; // uses the DOM object to find out the inner text of the text container - On first loop, there will be no value 
        const length = Math.max(oldPhrase.length, newPhrase.length); // finding the max length of both the old text and new text 
        this.allData = []; // creates an array that we can put all our values into
        let randomChar = ""; // adds a empty char 
        for (let i = 0; i < length; i++) { // loops round the max length of the old or next text 
            const oldChar = oldPhrase[i] || ''; // as it loops round puts the text into the new variable if there is no value, we added a empty character 
            const newChar = newPhrase[i] || ''; // as it loops round puts the text into the new variable if there is no value, we added a empty character 
            const animationStart = Math.floor(Math.random() * this.duration ); // we create a random start value for the animation  
            const animationEnd = animationStart + Math.floor(Math.random() * this.duration ); // we create a random finish value to complete the change by
            this.allData.push({ oldChar, newChar, animationStart, animationEnd , randomChar }); // we add all the value onto an array . This will be an array of arrays of all the values 
        }
        this.frame = 0;  // starts a flag for our frame animation 
        this.animatePhrase(); // calls our update method 
    }

    animatePhrase() {
        let output = ''; // create our value that will be outputted 
        let complete = 0; // this will be the flag we used to see if we want to start the animation or finish it 
        for (let i = 0, n = this.allData.length; i < n; i++) { // loops around the queue attributes as this holds all the data for both our old and new text 
            let { oldChar, newChar, animationStart, animationEnd , randomChar } = this.allData[i]; // create new variables for each of the values in the array
            if (this.frame >= animationEnd) { // compares our animation frame to the end animation value 
                output += newChar; // adds the new character to our output 
                complete++; // if frame is greater than this character will be replaced with the new character and the complete flag will be increase by one
            }
            else if (this.frame >= animationStart) { // if the frame value is greater than our start value, we will randomly pick a character to be displayed 
                if (!randomChar || Math.random() < 0.30) {  // check to see if we have already change the character once and if the random number is less than 0.30 then
                    randomChar = this.makeRandomChar();
                    this.allData[i][4]= randomChar; // save that character into the queue value
                }
                output += randomChar; //adds our char into the output value
            }
            else {
                output += oldChar; // if the frame is not greater than end or start value, put the from value into the output variable
              }
        }
        this.htmlObject.innerHTML = output; // adds the new output string onto our widget's frontend 
    }

    makeRandomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)]; // picks our characters from our class attributes 
      }
}