document.addEventListener('DOMContentLoaded', () => {
  const responses = document.querySelectorAll('.reponse');

  responses.forEach(response => {
      response.addEventListener('click', () => {
          // Vérifie si la réponse est correcte
          const isCorrect = response.getAttribute('data-correct') === 'true';

          // Ajoute une classe pour la bonne réponse
          if (isCorrect) {
              response.classList.add('bon');
          } else {
              // Optionnel : ajouter une classe pour une mauvaise réponse
              response.classList.add('mauvais');
          }
      });
  });
});