<template>


   <div class="row">
     <div class="col-md-4" v-for="product in products">

       <div class="card mb-4 shadow-sm" >

         <h4 class="text-center">
           {{product.name}} R {{products.price}}
         </h4>
         <div class="card-body">
           <p class="card-text">
             {{product.description}}
           </p>
           <div class="d-flex justify-content-between align-items-center">
             <app-bid :id="product.id"></app-bid>

           </div>
         </div>
       </div>
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