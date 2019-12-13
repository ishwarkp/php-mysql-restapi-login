<footer class="footer">
  <div class="container">
    <p>&copy; RestAPI Example, 2019</p>
  </div>
</footer>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Login/Sign Up Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#" id="toggleLogin">Sign Up</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>

    
<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Venue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" id="bookingAlert"></div>
        <form>
        <input type="hidden" id="bookingActive" name="bookingActive" value="1">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="checkindate">Check In</label>
              <input type="date" class="form-control" id="checkin">
            </div>
            <div class="form-group col-md-6">
              <label for="checkoutdate">Check Out</label>
              <input type="date" class="form-control" id="checkout">
            </div>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary bookButton">Book</button>
      </div>
    </div>
  </div>
</div>
    <script>

        $("#toggleLogin").click(function(){

            if($("#loginActive").val() == "1") {

                $("#loginActive").val("0");
                $("#loginModalTitle").html("Sign Up");
                $("#loginSignupButton").html("Sign Up");
                $("#toggleLogin").html("Login");

            } else {

              $("#loginActive").val("1");
              $("#loginModalTitle").html("Login");
              $("#loginSignupButton").html("Login");
              $("#toggleLogin").html("Sign Up");

            }

        });

        $("#loginSignupButton").click(function() {
          
            $.ajax({
              type: "POST",
              url: "action.php?action=loginSignup",
              data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
              success: function(result) {
                if(result == "1") {
                  window.location.assign("localhost/restapi/");
                } else {
                  $("#loginAlert").html(result).show();
                }
              }
            });

        });

    </script>

  </body>
</html>
