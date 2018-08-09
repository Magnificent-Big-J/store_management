<template>
    <div>
        <div class="col-md-4" v-for="product in products">

            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{asset('images/default.jpg')}}" style="height: 200px;" alt="Card image cap">
                <h4 class="text-center">
                    {{product.name}} R {{product.price}}
                </h4>
                <div class="card-body">
                    <p class="card-text">
                        {{product.description}}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <app-bid :id="{{product.id}}"></app-bid>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "cust-bids",
        data(){
            return{
                products:{}
            }
        }
    }
</script>

<style scoped>

</style>