<template>
    <div class="gray-bg" style="height: 100%">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>

                <div align="center">
                    <img alt="image" src="img/cvm_logo.png"/>
                </div>

                <br>
                <h3>Bienvenido a CVM Online</h3>
                <p>Perfectamente diseñado y precisamente preparadado para el manejo y control de sus obras.
                </p>
                <p>Ingresa para verlo en acción.</p>

                <form method="POST" action="/" class="m-t" role="form">
                    <div class="input-group m-b">
                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        <input id="email" class="form-control"
                               name="email" value="" type="email" placeholder="Usuario" required
                               autofocus>
                    </div>

                    <br>
                    <div class="input-group m-b">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input id="password" type="password"
                               class="form-control" name="password"
                               placeholder="Contraseña" required>

                    </div>
                    <button type="submit" class="btn btn-warning btn-outline block full-width m-b">Ingresar</button>

                    <a href="#">
                        <small>¿Olvidáste tu contraseña?</small>
                    </a>
                </form>
                <p class="m-t">
                    <small>Diseño y Desarrollo con <strong>TASKR</strong> por <a href="http://www.linkindustria.com"
                                                                                 target="_blank">Link
                        Industria</a></small>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
// import {Component, Vue} from 'vue-property-decorator'
//
// @Component
// export default class App extends Vue {
//
// };
import Vue from 'vue';

export default {};
</script>

<style lang="scss">
@import "~bootstrap/scss/bootstrap";
</style>