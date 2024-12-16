// Variable pour suivre si une réponse a été sélectionnée
let hasSelectedAnswer = false;

// Fonction pour colorer la réponse correcte/incorrecte
function colorCorrectAnswerOnClick(event) {
  const answer = event.target;

  // Vérifie si c'est bien une div avec la classe 'reponse'
  if (answer.classList.contains("reponse")) {
    // Réinitialiser la sélection des autres réponses
    const answers = document.querySelectorAll(".reponse");
    answers.forEach((otherAnswer) => {
      otherAnswer.classList.remove("bon", "mauvais", "selected");
    });

    // Marquer la réponse sélectionnée
    answer.classList.add("selected");
    hasSelectedAnswer = true; // Marquer qu'une réponse a été sélectionnée
  }
}

// Applique le gestionnaire d'événement au chargement de la page
document.addEventListener("DOMContentLoaded", function () {
  const answers = document.querySelectorAll(".reponse");
  answers.forEach((answer) => {
    answer.addEventListener("click", colorCorrectAnswerOnClick); // Ajoute l'événement de clic
  });
});

// Mise à jour dynamique des questions
const nextButton = document.getElementById("nextQuestion");
nextButton.addEventListener("click", function () {
  // Vérifier si une réponse a été sélectionnée avant de passer à la question suivante
  if (!hasSelectedAnswer) {
    alert(
      "Veuillez sélectionner une réponse avant de passer à la question suivante !"
    );
    return;
  }

  // Colorer la réponse correcte/incorrecte uniquement si une réponse a été sélectionnée
  const answers = document.querySelectorAll(".reponse");
  answers.forEach((answer) => {
    if (answer.getAttribute("data-correct") === "true") {
      answer.classList.add("bon"); // Réponse correcte
    }
    if (
      answer.classList.contains("selected") &&
      answer.getAttribute("data-correct") !== "true"
    ) {
      answer.classList.add("mauvais"); // Réponse incorrecte
    }
  });

  // Passer à la question suivante après un délai pour montrer les couleurs
  setTimeout(() => {
    // Réinitialiser l'état de sélection pour la prochaine question
    hasSelectedAnswer = false;

    fetch("update_question.php")
      .then((response) => response.json())
      .then((data) => {
        if (data.error) {
          console.error("Erreur :", data.error);
          return;
        }

        // Mettre à jour le titre de la question
        document.getElementById("question-title").textContent =
          data.questionName;

        // Mettre à jour les réponses
        const articleQuizz = document.getElementById("article-quizz");
        articleQuizz.innerHTML = ""; // Effacer les anciennes réponses
        data.answers.forEach((answer) => {
          const div = document.createElement("div");
          div.className = "reponse";
          div.setAttribute("data-correct", answer.isCorrect ? "true" : "false");
          div.textContent = answer.textReponse;
          articleQuizz.appendChild(div);
        });

        // Réappliquer l'événement de clic sur les nouvelles réponses
        const newAnswers = document.querySelectorAll(".reponse");
        newAnswers.forEach((answer) => {
          answer.addEventListener("click", colorCorrectAnswerOnClick);
        });

        // Mettre à jour la pagination
        document.getElementById(
          "pagination"
        ).textContent = `${data.idQuestion}/10`;
      })
      .catch((error) => console.error("Erreur lors de la requête :", error));
  }, 1000);
});
