<template>
    <div class="table-container">
        <h2>Lista de Estudiantes</h2>
        <table>
            <thead>
                <tr>
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
                        <button @click="editarEstudiante(estudiante.id)">Editar</button>
                        <button @click="eliminarEstudiante(estudiante.id)">Eliminar</button>
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
