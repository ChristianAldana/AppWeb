<template>
    <div class="table-container">
        <h2>Lista de Notas</h2>
        <table>
            <thead>
                <tr>
                    <th>Carrera</th>
                    <th>Curso</th>
                    <th>Estudiante</th>
                    <th>Nota Final</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
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
                        <button @click="eliminarNota(nota.id)">Eliminar</button>
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
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

ul {
  list-style-type: none;
  padding: 0;
}

.cursos-list > li {
  margin-left: 20px; /* Añade un margen a los cursos para que queden anidados bajo cada carrera */
}

.carreras-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px; /* Añade un margen superior para separar la tabla anidada */
}

.carreras-table th, .carreras-table td {
  border: 1px solid #ddd;
  padding: 5px;
}

button {
  margin-right: 5px;
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
</style>
