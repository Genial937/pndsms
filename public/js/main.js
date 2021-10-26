//$(".table").dataTable();
// $("#checkAll").change(function(){
//    $(".checkitem").prop("checked",$(this).prop("checked"));
// });
// $(".checkitem").change(function(){
//     if($(this).prop("checked") == false){
//         $("#checkAll").prop("checked",false);
//     }
//     if($(".checkitem:checked").length == $(".checkitem").length){
//         $("#checkAll").prop("checked",true);
//     }
// })


$("#tags").select2();


// Handle form submission event
$('#sms-form').on('submit', function(e){
    var form = this;
    var table = $(".contacts").DataTable();

    // Iterate over all checkboxes in the table
    table.$('input[type="checkbox"]').each(function(){
       // If checkbox doesn't exist in DOM
       if(!$.contains(document, this)){
          // If checkbox is checked
          if(this.checked){
             // Create a hidden element
             $(form).append(
                $('<input>')
                   .attr('type', 'hidden')
                   .attr('name', this.name)
                   .val(this.value)
             );
          }
       }
    });
 });

 var oTable = $('.contacts').dataTable({
    stateSave: true
});

var allPages = oTable.fnGetNodes();

$('body').on('click', '#checkAll', function () {
    if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', allPages).prop('checked', false);
    } else {
        $('input[type="checkbox"]', allPages).prop('checked', true);
    }
    $(this).toggleClass('allChecked');
})
