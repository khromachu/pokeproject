<template>
    <div class="my-5">
        <div class="card">
            <div class="card-header bg-danger text-light">Admin Panel</div>
            <div class="card-body">
                <section>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; width: 200px">
                        <label for="">Pokemons to parse number</label>
                        <input v-model="pokemonsToParse.number" type="number" class="form-control">
                        <lavel>Offset</lavel>
                        <input v-model="pokemonsToParse.offset" type="number" class="form-control">
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary"
                                @click="parsePokemons"
                                :class="{disabled: pokemonsToParse.loading}">
                            Parse
                        </button>
                        <div v-if="pokemonsToParse.loading" class="spinner-grow text-primary" role="status">
                        </div>
                    </div>
                </section>
                <section class="my-5">
                    <button @click="getPokemons" class="btn btn-outline-primary"><i class="fas fa-sync-alt"></i></button>
                    <button @click="page += -1; getPokemons()" class="btn btn-outline-primary"><i class="fas fa-chevron-left"></i></button>
                    <div class="btn btn-outline-primary disabled">{{page}}</div>
                    <button @click="page += 1; getPokemons()" class="btn btn-outline-primary"><i class="fas fa-chevron-right"></i></button>
                    <div style="overflow-x: scroll">
                        <table class="table table-bordered">
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
