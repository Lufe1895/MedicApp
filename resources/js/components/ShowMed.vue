<template>
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">{{ this.med.name }}</h1>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4 offset-4">
                            <img :src="med.image" class="img-fluid" />
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="text-bold">Nombre:</td>
                                    <td>{{ med.name }}</td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Descripción:</td>
                                    <td>{{ med.description }}</td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Dósis:</td>
                                    <td>{{ med.dosis }}</td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Precio:</td>
                                    <td>${{ med.cost }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['id'],
    data: function () {
        return {
            med: {}
        } 
    },
    mounted: async function () {
        axios.get('https://lys-medicapi.herokuapp.com/' + this.id)
            .then(response => {
                this.med = response.data;
                console.log(this.med);
            }).catch(error => {
                console.log(error);
            });
    }
}
</script>

<style>

</style>