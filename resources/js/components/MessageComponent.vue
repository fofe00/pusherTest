<template>
   <div>
       <li class="list-group-item" :class="className"><slot></slot></li>
       <small class="badge float-right" :class="classBadge" >{{ user }}</small>
   </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        },
        props:[
            'color',
            'user'
        ],
        computed:{
            className(){
                return 'list-group-item-'+this.color;
            },
            classBadge(){
                return 'badge-'+this.color;
            }
        }
    }
</script>
