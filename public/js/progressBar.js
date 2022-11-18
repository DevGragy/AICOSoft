let numbers = document.querySelectorAll('[id=number]')
console.log(numbers);
let counter = 0;

numbers.forEach((number) =>{
  setInterval(() => {
    
    if(counter == 65){
        clearInterval();
    }else{
        counter += 1;
        number.innerHTML = counter + "%";
    }
  
  }, 30);
}) 




