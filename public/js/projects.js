const validatedProjects = () => {
    let name = document.querySelector('#projectName').value;
    let description = document.querySelector('#projectDes').value;

    if(name.trim() === '' || description.trim() === '') {
        alert('Los campos son obligatorios')
        return 
    }
}