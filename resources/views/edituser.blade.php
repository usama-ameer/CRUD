<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

                    <form action="{{ route('update.data') }}" name="myForm" onsubmit="return validateForm()" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{$data->fname}}">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"  value="{{ $data->lname  }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ $data->email  }}">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <input type="text" class="form-control" id="body" name="body"  value="{{ $data->body  }}">
                          
                            <label class=" mb-3" for="gender">Gender: </label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"   name="radio" value="1" id="radio1" {{ $data->radio == "1" ? 'checked' : '' }}>
                                <label class="form-check-label" for="radio1" >
                                  Male
                                </label>
                              </div>
                              <div class=" form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radio"  value="0" id="radio2"    {{ $data->radio  == "0" ? 'checked' : '' }}>
                                <label class="form-check-label" for="radio2">
                                  Female
                                </label>
                              </div>
                          
                          <br>
                          <div class="col-md-12 mb-3">
                            <select class="form-select mt-3 mb-3"   name="dropdown" required>
                                  <option selected disabled value="">Position</option>
                                  <option value="1" {{ $data->dropdown  == "1" ? 'selected' : ''  }}  >Junior Web Developer</option>
                                  <option value="2" {{ $data->dropdown  == "2" ? 'selected' : '' }} >Senior Web Developer</option>
                                  <option value="3" {{ $data->dropdown  == "3" ? 'selected' : '' }}>Project Manager</option>
                           </select>
                         
                            {{-- ======================================== --}}
                            
                           <div class="mt-3 mb-3">
                        <label for="birthday">Birthday:</label>
                        {{-- {{ $data->created_at->setTimezone('T')->format('Y-m-d') }} --}}
                        <input type="date" id="birthday" value="{{$data->date}}" name="birthday">
                        {{-- <input type="time" id="birthday" value="{{ $data->checkin }}" name="birthday"> --}}
                             <input type="time" name="checkin" value="{{$data->check_in}}"  id="">

                    </div>
                        {{-- //========================================================= --}}




                        {{-- ===================================== --}}
                        {{ $data->checkbox  == "1" ? 'checked' : ''  }} 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"   value="1" name="option"   {{$data->checkbox  == "1" ? 'checked' : ''  }} id="invalidCheck" >
                            <label class="form-check-label">I confirm that all data are correct</label>
                           <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                          </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
    {{-- Insert form end--}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
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
                focusOn = document.getElementById("firstName").focus();
                var username = document.getElementById('firstName').value;
                var nameRegex = /^[a-zA-Z\-]+$/;
                if(nameRegex.test(username)){
                }else{
                  alert('First Name is not valid')
                  focusOn;
                  return false
                }
                var username = document.getElementById('lastName').value;
                var nameRegex = /^[a-zA-Z\-]+$/; 
                if(nameRegex.test(username)){
                }else{
                  focus();
                  alert('last Name is not valid')
                  focusOn;
                  return false
                }
                var username = document.getElementById('email').value;
                var nameRegex =/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/;
                  if(nameRegex.test(username)){
                  }else{
                      alert('email is not valid')
                      return false
                  }
                var username = document.getElementById('birthday').value;
                var nameRegex =^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$;
                  if(nameRegex.test(username)){
                  }else{
                      alert('date is not valid')
                      return false
                  }
              
            }
              </script>




</body>

</html>