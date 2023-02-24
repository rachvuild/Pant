const PriseRDV = document.querySelector('.PriseRDV');
const conterondu = document.querySelector('.conterondu');
const RdvEnCour = document.querySelector('.RdvEnCour');
const PRDV = document.getElementById('PRDV');
const RDVV = document.getElementById('RDVV');
const RDVP = document.getElementById('RDVP');

window.addEventListener('load', ()=>{

    RdvEnCour.classList.add('onBlock');
    
});
PRDV.addEventListener('click', () => {
    RdvEnCour.classList.remove('onBlock');
    PriseRDV.classList.add('onFlex');
    conterondu.classList.remove('onBlock');
    console.log('1');
    
}); RDVV.addEventListener('click', () => {
    RdvEnCour.classList.add('onBlock');
    PriseRDV.classList.remove('onFlex');
    conterondu.classList.remove('onBlock');
    console.log('2');
    
}); RDVP.addEventListener('click', () => {
    RdvEnCour.classList.remove('onBlock');
    PriseRDV.classList.remove('onFlex');
    conterondu.classList.add('onBlock');
    console.log('3');
});