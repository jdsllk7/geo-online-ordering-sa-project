$(document).ready(function () {
  $(document).on("click", ".ordersCheckbox", function () {
    let element = $(this);
    let ordersId = element.val();
    $.ajax({
      type: "POST",
      url: "includes/markDelivered_db.php",
      data: { ordersId: ordersId },
      beforeSend: function () {
        $(".dashboardLabel").html(
          '<i class="fas fa-spinner fa-spin text-dark"></i>'
        );
      },
      success: function (result) {
        console.log(result);
        if (result.includes("success")) {
          var fields = result.split("__");
          var ordersPending = fields[1];
          var ordersCompleted = fields[2];
          var deliveryRate = fields[3];
          $(".ordersPending").html(ordersPending);
          $(".ordersCompleted").html(ordersCompleted);
          $(".deliveryRate").html(deliveryRate + "%");
          alert("Action Successful");
        } else {
          alert(result);
        }
        $(".dashboardLabel").html("Dashboard");
      },
      error: function (error) {
        console.log(error);
        alert("Error! Action unsuccessful");
        $(".dashboardLabel").html("Dashboard");
      },
    });
  });
});
