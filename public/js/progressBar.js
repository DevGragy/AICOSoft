let numbers = document.querySelectorAll('[id=number]')
let totales = document.querySelectorAll('[id=totales]')
let proceso = document.querySelectorAll('[id=proceso]')
let concluida = document.querySelectorAll('[id=concluida]')

let counter = 0;

for (let i = 0; i < totales.length; i++) {
  let total = totales[i].innerHTML

  for (let i = 0; i < proceso.length; i++) {
    let en_proceso = proceso[i].innerHTML

    for (let i = 0; i < concluida.length; i++) {
      let ya_concluida = concluida[i].innerHTML
      
      var num_total = parseFloat(total)
      var num_proceso = parseFloat(en_proceso)
      var num_concluida = parseFloat(ya_concluida)

      var porcentaje = (num_concluida/num_total)*100

      console.log(porcentaje)

    }
  }
}

//numbers.forEach((number) =>{
  //setInterval(() => {
    //if(counter == 65) {
        //clearInterval();
    //}else{
        //counter += 1;
        //number.innerHTML = counter + "%";
    //}
  
  //}, 30);
//}) 


//(num_concluida/num_total)*100