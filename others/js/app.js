/*
Attraverso la funzione added è possibile cambiare la classe all'elemento del prodotto per far
vedere che è stato aggiunto al carrello e serve a incrementare il numero nel carrello
*/
function added(index){
    element = document.getElementsByClassName("bottom")[index];
    element.className += " clicked";
    styles = getComputedStyle(document.documentElement); //mi collego al foglio di stile della pagina
    var r = document.querySelector(':root'); //mi collego all'elemento root
    value = parseInt(((styles.getPropertyValue('--content')).replaceAll('"', ''))); //prendo la variabile dal css e la incremento
    value += 1;
    value = value.toString();
    r.style.setProperty('--content', '"'+value+'"'); //reimposto la variabile nel css
}

/*
Questa funzione è l'opposto della funzione added  
 */
function removed(index){
    element = document.getElementsByClassName("bottom")[index];
    element.className = "bottom";
    styles = getComputedStyle(document.documentElement); //mi collego al foglio di stile della pagina
    var r = document.querySelector(':root'); //mi collego all'elemento root
    value = parseInt(((styles.getPropertyValue('--content')).replaceAll('"', ''))); //prendo la variabile dal css e la decremento
    value -= 1;
    value = value.toString();
    r.style.setProperty('--content', '"'+value+'"'); //reimposto la variabile nel css
}

//funzione che permette di aprire il form per il logout cambiando il display del form
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

//funzione che permette di chiudere il form per il logout cambiando il display del form
function closeForm() {
    document.getElementById("myForm").style.display = "none"; //non avendo più un display sparisce
}