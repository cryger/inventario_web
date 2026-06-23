/**
 * ============================================
 * INVENTARIO WEB
 * dashboard.js
 * ============================================
 */

document.addEventListener("DOMContentLoaded", function () {

    console.log("Dashboard cargado correctamente");

    activarMenuActual();

    configurarLogout();

    ocultarAlertas();

});


/**
 * Resalta el menú activo
 */
function activarMenuActual() {

    const url = window.location.href;

    document.querySelectorAll(".sidebar .nav-link").forEach(link => {

        if (url.includes(link.getAttribute("href"))) {

            link.classList.add("active-menu");

        }

    });

}


/**
 * Confirmación de cierre de sesión
 */
function configurarLogout() {

    const logoutBtn = document.querySelector('a[href*="logout"]');

    if (!logoutBtn) return;

    logoutBtn.addEventListener("click", function (e) {

        if (!confirm("¿Desea cerrar la sesión actual?")) {

            e.preventDefault();

        }

    });

}


/**
 * Oculta alertas automáticamente
 */
function ocultarAlertas() {

    const alertas = document.querySelectorAll(".alert-auto");

    if (!alertas.length) return;

    setTimeout(() => {

        alertas.forEach(alerta => {

            alerta.style.transition = "0.5s";

            alerta.style.opacity = "0";

            setTimeout(() => {

                alerta.remove();

            }, 500);

        });

    }, 4000);

}


/**
 * Función genérica para peticiones AJAX
 */
async function peticionAjax(url, metodo = "GET", datos = null) {

    try {

        const opciones = {
            method: metodo,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        };

        if (datos instanceof FormData) {

            opciones.body = datos;

        } else if (datos) {

            opciones.headers["Content-Type"] = "application/json";

            opciones.body = JSON.stringify(datos);

        }

        const respuesta = await fetch(url, opciones);

        return await respuesta.json();

    } catch (error) {

        console.error(error);

        return {
            success: false,
            mensaje: "Error de comunicación"
        };

    }

}


/**
 * Mostrar notificaciones Bootstrap
 */
function mostrarMensaje(tipo, mensaje) {

    const contenedor = document.getElementById("contenedor-alertas");

    if (!contenedor) return;

    contenedor.innerHTML = `
        <div class="alert alert-${tipo} alert-dismissible fade show alert-auto">
            ${mensaje}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    `;

}


/**
 * Formatear fecha
 */
function formatearFecha(fecha) {

    const f = new Date(fecha);

    return f.toLocaleDateString('es-CO', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit'
    });

}