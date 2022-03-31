<!-- BEGIN Modal -->
<script type="text/javascript">
    function store_ajax(data,url,modal,erreur,obj){
        $(this).prop('disabled',true);
        $('#loading').prop('style','display : block');
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(data){
                message(data.status,'',data.message);
                if(data.status == "success"){
                    param = data.id;
                    get_ajax(param,obj.url,obj.name,obj.params)
                }
                else{
                    $(this).prop('disabled',false);
                }
                $('#loading').prop('style','display : none');
                $('#'+modal).modal('toggle');
            } ,
            error:function(err){
                if(err.status === 500){
                    message('error','',err.statusText);
                }
                else{
                    message('error','',erreur);
                }
            },
        });
    }
    function get_ajax(param,url,name,params){
        var name_select=$('#'+name);
        $.ajax({
            type:'get',
            url:url,
            success:function(data){
                var options = `<option value="">${params.key0}</option>`;
                options+=`<option data-divider="true"></option>`;
                if(data.length>0){
                    for(var i=0;i<data.length;i++){
                        options+=`<option value="${data[i][params.key1]}" data-subtext="${data[i][params.key2]}">  ${data[i][params.key3]}</option>`;                                    
                    }  
                }
                name_select.html("");
                name_select.append(options);
                name_select.selectpicker('refresh');
                find_ajax(param,name);
            },
            error:function(){
            }
        });
    }
    function find_ajax(param,name){
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
    function message(icon,title,text){
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
<!-- END Modal -->