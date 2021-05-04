<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo:</label>
                <div class="col-md-6">
                    <input v-model="data.email" id="email" type="email" class="form-control" name="email" required placeholder="Correo" autofocus>
                    <span v-if="errors.email" class="font-italic text-danger">El correo o la contraseña son incorrectos.</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                <div class="col-md-6">
                    <input v-model="data.password" id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required autofocus>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button @click="send" type="button" class="btn btn-primary">Iniciar Sesión</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data:function() {
        return {
            errors:[],
            data: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        send: async function() {
            axios.post(BASE_URL + '/login', this.data)
                .then(response => {
                    window.location.href = BASE_URL + '/'
                })
                .catch(error => {
                    console.log(error);
                    if(error.response.status == 422) {
                        this.errors = error.response.data.errors;
                        console.log(this.errors);
                    }
                })
        }
    }
}
</script>