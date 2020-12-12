window.Vue = require('vue');

import App from "../components/App";

new Vue({
    el: '#app',
    mounted() {
        console.log('hi there!!!');
    },
    components: {
        App
    }
});
