// // objects and arrays

// // array
// var myFavColors = ["blue", "green", "red"];

// // JSON object
// var thePets = [
//     {
//         "name": "Charlie Brown",
//         "species": "cat",
//         "favFood": "tuna"
//     },
//     {
//         "name": "Richman",
//         "species": "dog",
//         "favFood": "chicken"
//     }
// ]
/*
// variable that points the div with id "animal-info"
var animalContainer = document.getElementById("animal-info");

// getting the button by its id
var btn = document.getElementById("btn");

// add an event when the button is clicked
btn.addEventListener("click", function() {
    /* 1. Make the Request *
    // the http request
    var ourRequest = new XMLHttpRequest();
    
    // open and get from request
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-1.json');
    
    // this is what runs once the data loads, set equal to an "anonymous" request
    ourRequest.onload = function() {
        // the data passed from the request call will be processed into JSON
        var ourData = JSON.parse(ourRequest.responseText);
        
        //console.log(ourData);
        //console.log(ourRequest.responseText);
    
        // call the renderHTML()
        renderHTML(ourData);
    };
    
    /* 2. Send the Request *
    ourRequest.send();
});

// add and create HTML to the new page
function renderHTML(data) {
    // target the div with id "animal-info"
    document.getElementById("animal-info").innerHTML = "Hello Worlds";
}*/
//var pageCounter = 1;
var animalContainer = document.getElementById("animal-info");
/*var btn = document.getElementById("btn");

btn.addEventListener("click", function() {
  var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
  ourRequest.onload = function() {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
      var ourData = JSON.parse(ourRequest.responseText);
      renderHTML(ourData);
    } else {
      console.log("We connected to the server, but it returned an error.");
    }
    
  };

  ourRequest.onerror = function() {
    console.log("Connection error");
  };

  ourRequest.send();
  pageCounter++;
  if (pageCounter > 3) {
    btn.classList.add("hide-me");
  }
});

function renderHTML(data) {
  var htmlString = "";

  for (i = 0; i < data.length; i++) {
    htmlString += "<p>" + data[i].name + " is a " + data[i].species + " that likes to eat ";
    
    for (ii = 0; ii < data[i].foods.likes.length; ii++) {
      if (ii == 0) {
        htmlString += data[i].foods.likes[ii];
      } else {
        htmlString += " and " + data[i].foods.likes[ii];
      }
    }

    htmlString += ' and dislikes ';

    for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
      if (ii == 0) {
        htmlString += data[i].foods.dislikes[ii];
      } else {
        htmlString += " and " + data[i].foods.dislikes[ii];
      }
    }

    htmlString += '.</p>';

  }*/

  animalContainer.appendChild("<p>").innerHTML = "hELLO world";
//}