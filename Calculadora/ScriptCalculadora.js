function Inserir(numero){
    const inp = document.getElementById('input-result').value;
    document.getElementById('input-result').value = inp + numero;

}

function Calcular(){
    const valor_input = document.getElementById('input-result').value;
    document.getElementById('input-result').value = eval(valor_input);
}
function ClearInp(){
    document.getElementById('input-result').value = "  ";

}
function Decrease(){
    const input = document.getElementById('input-result');
    const inputText = input.value;
    input.value = inputText.substring(0,inputText.length-1);
    console.log(input.value);
}