<!-- BEGIN Modal -->
<script type="text/javascript">
    function store_produit_ajax(data,url,modal,erreur,obj,p){
        $(this).prop('disabled',true);
        $('#loading').prop('style','display : block');
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(data){
                message_produit(data.status,'',data.message);
                if(data.status == "success"){
                    param = data.produit.id;
                    get_produit_ajax(param,obj.url,obj.name,obj.params,'{{$categorie1}}');
                    // ------------------------------------------ //
                    cat_param = data.produit.categorie_id;
                    var cat_obj = {
                        url : "{{Route('modal.get_categorie_ajax')}}",
                        name : '',
                        params : {
                            key0 : '-- Catégories --',
                            key1 : 'id',
                            key2 : 'produit',
                            key3 : 'nom_categorie',
                        }
                    }
                    // ------------------------------------------ //
                    var prod_id=$('#prod_id');
                    var libelle=$('#libelle');
                    var qte=$('#qte');
                    var prix=$('#prix');
                    var total=$('#total');
                    var stock_qte=$('#stock_qte');
                    var badge_qte=$('#badge_qte');
                    var type_categorie=$('#type_categorie');
                    // ------------------------------------------ //
                    stock_qte.val(data.produit.quantite);
                    prod_id.val(data.produit.id) ; 
                    libelle.val(data.produit.code_produit+' | '+data.produit.nom_produit.substring(0,15)+'...');
                    prix.val(parseFloat(data.produit.prix_produit_TTC).toFixed(2));                
                    total.val(parseFloat(data.produit.prix_produit_TTC).toFixed(2));   
                    qte.val("1");
                    var type = data.produit.categorie.type_categorie;
                    (type == 'stock') ? qte.attr("max",parseFloat(data.produit.quantite)) : qte.attr("max","");
                    type_categorie.val(type);
                    (type == 'stock') ? badge_qte.html(parseFloat(data.produit.quantite) - parseFloat(quantite_stock(prod_id.val()))) : badge_qte.html('_');
                    // ------------------------------------------ //
                    get_categorie_ajax(cat_param,cat_obj.url,'{{$categorie1}}',cat_obj.params);
                    get_categorie_ajax(cat_param,cat_obj.url,'{{$categorie2}}',cat_obj.params);
                    // ------------------------------------------ //
                }
                else{
                    $(this).prop('disabled',false);
                }
                $('#loading').prop('style','display : none');
                $('#'+modal).modal('toggle');
            } ,
            error:function(err){
                if(err.status === 500){
                    message_produit('error','',err.statusText);
                }
                else{
                    message_produit('error','',erreur);
                }
            },
        });
    }
    function get_produit_ajax(param,url,name,params,cat_id){
        var name_select=$('#'+name);
        var cat_id=$('#'+cat_id);
        $.ajax({
            type:'get',
            url:url,
            data: {id:cat_id.val()},
            success:function(data){
                var options = `<option value="">${params.key0}</option>`;
                options+=`<option data-divider="true"></option>`;
                if(data.length>0){
                    for(var i=0;i<data.length;i++){
                        var subtext = `| ${data[i][params.key2.key21]} ; prix : ${parseFloat(data[i][params.key2.key22]).toFixed(2)} ; qté : ${parseFloat(data[i][params.key2.key23])} |`;
                        options+=`<option value="${data[i][params.key1]}" data-subtext="${subtext}">${data[i][params.key3]}</option>`;                                    
                    }  
                }
                name_select.html("");
                name_select.append(options);
                name_select.selectpicker('refresh');
                find_produit_ajax(param,name);
            },
            error:function(){
            }
        });
    }
    function find_produit_ajax(param,name){
        var name_select=$('#'+name);
        var list = name_select.find('option');
        var index = -1;
        for (let i = 0; i < list.length; i++) {
            var obj = list.eq(i).prop('value');
            if(parseFloat(obj) == parseFloat(param)){
                index = i;
                break;
            }
        }
        // ------------------------------- //
        if(index != -1){
            list.eq(index).prop('selected',true);
        }
        name_select.selectpicker('refresh');
    }
    function message_produit(icon,title,text){
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: false,
            showConfirmButton : true,
            confirmButtonColor: '#007BFF',
        });
    }
</script>
@include('managements.modals.data_categorie')
<!-- END Modal -->