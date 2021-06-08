<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hacer un pedido con receta</h5>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Farmacia:</label>
                <div class="col-md-6">
                    <select name="pharmacy" id="pharmacy" class="form-control" v-model="order.pharmacy_id">
                        <option v-for="pharmacy in pharmacies" v-bind:key="pharmacy.id" :value="pharmacy.id">{{ pharmacy.name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Foto de la Receta:</label>
                <div class="col-md-6">
                    <input type="file" accept="image/png, image/jpeg" class="form-control" ref="file">
                    <span v-if="errors.image" class="font-italic text-danger">{{ errors.image }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Dirección:</label>
                <div class="col-md-6">
                    <input v-model="order.address" type="text" class="form-control" placeholder="Dirección" required autofocus>
                    <span v-if="errors.address" class="font-italic text-danger">{{ errors.address[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Teléfono:</label>
                <div class="col-md-6">
                    <input v-model="order.phone" type="text" class="form-control" placeholder="XXXXXXXXXX" required autofocus>
                    <span v-if="errors.phone" class="font-italic text-danger">{{ errors.phone[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Método de Pago:</label>
                <div class="col-md-6">
                    <select name="payment" id="payment" class="form-control" v-model="order.payment">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                    </select>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Teléfono:</label>
                <div class="col-md-6">
                    <input v-model="data.phone" type="text" class="form-control" placeholder="XXXXXXXXXX" required autofocus>
                    <span v-if="errors.phone" class="font-italic text-danger">{{ errors.phone[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Dirección:</label>
                <div class="col-md-6">
                    <input v-model="data.address" type="text" class="form-control" placeholder="Dirección" required autofocus>
                    <span v-if="errors.address" class="font-italic text-danger">{{ errors.address[0] }}</span>
                </div>
            </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button @click="send" type="button" class="btn btn-primary">Crear Pedido</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['user'],
    data:function() {
        return {
            errors: [],
            pharmacies: [],
            order: {
                address: JSON.parse(this.user).address,
                person_id: JSON.parse(this.user).id,
                phone: JSON.parse(this.user).phone,
                payment: 'Efectivo'
                //address: this.user,
            }
        }
    },
    mounted: function() {
        //console.log(this.order.address);
        axios.get(BASE_URL + '/api/pharmacies')
            .then(response => {
                this.pharmacies = response.data;
                this.order.pharmacy_id = this.pharmacies[0].id;
                //console.log(this.pharmacies);
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        send: async function() {
            const fd = new FormData();
            fd.append('pharmacy_id', this.order.pharmacy_id);
            fd.append('address', this.order.address);
            fd.append('phone', this.order.phone);
            fd.append('payment', this.order.payment);
            fd.append("image", this.$refs.file.files[0]);
            console.log(this.$refs.file.files[0]);
            axios.post(BASE_URL + '/pedidos/new', fd)
                .then(responsoe => {
                    window.location.href = BASE_URL + '/orders'
                })
                .catch(error => {
                    console.log(error.response);
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log(this.errors);
                    }
                })
        }
    }
}
</script>

<style>

</style>