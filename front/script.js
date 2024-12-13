let divs = document.querySelectorAll("div");
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
