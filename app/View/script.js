var modo = document.getElementById('mode');
//modo.addEventListener('click', muda)
function muda() {
    var corpo = document.querySelector('.conteudo');
   // var header = document.querySelector('header');
    corpo.classList.toggle('black')
   // header.classList.toggle('dark-glass')
    const getStoredTheme = localStorage.getItem('theme');
}
function fundo() {
    var corpo = document.querySelector('.conteudo');
  //  var header = document.querySelector('header');
    var data = new Date();
    var hora = data.getHours();
    if (hora >= 18 || hora <= 10) {
        corpo.classList.add('black')
     //   header.classList.add('dark-glass')
    }
}