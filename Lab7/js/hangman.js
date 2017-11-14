var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
var selectedWord="";
var selectedHint="";
var board ="";
var remainingGuesses=6;
var words = ["snake", "monkey", "beetle"];

window.onload = startGame;
            


function startGame(){
    pickWord();
    initBoard();
    updateBoard();
}
            
function initBoard(){
    for(var letter in selectedWord){
        board+= '_';
    }
}

function pickWord(){
   var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt];
}

function updateBoard(){
    for(var letter of board){
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function createLetters(){
    for (var letter of alphabet){
        $("#letters").append("<button class ='letter' id='" + letter + "'>" + letter + "</button>");
    }
}


       