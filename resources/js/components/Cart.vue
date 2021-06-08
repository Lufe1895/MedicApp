<template>
    <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="cart" aria-hidden="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div v-if="this.cart.length > 0" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Carrito</h5>
                </div>

                <div class="modal-body">
                    <div v-for="med in cart" class="card col-12" v-bind:key="med.id">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img :src="med.image" class="img-fluid"/>
                            </div>

                            <div class="col-md-9">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title text-bold col-12">{{ med.name }}</h5>

                                        <div class="col-10">
                                            <p class="card-text text-small"><span class="text-bold">Cantidad:</span> <span class="fw-light">{{ med.amount }}</span></p>
                                            <p class="card-text text-small"><span class="text-bold">Total:</span> <span class="fw-light">${{ med.total }}</span></p>
                                        </div>

                                        <div class="col-2">
                                            <button @click="deleteMed(med)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

            <div v-if="this.cart.length < 1" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i>&nbsp;No hay medicamentos en su carrito</h5>
                </div>

                <div class="modal-body">
                    <p>Para poder ver su carrito, primero debe seleccionar los medicamentos que desee comprar.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['cart'],
    methods: {
        deleteMed: function(med) {
            let index = this.cart.indexOf(med);
            if(index != -1) {
                this.cart.splice(index, 1);
            }
            localStorage.setItem('cart', JSON.stringify(this.cart));
        }
    }
}
</script>

<style>

</style>