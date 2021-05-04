<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Nombre(s):</label>
                <div class="col-md-6">
                    <input v-model="data.name" type="text" class="form-control" required placeholder="Correo" autofocus>
                    <span v-if="errors.name" class="font-italic text-danger">{{ errors.name[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Apellidos:</label>
                <div class="col-md-6">
                    <input v-model="data.last_name" type="text" class="form-control" placeholder="Contraseña" required autofocus>
                    <span v-if="errors.last_name" class="font-italic text-danger">{{ errors.last_name[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo:</label>
                <div class="col-md-6">
                    <input v-model="data.email" type="email" class="form-control" placeholder="Correo" required autofocus>
                    <span v-if="errors.email" class="font-italic text-danger">{{ errors.email[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                <div class="col-md-6">
                    <input v-model="data.password" type="password" class="form-control" placeholder="Contraseña" required autofocus>
                    <span v-if="errors.password" class="font-italic text-danger">{{ errors.password[0] }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña:</label>
                <div class="col-md-6">
                    <input v-model="data.password_confirmation" type="password" class="form-control" placeholder="Confirmar Contraseña" required autofocus>
                </div>
            </div>

            <div class="form-group row">
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
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Sexo:</label>
                <div class="col-md-6">
                    <select  v-model="data.sex" class="form-control" required autocomplete="sex" autofocus>
                        <option value="F" selected>Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Edad:</label>
                <div class="col-md-6">
                    <input v-model="data.age" type="number" class="form-control" placeholder="Edad" required autofocus>
                    <span v-if="errors.age" class="font-italic text-danger">{{ errors.age[0] }}</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button @click="send" type="button" class="btn btn-primary">Registrarme</button>
        </div>
    </div>
</template>

<script>
export default {
    data:function() {
        return {
            errors:[],
            data: {
                name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
                phone:'',
                address:'',
                sex:'',
                age:''
            }
        }
    },
    methods: {
        send: async function() {
            axios.post(BASE_URL + '/register', this.data)
                .then(responsoe => {
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

<style>

</style>
