//inserisco in delle variabili i riferimenti agli elementi che devo modificare nel file
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

//evento che al click dell'elemento 'signUp' permette di cambiare la classe dell'elemento 'container'
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

//evento che al click dell'elemento 'signIn' permette di cambiare la classe dell'elemento 'container'
signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});