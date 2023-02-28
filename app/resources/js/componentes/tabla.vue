<template>
    <div class="
    flex flex-col justify-center
     block">
        <table class="table-auto border border-separate
          ">
            <caption class="uppercase text-4xl text-green-700">{{ nombre_tabla }}</caption>
            <thead>
            <tr class="">
                <th class="px-4                      text-3xl text-gray-500
                     " v-for="(campo, index) in campos">
                    <input @keyup="filtra(campo, valor[index])" type="text" :size=len_campo[index]

                           v-model='valor[index]'/>
                    <button @click="ordena(campo)">
                        {{ campo }}
                    </button>
                </th>
                <th></th><!-- Para edit -->
                <th></th> <!-- Para del -->
                <th></th> <!--Para consultas -->
            </tr>
            </thead>
            <tr class="bg-gray-200 even:bg-gray-50 hover:bg-gray-200 cursor-pointer"
                v-for="fila in filas">
                <td class="
                border-b-2 border-gray-500
                 px-4 p-2 text-xl text-gray-500  divide-green-600 " v-for="valor in fila">
                    {{ valor }}
                </td>
                <td @click="editar(fila.id)" class="text-center self-center cursor-pointer pt-6 h-10v w-5v  fa fa-pencil"
                             aria-hidden="true">
                </td>
                <td @click="borrar(fila.id)" class="text-center self-center cursor-pointer pt-6  h-10v w-5v fas fa-trash-alt"
                    aria-hidden="true">
                </td>
                <td @click="consultar(fila.id, nombre_tabla)" aria-hidden="true" class="cursor-pointer">
                    {{ consulta }}
                </td>
            </tr>
        </table>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: "tabla",
    props: ['filas_serializadas', 'campos_serializados', 'nombre_tabla', 'consulta'],
    data() {
        return {
            filas: [],
            campos: [],
            valor: [],
            len_campo: [],
        }
    },
    created() {
        this.filas = JSON.parse(this.filas_serializadas);
        this.campos = JSON.parse(this.campos_serializados);
        this.campos.forEach((campo, index) => {
            this.len_campo[index] = campo.length;
        })
    },
    methods: {
        borrar(id) {
            var url = window.location.href;
            var self = this;
            axios.delete(url + "/" + id)
                .then(function (response) {
                    self.filas = response.data;
                    console.log("Respuesta con estado " + response.status);
                });
            // let self = this;
            // var path = window.location.href;
            // axios.delete(path + '/' + id)
            //     .then(function (response) {
            //         // console.log("Datos: "+response.data);
            //         console.log("Estado" + response.status);
            //         self.filas = response.data;
            //     });
        },
        editar(id) {
            var url = window.location.href;
            window.location.href = url + '/' + id + "/edit";
        },
        mostrar(id) {
            var getUrl = window.location;
            var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            console.log("base de url  " + baseUrl);
            window.location.href = baseUrl + "/" + id;
        },
        ordena(campo) {
            this.filas = this.filas.sort((a, b) => {
                var retorno
                if (a[campo] > b[campo])
                    retorno = 1;
                else
                    retorno = -1;
                return retorno;
            });
        },
        filtra(campo, valor) {
            // console.log("saludo");
            console.log("quieres filtrar " + valor + " en el campo " + campo);
            this.filas = JSON.parse(this.filas_serializadas);
            console.log("quieres filtrar " + valor + " en el campo " + campo);
            this.filas = this.filas.filter((fila) => {
                    var texto = new String(fila[campo]);
                    // console.log("valor del campo "+texto);
                    if (texto.indexOf(valor) > -1)
                        return fila
                    // return ((fila[campo]).includes(valor));
                }
            );
            // console.log("filas "+this.filas);
        },
        consultar(id, tabla) {
            var url ="http://localhost:8000/"+this.consulta/id;
            window.location.href = url;

        }
    }
}
</script>

<style scoped>
</style>
