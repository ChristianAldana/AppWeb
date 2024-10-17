<template>
  <div class="form-container">
    <h2>Editar Profesor</h2>
    <form @submit.prevent="actualizarProfesor">
      <div class="form-group">
        <label for="dpi">DPI:</label>
        <select v-model="profesor.dpi" @change="cargarDatosProfesor" required>
          <option v-for="prof in profesoresUnicos" :key="prof.dpi" :value="prof.dpi">
            {{ prof.dpi }}
          </option>
        </select>
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
        <input type="text" v-model="profesor.numero_contacto" required />
      </div>
      <div class="form-group">
        <label for="carreras">Carreras:</label>
        <div class="dropdown">
          <button class="select-btn">Seleccionar Carreras</button>
          <div class="dropdown-content">
            <div v-for="carrera in carreras" :key="carrera.id" class="dropdown-item">
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
      </div>
      <div class="form-group">
        <label for="cursos">Cursos:</label>
        <div class="dropdown">
          <button class="select-btn">Seleccionar Cursos</button>
          <div class="dropdown-content">
            <div v-for="curso in cursos" :key="curso.id" class="dropdown-item">
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
      </div>
      <button type="submit" class="update-btn">Actualizar Profesor</button>
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
        numero_contacto: '',
        carreras: [],
        cursos: [],
      },
      profesores: [],
      carreras: [],
      cursos: [],
    };
  },
  computed: {
    profesoresUnicos() {
      const uniqueDpis = new Set();
      return this.profesores.filter(prof => {
        if (!uniqueDpis.has(prof.dpi)) {
          uniqueDpis.add(prof.dpi);
          return true;
        }
        return false;
      });
    },
  },
  created() {
    this.cargarDatos();
  },
  methods: {
    async cargarDatos() {
      try {
        const response = await axios.get('/api/profesor/create');
        this.carreras = response.data.carreras;
        this.cursos = response.data.cursos;
        this.cargarProfesores();
      } catch (error) {
        console.error("Error al cargar datos:", error);
        Swal.fire({
          title: '¡Error!',
          text: 'Error al cargar datos de carreras o cursos',
          icon: 'error',
        });
      }
    },
    async cargarProfesores() {
      try {
        const response = await axios.get('/api/profesor');
        this.profesores = response.data;
      } catch (error) {
        console.error(error);
        await Swal.fire({
          title: '¡Error!',
          text: 'Error al cargar los profesores',
          icon: 'error',
        });
      }
    },
    async cargarDatosProfesor() {
      const prof = this.profesores.find(prof => prof.dpi === this.profesor.dpi);
      if (prof) {
        this.profesor.nombre = prof.nombre;
        this.profesor.apellido = prof.apellido;
        this.profesor.numero_contacto = prof.numero_contacto;
        this.profesor.carreras = prof.carreras.map(c => c.id);
        this.profesor.cursos = prof.cursos.map(c => c.id);
      }
    },
    async actualizarProfesor() {
      try {
        await axios.put(`/api/profesor/${this.profesor.dpi}`, this.profesor);
        await Swal.fire({
          title: '¡Éxito!',
          text: 'Profesor actualizado con éxito',
          icon: 'success',
          confirmButtonText: 'Aceptar',
        });
        this.resetForm();
      } catch (error) {
        console.error(error);
        await Swal.fire({
          title: '¡Error!',
          text: 'Error al actualizar el profesor',
          icon: 'error',
        });
      }
    },
    resetForm() {
      this.profesor = {
        dpi: '',
        nombre: '',
        apellido: '',
        numero_contacto: '',
        carreras: [],
        cursos: [],
      };
    },
  },
};
</script>

<style scoped>
.dropdown {
  position: relative;
  display: inline-block;
  width: 100%; /* O ajustar según tu diseño */
}

.select-btn {
  background-color: #4CAF50; /* Color diferente al de actualizar */
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width: 100%; /* Ocupa todo el ancho */
  border-radius: 5px; /* Bordes redondeados */
}

.update-btn {
  background-color: #28a745; /* Color del botón de actualización */
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px; /* Bordes redondeados */
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px; /* Ajustar según tus necesidades */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  max-height: 300px; /* Agregar un límite para la altura */
  overflow-y: auto; /* Añadir barra de desplazamiento si es necesario */
}

.dropdown:hover .dropdown-content {
  display: block; /* Mostrar en hover */
}

.dropdown-item {
  padding: 8px 12px; /* Espaciado interno para cada elemento */
}
</style>
 