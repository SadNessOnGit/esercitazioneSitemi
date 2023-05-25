function added(index){
    element = document.getElementsByClassName("bottom")[index];
    element.className += " clicked";
    styles = getComputedStyle(document.documentElement);
    var r = document.querySelector(':root');
    value = parseInt(((styles.getPropertyValue('--content')).replaceAll('"', '')));
    value += 1;
    value = value.toString();
    r.style.setProperty('--content', '"'+value+'"');
}

function removed(index){
    element = document.getElementsByClassName("bottom")[index];
    element.className = "bottom";
    styles = getComputedStyle(document.documentElement);
    var r = document.querySelector(':root');
    value = parseInt(((styles.getPropertyValue('--content')).replaceAll('"', '')));
    value -= 1;
    value = value.toString();
    r.style.setProperty('--content', '"'+value+'"');
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}