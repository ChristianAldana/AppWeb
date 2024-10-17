<template>
    <div class="form-container">
        <h2>REGISTRAR ESTUDIANTE</h2>
        <form @submit.prevent="guardarEstudiante">
            <div class="form-group">
                <label for="carnet">Carnet:</label>
                <input type="text" v-model="estudiante.carnet" required />
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" v-model="estudiante.nombre" required />
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" v-model="estudiante.apellido" required />
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" v-model="estudiante.edad" required />
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select v-model="estudiante.carrera" required>
                    <option value="" disabled selected>Seleccione una carrera</option>
                    <option v-for="carrera in carreras" :key="carrera.id" :value="carrera.id">
                        {{ carrera.nombre }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="nivel">Nivel:</label>
                <select v-model="estudiante.nivel" required>
                    <option value="" disabled selected>Seleccione un nivel</option>
                    <option v-for="nivel in niveles" :key="nivel.id" :value="nivel.id">
                        {{ nivel.nivel }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select v-model="estudiante.estado" required>
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option v-for="estado in estados" :key="estado.id" :value="estado.id">
                        {{ estado.estado }}
                    </option>
                </select>
            </div>
            <button type="submit">Registrar Estudiante</button>
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
