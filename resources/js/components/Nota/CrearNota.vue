<template>
    <div class="table-container">
        <h2>Registrar Nota</h2>
        <form @submit.prevent="guardarNota">
            <div class="form-row">
                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <select v-model="nota.carrera_id" @change="cargarCursos">
                        <option v-for="carrera in carreras" :key="carrera.id" :value="carrera.id">
                            {{ carrera.nombre }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="curso">Curso:</label>
                    <input type="text" v-model="cursoFiltro" placeholder="Buscar curso..." />
                    <select v-model="nota.curso_id" @change="cargarEstudiantes">
                        <option v-for="curso in cursosFiltrados" :key="curso.id" :value="curso.id">
                            {{ curso.nombre }}
                        </option>
                    </select>
                </div>
            </div>

            <div>
                <label for="alumno_id">Estudiante:</label>
                <select v-model="nota.alumno_id">
                    <option v-for="estudiante in estudiantes" :key="estudiante.id" :value="estudiante.id">
                        {{ estudiante.nombre }}
                    </option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nota_final">Nota Final:</label>
                    <input type="number" v-model="nota.nota_final" min="0" max="100" step="0.01" />
                </div>
            </div>

            <button type="submit" style="background-color: #8A2BE2; color: white;">Registrar Nota</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'; // Asegúrate de importar SweetAlert

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
            cursoFiltro: '', // Campo para filtrar cursos
        };
    },
    computed: {
        cursosFiltrados() {
            return this.cursos.filter(curso =>
                curso.nombre.toLowerCase().includes(this.cursoFiltro.toLowerCase())
            );
        },
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
            }
        },
        async cargarCursos() {
            try {
                const response = await axios.get(`/api/notas/cursos/${this.nota.carrera_id}`);
                this.cursos = response.data;
                this.nota.curso_id = null;
                this.estudiantes = [];
            } catch (error) {
                console.error('Error al cargar cursos', error);
            }
        },
        async cargarEstudiantes() {
            try {
                const response = await axios.get(`/api/notas/estudiantes/${this.nota.carrera_id}/${this.nota.curso_id}`);
                this.estudiantes = response.data;
                this.nota.alumno_id = null;
            } catch (error) {
                console.error('Error al cargar estudiantes', error);
            }
        },
        async guardarNota() {
            try {
                await axios.post('/api/notas', this.nota);
                Swal.fire('Éxito', 'Nota registrada con éxito', 'success'); // Mensaje de éxito
                this.resetForm();
            } catch (error) {
                console.error('Error al registrar nota', error);
                Swal.fire('Error', 'No se pudo registrar la nota', 'error'); // Mensaje de error
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
    max-width: 700px;
    margin: 0 auto;
    border: 2px solid #9B59B6; /* Borde morado */
    border-radius: 8px;
    background-color: #f9f9f9;
}

h2 {
    text-align: center;
    color: #9B59B6; /* Título en morado */
}

.form-row {
    display: flex;
    justify-content: space-between;
}

.form-group {
    flex-basis: 48%; /* Ajusta el ancho de los elementos del formulario */
}

select, input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

button {
    background-color: #8A2BE2; /* Mismo morado que el borde de la tabla */
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px; /* Bordes redondeados */
}

button:hover {
    background-color: #7A1FD2; /* Un morado más oscuro para el efecto hover */
}

form div {
    margin-bottom: 15px;
}
</style>
