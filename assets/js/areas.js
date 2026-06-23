document.addEventListener("DOMContentLoaded", () => {

    listarAreas();

    const formCrearArea = document.getElementById("formCrearArea");

    if(formCrearArea){

        formCrearArea.addEventListener("submit", function(e){

            e.preventDefault();

            let datos = new FormData(this);

            datos.append("accion", "crear");

            fetch("/inventarioweb/controllers/AreaController.php", {

                method: "POST",
                body: datos

            })

            .then(res => res.text())

            .then(resp => {

                console.log("Respuesta del servidor:");

                console.log(resp);

                // Cuando el controlador ya responda JSON correctamente
                // volvemos a usar res.json()

                if(resp){

                    let modal = document.getElementById("modalCrearArea");

                    let instancia = bootstrap.Modal.getInstance(modal);

                    if(instancia){
                        instancia.hide();
                    }

                    formCrearArea.reset();

                    listarAreas();
                }

            })

            .catch(error => {

                console.error("Error:", error);

            });

        });

    }

});

function listarAreas()
{
    let datos = new FormData();

    datos.append("accion", "listar");

    fetch("/inventarioweb/controllers/AreaController.php", {

        method: "POST",
        body: datos

    })

    .then(res => res.text())

    .then(resp => {

        console.log("Listado Areas:");

        console.log(resp);

        try {

            const data = JSON.parse(resp);

            let html = "";

            data.forEach(area => {

                html += `
                    <tr>

                        <td>${area.id_area}</td>

                        <td>${area.nombre_area}</td>
                        
                        <td>${area.descripcion}</td>

                        <td>${area.estado == 1 ? 'Activo' : 'Inactivo'}</td>

                        <td>

                            <button
                                class="btn btn-warning btn-sm btnEditar"
                                data-id="${area.id_area}">

                                <i class="fas fa-edit"></i>

                            </button>

                        </td>

                    </tr>
                `;

            });

            document.getElementById("tablaAreas").innerHTML = html;

        } catch(error){

            console.error("Error al convertir JSON:");

            console.error(error);

        }

    })

    .catch(error => {

        console.error("Error:", error);

    });

}


document.addEventListener("click", function(e){

    if(e.target.closest(".btnEditar"))
    {
        let id = e.target.closest(".btnEditar").dataset.id;

        let datos = new FormData();

        datos.append("accion","obtener");
        datos.append("id",id);

        fetch("/inventarioweb/controllers/AreaController.php",{

            method:"POST",
            body:datos

        })

        .then(res=>res.json())

        .then(area=>{

            document.getElementById("edit_id_area").value =
            area.id_area;

            document.getElementById("edit_nombre_area").value =
            area.nombre_area;

            document.getElementById("edit_descripcion").value =
            area.descripcion;

            let modal =
            new bootstrap.Modal(
                document.getElementById("modalEditarArea")
            );

            modal.show();

        });

    }

});

document
.getElementById("formEditarArea")
.addEventListener("submit", function(e){

    e.preventDefault();

    let datos = new FormData(this);

    datos.append("accion","actualizar");

    fetch("/inventarioweb/controllers/AreaController.php",{
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
                document.getElementById("modalEditarArea")
            )
            .hide();

            listarAreas();
        }

    });

});