(function () {
  'use strict';


  ACMESTORE.admin.update = function () {
    // update product category
    $('.update-category').on('click', function (e) {
      e.preventDefault();
      let token = $(this).data('token'),
          id = $(this).attr('id'),
          name = $('#item-name-' + id).val();

      $.ajax({
        type: 'POST',
        url: '/admin/product/categories/'+ id +'/edit',
        data: {
          token: token,
          name: name,
        },
        success: function (data) {
          let response = JSON.parse(data);
          $(".notification")
            .css("display", 'block')
            .delay(4000)
            .slideUp(300)
            .removeClass('alert')
            .addClass('success')
            .html(response.success);


        },
        error: function (request, error) {
          let errors = JSON.parse(request.responseText);
          let ul = document.createElement('ul');
          $.each(errors, function (key, value) {
            let li = document.createElement('li');
            li.appendChild(document.createTextNode(value));
            ul.appendChild(li);
          });
          $(".notification")
            .css("display", 'block')
            .removeClass('success')
            .addClass('alert')
            .delay(6000)
            .slideUp(300)
            .html(ul);
        }
      });
    })

  };



})();