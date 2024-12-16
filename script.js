// Fonction pour colorer la réponse correcte/incorrecte
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

            // Mettre à jour le titre de la question
            document.getElementById('question-title').textContent = data.questionName;

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

            // Réappliquer l'événement de clic sur les nouvelles réponses
            const answers = document.querySelectorAll('.reponse');
            answers.forEach(answer => {
                answer.addEventListener('click', colorCorrectAnswerOnClick);
            });

            // Mettre à jour la pagination
            document.getElementById('pagination').textContent = `${data.idQuestion}/10`;
        })
        .catch(error => console.error('Erreur lors de la requête :', error));
});


