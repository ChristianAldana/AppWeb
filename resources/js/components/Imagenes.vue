<template>
    <div class="container mt-4">
        <h2>70 ANIVERSARIO</h2>
        <div class="row">
            <div class="col-md-4" v-for="(image, index) in images" :key="index">
                <img
                    :src="image.src"
                    class="img-thumbnail gallery-img"
                    :alt="image.alt"
                    @click="openModal(image.src)"
                />
            </div>
        </div>

        <!-- Modal para la vista ampliada -->
        <div
            class="modal fade"
            id="imageModal"
            tabindex="-1"
            aria-labelledby="imageModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Imagen Ampliada</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="modalImage" class="img-fluid" ref="modalImage" />
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
            images: [
                { src: "CCR10.jpeg", alt: "Laboratorio de Computación" },
                { src: "CCR11.jpeg", alt: "Laboratorio de Biología" },
                { src: "CCR13.jpeg", alt: "Laboratorio de Biología" },
                { src: "CCR4.jpeg", alt: "Laboratorio de Biología" },
                { src: "LOGO.jpeg", alt: "Logo" },
                { src: "CCR14.jpeg", alt: "Laboratorio de Biología" },
            ],
        };
    },
    methods: {
        openModal(src) {
            this.$refs.modalImage.src = src;
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            modal.show();
        },
    },
};
</script>

<style scoped>
.gallery-img {
    cursor: pointer; /* Change cursor to pointer when hovering over images */
}
</style>
