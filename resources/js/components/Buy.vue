<template>
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Realizar compra</h1>
            </div>
        </div>

        <div class="card">
            <div v-if="this.cart.length > 0" class="card-body">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Medicamentos:</label>
                    <div class="col-md-6">
                        <textarea v-model="order.meds" type="text" class="form-control" readonly></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Farmacia:</label>
                    <div class="col-md-6">
                        <select name="pharmacy" id="pharmacy" class="form-control" v-model="order.pharmacy_id">
                            <option v-for="pharmacy in pharmacies" v-bind:key="pharmacy.id" :value="pharmacy.id">{{ pharmacy.name }}</option>
                        </select>
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

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Total:</label>
                    <div class="col-md-6">
                        <input v-model="order.total" type="text" class="form-control" readonly >
                    </div>
                </div>

                <button @click="send()" type="button" class="btn btn-success" data-dismiss="modal">Realizar compra</button>
                <a href="javascript: history.go(-1)" class="btn btn-secondary" data-dismiss="modal">Volver</a>
            </div>

            <div v-if="this.cart.length < 1" class="card-body">
                <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i>&nbsp;No hay medicamentos en su carrito</h5><br>

                <p class="card-text">Para poder ver su compra, primero debe seleccionar los medicamentos que desee comprar.</p>

                <a href="javascript: history.go(-1)" class="btn btn-secondary" data-dismiss="modal">Volver</a>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data:function() {
        return {
            cart: [],
            errors: [],
            pharmacies: [],
            order: {
                meds: '',
                address: JSON.parse(this.user).address,
                person_id: JSON.parse(this.user).id,
                phone: JSON.parse(this.user).phone,
                payment: 'Efectivo',
                total: 0.0,
                person_id: JSON.parse(this.user).id
                //address: this.user,
            }
        }
    },
    mounted: function() {
        this.cart = JSON.parse(localStorage.getItem('cart'));
        console.log(JSON.parse(this.user).id);
        for(let i = 0; i < this.cart.length; i++) {
            this.order.meds += this.cart[i].name + ", " + this.cart[i].amount + "; ";
            this.order.total += parseFloat(this.cart[i].total);
        }
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
        deleteMed: function(med) {
            let index = this.cart.indexOf(med);
            if(index != -1) {
                this.cart.splice(index, 1);
            }
            localStorage.setItem('cart', JSON.stringify(this.cart));
        },
        send: function() {
            console.log(this.order);
            axios.post(BASE_URL + '/api/compras/ordenar', this.order)
                .then(response => {
                    window.location.href = BASE_URL + '/orders';
                    localStorage.removeItem('cart');
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