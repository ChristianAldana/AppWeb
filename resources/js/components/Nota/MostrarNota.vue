<template>
    <div class="table-container">
        <h2>Lista de Notas</h2>
        <table class="tabla-notas">
            <thead>
                <tr>
                    <th>Carrera</th>
                    <th>Curso</th>
                    <th>Estudiante</th>
                    <th>Nota Final</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="nota in notas" :key="nota.id">
                    <td>{{ nota.carrera.nombre }}</td>
                    <td>{{ nota.curso.nombre }}</td>
                    <td>{{ nota.estudiante.nombre }}</td>
                    <td>{{ nota.nota_final }}</td>
                    <td>
                        <!-- Botón de Eliminar -->
                        <button @click="eliminarNota(nota.id)" class="btn-eliminar">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-if="!notas.length">No hay notas registradas.</div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            notas: [],
        };
    },
    created() {
        this.cargarNotas();
    },
    methods: {
        async cargarNotas() {
            try {
                const response = await axios.get('/api/notas');
                this.notas = response.data;
            } catch (error) {
                console.error('Error al cargar notas', error);
                Swal.fire('Error', 'No se pudieron cargar las notas', 'error');
            }
        },
        async eliminarNota(id) {
            try {
                const confirmacion = await Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡Esta acción no se puede deshacer!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                });

                if (confirmacion.isConfirmed) {
                    await axios.delete(`/api/notas/${id}`);
                    Swal.fire('Eliminado', 'La nota ha sido eliminada con éxito', 'success');
                    this.cargarNotas(); // Recargar la lista de notas después de eliminar
                }
            } catch (error) {
                console.error('Error al eliminar la nota', error);
                Swal.fire('Error', 'No se pudo eliminar la nota', 'error');
            }
        },
    },
};
</script>

<style scoped>
.table-container {
    padding: 20px;
    max-width: 800px; /* Limita el ancho máximo */
    margin: 0 auto; /* Centra el contenedor */
    border: 2px solid #9B59B6; /* Borde morado */
    border-radius: 8px;
    background-color: #f9f9f9; /* Fondo claro */
}

h2 {
    text-align: center;
    color: #9B59B6; /* Título en morado */
    margin-bottom: 20px;
}

.tabla-notas {
    width: 100%;
    border-collapse: collapse;
}

.tabla-notas th, .tabla-notas td {
    border: 1px solid #9B59B6; /* Borde morado para las celdas */
    padding: 10px; /* Espaciado más cómodo */
    text-align: left;
}

.tabla-notas th {
    background-color: #8A2BE2; /* Fondo morado para encabezados */
    color: white; /* Color de texto para encabezados */
}

button {
    background-color: #8A2BE2; /* Morado para el botón de eliminar */
    color: white;
    border: none;
    padding: 8px 12px; /* Espaciado en el botón */
    cursor: pointer;
    border-radius: 4px; /* Bordes redondeados */
}

button:hover {
    background-color: #7A1FD2; /* Un morado más oscuro para el efecto hover */
}
</style>
