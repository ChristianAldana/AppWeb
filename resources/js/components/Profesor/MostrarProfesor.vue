<template>
  <div class="table-container">
    <h2>Listado de Profesores</h2>
    <table>
      <thead>
        <tr>
          <th>DPI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Número de Contacto</th>
          <th>Carreras y Cursos</th> <!-- Combinar carreras y cursos en una sola columna -->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="profesor in profesoresAgrupados" :key="profesor.dpi">
          <td>{{ profesor.dpi }}</td>
          <td>{{ profesor.nombre }}</td>
          <td>{{ profesor.apellido }}</td>
          <td>{{ profesor.numero_contacto }}</td>
          <td>
            <table class="carreras-table">
              <thead>
                <tr>
                  <th>Carrera</th>
                  <th>Cursos</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(cursos, carrera) in profesor.carreras" :key="carrera">
                  <td><strong>{{ carrera }}</strong></td>
                  <td>
                    <ul class="cursos-list">
                      <li v-for="curso in cursos" :key="curso">{{ curso }}</li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <button @click="editarProfesor(profesor.dpi)">Editar</button>
            <button @click="eliminarProfesor(profesor.dpi)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      profesores: [],
    };
  },
  computed: {
    profesoresAgrupados() {
      const agrupados = [];

      this.profesores.forEach((profesor) => {
        const existente = agrupados.find(p => p.dpi === profesor.dpi);

        if (existente) {
          // Si ya existe, añadir los cursos bajo la carrera correspondiente
          if (!existente.carreras[profesor.carrera_nombre]) {
            existente.carreras[profesor.carrera_nombre] = [];
          }
          if (!existente.carreras[profesor.carrera_nombre].includes(profesor.curso_nombre)) {
            existente.carreras[profesor.carrera_nombre].push(profesor.curso_nombre);
          }
        } else {
          // Si no existe, crear un nuevo objeto profesor con carreras y cursos agrupados
          agrupados.push({
            dpi: profesor.dpi,
            nombre: profesor.nombre,
            apellido: profesor.apellido,
            numero_contacto: profesor.numero_contacto,
            carreras: {
              [profesor.carrera_nombre]: [profesor.curso_nombre] // Iniciar el objeto carreras con el primer curso
            },
          });
        }
      });

      return agrupados;
    },
  },
  created() {
    this.cargarProfesores();
  },
  methods: {
    async cargarProfesores() {
      try {
        const response = await axios.get('/api/profesor');
        this.profesores = response.data;
      } catch (error) {
        console.error("Error al cargar profesores:", error);
      }
    },
    editarProfesor(dpi) {
      this.$router.push({ name: 'editar-profesor', params: { dpi } });
    },
    async eliminarProfesor(dpi) {
      const result = await Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás recuperar este registro.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
      });

      if (result.isConfirmed) {
        try {
          await axios.delete(`/api/profesor/${dpi}`);
          await Swal.fire(
            'Eliminado!',
            'El profesor ha sido eliminado.',
            'success'
          );
          this.cargarProfesores();
        } catch (error) {
          console.error("Error al eliminar profesor:", error);
          await Swal.fire(
            '¡Error!',
            'No se pudo eliminar el profesor.',
            'error'
          );
        }
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
