let playerScore = 0;
let compScore = 0;

function getCompChoice(){
    const choices = ['R', 'P', 'S'];
    const randomNumber = Math.floor(Math.random()*3);
    return choices[randomNumber];
}

function getPlayerChoice(){
    const choices = ['R', 'P', 'S'];
    const randomNumber = Math.floor(Math.random()*3);
    return choices[randomNumber];
}

function win(player,computer){
    playerScore++;
    console.log("You Won !");
}

function lost(player,computer){
    compScore++;
    console.log("You Lost !");
}

function draw(player,computer){
    playerScore = playerScore;
    compScore = compScore;
    console.log("Its Draw !")
}

function game(){
     const PlayChoice = getPlayerChoice();
     const CompChoice = getCompChoice();
    switch(PlayChoice + CompChoice){
        case "RP":
        case "PS":
        case "SR":
            lost(PlayChoice,CompChoice);
            break;
        case "RS":
        case "PR":
        case "SP":
           win(PlayChoice,CompChoice);
            break;
        case "RR":
        case "SS":
        case "PP":
            draw(PlayChoice,CompChoice);
            break;
    }
}

function loop(){
    for(let i=0; i<5; i++){
        game();
    }
    console.log("Final Score ! \n Player = "+playerScore+"\n Computer = "+compScore);
}

loop();
 