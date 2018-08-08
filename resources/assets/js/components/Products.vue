<template>
    <div class="card">
        <div class="card-header">
           <h4 class="text-center"> Products</h4> <button class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModal">Add Product</button>
        </div>
        <div class="card-body">

        </div>
    </div>
    
</template>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-if="edit" id="exampleModalLabel">Edit Product </h5>
                <h5 class="modal-title" v-else id="exampleModalLabel">Add Product</h5>

            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" :class="{'is-invalid':errors.name}" name="vin_number" v-model="product.name">
                            <small class="text-danger"  v-if="errors.name"  >{{errors.name[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="text" class="form-control" :class="{'is-invalid':errors.price}"  name="engine_number" v-model="product.price">
                            <small class="text-danger"  v-if="errors.price"  >{{errors.price[0]}}</small>
                        </div>
                        <label for="sku">Product SKU</label>
                        <div class="form-group">
                            <input type="text" class="form-control" :class="{'is-invalid':errors.sku}"  name="model" v-model="product.sku">
                            <small class="text-danger"  v-if="errors.sku"  >{{errors.sku[0]}}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <input type="date" class="form-control" :class="{'is-invalid':errors.description}" placeholder="2018-05-28" name="description" v-model="product.description">
                            <small class="text-danger"  v-if="errors.description"  >{{errors.description[0]}}</small>
                        </div>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cancel">Close</button>
                <button type="button" v-if="edit" class="btn btn-primary" @click="Update">Update </button>
                <button type="button" v-else class="btn btn-primary" @click="Save">Save </button>
            </div>


        </div>
    </div>
</div>
<script>
    import axios from 'axios'
    export default {
        name: "products",
        data(){
            return{
                products:[],
                edit:false,
                temp:{},
                isLoaded:false,
                pagination:[],
                product:{
                    name:'',
                    description:'',
                    sku:'',
                    price:0
                },
                errors:{},
                editId:''
            }
        },
        methods:{
            save(){

            },
            getData(){

            },
            update(){

            },
            cancel()
            {

                this.edit = false
                this.editId = ''
                this.product = {}

            },
            getData()
            {

            },


        },
        mounted(){
            this.getData();
        }
    }
</script>

<style >

</style>