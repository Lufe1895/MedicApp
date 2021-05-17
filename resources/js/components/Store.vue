<template>
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
                        <a :href="getShowRoute(med.id)" class="btn btn-primary">Ver descripción</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:[],
    data: function() {
        return {
            meds:[]
        }
    },
    mounted: async function() {
        axios.get('https://lys-medicapi.herokuapp.com/')
            .then(response => {
                this.meds = response.data;
                console.log(this.meds);
            }).catch(error => {
                console.log(error);
            });
    },
    methods: {
        getShowRoute: (id) => {
            return BASE_URL + '/meds/' + id;
        }    
    }
}
</script>

<style>

</style>