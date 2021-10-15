$(document).on('click','.show',function(){
console.log("d");
const typeint=$("input[name='password']").attr("type");
$(".showd").toggleClass("fa-eye fa-eye-slash");
if(typeint=="password"){
    $("input[name='password']").attr("type","text");
}else{
    $("input[name='password']").attr("type","password");
}

});


$("#datepicker" ).datepicker( {  showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    dateFormat:"d-M-yy",
    minDate: "-1D", maxDate: "+1M +10D"
});