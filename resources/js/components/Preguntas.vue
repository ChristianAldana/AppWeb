<template>
    <div class="container mt-4" id="faq-section">
        <h2>FORO DE PREGUNTAS Y RESPUESTAS</h2>
        <input v-model="nuevaPregunta" @keyup.enter="agregarPregunta" placeholder="Escribe una nueva pregunta y presiona Enter" class="form-control mb-3" />

        <div class="accordion" id="faqAccordion">
            <div class="accordion-item" v-for="(pregunta, index) in preguntas" :key="index">
                <h2 class="accordion-header" :id="'heading' + index">
                    <button class="accordion-button" type="button" :data-bs-toggle="'collapse'" :data-bs-target="'#collapse' + index" aria-expanded="false" :aria-controls="'collapse' + index">
                        {{ pregunta.texto }}
                    </button>
                </h2>
                <div :id="'collapse' + index" class="accordion-collapse collapse" :aria-labelledby="'heading' + index" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <div v-if="pregunta.respuestas.length">
                            <h5>Respuestas:</h5>
                            <ul>
                                <li v-for="(respuesta, rIndex) in pregunta.respuestas" :key="rIndex">{{ respuesta }}</li>
                            </ul>
                        </div>
                        <p v-else>No hay respuestas aún.</p>
                        <input v-model="nuevaRespuesta[index]" @keyup.enter="agregarRespuesta(index)" placeholder="Escribe una respuesta y presiona Enter" class="form-control mb-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nuevaPregunta: '',
            preguntas: [],
            nuevaRespuesta: [] // Array para manejar respuestas de cada pregunta
        };
    },
    methods: {
        agregarPregunta() {
            if (this.nuevaPregunta.trim() !== '') {
                this.preguntas.push({
                    texto: this.nuevaPregunta,
                    respuestas: [] // Inicializa un array vacío para respuestas
                });
                this.nuevaRespuesta.push(''); // Agrega un nuevo espacio para la respuesta
                this.nuevaPregunta = ''; // Limpiar el input después de agregar la pregunta.
            }
        },
        agregarRespuesta(index) {
            if (this.nuevaRespuesta[index].trim() !== '') {
                this.preguntas[index].respuestas.push(this.nuevaRespuesta[index]);
                this.nuevaRespuesta[index] = ''; // Limpiar el input de la respuesta
            }
        },
    },
};
</script>

<style scoped>
.accordion-button {
    cursor: pointer;
}
</style>
