<template>
    <div>
        <div class="btn-group">

            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal"  @click="getBids(id)" data-target="#exampleModal">Bid</button>

        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BID </h5>


                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" :class="{'is-invalid':errors.email}" name="email" v-model="bids.email">
                                    <small class="text-danger"  v-if="errors.email"  >{{errors.email[0]}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="text" class="form-control" :class="{'is-invalid':errors.amount}"  name="amount" v-model="bids.amount">
                                    <small class="text-danger"  v-if="errors.amount"  >{{errors.amount[0]}}</small>
                                </div>
                                <input type="text" hidden  name="product_id" v-model="bids.product_id" value="id" >
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeMe" data-dismiss="modal">Close</button>
                         <button type="button"  class="btn btn-primary" @click="bid">Place Your Bid </button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "bid",
        props:['id'],
        data(){
            return{
                bids:[{
                    email:'',
                    amount:'',
                    product_id:''
                }],
                errors:{},
                url:'api/bid',
                high:'',
                product_name:'',
                avg:'',
                custBid:'',
                temp:''


            }
        },
        methods:{
            bid()
            {
               if(!this.bids.product_id)
               {
                   this.bids.product_id = Math.floor(Math.random() * Math.floor(20));
               }

               console.log(this.bids)
                axios.post(this.url,this.bids)
                    .then((response)=>{

                    let values ='Success BID <br>' + 'Product Name: '+response.data.product_name + '<br>' + 'Highest Bid R' + response.data.high + '<br>' + 'Average Bid R' + response.data.avg+
                            '<br> Your Bid R' + response.data.custBid
                    new Noty({
                        type: 'success',
                        text: values,
                        timeout: 3000,
                        layout: "topCenter",
                        theme: "nest"
                    }).show();
               // this.custBid = response.data.custBid


            })
            .catch((error)=>{
                this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                console.log(this.errors)
            })
            },
           getBids(ids)
            {

                let vm = this;
                vm.bids.product_id = ids

                vm.temp = ids
                axios.get('api/bids/' + vm.id)
                    .then((response)=>{

                 let values = 'Product Name: '+response.data.product_name + '<br>' + 'Highest Bid R' + response.data.high + '<br>' + 'Average Bid R' + response.data.avg
                new Noty({
                    type: 'success',
                    text: values,
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "nest"
                }).show();

                    })
                    .catch((error)=>{
                        this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                        console.log(this.errors)
                    })
            },
            closeMe()
            {
                this.bids = {}

            }
        },
        created()
        {
           this.bids.product_id = this.id

        }



    }
</script>

<style scoped>

</style>