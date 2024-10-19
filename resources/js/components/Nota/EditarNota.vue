<template>
    <div class="table-container">
        <h2>Editar Nota</h2>
        <form @submit.prevent="actualizarNota">
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
                <select v-model="nota.alumno_id" @change="cargarNotaEstudiante">
                    <option v-for="estudiante in estudiantes" :key="estudiante.id" :value="estudiante.id">
                        {{ estudiante.nombre }}
                    </option>
                </select>
            </div>

            <!-- Mostrar la nota actual del estudiante si existe -->
            <div v-if="notaActualEstudiante !== null">
                <label for="nota_actual">Nota Actual:</label>
                <input type="number" v-model="notaActualEstudiante" disabled />
            </div>

            <!-- Campo para asignar una nueva nota -->
            <div>
                <label for="nota_final">Nueva Nota:</label>
                <input type="number" v-model="nota.nota_final" min="0" max="100" step="0.01" />
            </div>

            <button type="submit">Actualizar Nota</button>
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
                id: null,
                carrera_id: null,
                curso_id: null,
                alumno_id: null,
                nota_final: null,
            },
            notaActualEstudiante: null,
            carreras: [],
            cursos: [],
            estudiantes: [],
        };
    },
    created() {
        this.cargarCarrerasYCursos();
        this.obtenerNota(); // Cargar la nota al iniciar
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
                this.nota.alumno_id = null; // Reinicia el estudiante seleccionado
                this.nota.nota_final = null; // Reinicia la nota al cambiar de carrera
            } catch (error) {
                console.error('Error al cargar cursos', error);
                Swal.fire('Error', 'No se pudieron cargar los cursos', 'error');
            }
        },
        async cargarEstudiantes() {
            try {
                const response = await axios.get(`/api/notas/estudiantes/${this.nota.carrera_id}/${this.nota.curso_id}`);
                this.estudiantes = response.data;

                // Si solo hay un estudiante, seleccionarlo automáticamente
                if (this.estudiantes.length === 1) {
                    this.nota.alumno_id = this.estudiantes[0].id; 
                    this.cargarNotaEstudiante(); // Cargar la nota del estudiante automáticamente
                } else {
                    this.nota.alumno_id = null; // Reiniciar el estudiante seleccionado
                    this.nota.nota_final = null; // Reinicia la nota al cambiar de curso
                }
            } catch (error) {
                console.error('Error al cargar estudiantes', error);
                Swal.fire('Error', 'No se pudieron cargar los estudiantes', 'error');
            }
        },
        async obtenerNota() {
            const notaId = this.$route.params.id; // Asegúrate de que esta ID es correcta y viene de la ruta o una fuente válida
            if (!notaId) {
                Swal.fire('Error', 'No se proporcionó un ID de nota válido', 'error');
                return;
            }
            try {
                const response = await axios.get(`/api/notas/${notaId}`);
                this.nota = response.data; // Cargar la nota encontrada
                this.nota.id = notaId; // Asegurarse de que el ID se asigna correctamente a la nota
                // Cargar cursos y estudiantes después de obtener la nota
                await this.cargarCursos(); 
                await this.cargarEstudiantes(); 
            } catch (error) {
                console.error('Error al obtener la nota', error);
                Swal.fire('Error', 'No se pudo obtener la nota', 'error');
            }
        },
        async cargarNotaEstudiante() {
            try {
                // Verificar si el estudiante ha sido seleccionado antes de cargar su nota
                if (!this.nota.alumno_id) return;

                const response = await axios.get(`/api/notas/${this.nota.carrera_id}/${this.nota.curso_id}/${this.nota.alumno_id}`);
                if (response.data) {
                    this.notaActualEstudiante = response.data.nota_final;  // Asigna la nota actual del estudiante
                } else {
                    this.notaActualEstudiante = null;  // No hay nota, reinicia el campo
                }
            } catch (error) {
                console.error('Error al cargar la nota del estudiante', error);
                this.notaActualEstudiante = null;  // Reiniciar el campo si hay un error
            }
        },
        async actualizarNota() {
            const notaId = this.nota.id; // Asegúrate de tener el ID de la nota en el objeto nota
            if (!notaId) {
                Swal.fire('Error', 'El ID de la nota no es válido', 'error');
                return; // Salir si no hay un ID válido
            }
            try {
                // Asegúrate de que la nota tenga todos los campos necesarios antes de la actualización
                if (this.nota.carrera_id && this.nota.curso_id && this.nota.alumno_id !== null && this.nota.nota_final !== null) {
                    await axios.put(`/api/notas/${notaId}`, this.nota);  // Aquí está el `PUT` para actualizar
                    Swal.fire('Éxito', 'Nota actualizada con éxito', 'success');
                    // Puedes redirigir o restablecer el formulario aquí
                } else {
                    Swal.fire('Error', 'Por favor completa todos los campos antes de actualizar', 'error');
                }
            } catch (error) {
                console.error('Error al actualizar la nota', error);
                Swal.fire('Error', 'No se pudo actualizar la nota', 'error');
            }
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
