<template>
<div>

   <div class="row">

     <div class="col-md-4" v-for="product in products">

       <div class="card mb-4 shadow-sm" >
         <img src="images/default.jpg" alt="">
         <h4 class="text-center">
           {{product.name}} R {{products.price}}
         </h4>
         <div class="card-body">
           <p class="card-text">
             {{product.description}}
           </p>
           <div class="d-flex justify-content-between align-items-center">
             <button class="btn btn-sm btn-outline-secondary" @click="getBids(product.id)" data-toggle="modal" data-target="#exampleModal">BID</button>
           </div>
         </div>
       </div>
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
  <div class="row text-center">
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
  </div>
</div>
</template>

<script>

    export default {
        name: "bids",

        data(){
            return{
                products:{},
                url:'api/custsBids',
                pagination:[],
                bids:{
                    email:'',
                    amount:''
                },
                errors:{},
                urls:'api/bid',
                high:'',
                product_name:'',
                avg:'',
                custBid:'',
                temp:'',
                id:''
            }
        },

    methods:{
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
        getData(page_url)
        {
            let vm = this;
            page_url = page_url || this.url
            axios.get(page_url)
                .then(response=>{
                this.products = response.data.data
            vm.makePagination(response.data.meta, response.data.links);
            console.log(this.products)
        });

        },
         bid()
        {


            axios.post(this.urls + '/' + this.id,this.bids)
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
          this.id = ids

            axios.get('api/bids/' + ids)
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
            this.errors = {}

        }
    },
    mounted(){
        this.getData();
        console.log('mounted')
    }
    }
</script>

<style scoped>

</style>