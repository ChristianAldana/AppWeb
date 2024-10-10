<template>
    <div class="form-container">
        <h2>Editar Estudiante</h2>
        <form @submit.prevent="actualizarEstudiante">
            <div class="form-group">
                <label for="carnet">Carnet:</label>
                <select v-model="estudiante.carnet" @change="cargarDatosEstudiante" required>
                    <option v-for="est in estudiantes" :key="est.carnet" :value="est.carnet">
                        {{ est.carnet }}
                    </option>
                </select>
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
                    <option v-for="carrera in carreras" :key="carrera.id" :value="carrera.id">
                        {{ carrera.nombre }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="nivel">Nivel:</label>
                <select v-model="estudiante.nivel" required>
                    <option v-for="nivel in niveles" :key="nivel.id" :value="nivel.id">
                        {{ nivel.nivel }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select v-model="estudiante.estado" required>
                    <option v-for="estado in estados" :key="estado.id" :value="estado.id">
                        {{ estado.estado }}
                    </option>
                </select>
            </div>
            <button type="submit">Actualizar Estudiante</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

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
            estudiantes: [], 
            carreras: [],
            niveles: [],
            estados: [],
        };
    },
    created() {
        this.cargarDatos();
        this.cargarEstudiantes();
    },
    methods: {
        async cargarDatos() {
            const response = await axios.get('/api/estudiantes/create');
            this.carreras = response.data.carreras;
            this.niveles = response.data.niveles;
            this.estados = response.data.estados;
        },
        async cargarEstudiantes() {
            try {
                const response = await axios.get('/api/estudiantes');
                this.estudiantes = response.data;
            } catch (error) {
                console.error('Error al cargar los estudiantes:', error);
            }
        },
        async cargarDatosEstudiante() {
            try {
                const estudianteResponse = await axios.get(`/api/estudiantes/${this.estudiante.carnet}`);
                this.estudiante = estudianteResponse.data;
            } catch (error) {
                console.error('Error al cargar los datos del estudiante:', error);
            }
        },
        async actualizarEstudiante() {
            try {
                await axios.put(`/api/estudiantes/${this.estudiante.carnet}`, this.estudiante);
                alert('Estudiante actualizado con éxito');
                this.resetForm();
                this.$router.push('/mostrar-estudiantes');
            } catch (error) {
                console.error('Error al actualizar:', error.response.data);
                alert('Error al actualizar el estudiante: ' + error.response.data.error);
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
