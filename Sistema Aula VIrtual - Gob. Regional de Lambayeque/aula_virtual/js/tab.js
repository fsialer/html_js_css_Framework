/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$('#myTab a').click(function(e) {
//  e.preventDefault();
//  $(this).tab('show');
//
//
//
//
//});

//$('#myTab a[href="#admin"]').tab('show'); // Select tab by name
//$('#myTab a:first').tab('show');// Select first tab
//$('#myTab a:last').tab('show'); // Select last tab
//$('#myTab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
////
// $(function () {
//    $('#myTab a:last').tab('show');
//  });
$('myTab li').click(function(){
    $('#myTab a[class="active"]').tab('show');
});