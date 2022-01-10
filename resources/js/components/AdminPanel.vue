<template>
    <div class=" ">
        <div class="card" style="background-image: url('/images/back1.png'); border-color: grey">
            <div class="card-header text-light" style="background-color: #95999c; font-size:16px">
                <i class="fas fa-user-shield"></i>
                Admin Panel - Pokemon Database Parser
            </div>
            <div class="card-body">
                <section class="row mx-auto" style="width: 500px; background-color: #cbd3da; border-radius: 5px">
                    <div class="mt-2" style="width: 250px">
                        <label>Pokemons to parse Number</label>
                        <input v-model="pokemonsToParse.number" type="number" class="form-control">
                    </div>
                    <div class="mt-2" style="width: 250px">
                        <lavel>Offset Number</lavel>
                        <input v-model="pokemonsToParse.offset" type="number" class="form-control">
                    </div>
                    <div class="d-flex my-3">
                        <button class="btn btn-primary"
                                @click="parsePokemons"
                                :class="{disabled: pokemonsToParse.loading}">
                            Parse
                        </button>
                        <div v-if="pokemonsToParse.loading" class="spinner-grow text-primary" role="status">
                        </div>
                    </div>
                </section>
                <section class="my-3 align-content-center">
                    <button @click="getPokemons" class="btn btn-outline-primary"><i class="fas fa-sync-alt"></i></button>
                    <button @click="page += -1; getPokemons()" class="btn btn-outline-primary"><i class="fas fa-chevron-left"></i></button>
                    <div class="btn btn-outline-primary disabled">{{page}}</div>
                    <button @click="page += 1; getPokemons()" class="btn btn-outline-primary"><i class="fas fa-chevron-right"></i></button>
                    <div style="overflow-x: scroll">
                        <table class="table table-bordered border-dark" style="background-color: white;">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>image</th>
                                <th>type id</th>
                                <th>pre evolution id</th>
                                <th>base hp</th>
                                <th>base attack</th>
                                <th>base defence</th>
                                <th>base special attack</th>
                                <th>base special defence</th>
                                <th>base speed</th>
                            </tr>
                            <tr v-for="(pok, index) in pokemons" :key="pok.id">
                                <td>{{ pok.id }}</td>
                                <td>{{ pok.name }}</td>
                                <td><img width="50px" height="50px" :src="pok.image"></td>
                                <td>{{ pok.type_id }}</td>
                                <td>{{ pok.pre_evolution_id }}</td>
                                <td>{{ pok.base_hp }}</td>
                                <td>{{ pok.base_attack }}</td>
                                <td>{{ pok.base_defence }}</td>
                                <td>{{ pok.base_special_attack }}</td>
                                <td>{{ pok.base_special_defence }}</td>
                                <td>{{ pok.base_speed }}</td>
                            </tr>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminPanel",
    data(){
        return {
            pokemonsToParse: {
                number: 50,
                offset: 0,
                loading: false
            },
            page: 1,
            pokemons: []
        }
    },
    methods: {
        async parsePokemons(){
            this.pokemonsToParse.loading = true
            try {
                await this.axios.get(`/parse/pokemons/all?limit=${this.pokemonsToParse.number}&offset=${this.pokemonsToParse.offset}`)
            } catch (e) {

            }
            this.pokemonsToParse.loading = false
        },
        async getPokemons(){
            const result = await axios.get(`/api/pokemons/get?page=${this.page}`)
            console.log(result)
            this.pokemons = result.data
        }
    }
}
</script>

<style scoped>

</style>
