/*global $, alert, document,console */
$(document).ready(function () {
    'use strict';

   /* $('#text').focus(function () {
        $(this).on('keyup', function () {
            var t = $(this).val();
            if (!isNaN(t)) {
                alert('Please Enter Letters ');
            }
        });*/
        
     
    $('#sizeNo').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if (isNaN(n)) {
                alert('Please Enter Number');
                $(this).val("0")
            }
        });
    });
    
    $('#price').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if (isNaN(n)) {
                alert('Please Enter Number');
                $(this).val("1")
               
            }
        });
    });
    //for input total time exam
        $('#quant').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if (isNaN(n)) {
                alert('Please Enter Leter');
                $(this).val("1")
            }
        });
    });
    //for input max degree
    //categories Main
        $('#addCat').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if ( !isNaN(n)) {
                $(this).val("")
            }
        });
    });

 //categories Branch
       $('#addCat').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if ( !isNaN(n)) {
                $(this).val("")
            }
        });
    });
    //categories Marka
       $('#markaName').focus(function () {
        $(this).on('keyup', function () {
            var n = $(this).val();
            if ( !isNaN(n)) {
                $(this).val("")
            }
        });
    });
    
    
});
