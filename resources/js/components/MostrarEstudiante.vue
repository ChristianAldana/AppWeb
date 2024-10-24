<template>
    <div class="table-container">
        <h2 class="text-primary">Lista de Estudiantes</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-primary">
                    <th>Carnet</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Carrera</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="estudiante in estudiantes" :key="estudiante.id">
                    <td>{{ estudiante.carnet }}</td>
                    <td>{{ estudiante.nombre }}</td>
                    <td>{{ estudiante.apellido }}</td>
                    <td>{{ estudiante.edad }}</td>
                    <td>{{ estudiante.carrera_nombre }}</td>
                    <td>{{ estudiante.nivel_nombre }}</td>
                    <td>{{ estudiante.estado_nombre }}</td>
                    <td>
                        <button @click="eliminarEstudiante(estudiante.id)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'; // Importa SweetAlert2

export default {
    data() {
        return {
            estudiantes: [],
        };
    },
    created() {
        this.cargarEstudiantes();
    },
    methods: {
        async cargarEstudiantes() {
            try {
                const response = await axios.get('/api/estudiantes');
                this.estudiantes = response.data;
            } catch (error) {
                console.error(error);
                await Swal.fire({
                    title: '¡Error!',
                    text: 'Error al cargar los estudiantes',
                    icon: 'error',
                });
            }
        },
        editarEstudiante(id) {
            this.$router.push(`/editar-estudiante/${id}`);
        },
        async eliminarEstudiante(id) {
            const { value: result } = await Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas eliminar este estudiante?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            });

            if (result) {
                try {
                    await axios.delete(`/api/estudiantes/${id}`);
                    await Swal.fire({
                        title: '¡Éxito!',
                        text: 'Estudiante eliminado con éxito',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    });
                    this.cargarEstudiantes();
                } catch (error) {
                    console.error(error);
                    await Swal.fire({
                        title: '¡Error!',
                        text: 'Error al eliminar el estudiante',
                        icon: 'error',
                    });
                }
            }
        },
    },
};
</script>

<style scoped>
.table-container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.table {
    border: 2px solid #4e73df; /* Borde más grueso */
}
.table th, .table td {
    border: 2px solid #4e73df; /* Bordes más gruesos para celdas */
}
.table-primary {
    background-color: #4e73df; /* Color de fondo del encabezado */
    color: white; /* Color del texto del encabezado */
}
</style>
