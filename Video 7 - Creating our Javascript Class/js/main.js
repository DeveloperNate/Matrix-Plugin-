
class Matrix { 

    constructor(htmlObject) { // passes the DOM text container into our Javasctipt file 
        this.htmlObject = htmlObject; // puts the DOM object into the classed attribute so we can use it through the class
        this.chars = '1234567890ABCDEFGHIJKLMNOPQRSTUZWXYZ'; // assigns our characters to use in our animation 
    }

    getTextData(newPhrase) { // this function gets all the vital information from both phrases
        const oldPhrase = this.htmlObject.innerText; // uses the DOM object to find out the inner text of the text container - On first loop, there will be no value 
        const length = Math.max(oldPhrase.length, newPhrase.length); // finding the max length of both the old text and new text 
        
        this.allData = []; // creates an array that we can put all our values into
    }
}