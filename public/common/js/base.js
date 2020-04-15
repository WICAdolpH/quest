jQuery.prototype.serializeObj=function(){
    var obj=new Object();
    $.each(this.serializeArray(),function(index,param){
        if(!(param.name in obj)){
            obj[param.name]=param.value;
        }
    });
    return obj;
};
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});