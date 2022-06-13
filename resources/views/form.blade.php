<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{-- ======================================== --}}

{{-- ======================================== --}}
    <title>Forms in Laravel</title>
</head>

<body>
    @include('layouts.navbar')
    {{-- Insert form --}}
    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 mt-5">
                    @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
               @endif
                    <form action="{{ route('add.data') }}" name="myForm" onsubmit="return validateForm()"  method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstName"placeholder="First Name" value="{{ old('firstName') }}"  name="firstName"  >
                            <span class="text-danger">@error('firstName'){{ $message }}@enderror</span><br>
                            
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lastName"placeholder="Last Name" value="{{ old('lastName') }}" name="lastName" >
                            <span class="text-danger">@error('lastName'){{ $message }}@enderror</span><br>

                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="email"placeholder="Email" value="{{ old('email') }}" name="email" >
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="body" value="{{ old('body') }}" placeholder="Message"  name="body" >
                        </div>
                        {{-- ======================================== --}}
                        <label class=" mb-3" for="gender">Gender: </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="radio"  value="1" id="radio1" {{ old('radio') == "1" ? 'checked' : '' }}>
                            <label class="form-check-label" for="radio1" >
                              Male
                            </label>
                          </div>
                          <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radio"  value="0" id="radio2"    {{ old('radio') == "0" ? 'checked' : '' }}>
                            <label class="form-check-label" for="radio2">
                              Female
                            </label>
                          </div>
                          <span class="text-danger">@error('radio'){{ $message }}@enderror</span><br>
                          
                          <br>
                          <div class="col-md-12 mb-3">
                            <select class="form-select mt-3 mb-3" id="dropdown"  name="dropdown">
                                  <option selected disabled value="">Position</option>
                                  <option value="1"  {{ old('dropdown') == "1" ? 'selected' : '' }} >Junior Web Developer</option>
                                  <option value="2" {{ old('dropdown') == "2" ? 'selected' : '' }}>Senior Web Developer</option>
                                  <option value="3" {{ old('dropdown') == "3" ? 'selected' : '' }}>Project Manager</option>
                           </select>
                         
                        {{-- ======================================== --}}
                           <div class="mt-3 mb-3">
                        <label for="birthday">Birthday:</label>
                        <input type="datetime-local" id="birthday" value="{{ old('birthday') }}" name="birthday">

                    </div>
                        {{-- //========================================================= --}}




                        {{-- ===================================== --}}

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"   value="1"  {{ old('option') == "1" ? 'checked' : '' }} name="option" id="invalidCheck"  >
                            <label class="form-check-label">I confirm that all data are correct</label>
                          </div>

                        {{-- //========================================================= --}}
                    
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    {{-- Insert form end--}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
{{-- =========================== --}}
<script>
    function validateForm() {
      let firstName = document.forms["myForm"]["firstName"].value;
      if (firstName == "") {
        alert("Name must be filled out");
        return false;
      }
      let lastName = document.forms["myForm"]["lastName"].value;
      if (lastName == "") {
        alert("LastName must be filled out");
        return false;
      }
      let email = document.forms["myForm"]["email"].value;
           if (email === "" ) {
           
        alert("email must be filled out");
        return false;
      }
     
      var username = document.getElementById('firstName').value;
      var nameRegex = /^[a-zA-Z\-]+$/;
      if(nameRegex.test(username)){
      }else{
        alert('First Name is not valid')
        return false
      }
      var username = document.getElementById('lastName').value;
      var nameRegex = /^[a-zA-Z\-]+$/;
      if(nameRegex.test(username)){
      }else{
        focus();
        alert('last Name is not valid')
        return false
      }
      var username = document.getElementById('email').value;
      var nameRegex =/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/;
        if(nameRegex.test(username)){
        }else{
            alert('email is not valid')
            return false
        }
      var username = document.getElementById('body').value;
      var nameRegex =  /^[A-Za-z\s]*$/;
        if(nameRegex.test(username)){
        }else{
            alert('body is not valid')
            return false
        }

        var male = document.getElementById("radio1");
        var female = document.getElementById("radio2");
        var checkbox = document.getElementById("invalidCheck");
          if ((male.checked || female.checked) &&  checkbox.checked  )
          {
          }
          else
          {
              alert("Checkbox is UNCHECKED.");
              return false
          }

          var ddlist = document.getElementById("dropdown");
        if (ddlist.value == "") {
            alert("Please select an option!");
            return false;
        }

        // var username = document.getElementById('birthday').value;
        //  var nameRegex = /^(0[1-9]|[12]\d|3[01])$/;


        // if(nameRegex.test(username)){
        // }else{
        //     alert('date is not valid')
        //     return false
        // }
    
    
  }
    </script>




{{-- ======================== --}}
</body>

</html>