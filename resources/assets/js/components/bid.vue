<template>
    <div>
        <div class="btn-group">

            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" @click="getBids" data-target="#exampleModal">Bid</button>

        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BID </h5>


                    </div>
                    <div class="modal-body">

                        <p class="lead" >{{product_name}}</p>

                        <p class="lead">Highest Bid : R{{high}}</p>
                        <p class="lead">Average Bid: R{{avg}}</p>
                        <p class="lead" v-if="custBid.length > 0">Your Bid: R{{custBid}}</p>
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
                                <input type="text" hidden name="product_id" v-model="bids.product_id" >
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
                bids:{
                    email:'',
                    amount:'',
                    product_id:''
                },
                errors:{},
                url:'api/bid',
                high:'',
                product_name:'',
                avg:'',
                custBid:'',


            }
        },
        methods:{
            bid()
            {
                axios.post(this.url,this.bids)
                    .then((response)=>{
                new Noty({
                    type: 'success',
                    text: 'BID was placed successfully!',
                    timeout: 3000,
                    layout: "topCenter",
                    theme: "nest"
                }).show();
                this.custBid = response.data.custBid


            })
            .catch((error)=>{
                this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                console.log(this.errors)
            })
            },
           getBids()
            {
                this.bids.product_id = this.id

                axios.get('api/bids/' + this.id)
                    .then((response)=>{
                        this.product_name = response.data.product_name
                        this.high = this.temp= response.data.high
                        this.avg = response.data.avg


                    })
                    .catch((error)=>{
                        this.errors = JSON.parse(JSON.stringify( error.response.data.errors ))
                        console.log(this.errors)
                    })
            },
            closeMe()
            {
                this.avg = null
                this.product_name = null;
                this.high = null
            }
        },
        created(){


        },


    }
</script>

<style scoped>

</style>