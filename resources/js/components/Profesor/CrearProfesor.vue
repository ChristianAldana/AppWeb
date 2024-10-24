<template>
  <div class="form-container">
    <h2 class="text-center text-success">Registrar Profesor</h2>
    <form @submit.prevent="guardarProfesor">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="dpi">DPI:</label>
          <input type="text" v-model="profesor.dpi" required class="form-control" />
        </div>
        <div class="form-group col-md-6">
          <label for="nombre">Nombre:</label>
          <input type="text" v-model="profesor.nombre" required class="form-control" />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="apellido">Apellido:</label>
          <input type="text" v-model="profesor.apellido" required class="form-control" />
        </div>
        <div class="form-group col-md-6">
          <label for="numero_contacto">Número de contacto:</label>
          <input type="text" v-model="profesor.numero_contacto" required class="form-control" />
        </div>
      </div>

      <div class="form-group">
        <label for="carreras">Carreras:</label>
        <div class="dropdown">
          <button class="dropbtn btn btn-success">Seleccionar Carreras</button>
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
        <input type="text" placeholder="Buscar Cursos..." v-model="searchQuery" class="form-control" @input="filterCursos" />
        <div class="dropdown">
          <button class="dropbtn btn btn-success">Seleccionar Cursos</button>
          <div class="dropdown-content">
            <div v-for="curso in filteredCursos" :key="curso.id">
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

      <button type="submit" class="btn btn-success">Registrar Profesor</button>
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
      carreras: [],
      cursos: [],
      searchQuery: '',
      filteredCursos: [],
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
        const response = await axios.get('/api/profesor/create');
        this.carreras = response.data.carreras;
        this.cursos = response.data.cursos;
        this.filteredCursos = this.cursos; // Inicialmente todos los cursos están filtrados
      } catch (error) {
        console.error("Error al cargar datos:", error);
        Swal.fire({
          title: '¡Error!',
          text: 'Error al cargar datos de carreras o cursos',
          icon: 'error',
        });
      }
    },
    filterCursos() {
      const query = this.searchQuery.toLowerCase();
      this.filteredCursos = this.cursos.filter(curso => curso.nombre.toLowerCase().includes(query));
    },
    async guardarProfesor() {
      try {
        await axios.post('/api/profesor', this.profesor);
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
        numero_contacto: '',
        carreras: [],
        cursos: [],
      };
      this.searchQuery = ''; // Resetea la consulta de búsqueda
      this.filteredCursos = this.cursos; // Resetea la lista de cursos filtrados
    },
  },
};
</script>

<style scoped>
.form-container {
  padding: 20px;
  border: 2px solid #28a745; /* Borde verde */
  border-radius: 5px;
  background-color: #f9f9f9;
}

.form-control {
  border: 2px solid #28a745; /* Borde verde para inputs */
}

.form-control:focus {
  border-color: #218838; /* Color más oscuro al enfocar */
  box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Sombra verde al enfocar */
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: #28a745;
  color: white;
  padding: 10px;
  font-size: 16px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  max-height: 200px; /* Altura máxima para la lista */
  overflow-y: auto; /* Agregar desplazamiento vertical */
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

.form-row {
  display: flex;
  justify-content: space-between; /* Para espaciar los campos */
}

.form-group {
  flex: 1; /* Para que cada campo ocupe el mismo espacio */
  margin-right: 10px; /* Espaciado entre columnas */
}

.form-group:last-child {
  margin-right: 0; /* Eliminar margen derecho en el último elemento */
}
</style>
