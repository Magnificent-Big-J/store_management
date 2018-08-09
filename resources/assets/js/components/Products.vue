<template>
    <div>


    <div class="card mt-4">
        <div class="card-header">
           <h4 class="text-center"> Products</h4>
        </div>
        <div class="card-body">
            <button class="btn btn-primary btn-sm text-right mb-2" data-toggle="modal" data-target="#exampleModal"> <span data-feather="plus-circle"></span> Add Product</button>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                        <a @click="getData(pagination.prev_page_url)"  class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark" href="#"> Page {{pagination.current_page}} of {{pagination.last_page}}</a>
                    </li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item">
                        <a @click="getData(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product SKU</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product,i) in products">
                        <td>{{i +=1}}</td>
                        <td>{{product.name}}</td>
                        <td>R{{product.price}}</td>
                        <td>{{product.sku}}</td>

                        <td>
                            <a class="btn btn-sm btn-warning mt-1" data-toggle="modal" data-target="#exampleModal" @click="open(product)" href="#"> Edit</a>
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal2" @click="showMe(product)" > View</button>
                            <button class="btn btn-sm btn-danger"  @click="deleteProduct(product.id)" > Delete</button>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    
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
                            <textarea class="form-control" :class="{'is-invalid':errors.description}" name="description" v-model="product.description"></textarea>

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
        <!-- Show me -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Name: {{product.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card" >
                            <img class="card-img-top" style="height: 200px" src="images/default.jpg">

                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Product Price: R{{product.price}}.00</li>
                                    <li class="list-group-item">Product SKU: {{product.sku}}</li>
                                    <li class="list-group-item">Product SKU: {{product.description}}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cancel">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "products",
        data(){
            return{
                products:[],
                edit:false,
                url:'api/products',
                isLoaded:false,
                pagination:[],
                product:{
                    name:'',
                    description:'',
                    sku:'',
                    price:0
                },
                errors:{},
                editId:'',

            }
        },
        methods:{
            Save(){

                axios.post(this.url,this.product)
                    .then((response)=>{
                    this.products.push(response.data)

                new Noty({
                    type: 'success',
                    text: 'Successfully added!',
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "nest"
                }).show();
                    this.getData();
            })
            .catch((error)=>{
                    this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                console.log(this.errors)
            })
            },

            Update(){
                let id = this.product.id

                axios.put(this.url + '/'+ id,this.product)
                    .then((response)=>{

                    new Noty({
                        type: 'success',
                        text: 'Successfully updated!',
                        timeout: 3000,
                        layout: "topCenter",
                        theme: "nest"
                    }).show();
                    this.getData()

                     })
                    .catch((error)=>{
                            this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                        console.log(this.errors)
                    })
            },
            cancel()
            {

                this.edit = false
                this.editId = ''
                this.product = {}

            },
            deleteProduct(id)
            {
                if(confirm('Are you sure?'))
                {
                    axios.delete(this.url + '/'+ id)
                        .then((response)=>{

                        new Noty({
                            type: 'success',
                            text: 'Successfully deleted!',
                            timeout: 3000,
                            layout: "topCenter",
                            theme: "nest"
                        }).show();
                    this.getData()

                })
                .catch((error)=>{
                    this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                    console.log(this.errors)
                })                }

            },
            open(p)
            {
                this.editId = p.id
                this.edit = true
                this.product = p
            },
            getData(page_url)
            {
                let vm = this;
                page_url = page_url || this.url
                axios.get(page_url)
                    .then(response=>{
                    this.products = response.data.data
                        vm.makePagination(response.data.meta, response.data.links);
                        console.log(response.data)
                    });

            },
            showMe(p){
                this.editId = p.id
                this.edit = true
                this.product = p
            },
            makePagination(meta,links)
            {
                let pagination = {
                    current_page : meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }
                this.pagination = pagination;
            },

        },
        mounted(){
            this.getData();
            console.log('mounted')
        }
    }
</script>

<style >

</style>