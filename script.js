let divs = document.querySelectorAll(".reponse");

divs.forEach((div) => {
  div.addEventListener("click", clicktesmorts);
});

function clicktesmorts(event) {
  if (event.target.id === "bon") {
    event.target.classList.add("bon");
  } else {
    event.target.classList.add("mauvais");
  }
}
