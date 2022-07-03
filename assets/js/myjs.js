$(document).ready(function() { 
    


    // Flashdata
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
        title: 'Success',
        text: flashData,
        icon: 'success'
        });
    }

   


    $('.uang').mask('000000000000', {
        reverse: true
      });


    $(".input-file").filestyle({
        'text' :'Choose File',
        'btnClass' :'btn-light border border-secondary px-4',
        'size' :'nr',
        'input' :true,
        'placeholder':'',
        'buttonBefore' :true,
    });
});