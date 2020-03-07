
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
        //
    }
}