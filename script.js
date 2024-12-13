function colorCorrectAnswerOnClick(event) {
    const answer = event.target;

    // Vérifie si c'est bien une div avec la classe 'reponse'
    if (answer.classList.contains('reponse')) {
        if (answer.getAttribute('data-correct') === 'true') {
            answer.classList.add("bon"); // Réponse correcte
        } else {
            answer.classList.add("mauvais"); // Réponse incorrecte (optionnel)
        }
    }
}

// Applique le gestionnaire d'événement au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    const answers = document.querySelectorAll('.reponse');
    answers.forEach(answer => {
        answer.addEventListener('click', colorCorrectAnswerOnClick); // Ajoute l'événement de clic
    });
});

// Mise à jour dynamique des questions
document.getElementById('nextQuestion').addEventListener('click', function () {
    fetch('update_question.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Erreur :', data.error);
                return;
            }

            // Mettre à jour le numéro de la question
            document.getElementById('pagination').textContent = `${data.idQuestion}/10`;

            // Mettre à jour les réponses
            const articleQuizz = document.getElementById('article-quizz');
            articleQuizz.innerHTML = ''; // Effacer les anciennes réponses
            data.answers.forEach(answer => {
                const div = document.createElement('div');
                div.className = 'reponse';
                div.setAttribute('data-correct', answer.isCorrect ? 'true' : 'false');
                div.textContent = answer.textReponse;
                articleQuizz.appendChild(div);
            });

            // Appliquer l'événement de clic sur les nouvelles réponses
            const answers = document.querySelectorAll('.reponse');
            answers.forEach(answer => {
                answer.addEventListener('click', colorCorrectAnswerOnClick); // Ajoute l'événement de clic aux nouvelles réponses
            });
        })
        .catch(error => console.error('Erreur lors de la requête :', error));
});


document.getElementById('resetSession').addEventListener('click', function () {
  fetch('reset_session.php')
      .then(response => response.json())
      .then(data => {
          console.log(data.message);
          // Réinitialiser l'affichage à la première question
          document.getElementById('pagination').textContent = `1/10`;
          document.getElementById('article-quizz').innerHTML = '<p>Veuillez cliquer sur "Question Suivante" pour commencer.</p>';
      })
      .catch(error => console.error('Erreur lors de la réinitialisation :', error));
});


