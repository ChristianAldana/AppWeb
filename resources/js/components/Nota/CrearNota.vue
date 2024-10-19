<template>
    <div class="table-container">
        <h2>Registrar Nota</h2>
        <form @submit.prevent="guardarNota">
            <div>
                <label for="carrera">Carrera:</label>
                <select v-model="nota.carrera_id" @change="cargarCursos">
                    <option v-for="carrera in carreras" :key="carrera.id" :value="carrera.id">
                        {{ carrera.nombre }}
                    </option>
                </select>
            </div>

            <div>
                <label for="curso">Curso:</label>
                <select v-model="nota.curso_id" @change="cargarEstudiantes">
                    <option v-for="curso in cursos" :key="curso.id" :value="curso.id">
                        {{ curso.nombre }}
                    </option>
                </select>
            </div>

            <div>
                <label for="alumno_id">Estudiante:</label>
                <select v-model="nota.alumno_id">
                    <option v-for="estudiante in estudiantes" :key="estudiante.id" :value="estudiante.id">
                        {{ estudiante.nombre }}
                    </option>
                </select>
            </div>

            <div>
                <label for="nota_final">Nota Final:</label>
                <input type="number" v-model="nota.nota_final" min="0" max="100" step="0.01" />
            </div>

            <button type="submit">Registrar Nota</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            nota: {
                carrera_id: null,
                curso_id: null,
                alumno_id: null,
                nota_final: null,
            },
            carreras: [],
            cursos: [],
            estudiantes: [],
        };
    },
    created() {
        this.cargarCarrerasYCursos();
    },
    methods: {
        async cargarCarrerasYCursos() {
            try {
                const response = await axios.get('/api/notas/cursos-carreras');
                this.carreras = response.data.carreras;
                this.cursos = response.data.cursos;
            } catch (error) {
                console.error('Error al cargar carreras y cursos', error);
                Swal.fire('Error', 'No se pudieron cargar carreras y cursos', 'error');
            }
        },
        async cargarCursos() {
            try {
                const response = await axios.get(`/api/notas/cursos/${this.nota.carrera_id}`);
                this.cursos = response.data;
                this.nota.curso_id = null; // Reinicia el curso seleccionado
                this.estudiantes = []; // Limpia la lista de estudiantes
            } catch (error) {
                console.error('Error al cargar cursos', error);
                Swal.fire('Error', 'No se pudieron cargar los cursos', 'error');
            }
        },
        async cargarEstudiantes() {
            try {
                const response = await axios.get(`/api/notas/estudiantes/${this.nota.carrera_id}/${this.nota.curso_id}`);
                this.estudiantes = response.data;
                this.nota.alumno_id = null; // Reinicia el estudiante seleccionado
            } catch (error) {
                console.error('Error al cargar estudiantes', error);
                Swal.fire('Error', 'No se pudieron cargar los estudiantes', 'error');
            }
        },
        async guardarNota() {
            try {
                await axios.post('/api/notas', this.nota);
                Swal.fire('Éxito', 'Nota registrada con éxito', 'success');
                this.resetForm();
            } catch (error) {
                console.error('Error al registrar nota', error);
                Swal.fire('Error', 'No se pudo registrar la nota', 'error');
            }
        },
        resetForm() {
            this.nota = {
                carrera_id: null,
                curso_id: null,
                alumno_id: null,
                nota_final: null,
            };
            this.cursos = [];
            this.estudiantes = [];
        }
    }
};
</script>

<style scoped>
.table-container {
  padding: 20px;
  max-width: 600px; /* Limita el ancho máximo */
  margin: 0 auto; /* Centra el contenedor */
}

select, input {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

form div {
  margin-bottom: 15px;
}

h2 {
  margin-bottom: 20px;
}
</style>
