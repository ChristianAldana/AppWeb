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
                const response = await axios.get('/api/estudiantes'); // Asegúrate de tener esta ruta en tu controlador
                this.estudiantes = response.data; // Aquí ya no necesitas hacer el mapeo
            } catch (error) {
                console.error(error);
                alert('Error al cargar los estudiantes');
            }
        },
        editarEstudiante(id) {
            this.$router.push(`/editar-estudiante/${id}`); // Redirige al formulario de edición
        },
        async eliminarEstudiante(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este estudiante?')) {
                try {
                    await axios.delete(`/api/estudiantes/${id}`); // Asegúrate de tener esta ruta en tu controlador
                    alert('Estudiante eliminado con éxito');
                    this.cargarEstudiantes(); // Recargar la lista de estudiantes
                } catch (error) {
                    console.error(error);
                    alert('Error al eliminar el estudiante');
                }
            }
        },
    },
};
</script>

