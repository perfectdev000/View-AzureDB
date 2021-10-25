// function myfuntion1() {
//     var value_str = document.getElementById('manufacturer').value;
//     window.alert(value_str);
// }

$(document).ready(function(){
    $("#rowcount").change(function(){
        $("#home_categorys").submit();
    });
    $("#manufacturer").change(function(){
        $("#mastercategory").val('')
        $("#subcategory1").val('')
        $("#subcategory2").val('')
        $("#subcategory3").val('')
        $("#subcategory4").val('')
        $("#home_categorys").submit();
    });
    $("#mastercategory").change(function(){
        $("#subcategory1").val('') 
        $("#subcategory2").val('') 
        $("#subcategory3").val('')   
        $("#subcategory4").val('')         
        $("#home_categorys").submit();
    });
    $("#subcategory1").change(function(){
        $("#subcategory2").val('') 
        $("#subcategory3").val('')   
        $("#subcategory4").val('')       
        $("#home_categorys").submit();
    });
    $("#subcategory2").change(function(){
        $("#subcategory3").val('')   
        $("#subcategory4").val('')      
        $("#home_categorys").submit();
    });
    $("#subcategory3").change(function(){
        $("#subcategory4").val('')        
        $("#home_categorys").submit();
    });
    $("#subcategory4").change(function(){       
        $("#home_categorys").submit();
    });

});