﻿
<?php $__env->startSection('custom_page_style'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@voerro/vue-tagsinput@2.4.3/dist/style.css">

    <style>
        .dropdown-menu > li > a.opt{
            padding:1px 18px!important;
        }
        .dropdown-header > span.text{
            color:#009877;
            font-weight: 700;
        }
        .panel-title{
            font-size: 12px;
        }
        .switch{
            margin-top: 9px;
        }
        .autoCompleter.bootstrap-autocomplete{
            top:70px!important;
        }
        .discount{
            text-decoration: line-through;
            font-size: 15px;
            font-weight: 700;
            display: inline-block;
        }
        .shop_name{
            color: #666;
            background: #ddde;
            padding: 1px 5px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: 300;
            line-height: 11px;
            display: inline-block;
        }
        .discount_percentage{
            display: inline-block;
            border-radius: 100px;
            padding: 3px 5px;
            line-height: 9px;
            font-size: 9px;
            background: #D95E46;
            color: #fff;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/dsd'); ?>" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> ALL DSD Banner</a>
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="app">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Create new DSD banner
                            <small>just put link over here,all feeds will be creating through API call</small>
                        </h2>
                        <div class="pull-right">
                            <input @click="change_product_filter_types('filter_feed')" name="group1" type="radio" id="radio_1" checked />
                            <label for="radio_1">Filter Feed</label>
                            <br>
                            <input @click="change_product_filter_types('product_ids_feed')" name="group1" type="radio" id="radio_2" />
                            <label for="radio_2">Product ID's Feed</label>
                        </div>
                    </div>
                    <div class="body">
                        <div v-if="message" class="alert bg-teal alert-dismissible m-t-20 animated fadeInDownBig" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           Success
                        </div>
                        <div class="row clearfix">
                            <?php echo Form::open(['url'=>'#','class'=>'form']); ?>

                            <div class="col-xs-4">

                                <label for="">Campaign title</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">title</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" name="title" v-model="title" class="form-control date" placeholder="Title.." autofocus>
                                    </div>
                                </div>

                                <label for="">Market</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">house_siding</i>
                                    </span>
                                    <div class="">
                                        <?php echo Form::select('market',['Bikroy'=>'Bikroy', 'Ikman'=>'Ikman', 'Tonaton'=>'Tonaton'],null,['class'=>'','v-model'=>'market','@change'=>'change_market','data-width'=>'100%']); ?>

                                    </div>
                                </div>
                                <label for="">Category</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">category</i>
                                    </span>
                                    <select title="--Select category--" @change="product_search" name="category" id="" v-model="category" class="category_selectpicker" data-width="auto">
                                        <optgroup v-for="group in all_category" v-bind:label="group.l1_category">
                                            <option v-for="sub in group.l2_category" :value="sub">
                                                {{ sub }}
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                                <label for="">Shop Name Or Shop Slug</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">shop</i></span>
                                    <div class="form-line autoCompleter">
                                        <voerro-tags-input
                                                class="selectpicker"
                                                v-model="selectedShops"
                                                element-id="tags"
                                                :existing-tags="shopLists"
                                                :typeahead="true"
                                                :typeahead-style="typeheadStyle"
                                                :placeholder="'Shop name or slug'"
                                                @tags-updated="onTagsUpdated"
                                                discard-search-text="Select shop name"
                                        ></voerro-tags-input>
                                    </div>
                                </div>

                                <label for="">Product keyword</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">subtitles</i></span>
                                    <div class="form-line">
                                        <?php echo Form::text('product_keywords',null,['class'=>'form-control','placeholder'=>'Product name or title','v-model'=>'product_keywords','@keyup'=>'product_search']); ?>

                                    </div>
                                </div>
                                <div class="panel-group" role="tablist">
                                    <div class="panel panel-default" style="margin-bottom: 20px;">
                                        <div class="panel-heading clearfix" role="tab">
                                            <h4 class="panel-title">
                                                <a href="#" @click.prevent>
                                                    Price range
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-6" style="margin-bottom: 0">
                                                <div class="input-group" style="margin-bottom: 0">
                                                    <div class="form-line">
                                                        <?php echo Form::number('min_price',null,['class'=>'form-control', 'v-model'=>'min_price', 'placeholder'=>'Min price','min'=>'0','@blur'=>'product_search']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 m-b-0" style="margin-bottom: 0">
                                                <div class="input-group" style="margin-bottom: 0">
                                                    <div class="form-line">
                                                        <?php echo Form::number('max_price',null,['class'=>'form-control', 'v-model'=>'max_price' ,'placeholder'=>'Max price', '@blur'=>'product_search']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading clearfix" role="tab" id="headingTwo_1">
                                            <h4 class="panel-title">
                                                <a href="#" @click.prevent>
                                                    Discount range
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-6" style="margin-bottom: 0">
                                                <div class="input-group" style="margin-bottom: 0">
                                                    <div class="form-line">
                                                        <?php echo Form::number('min_discount',null,['class'=>'form-control','@blur'=>'product_search','v-model'=>'min_discount', 'placeholder'=>'Min..','min'=>'0']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 m-b-0" style="margin-bottom: 0">
                                                <div class="input-group" style="margin-bottom: 0">
                                                    <div class="form-line">
                                                        <?php echo Form::number('max_discount',null,['class'=>'form-control','@blur'=>'product_search','v-model'=>'max_discount','placeholder'=>'Max..']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="">UTM code <small style="font-width: 300; font-size: 10px" class="text-muted">Start with question mark (?)</small></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">link</i></span>
                                    <div class="form-line">
                                        <?php echo Form::text('utm_code',null,['class'=>'form-control','placeholder'=>'UTM code...','v-model'=>'utm_code']); ?>

                                    </div>
                                </div>
                                <label for="">CTA Button Text</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">text_rotation_none</i></span>
                                    <div class="form-line">
                                        <?php echo Form::text('cta_button_text',null,['class'=>'form-control','placeholder'=>'UTM code...','v-model'=>'cta_button_text']); ?>

                                    </div>
                                </div>
                                <label for="">Sort by</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">sort</i></span>
                                    <div class="">
                                        <?php echo Form::select('short_by',['Date'=>'Latest Uploaded', 'Ibs'=>'Top Ibs',],null,['class'=>'','v-model'=>'sort_by','@change'=>'product_search','data-width'=>'100%']); ?>

                                    </div>
                                </div>
                                <div class="input-group">
                                    <input @change="onChangeEqualiseExposure" v-model="enable_equalise_exposure" type="checkbox" id="basic_checkbox_2" class="filled-in" checked />
                                    <label for="basic_checkbox_2">Equalise Exposure </label> &nbsp;
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-md btn-block"  @click.prevent="submit()" :disabled="disabled">SAVE </button>
                                    <img v-if="form_submit_animation" src="<?php echo URL::asset('public/images/loading_icon.gif'); ?>" alt="Loading icon" style="height:50px;">
                                </div>
                            </div>
                           <div class="col-xs-8">
                               <table class="table table-condensed table-bordered text-center" id="table">
                                   <thead>
                                   <tr>
                                       <td>Image</td>
                                       <td>Content</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr v-if="loading">
                                       <td colspan="2">
                                           <img  style="height:50px"  src="<?php echo URL::to('public/images/loading_icon.gif'); ?>" alt="">
                                       </td>
                                   </tr>
                                   <tr v-for="(row, index) in products" class="table table-bordered table-condensed">
                                       <td>
                                           <img width="70" v-if="row.image_url_1 != ''" :src="row.image_url_1" alt="" style="">
                                       </td>
                                       <td class="text-left">
                                           <p style="margin:0">
                                               <a target="_blank" :href="row.final_url" v-text="row.item_title" style="color:#0074ba;font-size:14px;margin:3px 0;text-decoration: none"></a>
                                               <span class="shop_name pull-right" v-text="'Ibs-'+row.ibs"></span>
                                           </p>
                                           <p style="color: #009877;font-weight: 300;margin:0px;line-height:23px;font-size:12px">{{ row.l1_category }} /
                                               <small v-text="row.l2_category" style="color:#666666"></small>
                                               <span class="shop_name pull-right" v-text="row.shop ? row.shop.shop_name : ''"></span>
                                           </p>
                                           <p style="font-size: 12px;margin-bottom:1px;font-weight:700">
                                               {{ row.price }} {{ getCurrencyText() }}
                                               <span class="discount" v-if="row.discount_percentage > 0" v-text="row.original_price"></span>
                                               <span class="discount_percentage" v-if="row.discount_percentage > 0" v-text="row.discount_percentage+'%'"></span>
                                               <span class="pull-right" style="font-size: 10px;font-style: italic;font-weight: 300" v-text="moment_time_ago(row.published_date)"></span>
                                           </p>
                                       </td>
                                   </tr>
                                   </tbody>
                               </table>

                           </div>
                            <?php echo Form::close(); ?>

                        </div>


                    </div>
                </div>



            </div>
        </div>
        <!-- #END# Color Pickers -->

    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_script'); ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.5/dist/latest/bootstrap-autocomplete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@voerro/vue-tagsinput@2.4.3/dist/voerro-vue-tagsinput.js"></script>



    <script type="text/javascript">

        var app = new Vue({
            el:'#app',
            components: { VoerroTagsInput },
            data:{
                title:'',
                message:false,
                disabled:false,
                market:'Bikroy',
                table_data_arr:[],
                category:'',
                category_list_url: 'https://tracking.bikroyit.com:3500/get_category',
                all_category:[],
                loading:false,
                form_submit_animation:false,
                is_enable_price_range:false,
                is_enable_discount_range:false,
                product_keywords:'',
                min_price:'',
                max_price:'',
                min_discount:'',
                max_discount:'',
                utm_code:'?source=Internal_Banner&medium=DynamicBanner_DSD&campaign=Internal_DSD_',
                cta_button_text: 'Order Online',
                sort_by:'Ibs',
                product_search_url:'https://tracking.bikroyit.com:3500/product_list',
                products:[],
                selectedShops: [],
                shopLists:[],
                typeheadStyle:'dropdown',
                shop_list_url: '<?php echo URL::to('module/get_shop'); ?>',
                preview_products:[],
                enable_equalise_exposure:false,
                product_ids:null,
            },
            methods:{


                onTagsUpdated() {
                    this.product_search();
                },
                price_range_filter:function(e){
                    this.is_enable_price_range = e.target.checked;
                    $(e.target).closest('.panel-title').find('a').click();
                    if(!this.is_enable_price_range){
                        this.min_price = '';
                        this.max_price = '';
                        this.product_search();
                    }
                },
                discount_range_filter:function(e){
                    this.is_enable_discount_range = e.target.checked;
                    $(e.target).closest('.panel-title').find('a').click();
                    if(!this.is_enable_discount_range){
                        this.min_discount = '';
                        this.max_discount = '';
                        this.product_search();
                    }

                },
                getCurrencyText:function (){
                    if(this.market === 'Bikroy'){
                        return 'Tk';
                    }else if(this.market === 'Ikman'){
                        return 'Rs';
                    }else{
                        return 'GH₵'
                    }
                },
                setSelected:function(value){
                    console.log(value);
                },
                product_search:function(){
                    this.loading = true;
                    let _this = this;
                    this.products = [];
                    axios.post(this.product_search_url,{
                        market:this.market,
                        category:this.category,
                        shop_id:_.filter(this.selectedShops).map(v=>v.key),
                        product_keywords: this.product_keywords,
                        min_price: this.min_price,
                        max_price: this.max_price,
                        min_discount: this.min_discount,
                        max_discount:this.max_discount,
                        sort_by:this.sort_by,
                    }).then(function(res){
                        _this.loading = false
                        _this.products = res.data;
                    });
                },
                get_shop_list:function(){
                    let _this = this;
                    axios.get('https://tracking.bikroyit.com:3500/get_shop_list?market='+this.market+'&search_string=').then(res=>{

                        _this.shopLists = res.data.map((item)=>{
                            return {
                                key:item.id,
                                value:item.shop_name,
                            }
                        })
                    })
                },
                get_category:function(){
                    //$(".category_selectpicker").empty();
                    let _this = this;
                    axios.get(this.category_list_url+'?market='+this.market).then(res=>{
                        _this.all_category = res.data;
                        _this.$nextTick(function(){
                            $(".category_selectpicker").selectpicker("refresh");
                        });
                    });
                },
                change_market:function(){
                    this.selectedShops = [];
                    this.all_category = [];
                    this.get_shop_list();
                    this.product_search();
                    this.get_category();
                },

                submit:function () {
                    this.form_submit_animation = true;
                    let _this = this;
                    axios.post("<?php echo URL::to('module/dsd'); ?>",{
                        title:this.title,
                        market:this.market,
                        category:this.category,
                        shop_id:_.filter(this.selectedShops).map(v=>v.key),
                        product_ids:this.product_ids,
                        shop_name:this.shop_name,
                        product_keywords: this.product_keywords,
                        min_price: this.min_price,
                        max_price: this.max_price,
                        min_discount: this.min_discount,
                        max_discount:this.max_discount,
                        utm_code: this.utm_code,
                        cta_button_text: this.cta_button_text,
                        sort_by:this.sort_by,
                        enable_equalise_exposure: this.enable_equalise_exposure,
                    }).then(function(res){
                        _this.form_submit_animation = false
                        console.log(res.data);
                        window.location.href = "<?php echo URL::to('/module/dsd'); ?>/"+res.data+'/edit';
                    });
                },

                moment_time_ago:function(date){
                    return moment(date).fromNow();
                },
                redirect_to_url:function (url) {
                    window.location.href = url;
                },
                onChangeEqualiseExposure:function(){
                    if(_.isEmpty(this.preview_products)){
                        this.preview_products = this.products;
                    }
                    if(this.enable_equalise_exposure === true){
                        let group_by_shop = _.groupBy(this.products,'shop_id');
                        let sort_shop_by_max_product =_.orderBy(group_by_shop, ['group_by_shop', function (o) {
                            return o.length;
                        }], ["desc","desc"]);
                        let custom_list = [];
                        let max_product_array = _.pullAt(sort_shop_by_max_product,0);
                        max_product_array = max_product_array.length>0 ? max_product_array[0]:[];
                        _.each(max_product_array,function(item){
                            custom_list.push(item);
                           _.each(sort_shop_by_max_product,function(shop){
                               if(shop.length > 0){
                                   let pulled_item = _.pullAt(shop,0);
                                   custom_list.push(pulled_item[0]);
                               }
                           })
                        });
                        this.products = custom_list;
                    }else{
                        console.log(' false')
                        this.products = this.preview_products;
                    }

                },
                change_product_filter_types:function (type) {
                    if(type === 'filter_feed'){
                        window.location.href = ('<?php echo URL::to("module/dsd/create?type=filter_feed"); ?>');
                    }else{
                        window.location.href = ('<?php echo URL::to("module/dsd/create?type=product_ids_feed"); ?>');
                    }
                }

            },
            mounted:function(){
                this.get_category();
                this.product_search();
                this.get_shop_list();
            },
            filters:{
                resize:function(value){
                    let split = value.split('/');
                    split[split.length-3] ='120';
                    split[split.length-2] ='101';
                    return split.join('/');
                },
            },
        });


        $(document).ready(function(){
            $(".selectpicker").selectpicker("selectpicker");

        })
    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>