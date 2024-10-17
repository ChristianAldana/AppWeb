<template>
  <div class="form-container">
    <h2>Registrar Profesor</h2>
    <form @submit.prevent="guardarProfesor">
      <div class="form-group">
        <label for="dpi">DPI:</label>
        <input type="text" v-model="profesor.dpi" required />
      </div>
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" v-model="profesor.nombre" required />
      </div>
      <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" v-model="profesor.apellido" required />
      </div>
      <div class="form-group">
        <label for="numero_contacto">Número de contacto:</label>
        <input type="text" v-model="profesor.numero_contacto" required /> <!-- Cambiado 'telefono' a 'numero_contacto' -->
      </div>

      <div class="form-group">
        <label for="carreras">Carreras:</label>
        <div class="dropdown">
          <button class="dropbtn">Seleccionar Carreras</button>
          <div class="dropdown-content">
            <div v-for="carrera in carreras" :key="carrera.id">
              <label>
                <input
                  type="checkbox"
                  :value="carrera.id"
                  v-model="profesor.carreras"
                />
                {{ carrera.nombre }}
              </label>
            </div>
          </div>
        </div>
        <span v-if="profesor.carreras.length > 0">
          Seleccionadas: {{ obtenerNombresCarreras }}
        </span>
      </div>

      <div class="form-group">
        <label for="cursos">Cursos:</label>
        <div class="dropdown">
          <button class="dropbtn">Seleccionar Cursos</button>
          <div class="dropdown-content">
            <div v-for="curso in cursos" :key="curso.id">
              <label>
                <input
                  type="checkbox"
                  :value="curso.id"
                  v-model="profesor.cursos"
                />
                {{ curso.nombre }}
              </label>
            </div>
          </div>
        </div>
        <span v-if="profesor.cursos.length > 0">
          Seleccionados: {{ obtenerNombresCursos }}
        </span>
      </div>

      <button type="submit">Registrar Profesor</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      profesor: {
        dpi: '',
        nombre: '',
        apellido: '',
        numero_contacto: '', // Cambiado a 'numero_contacto'
        carreras: [],
        cursos: [],
      },
      carreras: [],
      cursos: [],
    };
  },
  created() {
    this.cargarDatos();
  },
  computed: {
    obtenerNombresCarreras() {
      return this.carreras
        .filter(c => this.profesor.carreras.includes(c.id))
        .map(c => c.nombre)
        .join(', ');
    },
    obtenerNombresCursos() {
      return this.cursos
        .filter(c => this.profesor.cursos.includes(c.id))
        .map(c => c.nombre)
        .join(', ');
    },
  },
  methods: {
    async cargarDatos() {
      try {
        const response = await axios.get('/api/profesor/create'); // Cambiado a '/api/profesor/create'
        this.carreras = response.data.carreras;
        this.cursos = response.data.cursos;
      } catch (error) {
        console.error("Error al cargar datos:", error);
        Swal.fire({
          title: '¡Error!',
          text: 'Error al cargar datos de carreras o cursos',
          icon: 'error',
        });
      }
    },
    async guardarProfesor() {
      try {
        await axios.post('/api/profesor', this.profesor); // Cambiado a '/api/profesor'
        await Swal.fire({
          title: '¡Éxito!',
          text: 'Profesor registrado con éxito',
          icon: 'success',
          confirmButtonText: 'Aceptar',
        });
        this.resetForm();
      } catch (error) {
        console.error(error);
        await Swal.fire({
          title: '¡Error!',
          text: 'Error al registrar el profesor',
          icon: 'error',
        });
      }
    },
    resetForm() {
      this.profesor = {
        dpi: '',
        nombre: '',
        apellido: '',
        numero_contacto: '', // Cambiado a 'numero_contacto'
        carreras: [],
        cursos: [],
      };
    },
  },
};
</script>

<style scoped>
.form-container {
  padding: 20px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content label {
  padding: 12px 16px;
  cursor: pointer;
  display: block;
}

.dropdown-content input {
  margin-right: 10px;
}
</style>
