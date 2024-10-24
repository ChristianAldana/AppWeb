<template>
    <div class="form-container">
        <h2 class="text-center mb-4">Registrar Estudiante</h2>
        <form @submit.prevent="guardarEstudiante">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="carnet" class="form-label">Carnet:</label>
                    <input type="text" class="form-control" v-model="estudiante.carnet" required />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" v-model="estudiante.nombre" required />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" v-model="estudiante.apellido" required />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" v-model="estudiante.edad" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera:</label>
                <select class="form-select" v-model="estudiante.carrera" required>
                    <option value="" disabled selected>Seleccione una carrera</option>
                    <option v-for="carrera in carreras" :key="carrera.id" :value="carrera.id">
                        {{ carrera.nombre }}
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel:</label>
                <select class="form-select" v-model="estudiante.nivel" required>
                    <option value="" disabled selected>Seleccione un nivel</option>
                    <option v-for="nivel in niveles" :key="nivel.id" :value="nivel.id">
                        {{ nivel.nivel }}
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select class="form-select" v-model="estudiante.estado" required>
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option v-for="estado in estados" :key="estado.id" :value="estado.id">
                        {{ estado.estado }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #4e73df; border-color: #4e73df;">Registrar Estudiante</button>
        </form>
    </div>
</template>


<script>
import axios from 'axios';
import Swal from 'sweetalert2'; // Importa SweetAlert2

export default {
    data() {
        return {
            estudiante: {
                carnet: '',
                nombre: '',
                apellido: '',
                edad: null,
                carrera: null,
                nivel: null,
                estado: null,
            },
            carreras: [],
            niveles: [],
            estados: [],
        };
    },
    created() {
        this.cargarDatos();
    },
    methods: {
        async cargarDatos() {
            try {
                const response = await axios.get('/api/estudiantes/create');
                this.carreras = response.data.carreras;
                this.niveles = response.data.niveles;
                this.estados = response.data.estados;
            } catch (error) {
                console.error("Error al cargar datos:", error);
                Swal.fire({
                    title: '¡Error!',
                    text: 'Error al cargar datos de carreras, niveles o estados',
                    icon: 'error',
                });
            }
        },
        async guardarEstudiante() {
            try {
                await axios.post('/api/estudiantes', this.estudiante);
                await Swal.fire({
                    title: '¡Éxito!',
                    text: 'Estudiante registrado con éxito',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                });
                this.resetForm();
            } catch (error) {
                console.error(error);
                await Swal.fire({
                    title: '¡Error!',
                    text: 'Error al registrar el estudiante',
                    icon: 'error',
                });
            }
        },
        resetForm() {
            this.estudiante = {
                carnet: '',
                nombre: '',
                apellido: '',
                edad: null,
                carrera: null,
                nivel: null,
                estado: null,
            };
        },
    },
};
</script>


<style scoped>
.form-container {
    max-width: 600px;
    margin: 20px auto; 
    padding: 20px; 
    border: 2px solid #4e73df; 
    border-radius: 10px; 
    background-color: #f8f9fa; 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #4e73df; /* Color del título */
}

.form-label {
    font-weight: bold;
}

.btn {
    width: 100%; 
}
</style>
