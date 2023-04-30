$(document).ready(function(){
    $('#city').on('change', function () {
        var idCity = $('#city').val();
         if(idCity != ''){
        var idDistrict = $('#district').val();
       $.ajax({
    url: urlAddress,
    method: "GET",
    data: {city_id:idCity},
    success: function(data){
        var district = data.district;
        var options = '';
        options += '<option>' +  + '</option>';
        for(var i = 0; i < district.length; i++){
            var district_id = district[i].id;
            var district_name = district[i].name;
            if(district_id == idDistrict){
                options += '<option value="'+district_id+'" selected>'+district_name+'</option>';
            } else {
                options += '<option value="'+district_id+'">'+district_name+'</option>';
            }
        }
        $('#district').html(options);
    }
});
}
});        
});

