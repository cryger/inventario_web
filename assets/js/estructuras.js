console.log("ESTRUCTURAS JS CARGADO");
document
.getElementById("formCrearEstructura")
.addEventListener("submit", function(e){

    e.preventDefault();
    
    alert("FORMULARIO INTERCEPTADO");

    let datos = new FormData(this);

    datos.append("accion","crear");

    fetch("/inventarioweb/controllers/EstructuraController.php",{
        method:"POST",
        body:datos
    })
    .then(res => res.json())
    .then(resp => {

        console.log(resp);

        if(resp)
        {
            bootstrap.Modal
            .getInstance(
                document.getElementById("modalCrearEstructura")
            )
            .hide();

            this.reset();

            listarEstructuras();
        }

    });

});