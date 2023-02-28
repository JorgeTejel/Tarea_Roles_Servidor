<template>
    <div>
        <h1>{{ saludo }} {{ nombre }}</h1>
        <hr>
        <h1>{{minutos}}:{{segundos}}:{{decimas}}:</h1>
        <button class="rounded  bg-red-600 px-2 mx-2 focus:bg-red-100 " @click="parar">Stop</button>
        <button class="rounded  bg-red-600 px-2 mx-2 focus:bg-red-100"  @click="reset">Reset</button>
        <button class="rounded  bg-red-600 px-2 mx-2 focus:bg-red-100"  @click="empezar">Start</button>

<!--        <input type="text" :value=$nombre />-->
    </div>
</template>

<script>
export default {
    name: "cronometro",
    props: ['nombre'],
    data() {
        return {
            saludo: "",
            minutos:0,
            segundos:0,
            decimas:0,
        }
    },
    created() {
    },
    mounted() {
        console.log("montando.....");

        this.saludo = "Hola qué tal???";
        this.minutos=10;
        this.segundos=0;
        this.decimas=0;
        this.start=false;

        setInterval(()=>{
        if (this.start){
            this.decimas++;
            if (this.decimas==10){
                this.decimas=0;
                this.segundos++;
                if (this.segundos==60){
                    this.segundos=0;
                    this.minutos++;
                }
            }
        }
        }, 100)

    },
    methods:{
        empezar: function(){
            console.log("en start");
            this.start=true;
        },
        parar: function(){
            this.start=false;
        },
        reset:function(){
            this.minutos=0;
            this.segundos=0;
            this.milesimas=0;

        }



    }
}
</script>

<style scoped>

</style>
