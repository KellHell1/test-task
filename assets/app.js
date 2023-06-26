/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import Vue from "vue";

new Vue({
    el: '#app',
    data: {
      weight: '',
      carrierSlug: '',
      response: null,
      carrierSlugOptions: ['trans-company', 'pack-group'],
    },
    delimiters: ['${', '}$'],
    methods: {
        handleSubmit() {
            const url = `http://localhost:8081/calculate-shipping-cost/${this.weight}/${this.carrierSlug}`;

            axios.get(url)
                .then(response => {
                    this.response = response.data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
    },
  });
