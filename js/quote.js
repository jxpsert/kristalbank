window.addEventListener('load', (event) => {
    let quotething = document.getElementById("quote"); // Getting the <span> element
    let quotes = ["Bank der kristallen.", "Een bank voor Kristallis.", "Bank.", "Spaar kristallen.", "Make kristallen, not war."];
    let randomquote = quotes[Math.floor(Math.random() * quotes.length)]; // Selecting random from array
    quotething.textContent = randomquote; // Setting text
});