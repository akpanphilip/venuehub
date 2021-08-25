
const secondBtn = document.getElementById('secondBtn');
const thirdBtn = document.getElementById('thirdBtn');
const fourthBtn = document.getElementById('fourthBtn');
const fifthBtn = document.getElementById('fifthBtn');
const amountInput = document.getElementById('amount');
const p2 = document.getElementById('p2');
const p3 = document.getElementById('p3');
const p4 = document.getElementById('p4');
const p5 = document.getElementById('p5');

const subscribeBtn = document.getElementById('subscribeBtn');

// console.log(p2.innerHTML);

secondBtn.addEventListener('click', ()=>{
    subscribeBtn.innerText = 'Pay' + " " + p2.innerText + " " + 'Naira';
    amountInput.value = p2.innerText;

})
thirdBtn.addEventListener('click', ()=>{
    subscribeBtn.innerText = 'Pay' + " " + p3.innerText + " " + 'Naira';
    amountInput.value = p3.innerText;
})
fourthBtn.addEventListener('click', ()=>{
    subscribeBtn.innerText = 'Pay' + " " + p4.innerText + " " + 'Naira';
    amountInput.value = p4.innerText;

})
fifthBtn.addEventListener('click', ()=>{
    subscribeBtn.innerText = 'Pay' + " " + p5.innerText + " " + 'Naira';
    amountInput.value = p5.innerText;
})


