# Sistema de Gestión de Inventario

## ESE Hospital San José del Guaviare

### Descripción General

El Sistema de Gestión de Inventario de la ESE Hospital San José del Guaviare es una aplicación desarrollada para optimizar el control, seguimiento y administración de los bienes, insumos médicos, medicamentos, equipos biomédicos y demás elementos que hacen parte del inventario institucional.

La solución permite centralizar la información de inventarios, mejorar la trazabilidad de los movimientos, reducir errores operativos y facilitar la toma de decisiones mediante reportes e indicadores en tiempo real.

---

## Objetivos

### Objetivo General

Gestionar de manera eficiente el inventario institucional mediante el registro, control y seguimiento de los recursos físicos de la ESE Hospital San José del Guaviare.

### Objetivos Específicos

* Registrar entradas y salidas de inventario.
* Controlar existencias mínimas y máximas.
* Gestionar proveedores y categorías de productos.
* Realizar seguimiento a movimientos y transferencias.
* Generar reportes de inventario y consumo.
* Mantener trazabilidad de las operaciones realizadas por los usuarios.

---

## Características Principales

### Gestión de Productos

* Registro de productos e insumos.
* Clasificación por categorías.
* Control de lotes y fechas de vencimiento.
* Administración de códigos internos.

### Gestión de Inventario

* Entradas de inventario.
* Salidas de inventario.
* Ajustes de existencias.
* Transferencias entre áreas o dependencias.

### Gestión de Usuarios

* Autenticación segura.
* Administración de roles y permisos.
* Registro de actividades realizadas por cada usuario.

### Reportes

* Inventario general.
* Kardex de movimientos.
* Productos próximos a vencer.
* Productos agotados o con stock crítico.
* Historial de movimientos.

### Auditoría

* Registro de acciones realizadas por los usuarios.
* Consulta histórica de operaciones.
* Seguimiento de cambios en los registros.

---

## Arquitectura del Sistema

### Tecnologías Utilizadas

#### Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap

#### Backend

* PHP 8.x

#### Base de Datos

* MySQL

#### Servidor

* Apache

---

## Módulos del Sistema

### Inicio de Sesión

Permite la autenticación de usuarios autorizados para acceder a la plataforma.

### Dashboard

Presenta indicadores generales del estado del inventario.

### Productos

Administración de productos, insumos y materiales institucionales.

### Categorías

Gestión de categorías para organización de inventarios.

### Proveedores

Administración de proveedores registrados.

### Entradas

Registro de compras, donaciones y demás ingresos al inventario.

### Salidas

Registro de entregas, consumos y bajas de inventario.

### Reportes

Generación de informes para apoyo a la gestión administrativa.

### Usuarios

Administración de cuentas, perfiles y permisos.

---

## Requisitos del Sistema

### Software

* PHP 8.0 o superior
* MySQL 8.0 o superior
* Apache 2.4 o superior
* Navegador web actualizado

### Hardware Recomendado

* Procesador Intel Core i3 o superior
* 8 GB de memoria RAM
* 20 GB de almacenamiento disponible
* Conexión a red institucional

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://repositorio-inventario.git
```

### 2. Configurar la base de datos

Crear una base de datos MySQL:

```sql
CREATE DATABASE inventario_hospital;
```

Importar el archivo:

```bash
inventario_hospital.sql
```

### 3. Configurar conexión

Editar el archivo de configuración:

```php
config/database.php
```

Actualizar los parámetros:

```php
host=localhost
database=inventario_hospital
user=root
password=*****
```

### 4. Ejecutar el sistema

Iniciar Apache y MySQL.

Acceder desde el navegador:

```text
http://localhost/inventario
```

---

## Seguridad

El sistema implementa:

* Control de acceso basado en roles.
* Gestión de sesiones.
* Validación de formularios.
* Protección contra accesos no autorizados.
* Registro de auditoría de operaciones.

---

## Beneficios Institucionales

* Mayor control sobre los recursos institucionales.
* Reducción de pérdidas y errores de inventario.
* Optimización de procesos administrativos.
* Disponibilidad de información en tiempo real.
* Apoyo a procesos de auditoría y control interno.

---

## Autor

**Henry Alfredo García Palacio**
Ingeniería de Sistemas – UNAD

### Entidad Beneficiaria

**ESE Hospital San José del Guaviare**
San José del Guaviare, Colombia

---

## Licencia

Este proyecto fue desarrollado con fines académicos e institucionales para apoyar los procesos de gestión de inventarios de la ESE Hospital San José del Guaviare.
