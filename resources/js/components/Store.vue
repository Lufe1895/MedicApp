<template>
    <div>
        <div v-if="this.login" class="row">
            <div class="card col-12 col-md-6 offset-md-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="#cart" data-toggle="modal" data-target="#cart" class="btn btn-primary btn-block" type="button"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Carrito&nbsp;<span class="badge bg-secondary">{{ this.cart.length }}</span></a>
                        </div>

                        <div class="col-12 col-md-6"> 
                            <a :href="'/ver/compra'" class="btn btn-success btn-block" type="button"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;Realizar Compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <cart-component :cart="this.cart"/>

        <div class="row">
            <div class="card col-12 col-md-6" v-for="med in meds" v-bind:key="med.id">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img :src="med.image" class="img-fluid"/>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-bold">{{ med.name }}</h5>
                            <p class="card-text">{{ med.description.substring(0,100) }}...</p>
                            <p class="card-text text-bold">Precio: ${{ med.cost }}</p>
                            <a @click="setMed(med)" href="#show" data-toggle="modal" data-target="#show" class="btn btn-primary"><i class="fas fa-info"></i>&nbsp;&nbsp;Detalles</a>
                            <a @click="selectAmount(med)" href="#amount" data-toggle="modal" data-target="#amount" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="show" tabindex="-1" aria-labelledby="show" aria-hidden="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <show-med-component :med="this.med" />
            </div>
        </div>

        <div class="modal fade" id="amount" tabindex="-1" aria-labelledby="amount" aria-hidden="false">
            <div class="modal-dialog">
                <div v-if="this.login" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Seleccione la cantidad de medicamentos</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4 text-right">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                            </div>

                            <div class="col-12 col-md-8">
                                {{ this.amount }} &nbsp;&nbsp;&nbsp; <input name="cantidad" v-model="amount" type="range" min="1" max="5" class="form-range" /> 
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button @click="addMed()" type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>

                <div v-else-if="!this.login" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i>&nbsp;No ha iniciado sesión</h5>
                    </div>

                    <div class="modal-body">
                        <p>Para poder realizar una compra necesita registrarse o iniciar sesión.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
import axios from 'axios';
export default {
    props:['login', 'user'],
    data: function() {
        return {
            med: {},
            meds: [],
            amount: 1,
            cart: []
        }
    },
    mounted: async function() {
        axios.get('https://lys-medicapi.herokuapp.com/')
            .then(response => {
                this.meds = response.data;
            }).catch(error => {
                console.log(error);
            });
        this.cart = JSON.parse(localStorage.getItem('cart')) || [];
    },
    methods: {
        setMed: function(med) {
            this.med = med;
            console.log(this.med);
        },
        selectAmount: function(med) {
            this.med = med;
        },
        addMed: function() {
            let exist = false;
            let aux = this.med;

            for(let i = 0; i < this.cart.length; i++) {
                if(this.cart[i].id == aux.id) {
                    exist = true;
                }
            }

            if(exist) {
                alert("No puede volver a agregar este medicamento.");
            } else {
                aux.total = this.med.cost * this.amount;
                aux.amount = this.amount;
                this.cart.push(this.med);
                console.log(this.cart);
            }

            this.amount = 1;

            localStorage.setItem('cart', JSON.stringify(this.cart));
        }
    }
}
</script>

<style>

</style>